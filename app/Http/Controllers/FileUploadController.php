<?php

namespace App\Http\Controllers;

use App\FileUploadLoger;
use App\Player;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use Excel;
use File;

class FileUploadController extends Controller
{


    public $information = [];
    public $numberOfColumn = 0;

    public function index()
    {
        $players = Player::orderBy('created_at', 'DESC')->paginate(10);
        return view('partials.fileUpload', compact('players', $players));

    }

    private function getIndex($string)
    {
        $string = strtoupper($string);
        $length = strlen($string);
        $number = 0;
        $level = 1;
        while ($length >= $level) {
            $char = $string[$length - $level];
            $c = ord($char) - 64;
            $number += $c * (26 ** ($level - 1));
            $level++;
        }
        return $number;
    }


    public function import(Request $request)
    {
        $this->validate($request, array(
            'file' => 'required',
            'team_member_id' => 'required',
            'week_name' => 'required'
        ));

        $uploadedDate = Carbon::now()->toDateString();

        if ($request->hasFile('file')) {
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
                $path = $request->file->getRealPath();
                Excel::load($path, function ($reader) use ($request, $uploadedDate) {
                    $excel = $reader->getExcel();
                    $userId = $request->team_member_id;
                    foreach ($excel->getWorksheetIterator() as $sheet) {
                        $maxCol = $sheet->getHighestColumn();
                        $maxRow = $sheet->getHighestRow();

                        foreach ($sheet->getRowIterator() as $index => $row) {
                            $insertedData = new Player(["user_id" => $userId]);
                            if ($index == 1) {
                                $insertedData["is_question"] = 1;
                            }
                            foreach ($row->getCellIterator() as $key => $cell) {
                                // dd($cell->getColumn(),$cell->getCalculatedValue());
                                $insertedData[strtolower($cell->getColumn())] = $cell->getCalculatedValue();
                            }

                            $this->information[] = $insertedData;
                            $insertedData = [];

                        }
                    }
                });


                if (!empty($this->information)) {


                    $fileUploadInfo = FileUploadLoger::create(['week_name' => $request->week_name, 'user_id' => $request->team_member_id, 'uploaded_time' => $uploadedDate]);
                    if ($fileUploadInfo) {
                        // Player::where('jersey_number', 0)->delete();
                        $fileUploadInfo->playersInformation()->saveMany($this->information);
                        Session::flash('success', 'Your Data has successfully imported');
                    } else {
                        Session::flash('error', 'Error inserting the data..');
                        return back();
                    }
                }


                return back();

            }
        }
    }

    public function selectPlayers(Request $request)
    {
        $players = Player::select(DB::raw('distinct jersey_number as id'))
            ->whereRaw("user_id = " . Auth::user()->id)
            ->groupBy('jersey_number')
            ->orderBy('jersey_number', 'asc')
            ->get();
        $player_information = null;
        if ($request->has('player_id')) {
            $player_information = Player::where('jersey_number', $request->player_id)
                //->groupBy('wk')
                ->whereRaw("user_id = " . Auth::user()->id)
                ->orderBy('week_id', 'asc')
                ->get();
        }
        return view('partials.players')->with(compact(['players', 'player_information']));
    }

    public function trands(Request $request)
    {
        return view('partials.trends');
    }

    private function generateQueryResult($keysArray, $weekId)
    {
        $msg = "";
        foreach ($keysArray as $key => $item) {
            if ($key == (count($keysArray) - 1)) {
                $msg .= "round(avg({$item}),2) as {$item}";
            } else {
                $msg .= "round(avg({$item}),2) as {$item},";
            }

        }
        $weekIdImplode = implode(",", $weekId);

        $player_information = Player::select(DB::raw($msg))
            //->where('user_id',Auth::user()->id)
            ->where('is_question', 0)
            ->whereRaw("file_upload_loger in ({$weekIdImplode})")
            ->groupBy('file_upload_loger')
            ->orderBy('file_upload_loger', 'asc')
            ->get();
        // dd($player_information);
        return $player_information->toArray();
    }

    public function geterateTandsData(Request $request)
    {

        $userData = Auth::user()->graphs()->where('is_dashboard', 0)->get();

        $generateData = [];
        if (count($userData) > 0) {

            $grouped = $userData->groupBy('graph_id')->values()->all();
            $index = 0;
            foreach ($grouped as $key => $aData) {
                $info = ['title' => $aData[$index]['graph_name'], 'is_dashboard' => $aData[$index]['is_dashboard'],
                    'numberOfKey' => count($aData), 'ownData' => [['name' => $aData[$index]['column_name'], 'alphabet' => $aData[$index]['excell_name']]]];
                for ($i = 1; $i < count($aData); $i++) {
                    $info['ownData'][] = ['name' => $aData[$i]['column_name'], 'alphabet' => $aData[$i]['excell_name']];
                }
                $generateData[] = $info;


            }

            $fileUploadInformation = Auth::user()->fileLoger()->orderBy('id', 'asc')->get();
            $weekName = $fileUploadInformation->pluck('week_name')->toArray();
            $weekId = $fileUploadInformation->pluck('id')->toArray();
            //  dd($weekName);
            $allChart = [];


            foreach ($generateData as $aData) {
                $aGraph = ["title" => $aData['title'], "labels" => $weekName];
                $treeData = collect($aData['ownData'])->pluck('name')->toArray();
                $alphabet = collect($aData['ownData'])->pluck('alphabet')->toArray();
                $graphInformation = $this->generateQueryResult($alphabet, $weekId);
                $latestgraphInformation = [];
                foreach ($graphInformation as $aGraphInfo) {
                    $latestgraphInformation[] = array_values($aGraphInfo);
                }

                $aGraph['series'] = $treeData;
                $aGraph['data'] = $latestgraphInformation;
                $aGraph['show'] = false;
                $aGraph['options'] = [
//                    "responsive" => true,
                    "title" => [
                        "display" => true,
                        "text" => $aData['title']
                    ],
                    "legend" => [
                        "display" => true
                    ],
//                    "tooltips" => [
//                        "mode" => 'index',
//                        "intersect" => false
//                    ],
//                    "hover" => [
//                        "mode" => 'nearest',
//                        "intersect" => true
//                    ],

//                    "scales" => [
//                        "xAxes" => [
//                            "display" => true,
//                            "scaleLabel" => [
//                                "display" => true,
//                                "labelString" => 'Week',
//                            ]
//                        ],
//                        "yAxes" => [
//                            "ticks" => [
//                                "beginAtZero" => true
//                            ]
//                        ]
//                    ]


                ];

                $allChart[] = $aGraph;
            }

        }

        echo json_encode(['generated_data' => $allChart]);
    }


    public function delete(Request $request)
    {

        $info = FileUploadLoger::find($request->id);
        $info->delete();
        Player::where('week_id', $info->week_id)->where('user_id', $info->user_id)->delete();

        $response = array(
            'status' => true
        );
        return response()->json($response);

    }
}

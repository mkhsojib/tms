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
    private $weekName;

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

    private function columnNumber($col)
    {

        $col = str_pad($col, 2, '0', STR_PAD_LEFT);
        $i = ($col{0} == '0') ? 0 : (ord($col{0}) - 64) * 26;
        $i += ord($col{1}) - 64;

        return $i - 1;

    }

    public function import(Request $request)
    {
        $this->validate($request, array(
            'file' => 'required',
            'team_member_id' => 'required',
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
                                if ($index == 2 && $cell->getColumn() == "A") {
                                    $this->weekName = $cell->getCalculatedValue();
                                }

                                if ($this->columnNumber($key) > 102) {
                                    break;
                                }

                                // dd($cell->getColumn(),$cell->getCalculatedValue());
                                $insertedData[strtolower($cell->getColumn())] = $cell->getCalculatedValue();
                            }

                            $this->information[] = $insertedData;
                            $insertedData = [];

                        }
                    }
                });


                if (!empty($this->information)) {


                    $fileUploadInfo = FileUploadLoger::create(['week_name' => $this->weekName, 'user_id' => $request->team_member_id, 'uploaded_time' => $uploadedDate]);
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
        $fileUploadInformation = Auth::user()->fileLoger()->orderBy('id', 'asc')->get();
        $weekId = implode(",", $fileUploadInformation->pluck('id')->toArray());
        $players = Player::select(DB::raw('distinct b as coachInfo'))
            ->where('is_question', 0)
            ->whereRaw("file_upload_loger in ({$weekId})")
            ->groupBy('b')
            ->orderBy('b', 'asc')
            ->get();

        return view('partials.players')->with(compact(['players']));
    }

    public function trands(Request $request)
    {
        return view('partials.trends');
    }

    private function generateQueryResult($keysArray, $weekId, $firstRowData)
    {

        $msg = "";


        foreach ($keysArray as $key => $item) {
            $item = strtolower($item);
            if (is_numeric($firstRowData[$item])) {
                $msg .= "round(avg({$item}),2) as {$item}";
            } else {
                $msg .= "sum(if({$item}='Yes',1,0)) as {$item}";
            }
            if ($key != (count($keysArray) - 1)) {
                $msg .= ',';
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


    private function generateQuerySingleResult($keysArray, $weekId, $jurseyNumber,$firstRowData)
    {
        $msg = "";
        foreach ($keysArray as $key => $item) {
            $item = strtolower($item);
            if (is_numeric($firstRowData[$item])) {
                $msg .= "round(avg({$item}),2) as {$item}";
            } else {
                $msg .= "sum(if({$item}='Yes',1,0)) as {$item}";
            }
            if ($key != (count($keysArray) - 1)) {
                $msg .= ',';
            }

        }
        $weekIdImplode = implode(",", $weekId);

        $player_information = Player::select(DB::raw($msg))
            //->where('user_id',Auth::user()->id)
            ->where('is_question', 0)
            ->where('b', $jurseyNumber)
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

            $firstRowData = Player::where('file_upload_loger', $weekId[0])
                ->where('is_question', 0)->orderBy('id', 'asc')->first()->toArray();
            $allChart = [];


            foreach ($generateData as $aData) {
                $aGraph = ["title" => $aData['title'], "labels" => $weekName];
                $treeData = collect($aData['ownData'])->pluck('name')->toArray();
                $alphabet = collect($aData['ownData'])->pluck('alphabet')->toArray();
                $graphInformation = $this->generateQueryResult($alphabet, $weekId, $firstRowData);
                $latestgraphInformation = [];
                foreach ($graphInformation as $aGraphInfo) {
                    $latestgraphInformation[] = array_values($aGraphInfo);
                }

                $aGraph['series'] = $treeData;
                $aGraph['data'] = $latestgraphInformation;
                $aGraph['show'] = false;


                $allChart[] = $aGraph;
            }

        }

        echo json_encode(['generated_data' => $allChart]);
    }


    public function geterateTandsDataSinglePlayer(Request $request)
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
            $playersWeekIds = Player::where('b',$request->id)->select(DB::raw("distinct file_upload_loger"))->get()->toArray();
          //  dd($playersWeekIds);

            $fileUploadInformation = Auth::user()->fileLoger()->whereIn('id',$playersWeekIds)->orderBy('id', 'asc')->get();

            $weekName = $fileUploadInformation->pluck('week_name')->toArray();
            $weekId = $fileUploadInformation->pluck('id')->toArray();
            $firstRowData = Player::where('file_upload_loger', $weekId[0])
                ->where('is_question', 0)->orderBy('id', 'asc')->first()->toArray();
            //  dd($weekName);
            $allChart = [];


            foreach ($generateData as $aData) {
                $aGraph = ["title" => $aData['title'], "labels" => $weekName];
                $treeData = collect($aData['ownData'])->pluck('name')->toArray();
                $alphabet = collect($aData['ownData'])->pluck('alphabet')->toArray();
                $graphInformation = $this->generateQuerySingleResult($alphabet, $weekId, $request->id,$firstRowData);
                $latestgraphInformation = [];
                foreach ($graphInformation as $aGraphInfo) {
                    $latestgraphInformation[] = array_values($aGraphInfo);
                }

                $aGraph['series'] = $treeData;
                $aGraph['data'] = $latestgraphInformation;
                $aGraph['show'] = false;


                $allChart[] = $aGraph;
            }

        }

        echo json_encode(['generated_data' => $allChart]);
    }


    public function delete(Request $request)
    {

        $info = FileUploadLoger::find($request->id);
        $info->delete();
        Player::where('file_upload_loger', $info->id)->delete();

        $response = array(
            'status' => true
        );
        return response()->json($response);

    }
}

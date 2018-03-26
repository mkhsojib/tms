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
    public $numberOfColumn= 0;

    public function index()
    {
        $players = Player::orderBy('created_at', 'DESC')->paginate(10);
        return view('partials.fileUpload', compact('players', $players));

    }

    private function getIndex ($string) {
        $string = strtoupper($string);
        $length = strlen($string);
        $number = 0;
        $level = 1;
        while ($length >= $level ) {
            $char = $string[$length - $level];
            $c = ord($char) - 64;
            $number += $c * (26 ** ($level-1));
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
                Excel::load($path, function ($reader) use ($request,$uploadedDate) {
                    $excel = $reader->getExcel();
                    $userId = $request->team_member_id;
                    foreach ($excel->getWorksheetIterator() as $sheet) {
                        $maxCol = $sheet->getHighestColumn();
                        $maxRow = $sheet->getHighestRow();

                        foreach ($sheet->getRowIterator() as $index => $row) {
                            $insertedData = new Player( ["user_id"=>$userId]);
                            if($index==1){
                                $insertedData["is_question"]=1;
                            }
                            foreach ($row->getCellIterator() as $key=>$cell){
                               // dd($cell->getColumn(),$cell->getCalculatedValue());
                                $insertedData[strtolower($cell->getColumn())] = $cell->getCalculatedValue();
                            }

                            $this->information[] = $insertedData;
                            $insertedData = [];

                        }
                    }
                });




                if (!empty($this->information)) {



                   $fileUploadInfo =  FileUploadLoger::create(['week_name' => $request->week_name, 'user_id' => $request->team_member_id, 'uploaded_time' => $uploadedDate]);
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
        $player_information = Player::select(DB::raw(
            "
                concat('week ',week_id) as wk,
                round(avg(`hours_of_sleep`),2) as hours_of_sleep, 
                round(avg(`how_many_naps`),2) as how_many_naps, 
                round(avg(`nutrition`),2) as nutrition, 
                round(avg(`breakfast`),2) as breakfast, 
                round(avg(`lunch`),2) as lunch,
                round(avg(`supper`),2) as supper,
                round(avg(`total_meals`),2) as total_meals, 
                round(avg(`pre_game_snacks`),2) as pre_game_snacks, 
                round(avg(`post_game_snack_refuel`),2) as post_game_snack_refuel, 
                round(avg(`hydration`),2) as hydration,
                round(avg(`stress_level`),2) as stress_level,
                round(avg(`stress_from_hockey`),2) as stress_from_hockey,
                round(avg(`stress_from_school`),2) as stress_from_school,
                round(avg(`stress_from_personal`),2) as stress_from_personal, 
                round(avg(`strength_workouts`),2) as strength_workouts,   
                round(avg(`cardio_workouts`),2) as cardio_workouts, 	 
                round(avg(`performance_in_practice`),2) as performance_in_practice,  
                round(avg(`focus_during_practice`),2) as focus_during_practice, 
                round(avg(`effort_during_practice`),2) as effort_during_practice, 
                 round(avg(`execution_during_practice`),2) as execution_during_practice, 	 	 
                 round(avg(`game_performance`),2) as game_performance, 
                 round(avg(`offensive_game_performance`),2) as offensive_game_performance, 
                 round(avg(`defensive_game_performance`),2) as defensive_game_performance, 
                 round(avg(`special_teams_game_performance`),2) as special_teams_game_performance,
                 round(avg(`academic_progress`),2) as academic_progress,
                 round(avg(`relationship_teammates`),2) as relationship_teammates,
                 round(avg(`relationship_staff`),2) as relationship_staff, 
                 round(avg(`relationships_personal_life`),2) as relationships_personal_life,
                 count(id) as total, 
                 sum(if(extra_strength='Yes',1,0)) as extra_strength,
                 sum(if(extra_skill='Yes',1,0))as extra_skill,
                 sum(if(extra_cardio='Yes',1,0))as   extra_cardio, 
                 sum(if(watch_video='Yes',1,0))as watch_video"


        ))->whereRaw("user_id = " . Auth::user()->id . " and wk!='null'")->groupBy('week_id')->orderBy('week_id','asc')->get();

        $stranth_meter = ["extra_strength" => [], "extra_skill" => [], "extra_cardio" => [], "watch_video" => []];
        foreach ($player_information as $player) {

            $stranth_meter["extra_strength"][] = number_format(($player->extra_strength * 100) / $player->total, 2);
            $stranth_meter["extra_skill"][] = number_format(($player->extra_skill * 100) / $player->total, 2);
            $stranth_meter["extra_cardio"][] = number_format(($player->extra_cardio * 100) / $player->total, 2);
            $stranth_meter["watch_video"][] = number_format(($player->watch_video * 100) / $player->total, 2);
        }


        return view('partials.trends')->with(compact(['player_information', 'stranth_meter']));
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

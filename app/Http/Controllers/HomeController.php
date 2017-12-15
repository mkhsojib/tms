<?php

namespace App\Http\Controllers;

use App\FileUploadLoger;
use App\Http\Requests;
use App\Player;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        if (Auth::user()->hasRole('administrator')) {
            $users = User::orderBy('last_login_time', 'desc')->get();

            $dates = FileUploadLoger::orderBy('uploaded_time', 'desc')->with('user')->get();
            //dd($dates);
            return view('home.admin_home')->with(compact('users', 'dates'));
        } else if (Auth::user()->hasRole('coach')) {


            if($request->id!=null){
                $graphInfo = DB::select("
                SELECT extra_strength,extra_cardio,extra_skill,watch_video 
                from players where user_id = ? and  week_id = 
                (select week_id from file_upload_loger  where week_id=? and user_id = ? 
                order by id desc limit 1)
           ", array(Auth::user()->id,$request->id, Auth::user()->id));

                $graphData = [
                    "extra_strength_yes" => 0,
                    "extra_strength_no" => 0,
                    "extra_cardio_yes" => 0,
                    "extra_cardio_no" => 0,
                    "extra_skill_yes" => 0,
                    "extra_skill_no" => 0,
                    "watch_video_yes" => 0,
                    "watch_video_no" => 0];
                if (count($graphInfo) > 0) {
                    foreach ($graphInfo as $data) {
                        $data->extra_strength == "Yes" ? $graphData['extra_strength_yes']++ : $graphData['extra_strength_no']++;
                        $data->extra_cardio == "Yes" ? $graphData['extra_cardio_yes']++ : $graphData['extra_cardio_no']++;
                        $data->extra_skill == "Yes" ? $graphData['extra_skill_yes']++ : $graphData['extra_skill_no']++;
                        $data->watch_video == "Yes" ? $graphData['watch_video_yes']++ : $graphData['watch_video_no']++;
                    }

                    //  $graphData['extra_strength_yes'] = number_format(($graphData['extra_strength_yes']*100)/count($graphInfo),2);
                    //   $graphData['extra_strength_no'] = number_format(100-$graphData['extra_strength_yes'],2);

                }
                $players = DB::select("
                SELECT *
                from players where user_id = ? and  week_id = 
                (select week_id from file_upload_loger where week_id=? and user_id = ? 
                order by id desc limit 1)
           ", array(Auth::user()->id,$request->id, Auth::user()->id));
            }else{


                $graphInfo = DB::select("
                SELECT extra_strength,extra_cardio,extra_skill,watch_video 
                from players where user_id = ? and week_id = 
                (select week_id from file_upload_loger where user_id = ? 
                order by week_id desc limit 1)
           ", array(Auth::user()->id, Auth::user()->id));

                $graphData = [
                    "extra_strength_yes" => 0,
                    "extra_strength_no" => 0,
                    "extra_cardio_yes" => 0,
                    "extra_cardio_no" => 0,
                    "extra_skill_yes" => 0,
                    "extra_skill_no" => 0,
                    "watch_video_yes" => 0,
                    "watch_video_no" => 0];
                if (count($graphInfo) > 0) {
                    foreach ($graphInfo as $data) {
                        $data->extra_strength == "Yes" ? $graphData['extra_strength_yes']++ : $graphData['extra_strength_no']++;
                        $data->extra_cardio == "Yes" ? $graphData['extra_cardio_yes']++ : $graphData['extra_cardio_no']++;
                        $data->extra_skill == "Yes" ? $graphData['extra_skill_yes']++ : $graphData['extra_skill_no']++;
                        $data->watch_video == "Yes" ? $graphData['watch_video_yes']++ : $graphData['watch_video_no']++;
                    }

                    //  $graphData['extra_strength_yes'] = number_format(($graphData['extra_strength_yes']*100)/count($graphInfo),2);
                    //   $graphData['extra_strength_no'] = number_format(100-$graphData['extra_strength_yes'],2);

                }
                $players = DB::select("
                SELECT *
                from players where user_id = ? and week_id = 
                (select week_id from file_upload_loger where user_id = ? 
                order by week_id desc limit 1)
           ", array(Auth::user()->id, Auth::user()->id));
            }




            $weekList = FileUploadLoger::where('user_id',Auth::user()->id)->orderBy('week_id','desc')->get();


            return view('home.coach_home')->with(compact('graphData','players','weekList'));
        }

        return view('home.guest_home');


    }
}

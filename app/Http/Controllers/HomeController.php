<?php

namespace App\Http\Controllers;

use App\FileUploadLoger;
use App\Http\Requests;
use App\Player;
use App\User;
use App\UserGraph;
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
            return view('home.coach_home');


        }

        return view('home.guest_home');


    }

    public function generateGraph(Request $request){
        try{
            $weekList = FileUploadLoger::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
            if ($request->id == null) {
                $excellData = FileUploadLoger::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first()->playersInformation;


            } else {
                $excellData = FileUploadLoger::where('user_id', Auth::user()->id)->where('id', $request->id)->orderBy('id', 'desc')->first()->playersInformation;
            }

            $info = [];
            foreach ($excellData as $key => $aData) {
                $latestInfo = array_filter($aData->toArray(), function ($var) {
                    return !is_null($var);
                });
                unset($latestInfo['id']);
                unset($latestInfo['user_id']);
                unset($latestInfo['file_upload_loger']);
                unset($latestInfo['created_at']);
                unset($latestInfo['updated_at']);
                unset($latestInfo['is_question']);
                $info[] = $latestInfo;
            }
            $excellData = $info;
            $excellKey = collect($excellData[0])->keys();
            $weekList = FileUploadLoger::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();

            $adminGraph = Auth::user()->graphs()->where('is_dashboard', 1)->get();
            $dashboarGraph = [];
            if (count($adminGraph) > 0) {
                foreach ($adminGraph as $aGraph) {
                    $firstData = collect($info)->pluck(strtolower($aGraph->excell_name))->slice(1);
                    $yesData = $firstData->filter(function ($item) {

                        return $item == "Yes";
                    });

                    $dashboarGraph[] = ["graph_name" => $aGraph->graph_name, "yes" => count($yesData),
                        "no" => (count($firstData) - count($yesData)),
                        "labels"=>["YES","No"]];
                }
            }

            echo json_encode(["excellData"=>$excellData,"week_list"=>$weekList,"graph"=>$dashboarGraph,"success"=>true]);
        }catch (\Exception $e){

        }

    }

}

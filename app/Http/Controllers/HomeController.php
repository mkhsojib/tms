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
            try{
                $excellData = FileUploadLoger::where('user_id',Auth::user()->id)->orderBy('id', 'desc')->first()->playersInformation;
                $info = [];
                foreach ($excellData as $key=>$aData){
                    $latestInfo =   array_filter($aData->toArray(), function($var){return !is_null($var);} );
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
                $weekList = FileUploadLoger::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();



                return view('home.coach_home')->with(compact('excellData','excellKey','weekList'));
            }catch (\Exception $e){
                return abort(404,$e->getMessage());
            }

        }

        return view('home.guest_home');


    }
}

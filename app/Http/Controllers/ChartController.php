<?php

namespace App\Http\Controllers;

use App\Player;
use App\User;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function index()
    {
        $players = Player::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
            ->get();
        $chart = Charts::database($players, 'line', 'highcharts')
            ->title("Monthly new excel data")
            ->elementLabel("Total Uploads")
            ->dimensions(1000, 500)
            ->responsive(true)
            ->groupByMonth(date('Y'), true);
        return view('chart',compact('chart'));
    }


}

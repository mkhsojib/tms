<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserGraphController extends Controller
{
    public function setup_file($id){
        return view('admin.users.admin-setup', compact('id'));
    }

    public function totalInsertGraph(Request $request){
        $graphData = collect($request->graph_data);



        $GenerateGraphData = [];
        foreach ($graphData as $key => $aData){
            foreach ($aData['ownData'] as $insideGraph){
                $GenerateGraphData[] = new UserGraph(["graph_id"=>($key+1),'graph_name'=>$aData['title'],
                    'column_name'=>$insideGraph['name'],'excell_name'=>$insideGraph['alphabet']]);
            }

        }
        $user = User::find($request->user_id);
        $user->graphs()->delete();
        $user->graphs()->saveMany($GenerateGraphData);

        echo json_encode(["success"=>true,"message"=>"data insert successfully"]);

    }
}

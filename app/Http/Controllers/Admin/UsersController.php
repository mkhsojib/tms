<?php

namespace App\Http\Controllers\Admin;

use App\FileUploadLoger;
use App\Player;
use App\User;
use App\UserGraph;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $roles = Role::get()->pluck('name', 'name');

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $user = User::create($request->all());
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->assignRole($roles);

        return redirect()->route('admin.users.index');
    }


    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $roles = Role::get()->pluck('name', 'name');

        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, $id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $user = User::findOrFail($id);
        $user->update($request->all());
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->syncRoles($roles);

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $user = User::findOrFail($id);
        if($user!=null){
            Player::where('user_id',$user->id)->delete();
            FileUploadLoger::where('user_id',$user->id)->delete();
        }
        $user->delete();

        return redirect()->route('admin.users.index');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

    public function setup_file($id){
        return view('admin.users.admin-setup', compact('id'));
    }


    public function dashboardGraphSetup($id){
        return view('admin.users.admin-graph-setup', compact('id'));
    }

    public function totalInsertGraph(Request $request){
        $graphData = collect($request->graph_data);


        if(isset($request->dashboardSetup)){
            $GenerateGraphData = [];
            foreach ($graphData as $key => $aData){
                foreach ($aData['ownData'] as $insideGraph){
                    $GenerateGraphData[] = new UserGraph(["graph_id"=>($key+1),'graph_name'=>$aData['title'],
                        'column_name'=>$insideGraph['name'],
                        'is_dashboard'=>1,
                        'excell_name'=>$insideGraph['alphabet']]);
                }

            }
            $user = User::find($request->user_id);
            $user->graphs()->where('is_dashboard',1)->delete();
            $user->graphs()->saveMany($GenerateGraphData);
        }else{
            $GenerateGraphData = [];
            foreach ($graphData as $key => $aData){
                foreach ($aData['ownData'] as $insideGraph){
                    $GenerateGraphData[] = new UserGraph(["graph_id"=>($key+1),'graph_name'=>$aData['title'],
                        'column_name'=>$insideGraph['name'],'excell_name'=>$insideGraph['alphabet']]);
                }

            }
            $user = User::find($request->user_id);
            $user->graphs()->where('is_dashboard',0)->delete();
            $user->graphs()->saveMany($GenerateGraphData);
        }



        echo json_encode(["success"=>true,"message"=>"data insert successfully"]);

    }

    public function getUserData($id,$type=null){
        $user = User::find($id);
        if($type==null){
            $userData = $user->graphs()->where('is_dashboard',0)->get();
        }else{
            $userData = $user->graphs()->where('is_dashboard',1)->get();
        }

        $generateData= [];
        if(count($userData)>0){

            $grouped = $userData->groupBy('graph_id')->values()->all();
            $index = 0;
            foreach ($grouped as $key=> $aData){
                $info = ['title'=>$aData[$index]['graph_name'],'is_dashboard'=>$aData[$index]['is_dashboard'],
                    'numberOfKey'=>count($aData),'ownData'=>[['name'=>$aData[$index]['column_name'],'alphabet'=>$aData[$index]['excell_name']]]];
                for ($i=1;$i<count($aData);$i++){
                    $info['ownData'][] = ['name'=>$aData[$i]['column_name'],'alphabet'=>$aData[$i]['excell_name']];
                }
                $generateData[] = $info;


            }

        }

        echo json_encode(['generated_data'=>$generateData]);
    }

}

<?php

namespace App\Http\Controllers;

use App\Comments;
use App\FileUploadLoger;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Session;
use Excel;
use File;

class CommentController extends Controller
{
    private $info = [];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.comment');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(count($request->comments)>0 && $request->coachId>0 && $request->fileUploadId>0){
            $info = [];

            $loginUserId = Auth::user()->id;

            foreach ($request->comments as $comment) {
                $value = ["user_id"=>$loginUserId,"coach_id"=>$request->coachId,"file_upload_loger_id"=>$request->fileUploadId,"message"=>$comment];
                $info[] = $value;
            }


            Comments::insert($info);

            echo json_encode(["success"=>true]);
        }else{
            echo json_encode(["success"=>false]);
        }
    }



    public function storeExcell(Request $request)
    {
        $loginUserId = Auth::user()->id;
        if ($request->hasFile('file')) {
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
                $path = $request->file->getRealPath();
                Excel::load($path, function ($reader) use ($request, $loginUserId) {
                    $excel = $reader->getExcel();
                    $userId = $request->team_member_id;
                    foreach ($excel->getWorksheetIterator() as $sheet) {
                        $maxCol = $sheet->getHighestColumn();
                        $maxRow = $sheet->getHighestRow();


                        foreach ($sheet->getRowIterator() as $index => $row) {


                            foreach ($row->getCellIterator() as $key => $cell) {

                                $this->info[] = ["user_id"=>$loginUserId,"coach_id"=>$request->coachId,"file_upload_loger_id"=>$request->weekId,"message"=>$cell->getCalculatedValue()];

                            }



                        }
                    }
                });
            }
        }
        Comments::insert($this->info);
        return back()->with('success',"file insert successfully");


    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function coachList()
    {

        $users = User::hasRoles('coach')->get();

        echo json_encode(['success'=>true,'coachList'=>$users]);
    }


    public function coachWeekList($id)
    {
        $weekList = FileUploadLoger::where('user_id',$id)->get();
        echo json_encode(['success'=>true,'weeklist'=>$weekList]);
    }
}

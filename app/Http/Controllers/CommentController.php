<?php

namespace App\Http\Controllers;

use App\Comments;
use App\FileUploadLoger;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use PhpParser\ErrorHandler\CollectingTest;
use Session;
use Excel;
use File;

class CommentController extends Controller
{
    private $info = [];
    private $information = [];

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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (count($request->comments) > 0 && $request->coachId > 0 && $request->fileUploadId > 0) {
            $info = [];

            $loginUserId = Auth::user()->id;

            foreach ($request->comments as $comment) {
                $value = ["user_id" => $loginUserId, "coach_id" => $request->coachId, "file_upload_loger_id" => $request->fileUploadId, "message" => $comment];
                $info[] = $value;
            }


            Comments::insert($info);

            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false]);
        }
    }


    public function storeExcell(Request $request)
    {
        $loginUserId = Auth::user()->id;
        $coach_id = $request->coachId;
        $file_upload_loger_id = $request->weekId;

        if ($request->hasFile('file')) {
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
                $path = $request->file->getRealPath();
                Excel::load($path, function ($reader) use ($request, $loginUserId, $coach_id, $file_upload_loger_id) {
                    $excel = $reader->getExcel();
                    $userId = $request->team_member_id;
                    foreach ($excel->getWorksheetIterator() as $sheet) {
                        $maxCol = $sheet->getHighestColumn();
                        $maxRow = $sheet->getHighestRow();


                        foreach ($sheet->getRowIterator() as $index => $row) {

                          //  dd($file_upload_loger_id);
                            $insertedData = ["user_id" => $loginUserId,
                                'coach_id' => $coach_id,
                                'file_upload_loger_id' => $file_upload_loger_id];

                            if ($index == 1) {
                                $insertedData["is_question"] = 1;
                            }

                            foreach ($row->getCellIterator() as $key => $cell) {


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
            }
        }
    //  dd($this->information) ;
       // if (count($this->information) > 0) {
        foreach ($this->information as $information) {
            Comments::insert($information);
        }

            return back()->with('success', "file insert successfully");
      //  }
        // dd($this->information);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('home.coach_comments');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function coachList()
    {

        $users = User::hasRoles('coach')->get();

        echo json_encode(['success' => true, 'coachList' => $users]);
    }


    public function coachWeekList($id)
    {

        if (!Auth::user()->hasRole('coach')) {
            $weekList = FileUploadLoger::where('user_id', $id)->get();
            echo json_encode(['success' => true, 'weeklist' => $weekList]);
        } else {
            $weekList = FileUploadLoger::where('user_id', Auth::user()->id)->get();
            $comments = [];
            if (count($weekList) > 0) {
                $comments = Comments::where('file_upload_loger_id', $id==0?$weekList[0]['id']:$id)->get()->toArray();
                $commentHeader= [];
                $newCommentList = [];
                $keyList = [];
                if(count($comments)>0){
                    $commentHeader = array_filter($comments[0], 'strlen');
                    $keyList = collect($commentHeader)->keys();
                    unset($keyList[0],$keyList[1],$keyList[2],$keyList[3],$keyList[4]);
                    unset($commentHeader['id'],$commentHeader['coach_id'],
                        $commentHeader['file_upload_loger_id'],$commentHeader['user_id'],$commentHeader['is_question']);

                    $newCommentList = [];
                    unset($comments[0]);
                    foreach ($comments as $comment) {
                        $filtered = collect($comment)->only($keyList)->all();
                        $newCommentList[] = $filtered;
                    }


                }

            }

            echo json_encode(['success' => true, 'weeklist' => $weekList,'keyList'=>$keyList, 'comments' => $newCommentList,'headers'=>$commentHeader]);
        }

    }

    private function columnNumber($col)
    {

        $col = str_pad($col, 2, '0', STR_PAD_LEFT);
        $i = ($col{0} == '0') ? 0 : (ord($col{0}) - 64) * 26;
        $i += ord($col{1}) - 64;

        return $i - 1;

    }
}

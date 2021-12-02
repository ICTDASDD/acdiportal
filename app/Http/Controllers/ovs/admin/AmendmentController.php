<?php

namespace App\Http\Controllers\ovs\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ovs\admin\Amendment;
use Illuminate\Support\Facades\DB;
use DataTables;
use Response;
use Validator;


class AmendmentController extends Controller
{
    
    public function listAmendment(Request $request)
    {
        if ($request->ajax()) {
            $votingPeriodID = "";
            if (!empty($request->get('votingPeriodID'))) {
                $votingPeriodID = $request->get('votingPeriodID');
            }
            $data = DB::table('amendments')
            ->select('amendments.*')
            ->get();
            if($votingPeriodID != "")
            {
                $data = DB::table('amendments')
                ->select('amendments.*')
                ->where('votingPeriodID', $votingPeriodID)
                ->get();
            }
            return Datatables::of($data) 
            ->addIndexColumn()
                ->addColumn('amendmentNo', function($row){
                    $actionBtn = "<center>". $row->amendmentNo. "</center>";
                    return $actionBtn;
                })
                ->addColumn('articleNo', function($row){
                    $actionBtn = "<center>". $row->articleNo. "</center>";
                    return $actionBtn;
                })
                ->addColumn('amendmentDetails', function($row){
                    $actionBtn = "<center>". $row->amendmentDetails. "</center>";
                    return $actionBtn;
                })
                ->rawColumns(['amendmentNo','articleNo','amendmentDetails'])
            ->addIndexColumn()
            ->make(true);
        }
    }

   public function editAmendment(Request $request)
    {
        $id = $request->get('id');
        $where = array('id' => $id);
        $amendment = DB::table('amendments')
        ->select('amendments.*')
        ->where($where)
        ->first();
        return Response::json($amendment);
    }

    public function removeAmendment(Request $request)
    {
        $id = $request->get('id');
        $amendment = Amendment::where('id',$id)->delete();

        if(!$amendment)
        {
            return Response::json(['success'=> false]);
        } 
        else 
        {
            return Response::json(['success'=> true]);
        }
    } 

    public function addAmendment(Request $request)
    { 
        $validator = \Validator::make($request->all(), [
            'votingPeriodID' => 'required',
            'amendmentNo' => 'required',
            'articleNo' => 'required',
            'amendmentDetails' => 'required',
        ]);
        
        if ($validator->fails()) {
            return Response::json(['errors' => $validator->errors()->all()]);
        }

        $amendment = new Amendment([
            'votingPeriodID' => $request->get('votingPeriodID'),
            'amendmentNo' => $request->get('amendmentNo'),
            'articleNo' => $request->get('articleNo'),
            'amendmentDetails' => $request->get('amendmentDetails'),
        ]);
        $amendment->save();
            
        return Response::json(['success'=> true]);
    }
    

    public function updateAmendment(Amendment $amendment, Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'votingPeriodID' => 'required',
            'amendmentNo' => 'required',
            'articleNo' => 'required',
            'amendmentDetails' => 'required',
        ]);
        
        if ($validator->fails()) {
            return Response::json(['errors' => $validator->errors()->all()]);
        }
       
        $id = $request->get('id');
        $amendment = Amendment::find($id);

        $amendment->votingPeriodID = $request->get('votingPeriodID');
        $amendment->amendmentNo = $request->get('amendmentNo');
        $amendment->articleNo = $request->get('articleNo');
        $amendment->amendmentDetails = $request->get('amendmentDetails');
        $amendment->save();

        return Response::json(['success'=> true]);
    } 
    

}

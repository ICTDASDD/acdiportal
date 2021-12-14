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
                ->addColumn('articleDetails', function($row){
                    $actionBtn = "<center>". $row->articleDetails. "</center>";
                    return $actionBtn;
                })
                ->addColumn('presentProvision', function($row){
                    $actionBtn = "<center>". $row->presentProvision. "</center>";
                    return $actionBtn;
                })
                ->addColumn('proposedRevision', function($row){
                    $actionBtn = "<center>". $row->proposedRevision. "</center>";
                    return $actionBtn;
                })
                ->addColumn('proposedProvision', function($row){
                    $actionBtn = "<center>". $row->proposedProvision. "</center>";
                    return $actionBtn;
                })
                ->addColumn('rationale', function($row){
                    $actionBtn = "<center>". $row->rationale. "</center>";
                    return $actionBtn;
                })
                ->addColumn('question', function($row){
                    $actionBtn = "<center>". $row->question. "</center>";
                    return $actionBtn;
                })
                ->rawColumns(['amendmentNo','articleDetails','presentProvision', 'proposedRevision', 'proposedProvision', 'rationale', 'question'])
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function defaultAmendment(Request $request)
    {
        $votingPeriodID = $request->get('votingPeriodID');

    	$data = DB::table('amendments')
                    ->select('amendments.*')
                    ->where('amendments.votingPeriodID', $votingPeriodID)
                    ->orderBy('amendments.amendmentNo', 'asc')
                    ->get();
                
        $amendments = [];

        if (count($data) > 0) {
            foreach ($data as $row) {
                $amendments[] = array(
                    "isNoAmendmentFound" => "false",
                    "amendmentID" => $row->id,
                    "amendmentNo" => $row->amendmentNo,
                    "articleDetails" => $row->articleDetails,
                    "presentProvision" => $row->presentProvision,
                    "proposedRevision" => $row->proposedRevision,
                    "proposedProvision" => $row->proposedProvision,
                    "rationale" => $row->rationale,
                    "question" => $row->question,
                );
            }
        } else 
        {
            $amendments[] = array(
                "isNoAmendmentFound" => "true",
            );
        }

        return response()->json($amendments);
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
            'articleDetails' => 'required',
            'presentProvision' => 'required',
            'proposedRevision' => 'required',
            'proposedProvision' => 'required',
            'rationale' => 'required',
            'question' => 'required',
        ]);
        
        if ($validator->fails()) {
            return Response::json(['errors' => $validator->errors()->all()]);
        }

        $amendment = new Amendment([
            'votingPeriodID' => $request->get('votingPeriodID'),
            'amendmentNo' => $request->get('amendmentNo'),
            'articleDetails' => $request->get('articleDetails'),
            'presentProvision' => $request->get('presentProvision'),
            'proposedRevision' => $request->get('proposedRevision'),
            'proposedProvision' => $request->get('proposedProvision'),
            'rationale' => $request->get('rationale'),
            'question' => $request->get('question'),
        ]);
        $amendment->save();
            
        return Response::json(['success'=> true]);
    }
    

    public function updateAmendment(Amendment $amendment, Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'votingPeriodID' => 'required',
            'amendmentNo' => 'required',
            'articleDetails' => 'required',
            'presentProvision' => 'required',
            'proposedRevision' => 'required',
            'proposedProvision' => 'required',
            'rationale' => 'required',
            'question' => 'required',
        ]);
        
        if ($validator->fails()) {
            return Response::json(['errors' => $validator->errors()->all()]);
        }
       
        $id = $request->get('id');
        $amendment = Amendment::find($id);

        $amendment->votingPeriodID = $request->get('votingPeriodID');
        $amendment->amendmentNo = $request->get('amendmentNo');
        $amendment->articleDetails = $request->get('articleDetails');
        $amendment->presentProvision = $request->get('presentProvision');
        $amendment->proposedRevision = $request->get('proposedRevision');
        $amendment->proposedProvision = $request->get('proposedProvision');
        $amendment->rationale = $request->get('rationale');
        $amendment->question = $request->get('question');
        $amendment->save();

        return Response::json(['success'=> true]);
    } 
    

}

<?php

namespace App\Http\Controllers\ovs\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ovs\admin\Amendment;
use Illuminate\Support\Facades\DB;
use DataTables;
use Response;
use Validator;
use Exceptions;

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

    public function votedAmendment(Request $request)
    {
        $votingPeriodID = $request->get('votingPeriodID');
        $mrID = $request->get('mrID');

    	$data = DB::table('amendments')
                    ->join('amendment_votes', function($join) use ($votingPeriodID, $mrID)
                            {
                                $join->on('amendment_votes.aID', '=', 'amendments.id');
                                $join->where('amendment_votes.vpID','=', $votingPeriodID);
                                $join->where('amendment_votes.mrID','=', $mrID);
                            })
                    ->select('amendments.*', 'amendment_votes.vote')
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
                    "vote" => $row->vote,
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

    public function dashboardAmendment(Request $request)
    {
        $votingPeriodID = $request->get('votingPeriodID');
        $branchCode = $request->get('branchCode');

        $data = DB::table('amendments')
        ->where('amendments.votingPeriodID', $votingPeriodID)
        ->orderBy('amendments.amendmentNo', 'asc')
        ->groupBy('amendments.id', 'amendments.amendmentNo', 'amendments.articleDetails') 
        ->select('amendments.id', 'amendments.amendmentNo', 'amendments.articleDetails')
        ->get();

        $migs = 0;
        $regMigs = 0;

        if($branchCode != "0" && $branchCode != "09")
        {      
            $migs = DB::table('GADATA')
            ->where('GADATA.MYBR', $branchCode)
            ->count();
            
            $regMigs = DB::table('GAData')
                ->join('member_registration', 'member_registration.afsn', '=', 'GAData.afsn')
                ->where('member_registration.brRegistered', $branchCode)
                ->count();
        } 
        else 
        {
            $migs = DB::table('GADATA')->count();
            
            $regMigs = DB::table('GAData')
                ->join('member_registration', 'member_registration.afsn', '=', 'GAData.afsn')
                ->count();
        }
        
        $count1_reg = 0;
        
        if($regMigs > 0 && $migs > 0)
        {
            $count1_reg = $regMigs / $migs;
        }

        $count2_reg = $count1_reg * 100;
        $percentReg = number_format($count2_reg, 2);



/*
        if($branchCode != "0")
        {      
            $data = DB::table('amendments')
            ->leftJoin('amendment_votes', function($join) use ($votingPeriodID)
            {
                $join->on('amendment_votes.aID', '=', 'amendments.id');
                $join->where('amendment_votes.vpID','=', $votingPeriodID);
            })
            ->join('member_registration', function($join) use ($votingPeriodID)
            {
                $join->on('amendment_votes.mrID', '=', 'member_registration.id');
            })
            ->where('amendments.votingPeriodID', $votingPeriodID)
            ->where('member_registration.brRegistered', $branchCode)
            ->orderBy('amendments.amendmentNo', 'asc')
            ->groupBy('amendments.id', 'amendments.amendmentNo', 'amendments.articleDetails') 
            ->select('amendments.id', 'amendments.amendmentNo', 'amendments.articleDetails',
                DB::Raw('sum(case when amendment_votes.vote = 1 then 1 else 0 end) as yes'),  
                DB::Raw('sum(case when amendment_votes.vote = 0 then 1 else 0 end) as no')
            )
            ->get();
        }
        else 
        {
            
            $data = DB::table('amendments')
                    ->leftJoin('amendment_votes', function($join) use ($votingPeriodID)
                    {
                        $join->on('amendment_votes.aID', '=', 'amendments.id');
                        $join->where('amendment_votes.vpID','=', $votingPeriodID);
                    })
                    ->where('amendments.votingPeriodID', $votingPeriodID)
                    ->orderBy('amendments.amendmentNo', 'asc')
                    ->groupBy('amendments.id', 'amendments.amendmentNo', 'amendments.articleDetails') 
                    ->select('amendments.id', 'amendments.amendmentNo', 'amendments.articleDetails',
                        DB::Raw('sum(case when amendment_votes.vote = 1 then 1 else 0 end) as yes'),  
                        DB::Raw('sum(case when amendment_votes.vote = 0 then 1 else 0 end) as no')
                    )
                    ->get();
        }
*/

        
        

       //$yes = 
        
       // $count1_yes = $yes / $regMigs;
       // $count2_yes = $count1_yes * 100;
       // $percentYes = number_format($count2_yes, 2);

        $amendments = [];
        
        if (count($data) > 0) 
        {
            foreach ($data as $row) {

                $totalVotesYes = 0;
                if($branchCode != "0" && $branchCode != "09")
                {
                    $totalVotesYes = DB::table('amendment_votes')
                    ->join('member_registration', 'member_registration.id', '=', 'amendment_votes.mrID')
                    ->where('amendment_votes.vpID', $votingPeriodID)
                    ->where('amendment_votes.aID', $row->id)
                    ->where('amendment_votes.vote', 1) 
                    ->where('member_registration.brRegistered', $branchCode)
                    ->count();
                } 
                else 
                { 
                    $totalVotesYes = DB::table('amendment_votes')
                    ->where('amendment_votes.vpID', $votingPeriodID)
                    ->where('amendment_votes.aID', $row->id)
                    ->where('amendment_votes.vote', 1) 
                    ->count();
                }

                $percentYes = 0;

                if($regMigs > 0 && $totalVotesYes > 0)
                {
                    $percentYes = number_format(($totalVotesYes/$regMigs * 100),2);
                }
                $totalVotesNo = $regMigs - $totalVotesYes;

                $amendments[] = array(
                    "isNoAmendmentFound" => "false",
                    "amendmentID" => $row->id,
                    "amendmentNo" => $row->amendmentNo,
                    "articleDetails" => $row->articleDetails,
                    "migs" => $migs,
                    "regMigs" => $regMigs,
                    "percentReg" => $percentReg,    
                    "yes" => $totalVotesYes,  
                    "no" => $totalVotesNo, 
                    "percentYes" => $percentYes,    
                );
            }
        } 
        else 
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

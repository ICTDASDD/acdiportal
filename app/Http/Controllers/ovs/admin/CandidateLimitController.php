<?php

namespace App\Http\Controllers\ovs\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ovs\admin\CandidateLimit;
use Illuminate\Support\Facades\DB;
use App\Models\ovs\admin\UserLog;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Response;

class CandidateLimitController extends Controller
{
    public function listCandidateLimit(Request $request)
    {
        if ($request->ajax()) {
            //$data = CandidateLimit::latest()->get();
            $data = DB::table('candidate_limits')
            ->join('voting_periods', 'candidate_limits.votingPeriodID', '=', 'voting_periods.votingPeriodID')
            ->join('candidate_types', 'candidate_limits.candidateTypeID', '=', 'candidate_types.candidateTypeID')
            ->select('candidate_limits.*','voting_periods.cy','voting_periods.startDate', 'voting_periods.endDate', 'candidate_types.candidateTypeName')
            ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('votingPeriodName', function($row){
                    $actionBtn = "<center>". $row->cy. " ("  . $row->startDate . "-". $row->endDate .")</center>";
                    return $actionBtn;
                })
                ->rawColumns(['votingPeriodName'])
                ->make(true);
        }
    }

    public function defaultCandidateLimit(Request $request)
    {
        $votingPeriodID = $request->get('votingPeriodID');

    	$data = DB::table('candidate_types')
                    ->leftJoin('candidate_limits', function($join) use ($votingPeriodID)
                    {
                        $join->on('candidate_limits.candidateTypeID', '=', 'candidate_types.candidateTypeID');
                        //$join->where('candidate_limits.votingPeriodID','=', $votingPeriodID);
                    })
                    ->select('candidate_types.*',DB::raw('ISNULL(candidate_limits.candidateLimitCount, 0) AS candidateLimitCount'), DB::raw('ISNULL(candidate_limits.memberVotingLimitCount, 0) AS memberVotingLimitCount'))
                    ->where('candidate_limits.votingPeriodID','=', $votingPeriodID)
                    ->orderBy('candidate_types.candidateTypeID', 'asc')
                    ->get();
                
        $candidateTypes = [];

        if (count($data) > 0) {
            foreach ($data as $row) {
                $candidateTypes[] = array(
                    "candidateTypeID" => $row->candidateTypeID,
                    "candidateTypeName" => $row->candidateTypeName,
                    "candidateLimitCount" => $row->candidateLimitCount,
                    "memberVotingLimitCount" => $row->memberVotingLimitCount,
                );
            }
        }
        return response()->json($candidateTypes);
    }

    public function editCandidateLimit(Request $request)
    {
        $candidateLimitID = $request->get('candidateLimitID');
        $where = array('candidateLimitID' => $candidateLimitID);
        //$candidate  = Candidate::where($where)->first();
        $candidate = DB::table('candidate_limits')
            ->join('voting_periods', 'candidate_limits.votingPeriodID', '=', 'voting_periods.votingPeriodID')
            ->join('candidate_types', 'candidate_limits.candidateTypeID', '=', 'candidate_types.candidateTypeID')
            ->select('candidate_limits.*','voting_periods.cy','voting_periods.startDate', 'voting_periods.endDate', 'candidate_types.candidateTypeName')
            ->where($where)
            ->first();
  
          $save_userlog = new UserLog();
          $save_userlog->emp_id = Auth::user()->emp_id; 
          $save_userlog->process = 'View Information of Limits for ' . $candidate->candidateTypeName . ' during voting period ' . $candidate->cy ;
          $save_userlog->save();


        return Response::json($candidate);
    }

    public function removeCandidateLimit(Request $request)
    {
        $candidateLimitID = $request->get('candidateLimitID');

        $candidate = DB::table('candidate_limits')
        ->join('voting_periods', 'candidate_limits.votingPeriodID', '=', 'voting_periods.votingPeriodID')
        ->join('candidate_types', 'candidate_limits.candidateTypeID', '=', 'candidate_types.candidateTypeID')
        ->select('candidate_limits.*','voting_periods.cy', 'candidate_types.candidateTypeName')
        ->where('candidate_limits.candidateLimitID', '=', $candidateLimitID)
        ->first();

      $save_userlog = new UserLog();
      $save_userlog->emp_id = Auth::user()->emp_id; 
      $save_userlog->process = 'Deleted Limit for ' . $candidate->candidateTypeName . ' during voting period ' . $candidate->cy ;
      $save_userlog->save();

        $candidateLimit = CandidateLimit::where('candidateLimitID',$candidateLimitID)->delete();

        if(!$candidateLimit)
        {
            return Response::json(['success'=> false]);
        } 
        else 
        {
            return Response::json(['success'=> true]);
        }
    }

    public function addCandidateLimit(Request $request)
    { 
        $validator = \Validator::make($request->all(), [
            'votingPeriodID' => 'required',
            'candidateTypeID' => 'required',
            'candidateLimitCount' => 'required|integer',
            'memberVotingLimitCount' => 'required|integer',
        ]);
        
        if ($validator->fails()) {
            return Response::json(['errors' => $validator->errors()->all()]);
        }
        
        $candidateLimit = new CandidateLimit([
            //'candidateLimitID' => $request->get('candidateLimitID'),
            'votingPeriodID' => $request->get('votingPeriodID'),
            'candidateTypeID' => $request->get('candidateTypeID'),
            'candidateLimitCount' => $request->get('candidateLimitCount'),
            'memberVotingLimitCount' => $request->get('memberVotingLimitCount'),
        ]);

        $candidateLimit->save();    

        $c_id = $candidateLimit->candidateLimitID;
        $candidate = DB::table('candidate_limits')
            ->join('voting_periods', 'candidate_limits.votingPeriodID', '=', 'voting_periods.votingPeriodID')
            ->join('candidate_types', 'candidate_limits.candidateTypeID', '=', 'candidate_types.candidateTypeID')
            ->select('candidate_limits.*','voting_periods.cy', 'candidate_types.candidateTypeName')
            ->where('candidate_limits.candidateLimitID', '=', $c_id)
            ->first();

        $save_userlog = new UserLog();
        $save_userlog->emp_id = Auth::user()->emp_id; 
        $save_userlog->process = 'Set ' . $candidate->candidateLimitCount . ' as maximum number of Candidates for ' . $candidate->candidateTypeName . ' during voting period ' . $candidate->cy . ', where voters can only pick ' . $candidate->memberVotingLimitCount ;
        $save_userlog->save();
        
        return Response::json(['success'=> true]);
    }

    public function updateCandidateLimit(CandidateLimit $candidateLimit, Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'votingPeriodID' => 'required',
            'candidateTypeID' => 'required',
            'candidateLimitCount' => 'required',
            'memberVotingLimitCount' => 'required',
        ]);
        
        if ($validator->fails()) {
            return Response::json(['errors' => $validator->errors()->all()]);
        }

        $candidateLimitID = $request->get('candidateLimitID');

        $candidateLimit = CandidateLimit::find($candidateLimitID);
        $candidateLimit->votingPeriodID = $request->get('votingPeriodID');
        $candidateLimit->candidateTypeID = $request->get('candidateTypeID');
        $candidateLimit->candidateLimitCount = $request->get('candidateLimitCount');
        $candidateLimit->memberVotingLimitCount = $request->get('memberVotingLimitCount');
        $candidateLimit->save();
        //$candidate = Candidate::find($candidateID)->update($request->all());
        //$candidate->update($request->all());
        
        $candidate = DB::table('candidate_limits')
          ->join('voting_periods', 'candidate_limits.votingPeriodID', '=', 'voting_periods.votingPeriodID')
          ->join('candidate_types', 'candidate_limits.candidateTypeID', '=', 'candidate_types.candidateTypeID')
          ->select('candidate_limits.*','voting_periods.cy', 'candidate_types.candidateTypeName')
          ->where('candidate_limits.candidateLimitID', '=', $candidateLimitID)
          ->first();

        $save_userlog = new UserLog();
        $save_userlog->emp_id = Auth::user()->emp_id; 
        $save_userlog->process = 'Set ' . $candidateLimit->candidateLimitCount . ' as maximum number of Candidates for ' . $candidate->candidateTypeName . ' during voting period ' . $candidate->cy . ', where voters can only pick ' . $candidateLimit->memberVotingLimitCount ;
        $save_userlog->save();

        return Response::json(['success'=> true]);
    }
}

<?php

namespace App\Http\Controllers\ovs\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ovs\admin\VotingPeriod;
use App\Models\ovs\admin\UserLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Response;

class VotingPeriodController extends Controller
{
    public function listVotingPeriod(Request $request)
    {
        if ($request->ajax()) {
            $data = VotingPeriod::latest()->get();
            return Datatables::of($data)
                ->addColumn('isDefault', function($row){

                    if($row->isDefault == 0)
                    {
                        return "NO";
                    } 
                    else 
                    {
                        return "YES";
                    }
                })
                ->rawColumns(['isDefault'])
                ->make(true);
        }
    }

    public function listVotingPeriodSelect2(Request $request)
    {
    	$input = $request->all();

        if (!empty($input['query'])) {

            $data = VotingPeriod::select(["votingPeriodID", "cy", "startDate", "endDate", DB::raw('ISNULL(isDefault, 0) as isDefault')])
                ->where("cy", "LIKE", "%{$input['query']}%")
                ->get();
        } else {
            $data = VotingPeriod::select(["votingPeriodID", "cy", "startDate", "endDate", DB::raw('ISNULL(isDefault, 0) as isDefault')])
                ->get();
        }

        $result = [];

        if (count($data) > 0) {

            foreach ($data as $row) {
                $result[] = array(
                    "id" => $row->votingPeriodID,
                    "text" => $row->cy . " (" . $row->startDate . " to " . $row->endDate . ")",
                    "cy" => $row->cy,
                    "startDate" => $row->startDate,
                    "endDate" => $row->endDate,
                    "isDefault" => $row->isDefault,
                );
            }
        }
        return response()->json($result);
    }

    public function defaultVotingPeriod()
    {
        $where = array('isDefault' => 1);
        $votingPeriod  = VotingPeriod::where($where)->first();

        if($votingPeriod)
        {
            session(['votingPeriodID' => $votingPeriod->votingPeriodID]);
            session(['cy' => $votingPeriod->cy]);
        } else 
        {
            session(['votingPeriodID' => 0]);
            session(['votingPeriodID' => ""]);
        }

        return Response::json($votingPeriod);
    }

    public function editVotingPeriod(Request $request)
    {
        $votingPeriodID = $request->get('votingPeriodID');
        $where = array('votingPeriodID' => $votingPeriodID);
        $votingPeriod  = VotingPeriod::where($where)->first();

        $save_userlog = new UserLog();
        $save_userlog->emp_id = Auth::user()->emp_id; 
        $save_userlog->process = 'View Information of Voting Period ' . $votingPeriod->cy;
        $save_userlog->save();

        return Response::json($votingPeriod);
    }

    public function removeVotingPeriod(Request $request)
    {
        $votingPeriodID = $request->get('votingPeriodID');

        $votingPeriod = VotingPeriod::where('votingPeriodID',$votingPeriodID)
        ->select('voting_periods.*')
        ->first();

        $save_userlog = new UserLog();
        $save_userlog->emp_id = Auth::user()->emp_id; 
        $save_userlog->process = 'Deleted Voting Period ' .  $votingPeriod->cy . ' (' . $votingPeriod->startDate . ' - ' . $votingPeriod->endDate .')';
        $save_userlog->save();

        $votingPeriod = VotingPeriod::where('votingPeriodID',$votingPeriodID)->delete();

        if(!$votingPeriod)
        {
            return Response::json(['success'=> false]);
        } 
        else 
        {
            return Response::json(['success'=> true]);
        }
    }

    public function addVotingPeriod(Request $request)
    { 
        $validator = \Validator::make($request->all(), [
            'cy' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
        ]);
        
        if ($validator->fails()) {
            return Response::json(['errors' => $validator->errors()->all()]);
        }
        
        $isDefault = 0;
        if($request->get('isDefault') == "true")
        {
            //SET ALL TO DEFAULT 0
            DB::table('voting_periods')->update(['isDefault' => "0"]);
            $isDefault = 1;
        } 

        $cy = $request->get('cy');
        $start = $request->get('startDate');
        $end = $request->get('endDate');
        
        $votingPeriod = new VotingPeriod([
            'cy' => $request->get('cy'),
            'startDate' => $request->get('startDate'),
            'endDate' => $request->get('endDate'),
            'isDefault' => $isDefault,
        ]);
        $votingPeriod->save();    

        $save_userlog = new UserLog();
        $save_userlog->emp_id = Auth::user()->emp_id; 
        $save_userlog->process = 'Added Voting Period ' . $cy . ' (' . $start . ' - ' . $end .')';
        $save_userlog->save();

        return Response::json(['success'=> true]);
    }

    public function updateVotingPeriod(VotingPeriod $votingPeriod, Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'cy' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
        ]);
        
        if ($validator->fails()) {
            return Response::json(['errors' => $validator->errors()->all()]);
        }

        $isDefault = 0;
        if($request->get('isDefault') == "true")
        {
            //SET ALL TO DEFAULT 0
            DB::table('voting_periods')->update(['isDefault' => "0"]);
            $isDefault = 1;
        } 

        $votingPeriodID = $request->get('votingPeriodID');

        $votingPeriod = VotingPeriod::find($votingPeriodID);
        
        $votingPeriod->cy = $request->get('cy');
        $votingPeriod->startDate = $request->get('startDate');
        $votingPeriod->endDate = $request->get('endDate');
        $votingPeriod->isDefault = $isDefault;
        $votingPeriod->save();

        $save_userlog = new UserLog();
        $save_userlog->emp_id = Auth::user()->emp_id; 
        $save_userlog->process = 'Edited Information of Voting Period ' . $votingPeriod->cy;
        $save_userlog->save();

        //$candidate = Candidate::find($candidateID)->update($request->all());
        //$candidate->update($request->all());
        
        return Response::json(['success'=> true]);
    }
}

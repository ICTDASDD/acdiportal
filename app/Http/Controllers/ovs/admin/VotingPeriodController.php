<?php

namespace App\Http\Controllers\ovs\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ovs\admin\VotingPeriod;
use DataTables;
use Response;

class VotingPeriodController extends Controller
{
    public function listVotingPeriod(Request $request)
    {
        if ($request->ajax()) {
            $data = VotingPeriod::latest()->get();
            return Datatables::of($data)
                ->make(true);
        }
    }

    public function listVotingPeriodSelect2(Request $request)
    {
    	$input = $request->all();

        if (!empty($input['query'])) {

            $data = VotingPeriod::select(["votingPeriodID", "cy", "startDate", "endDate"])
                ->where("cy", "LIKE", "%{$input['query']}%")
                ->get();
        } else {
            $data = VotingPeriod::select(["votingPeriodID", "cy", "startDate", "endDate"])
                ->get();
        }

        $result = [];

        if (count($data) > 0) {

            foreach ($data as $row) {
                $result[] = array(
                    "id" => $row->votingPeriodID,
                    "text" => $row->cy . " (" . $row->startDate . "-" . $row->endDate . ")",
                    "cy" => $row->cy,
                    "startDate" => $row->startDate,
                    "endDate" => $row->endDate,
                );
            }
        }
        return response()->json($result);
    }

    public function editVotingPeriod(Request $request)
    {
        $votingPeriodID = $request->get('votingPeriodID');
        $where = array('votingPeriodID' => $votingPeriodID);
        $votingPeriod  = VotingPeriod::where($where)->first();

        return Response::json($votingPeriod);
    }

    public function removeVotingPeriod(Request $request)
    {
        $votingPeriodID = $request->get('votingPeriodID');
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
        
        $votingPeriod = new VotingPeriod([
            'cy' => $request->get('cy'),
            'startDate' => $request->get('startDate'),
            'endDate' => $request->get('endDate'),
        ]);
        $votingPeriod->save();    

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

        $votingPeriodID = $request->get('votingPeriodID');

        $votingPeriod = VotingPeriod::find($votingPeriodID);
        
        $votingPeriod->cy = $request->get('cy');
        $votingPeriod->startDate = $request->get('startDate');
        $votingPeriod->endDate = $request->get('endDate');
        $votingPeriod->save();
        //$candidate = Candidate::find($candidateID)->update($request->all());
        //$candidate->update($request->all());
        
        return Response::json(['success'=> true]);
    }
}

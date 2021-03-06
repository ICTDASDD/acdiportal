<?php

namespace App\Http\Controllers\ovs\ba;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ovs\admin\VotingPeriod;
use Illuminate\Support\Facades\DB;
use DataTables;
use Response;

class BAVotingPeriodController extends Controller
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

        return Response::json($votingPeriod);
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
        
        $isDefault = 0;
        if($request->get('isDefault') == "true")
        {
            //SET ALL TO DEFAULT 0
            DB::table('voting_periods')->update(['isDefault' => "0"]);
            $isDefault = 1;
        } 
        
        $votingPeriod = new VotingPeriod([
            'cy' => $request->get('cy'),
            'startDate' => $request->get('startDate'),
            'endDate' => $request->get('endDate'),
            'isDefault' => $isDefault,
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

        $isDefault = 0;
        if($request->get('isDefault') == true)
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
        //$candidate = Candidate::find($candidateID)->update($request->all());
        //$candidate->update($request->all());
        
        return Response::json(['success'=> true]);
    }
}

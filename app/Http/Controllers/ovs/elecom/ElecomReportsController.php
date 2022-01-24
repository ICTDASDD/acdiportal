<?php

namespace App\Http\Controllers\ovs\elecom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\ovs\ba\Branch_Request;
use App\Models\ovs\admin\Branch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Response;

class ElecomReportsController extends Controller
{
    public function summaryList(Request $request)
    {

        if ($request->ajax()) {

            $votingPeriodID = "";
            if (!empty($request->get('votingPeriodID'))) {
                $votingPeriodID = $request->get('votingPeriodID');
            }

            $data = DB::table('branches AS A')
            ->select(
                'A.brName',
                DB::raw('ISNULL(candidateVotes.totalRegistered, 0) AS totalRegistered'),
                DB::raw('ISNULL(candidateVotes.totalVote, 0) AS totalVoted')
                )
            ->leftJoin(
                DB::raw("
                    (SELECT COUNT(MR.id) AS totalRegistered, 
                    SUM(CASE WHEN MR.isVoted = 1 THEN 1 ELSE 0 END) AS totalVote, 
                    MR.brRegistered FROM member_registration AS MR WHERE votingPeriodID = '". $votingPeriodID ."'
                    GROUP BY MR.brRegistered) AS candidateVotes
                    "
                ), function($join) //use ($votingPeriodID)
                {
                    $join->on('candidateVotes.brRegistered', '=', 'A.brCode');
                    //$join->where('votingPeriodID', '=', $votingPeriodID);
                })
                ->orderBy('A.brName')
            ->get();

           // dd($votingPeriodID);
            return Datatables::of($data) 
            ->addIndexColumn()                
                ->addColumn('brName', function($row){
                    $actionBtn = "<center>". $row->brName . "</center>";
                    return $actionBtn;
                })
                ->addColumn('totalRegistered', function($row){
                    $actionBtn = "<center>". $row->totalRegistered ."</center>";
                    return $actionBtn;
                }) 
                ->addColumn('totalVoted', function($row){
                    $actionBtn = "<center>". $row->totalVoted ."</center>";
                    return $actionBtn;
                })                                     
               
                 ->rawColumns(['brName','totalRegistered','totalVoted'])
            ->addIndexColumn()->make(true);
        }
    }

    public function electionresultpervenuecolumn(Request $request)
    {
        $branches = DB::table('branches AS can')->select('*')->get();
       
        $columns = array();
        
        $nestedDataC['data'] = "candidateTypeName";
        $nestedDataC['name'] = "candidateTypeName";
        $nestedDataC['title'] = "Candidate Type";

        $columns[] = $nestedDataC;

        $nestedDataC['data'] = "fullName";
        $nestedDataC['name'] = "fullName";
        $nestedDataC['title'] = "Full Name";

        $columns[] = $nestedDataC;
        
        $i = 1;
        foreach($branches as $branch)
        {
            $branchName = $branch->brName;
            $branchCode = $branch->brCode;

            $nestedDataC['data'] = "a" . $i;
            $nestedDataC['name'] = "a" . $i;
            $nestedDataC['title'] = "". $branchName;

            $columns[] = $nestedDataC;
            $i++;
        }
        
        echo json_encode($columns);
    }

    public function electionresultpervenue(Request $request)
    {
        if ($request->ajax()) {
            $votingPeriodID = "";
            if (!empty($request->get('votingPeriodID'))) {
                $votingPeriodID = $request->get('votingPeriodID');
            }
        
            $branches = DB::table('branches AS can')->select('*')->get();
           
            $candidates = "";
            if($votingPeriodID == "")
            {

                $candidates = DB::table('candidates AS can' )
                ->join('candidate_types', 'can.candidateTypeID', '=', 'candidate_types.candidateTypeID')
                ->select(['can.candidateID', 'candidate_types.candidateTypeName', DB::raw("CONCAT(can.lastName,', ',can.firstName,' ',can.middleName) as fullName")])      
                ->orderBy('candidate_types.candidateTypeName')
                ->get();
            } else 
            {
                $candidates = DB::table('candidates AS can' )
                ->join('candidate_types', 'can.candidateTypeID', '=', 'candidate_types.candidateTypeID')
                ->select(['can.candidateID', 'candidate_types.candidateTypeName', DB::raw("CONCAT(can.lastName,', ',can.firstName,' ',can.middleName) as fullName")])      
                ->orderBy('candidate_types.candidateTypeName')
                ->where('can.votingPeriodID' ,'=', $votingPeriodID)
                ->get();
            }

            $data = array();
           
            foreach ($candidates as $candidate)
            {
                $candidateID = $candidate->candidateID;
                $candidateTypeName = $candidate->candidateTypeName;
                $fullName = $candidate->fullName;
                //$nestedData['candidateID'] = $candidateID;
                $nestedData['candidateTypeName'] = $candidateTypeName;
                $nestedData['fullName'] = $fullName;
                
                $i = 1;
                foreach($branches as $branch)
                {
                    $branchCode = $branch->brCode;
                    $branchName = $branch->brName;
                    
                    $count = DB::table('candidate_votes')
                        ->join('member_registration', 'member_registration.id', '=', 'candidate_votes.mrID')
                        ->where('candidate_votes.cID','=', $candidateID)
                        ->where('candidate_votes.vpID','=', $votingPeriodID)
                        ->where('member_registration.brRegistered','=', $branchCode)
                        ->count();

                    $nestedData["a" . $i] = $count;
                    $i++;
                }
                
                $data[] = $nestedData;
            }   

            return Datatables::of($data)->addIndexColumn()->make(true);

        }
    }
       
 
        //------------- Navigation End-----------------//

        //----------------------------------------------------  End ------------------------------------------//
}

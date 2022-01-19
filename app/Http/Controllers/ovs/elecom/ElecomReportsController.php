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
    public function summaryList(Request $request){

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

       
 
        //------------- Navigation End-----------------//

        //----------------------------------------------------  End ------------------------------------------//
}

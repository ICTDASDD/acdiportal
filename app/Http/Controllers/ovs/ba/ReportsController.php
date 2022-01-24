<?php

namespace App\Http\Controllers\ovs\ba;

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

class ReportsController extends Controller
{
    
        public function votedList(Request $request){

            if ($request->ajax()) {

                $votingPeriodID = "";
                if (!empty($request->get('votingPeriodID'))) {
                    $votingPeriodID = $request->get('votingPeriodID');
                    }

                $data = DB::table('GAData as A')
                ->join('member_registration as B', 'A.AFSN', '=', 'B.afsn')            
                ->select([
                    'B.ballotNo','B.afsn','B.code',
                    DB::raw("CONCAT(FN,', ' ,GN, ' ' ,MN) as fullName"),
                ])
                ->where('B.votingPeriodID','=',  $votingPeriodID)
                ->where('A.MYBR','=', Auth::user()->brCode)
                ->where('isVoted', '=', 1)
                ->get();
                return Datatables::of($data) 
                ->addIndexColumn()                
                    ->addColumn('ballotNo', function($row){
                        $actionBtn = "<center>". $row->ballotNo . "</center>";
                        return $actionBtn;
                    })
                    ->addColumn('afsn', function($row){
                        $actionBtn = "<center>". $row->afsn ."</center>";
                        return $actionBtn;
                    }) 
                    ->addColumn('fullName', function($row){
                        $actionBtn = "<center>". $row->fullName ."</center>";
                        return $actionBtn;
                    })                                     
                    ->addColumn('code', function($row){
                        $actionBtn = "<center>". $row->code. "</center>";
                        return $actionBtn;
                    })
                   
                     ->rawColumns(['ballotNo','afsn','code','fullName'])
                ->addIndexColumn()->make(true);
            }
        }

        public function registeredList(Request $request){
            if ($request->ajax()) {

                $votingPeriodID2 = "";
                    if (!empty($request->get('votingPeriodID2'))) {
                        $votingPeriodID2 = $request->get('votingPeriodID2');
                    }

                $data = DB::table('GAData as A')
                ->join('member_registration as B', 'A.AFSN', '=', 'B.afsn')            
                ->select([
                    'B.ballotNo','B.afsn','B.code',
                    DB::raw("CONCAT(FN,', ' ,GN, ' ' ,MN) as fullName"),
                ])
                ->where('B.votingPeriodID','=', $votingPeriodID2)
                ->where('A.MYBR','=', Auth::user()->brCode)
                ->get();
                return Datatables::of($data) 
                ->addIndexColumn()                
                    ->addColumn('ballotNo', function($row){
                        $actionBtn = "<center>". $row->ballotNo . "</center>";
                        return $actionBtn;
                    })
                    ->addColumn('afsn', function($row){
                        $actionBtn = "<center>". $row->afsn ."</center>";
                        return $actionBtn;
                    }) 
                    ->addColumn('fullName', function($row){
                        $actionBtn = "<center>". $row->fullName ."</center>";
                        return $actionBtn;
                    })                                     
                    ->addColumn('code', function($row){
                        $actionBtn = "<center>". $row->code. "</center>";
                        return $actionBtn;
                    })
                   
                     ->rawColumns(['ballotNo','afsn','code','fullName'])
                ->addIndexColumn()->make(true);
            }


        }

        public function currentResult(Request $request)
        {

            if ($request->ajax()) {

                $votingPeriodID3 = "";
                    if (!empty($request->get('votingPeriodID3'))) {
                        $votingPeriodID3 = $request->get('votingPeriodID3');
                    }

                    $data = DB::table('candidates AS can' )
                 ->leftJoin(DB::raw("
                 (SELECT CV.cID, COUNT(CV.cID) AS totalVote  
                 FROM candidate_votes AS CV
                   JOIN member_registration AS MR ON CV.mrID = MR.id
                    WHERE votingPeriodID = '". $votingPeriodID3 ."' 
                    AND MR.brRegistered = '". Auth::user()->brCode ."'                          
                  GROUP BY CV.cID) AS candidatesVotes
                  "
              ), 'candidatesVotes.cID', '=', 'can.candidateID')
                 ->join('candidate_types', 'can.candidateTypeID', '=', 'candidate_types.candidateTypeID')
                 ->select(['candidatesVotes.cID',DB::raw("ISNULL(candidatesVotes.totalVote,0) AS totalVote") , 'candidate_types.candidateTypeName',
                            DB::raw("CONCAT(can.lastName,', ',can.firstName,' ',can.middleName) as fullName")                                      
                          ])
                                ->where('votingPeriodID' ,'=',$votingPeriodID3 )    
                ->orderBy('candidate_types.candidateTypeName')
                ->get();
        
                return Datatables::of($data) 
                ->addIndexColumn()                
                    ->addColumn('fullName', function($row){
                        $actionBtn = "<center>". $row->fullName . "</center>";
                        return $actionBtn;
                    })
                    ->addColumn('candidateTypeName', function($row){
                        $actionBtn = "<center>". $row->candidateTypeName ."</center>";
                        return $actionBtn;
                    }) 
                    ->addColumn('totalVote', function($row){
                        $actionBtn = "<center>". $row->totalVote ."</center>";
                        return $actionBtn;
                    })                                                         
                   
                     ->rawColumns(['fullName','candidateTypeName','totalVote'])
                ->addIndexColumn()->make(true);
                
            }

        }
        

       

   

        //----------------------------------------------------  End ------------------------------------------//
}

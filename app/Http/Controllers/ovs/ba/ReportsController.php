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
                $data = DB::table('GAData as A')
                ->join('member_registration as B', 'A.AFSN', '=', 'B.afsn')            
                ->select([
                    'B.ballotNo','B.afsn','B.code',
                    DB::raw("CONCAT(FN,', ' ,GN, ' ' ,MN) as fullName"),
                ])
                ->where('B.votingPeriodID','=', 1)
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
                $data = DB::table('GAData as A')
                ->join('member_registration as B', 'A.AFSN', '=', 'B.afsn')            
                ->select([
                    'B.ballotNo','B.afsn','B.code',
                    DB::raw("CONCAT(FN,', ' ,GN, ' ' ,MN) as fullName"),
                ])
                ->where('B.votingPeriodID','=', 1)
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
        

       

   

        //----------------------------------------------------  End ------------------------------------------//
}

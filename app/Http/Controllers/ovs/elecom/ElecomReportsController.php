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
            $data = DB::table('branches as A')            
            ->leftJoin('candidatesVotes','candidatesVotes.brRegistered', '=', 'A.brCode') 
            ->select(array(DB::raw('COUNT(MR.id) as followers')))
            ->select('A.brName','totalRegistered','totalVoted')
            ->where('WHERE votingPeriodID = 1')
            ->whereNull('totalRegistered')
            ->whereNull('totalVoted')
            ->orderBy('A.brname')           
            ->get();
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

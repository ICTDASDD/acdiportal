<?php

namespace App\Http\Controllers\ovs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Response;

class MemberController extends Controller
{
    public function listMember(Request $request)
    {
        if ($request->ajax()) {
            /*
            $data = DB::table('GAData')
            ->leftJoin('branches', 'GAData.MYBR', '=', 'branches.brCode')
            ->select('GAData.*', 'branches.brName')
            ->get();

            return Datatables::of($data)
            ->addColumn('fullName', function($row){
                $actionBtn = "". $row->GN. ", "  . $row->FN . " "  . $row->MN . "";
                return $actionBtn;
            })
            ->rawColumns(['fullName'])
            ->make(true);
            */
            
            
        
            $columns = array( 
                0 =>'FN', 
                1 =>'MYBR',
                2=> 'AFSN',
                3=> 'SCNO',
                4=> 'brRegistered',
                5=> 'code',
                6=> 'FN',
            );
            
            $votingPeriodID = "";
            if (!empty($request->get('votingPeriodID'))) {
                $votingPeriodID = $request->get('votingPeriodID');
            }
            
            $totalData = DB::table('GAData')
                            ->leftJoin('branches', 'GAData.MYBR', '=', 'branches.brCode')
                            ->leftJoin('member_registration', function($join) use ($votingPeriodID)
                            {
                                $join->on('GAData.AFSN', '=', 'member_registration.afsn');
                                $join->where('member_registration.votingPeriodID','=', $votingPeriodID);
                            })
                            ->count();

            $totalFiltered = $totalData; 

            $limit = $request->input('length');
            $start = $request->input('start');
            $order = $columns[$request->input('order.0.column')];
            $dir = $request->input('order.0.dir');

            if(empty($request->input('search.value')))
            {            
                $posts = DB::table('GAData')
                    ->leftJoin('branches AS membershipBranch', 'GAData.MYBR', '=', 'membershipBranch.brCode')
                    ->leftJoin('member_registration', function($join) use ($votingPeriodID)
                        {
                            $join->on('GAData.AFSN', '=', 'member_registration.afsn');
                            $join->where('member_registration.votingPeriodID','=', $votingPeriodID);
                        })
                    ->leftJoin('branches AS registeredBranch', 'member_registration.brRegistered', '=', 'registeredBranch.brCode')
                    ->skip($start)
                    ->orderBy($order,$dir)
                    ->limit($limit)
                    ->select('GAData.*','member_registration.code', 'membershipBranch.brName', 'registeredBranch.brName as brRegistered')    
                    ->get();
            }
            else 
            {
                $search = $request->input('search.value'); 
                
                $posts = DB::table('GAData')
                    ->leftJoin('branches AS membershipBranch', 'GAData.MYBR', '=', 'membershipBranch.brCode')
                    ->leftJoin('member_registration', function($join) use ($votingPeriodID)
                        {
                            $join->on('GAData.AFSN', '=', 'member_registration.afsn');
                            $join->where('member_registration.votingPeriodID','=', $votingPeriodID);
                        })
                    ->leftJoin('branches AS registeredBranch', 'member_registration.brRegistered', '=', 'registeredBranch.brCode')
                    ->skip($start)
                    ->orderBy($order,$dir)
                    ->limit($limit)
                    ->where('GAData.GN','LIKE',"%{$search}%")
                    ->orWhere('GAData.FN', 'LIKE',"%{$search}%")
                    ->orWhere('GAData.MN', 'LIKE',"%{$search}%")
                    ->orWhere('membershipBranch.brName', 'LIKE',"%{$search}%")
                    ->orWhere('GAData.AFSN', 'LIKE',"%{$search}%")
                    ->orWhere('GAData.SCNO', 'LIKE',"%{$search}%")
                    ->select('GAData.*','member_registration.code', 'membershipBranch.brName', 'registeredBranch.brName as brRegistered')    
                    ->get();

                $totalFiltered = $posts->count();
            }

            $data = array();
            if(!empty($posts))
            {
                foreach ($posts as $post)
                {
                    //$show =  route('posts.show',$post->id);
                    //$edit =  route('posts.edit',$post->id);

                    $nestedData['brName'] = $post->brName;
                    $nestedData['fullName'] = $post->FN . ", " . $post->GN . " " . $post->MN ;
                    $nestedData['AFSN'] = $post->AFSN;
                    $nestedData['SCNO'] = $post->SCNO;
                    $nestedData['brRegistered'] = $post->brRegistered;
                    $nestedData['code'] = $post->code;
                    $nestedData['isVoted'] = ""; //$post->SCNO;
                    
                    $button = "- - -";
                    if($votingPeriodID != "")
                    {
                        $logBranch = Auth::user()->brCode;
                        if($post->MYBR != $logBranch)
                        {
                            $button = "<button class='btn btn-danger btn-sm requestButton' value='" . $post->SCNO . "'> " .
                            "  Request " .
                            "</button> " ;
                        }
                        else 
                        {
                            $button = "<button class='btn btn-success btn-sm registerButton' value='" . $post->SCNO . "'> " .
                            "  Register " .
                            "</button> " ;
                        }
                    }

                    if($post->brRegistered != "")
                    {
                        $button = "<div class='text-info'><b>Registered</b></div>";
                    }

                    $nestedData['actionButton'] = "<center>". $button . "</center>";
                
                    $data[] = $nestedData;
                }
            }

            $json_data = array(
                "draw"            => intval($request->input('draw')),  
                "recordsTotal"    => intval($totalData),  
                "recordsFiltered" => intval($totalFiltered), 
                "data"            => $data   
                );

            echo json_encode($json_data);
        }
    }
}
<?php

namespace App\Http\Controllers\ovs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\ovs\admin\UserLog;
use DataTables;
use Response;
use Carbon\Carbon;

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
            
            $totalFilteredRecord = $totalDataRecord = $draw_val = "";
            $columns = array( 
                0 =>'FN', 
                1 =>'MYBR',
                2=> 'AFSN',
                3=> 'SCNO',
                4=> 'brRegistered',
                5=> 'code',
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
                            ->leftJoin('branches AS registeredBranch', 'member_registration.brRegistered', '=', 'registeredBranch.brCode')
                            ->count();

            $totalDataRecord = $totalData;
            $totalFilteredRecord = $totalData; 

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
                    ->take($limit)
                    ->orderBy($order,$dir)
                    ->select('GAData.*', 'member_registration.id as mrID', 'member_registration.code', 'membershipBranch.brName', 'registeredBranch.brName as brRegistered', 'member_registration.isVoted', 'member_registration.ballotNo')    
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
                    ->where('GAData.GN','LIKE',"%{$search}%")
                    ->orWhere('GAData.FN', 'LIKE',"%{$search}%")
                    ->orWhere('GAData.MN', 'LIKE',"%{$search}%")
                    ->orWhere('membershipBranch.brName', 'LIKE',"%{$search}%")
                    ->orWhere('GAData.AFSN', 'LIKE',"%{$search}%")
                    ->orWhere('GAData.SCNO', 'LIKE',"%{$search}%") 
                    ->skip($start)
                    ->take($limit)
                    ->orderBy($order,$dir)
                    ->select('GAData.*', 'member_registration.id as mrID', 'member_registration.code', 'membershipBranch.brName', 'registeredBranch.brName as brRegistered', 'member_registration.isVoted', 'member_registration.ballotNo')    
                    ->get();

                $totalFilteredRecord = DB::table('GAData')
                ->leftJoin('branches AS membershipBranch', 'GAData.MYBR', '=', 'membershipBranch.brCode')
                ->leftJoin('member_registration', function($join) use ($votingPeriodID)
                    {
                        $join->on('GAData.AFSN', '=', 'member_registration.afsn');
                        $join->where('member_registration.votingPeriodID','=', $votingPeriodID);
                    })
                ->leftJoin('branches AS registeredBranch', 'member_registration.brRegistered', '=', 'registeredBranch.brCode')
                ->where('GAData.GN','LIKE',"%{$search}%")
                ->orWhere('GAData.FN', 'LIKE',"%{$search}%")
                ->orWhere('GAData.MN', 'LIKE',"%{$search}%")
                ->orWhere('membershipBranch.brName', 'LIKE',"%{$search}%")
                ->orWhere('GAData.AFSN', 'LIKE',"%{$search}%")
                ->orWhere('GAData.SCNO', 'LIKE',"%{$search}%") 
                ->get()->count();
            }

            $data = array();
            if(!empty($posts))
            {
                foreach ($posts as $post)
                {
                    //$show =  route('posts.show',$post->id);
                    //$edit =  route('posts.edit',$post->id);
                    $brMembership = $post->brName;
                    $nestedData['brName'] = $brMembership;
                    $fullName = $post->FN . ", " . $post->GN . " " . $post->MN;
                    $nestedData['fullName'] = $fullName;
                    $nestedData['AFSN'] = $post->AFSN;
                    $nestedData['SCNO'] = $post->SCNO;
                    $nestedData['brRegistered'] = $post->brRegistered;
                    $nestedData['code'] = $post->code;
                    $nestedData['ballotNo'] = $post->ballotNo;

                    $buttonVoted = "- - -";
                    $button = "- - -";
                    if($votingPeriodID != "")
                    {
                        $isFromOtherBranch = false;
                        $logBranch = Auth::user()->brCode;
                        if($post->MYBR != $logBranch)
                        {   
                           /* $button = "<button class='btn btn-danger btn-sm requestButton' value='" . $post->AFSN . "' data-fullname='" . $fullName . "'> " .
                            "  Request " .
                            "</button> " ;
                            */
                            $isFromOtherBranch = true;
                        }
                        /*
                        else 
                        {
                            */
                            $button = "<button class='btn btn-success btn-sm registerButton' value='" . $post->AFSN . "' data-fullname='" . $fullName . "' data-isaccumudating='" . $isFromOtherBranch . "'> " .
                            "  Register " .
                            "</button> " ;
                        //}
                    }

                    if($post->brRegistered != "")
                    {
                        $button = "<div class='text-info'><b>Registered</b></div>
                        <button class='btn btn-info btn-sm reprintButton' value='" . $post->AFSN . "' data-code= '" . $post->code . "' data-fullname='" . $fullName . "' data-isaccumudating='" . $isFromOtherBranch . "'> " .
                            "  Re-print " .
                            "</button>";

                        if($post->isVoted == 0)
                        {
                            $buttonVoted = "<div class='text-danger'><b>Not Yet</b></div>";
                        } 
                        else 
                        {
                            $buttonVoted = "<div class='text-success'><b>Vote Submitted</b></div>
                                            <button class='btn btn-info btn-sm viewVote' value='" . $post->mrID . "' data-code= '" . $post->code . "' data-fullname='" . $fullName . "' data-brregistered='" . $post->brRegistered . "' data-isaccumudating='" . $isFromOtherBranch . "' data-ballotno='" . $post->ballotNo ."'> " .
                                            "  Re-print Ballot " .
                                            "</button>";
                           
                        }
                    }

                    $nestedData['isVoted'] = "<center>". $buttonVoted . "</center>";
                    $nestedData['actionButton'] = "<center>". $button . "</center>";
                
                    $data[] = $nestedData;
                }
            }

            $json_data = array(
                "draw"            => intval($request->input('draw')),  
                "recordsTotal"    => intval($totalDataRecord),  
                "recordsFiltered" => intval($totalFilteredRecord), 
                "data"            => $data   
                );

            echo json_encode($json_data);
        }
    }
    
    public function registerMember(Request $request)
    {
        $afsn = $request->get('afsn');
        $code = random_int(100000, 999999);
        $votingPeriodID = $request->get('votingPeriodID');
        $logUser = Auth::user()->id;
        $logBr = Auth::user()->brCode;

        $ballotNo = DB::table('member_registration')
        ->where([ 
            'brRegistered' => $logBr, 
            'votingPeriodID' => $votingPeriodID
        ])
        ->max('ballotNo');

        $ballotNo = $ballotNo + 1;
        
        $member_registration = DB::table('member_registration')
            ->insertGetId([
                'afsn' => $afsn, 
                'code' => $code,
                'votingPeriodID' => $votingPeriodID,
                'registeredBy' => $logUser,
                'registeredOn' => Carbon::now()->timezone('Asia/Manila'),
                'brRegistered' => $logBr,
                'ballotNo' => $ballotNo,
            ]);

        $member= DB::table('member_registration')
            ->join('GAData', 'member_registration.afsn', '=', 'GAData.afsn')
            ->join('voting_periods', 'member_registration.votingPeriodID', '=', 'voting_periods.votingPeriodID')
            ->select('member_registration.*','GAData.*','voting_periods.cy')
            ->where('member_registration.afsn', '=', $afsn)
            ->first();
        
        $fullName = $member->FN . ', ' . $member->GN . ' ' . $member->MN;
            
        if($member_registration)
        {
            $save_userlog = new UserLog();
            $save_userlog->emp_id = Auth::user()->emp_id; 
            $save_userlog->process = 'Registered "' . $fullName . '" with AFSN: ' . $member->afsn . ' as voter for ' . $member->cy ;
            $save_userlog->save();

            return Response::json([
                'success'=> true,
                'code' => $code
            ]);
        } 
        else 
        {
            return Response::json(['success'=> false]);
        }
    }
}

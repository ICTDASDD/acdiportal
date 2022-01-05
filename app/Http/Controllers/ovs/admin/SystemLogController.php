<?php

namespace App\Http\Controllers\ovs\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\User;
use App\Models\ovs\admin\UserLog;
use App\Models\ovs\admin\Branch;
use Session;
use DataTables;
use Response;
use Carbon\Carbon;

class SystemLogController extends Controller
{
    
    public function votingLogs(Request $request)
    {
        if ($request->ajax()) {
    
            $totalFilteredRecord = $totalDataRecord = $draw_val = "";
            $columns = array( 
                0 =>'created_at', 
                1 =>'brRegistered',
                2=> 'afsn',
                3=> 'description',
                4=> 'status',
            );
            
            $totalData = DB::table('voting_logs')
                            ->count();

            $totalDataRecord = $totalData;
            $totalFilteredRecord = $totalData; 

            $limit = $request->input('length');
            $start = $request->input('start');
            $order = $columns[$request->input('order.0.column')];
            $dir = $request->input('order.0.dir');

            if(empty($request->input('search.value')))
            {            
                $posts = DB::table('voting_logs')
                    ->skip($start)
                    ->take($limit)
                    ->orderBy($order,$dir)
                    ->select('voting_logs.*')    
                    ->get();
            }
            else 
            {
                $search = $request->input('search.value'); 
                
                $posts = DB::table('voting_logs')
                    ->where('voting_logs.brRegistered','LIKE',"%{$search}%")
                    ->orWhere('voting_logs.afsn', 'LIKE',"%{$search}%")
                    ->orWhere('voting_logs.description', 'LIKE',"%{$search}%")
                    ->orWhere('voting_logs.status', 'LIKE',"%{$search}%")
                    ->skip($start)
                    ->take($limit)
                    ->orderBy($order,$dir)
                    ->select('voting_logs.*')    
                    ->get();
                /*
                $totalFilteredRecord = DB::table('voting_logs')
                ->where('voting_logs.brRegistered','LIKE',"%{$search}%")
                ->orWhere('voting_logs.afsn', 'LIKE',"%{$search}%")
                ->orWhere('voting_logs.description', 'LIKE',"%{$search}%")
                ->orWhere('voting_logs.status', 'LIKE',"%{$search}%")
                ->select('voting_logs.*')    
                ->get()->count();
                */
            }

            $data = array();
            if(!empty($posts))
            {
                foreach ($posts as $post)
                {
                    //$show =  route('posts.show',$post->id);
                    //$edit =  route('posts.edit',$post->id);
                    $nestedData['logTime'] =  "<center>" .$post->created_at."</center>" ;
                    $nestedData['brRegistered'] =  "<center>" .$post->brRegistered."</center>";
                    $nestedData['afsn'] =  "<center>" .$post->afsn."</center>";
                    $nestedData['description'] =  "<center>" . $post->description."</center>";
                    
                    $statuss = "";
                    if($post->status == "Done")
                    {
                        $statuss =  "<center class='text-success'>" . $post->status ."</center>";
                    }
                    else 
                    {
                        $statuss =  "<center>" . $post->status ."</center>";
                    }
                    
                    $nestedData['status'] = $statuss;
                
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

    public function userLogs(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('user_logs')
            ->join('users', 'user_logs.emp_id', '=', 'users.emp_id')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->join('branches', 'users.brCode', '=', 'branches.brCode')
            ->select('user_logs.*', 'users.emp_id', 'users.lname', 'users.name','roles.description','branches.brName')
            ->orderBy('user_logs.created_at', 'DESC')
            ->get();
            return Datatables::of($data) 
            ->addIndexColumn()
                ->addColumn('created_at', function($row){
                    $actionBtn = "<center>". $row->created_at. "</center>";
                    return $actionBtn;
                })
                ->addColumn('emp_id', function($row){
                    $actionBtn = "<center>". $row->emp_id. "</center>";
                    return $actionBtn;
                })
                ->addColumn('fullName', function($row){
                    $actionBtn = "<center>". $row->lname. ", "  . $row->name . "</center>";
                    return $actionBtn;
                })
                ->addColumn('description', function($row){
                    $actionBtn = "<center>". $row->description. "</center>";
                    return $actionBtn;
                })
                ->addColumn('brName', function($row){
                    $actionBtn = "<center>". $row->brName. "</center>";
                    return $actionBtn;
                })         
                ->addColumn('process', function($row){
                    $actionBtn = "<center>". $row->process. "</center>";
                    return $actionBtn;
                }) 
                ->rawColumns(['created_at','emp_id','fullName','description','brName','process'])
            ->make(true);
        }
    }
    
}

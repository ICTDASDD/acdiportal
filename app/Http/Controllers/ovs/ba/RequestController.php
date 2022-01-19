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
use App\Models\ovs\admin\UserLog;

use DataTables;
use Response;

class RequestController extends Controller
{
    //---------------------------------------------------- Online Voting System Branch Admin ------------------------------------------//

        //------------- Navigation -----------------//

        
        // public function layoutRequest(){
        //     return view('ovs.ba.request',['title' => 'General Request', 'activeparents' => 'Monitoring']);
        // }

        public function requestList(Request $request){

            if ($request->ajax()) {
                $data = DB::table('branch_request')
                ->join('users', 'users.id', '=', 'branch_request.user_id')
                ->join('role_user', 'users.id', '=', 'role_user.user_id')
                ->join('roles', 'roles.id', '=', 'role_user.role_id')
                ->join('branches', 'users.brCode', '=', 'branches.brCode')               
                ->select('branch_request.*','roles.description','branches.brName')
                ->where('branch_request.brCode','=', Auth::user()->brCode)
                ->get();
                return Datatables::of($data) 
                ->addIndexColumn()                
                    ->addColumn('created_at', function($row){
                        $actionBtn = "<center>". $row->created_at . "</center>";
                        return $actionBtn;
                    })
                    ->addColumn('description', function($row){
                        $actionBtn = "<center>". $row->description . "</center>";
                        return $actionBtn;
                    })
                    ->addColumn('brName', function($row){
                        $actionBtn = "<center>". $row->brName. "</center>";
                        return $actionBtn;
                    })
                    ->addColumn('request_type', function($row){
                        $actionBtn = "<center>". $row->request_type. "</center>";
                        return $actionBtn;
                    })
                    ->addColumn('request_info', function($row){
                        $actionBtn = "<center>". $row->request_info. "</center>";
                        return $actionBtn;
                    })
                    ->addColumn('elecom_status2', function($data){
                        if($data->elecom_status == 1){
                            $actionBtn = "<center><div class='text-success'>".'APPROVED'. "</div></center>";
                            return $actionBtn;
                        }
                        elseif($data->elecom_status == 2){
                            $actionBtn = "<center><div class='text-danger'>".'DENIED'. "</div></center>";
                            return $actionBtn;
                        }
                        else{
                            $actionBtn = "<center><div class='text-primary'>".'PENDING'. "</div></center>";
                            return $actionBtn;
                        }
                            
                    })
                    ->addColumn('canvas_status2', function($data){
                        if($data->canvas_status == 1){
                            $actionBtn = "<center><div class='text-success'>".'APPROVED'. "</div></center>";
                            return $actionBtn;
                        }
                        elseif($data->canvas_status == 2){
                            $actionBtn = "<center><div class='text-danger'>".'DENIED'. "</div></center>";
                            return $actionBtn;
                        }
                        else{
                            $actionBtn = "<center><div class='text-primary'>".'PENDING'. "</div></center>";
                            return $actionBtn;
                        }
                            
                    })
                    ->addColumn('ict_status2', function($data){
                        if($data->ict_status == 1){
                            $actionBtn = "<center><div class='text-success'>".'APPROVED'. "</div></center>";
                            return $actionBtn;
                        }
                        elseif($data->ict_status == 2){
                            $actionBtn = "<center><div class='text-danger'>".'DENIED'. "</div></center>";
                            return $actionBtn;
                        }
                        else{
                            $actionBtn = "<center><div class='text-primary'>".'PENDING'. "</div></center>";
                            return $actionBtn;
                        }
                            
                    })
                    ->addColumn('updated_at', function($row){
                        $actionBtn = "<center>". $row->updated_at. "</center>";
                        return $actionBtn;
                    })
                     ->rawColumns(['description','brName','request_type','request_info','elecom_status2','canvas_status2','ict_status2','updated_at','created_at'])
                ->addIndexColumn()->make(true);
            }
        }
        

        public function addRequest(Request $request){

            $validator = \Validator::make($request->all(), [
                'request_type' => 'required',
                'request_info' => 'required',
            ]);
            
            if ($validator->fails()) {
                return Response::json(['errors' => $validator->errors()->all()]);
            }
           // $user_id = Auth::user()->id;

            $br_req = new Branch_Request([
                'request_type' => $request->get('request_type'),
                'request_info' => $request->get('request_info'),
                'brCode' => Auth::user()->brCode,
                'user_id' =>  Auth::user()->id,
            ]);
            // dd($br_req);
            $br_req->save();

            $req = $br_req->request_type;

            if($req == 'Late Registration')
            {
                $process = 'Requested "' . $br_req->request_type . '" for "' . $br_req->request_info . '"';
            }
            elseif($req == 'Vote Cancellation')
            {
                $process = 'Requested "' . $br_req->request_type . '" of "' . $br_req->request_info . '"';
            }
            else
            {
                $process = 'Requested "' . $br_req->request_type . '" , Info: "' . $br_req->request_info . '"';
            }

            $save_userlog = new UserLog();
            $save_userlog->emp_id = Auth::user()->emp_id; 
            $save_userlog->process = $process;
            $save_userlog->save();

            
            return Response::json(['success'=> true]);    


        }


        public function viewRequest(Request $request){

            $id = $request->get('id');
            $where = array('id' => $id);
            $br_req = DB::table('branch_request')
            ->join('branches', 'branch_request.brCode', '=', 'branches.brCode')
            ->select('branch_request.*','branches.brName')
            ->where($where)
            ->first();

            $save_userlog = new UserLog();
            $save_userlog->emp_id = Auth::user()->emp_id; 
            $save_userlog->process = 'Viewed request ' . $br_req->request_type . ' (' . $br_req->request_info . ')';
            $save_userlog->save();
            return Response::json($br_req);

        }

        public function editRequest(Request $request){

            $id = $request->get('id');
            $where = array('id' => $id);
            $br_req = DB::table('branch_request')
            ->join('branches', 'branch_request.brCode', '=', 'branches.brCode')
            ->select('branch_request.*','branches.brName')
            ->where($where)
            ->first();

            $save_userlog = new UserLog();
            $save_userlog->emp_id = Auth::user()->emp_id; 
            $save_userlog->process = 'Viewed request ' . $br_req->request_type . ' (' . $br_req->request_info . ')';
            $save_userlog->save();
            return Response::json($br_req);
            return Response::json($br_req);

        }

        public function updateRequest(Request $request){

            $validator = \Validator::make($request->all(), [
                'request_type' => 'required',
                'request_info' => 'required',
                
            ]);
            
            if ($validator->fails()) {
                return Response::json(['errors' => $validator->errors()->all()]);
            }
    
            $id = $request->get('id');
            $br_req = Branch_Request::find($id);
           // $user_id = Auth::user()->id;
    
            $br_req->request_type = $request->get('request_type');
            $br_req->request_info = $request->get('request_info');
            $br_req->brCode = Auth::user()->brCode;
            $br_req->user_id = Auth::user()->id;
          
            $br_req->save();

            $save_userlog = new UserLog();
            $save_userlog->emp_id = Auth::user()->emp_id; 
            $save_userlog->process = 'Edited Request ID ' . $id;
            $save_userlog->save();


            return Response::json(['success'=> true]);
    
    
        }

        public function validateRequest(Request $request){

            $id = $request->get('id');
            $brStat = Branch_Request::find($id);

            $brStat->br_status = '1';

            $brStat->save();

            return Response::json(['success'=> true]);


        }

        public function removeRequest(Request $request){

            $id = $request->get('id');

            $req= Branch_Request::where('id',$id)
            ->select('branch_request.*')
            ->first();
    
            $save_userlog = new UserLog();
            $save_userlog->emp_id = Auth::user()->emp_id; 
            $save_userlog->process = 'Deleted Request "' . $req->request_type . '" of "' . $req->request_info . '"';
            $save_userlog->save();

            $br_req = Branch_Request::where('id',$id)->delete();
    
            // $br_req = DB::table('branch_request')
            // ->where('role_user.user_id', '=', $id)
            // ->delete();
    
            if(!$br_req)
            {
                return Response::json(['success'=> false]);
            } 
            else 
            {
                return Response::json(['success'=> true]);
            }

        }

        // //FOR ELECOM/CANVAS
        // public function editStatus(Request $request){

        //     $id = $request->get('id');
        //     $where = array('id' => $id);
        //     $br_req = DB::table('branch_request')
        //     ->join('branches', 'branch_request.brCode', '=', 'branches.brCode')
        //     ->select('branch_request.*','branches.brName')
        //     ->where($where)
        //     ->first();
        //     return Response::json($br_req);

        // }
        //------------- Navigation End-----------------//

        //----------------------------------------------------  End ------------------------------------------//
}

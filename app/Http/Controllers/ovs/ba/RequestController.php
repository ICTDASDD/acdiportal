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
                            $actionBtn = "<center>".'APPROVED'. "</center>";
                            return $actionBtn;
                        }
                        elseif($data->elecom_status == 2){
                            $actionBtn = "<center>".'DENIED'. "</center>";
                            return $actionBtn;
                        }
                        else{
                            $actionBtn = "<center>".'PENDING'. "</center>";
                            return $actionBtn;
                        }
                            
                    })
                    ->addColumn('canvas_status2', function($data){
                        if($data->canvas_status == 1){
                            $actionBtn = "<center>".'APPROVED'. "</center>";
                            return $actionBtn;
                        }
                        elseif($data->canvas_status == 2){
                            $actionBtn = "<center>".'DENIED'. "</center>";
                            return $actionBtn;
                        }
                        else{
                            $actionBtn = "<center>".'PENDING'. "</center>";
                            return $actionBtn;
                        }
                            
                    })
                    ->addColumn('status2', function($data){
                        if($data->status == 1){
                            $actionBtn = "<center>".'APPROVED'. "</center>";
                            return $actionBtn;
                        }
                        elseif($data->status == 2){
                            $actionBtn = "<center>".'DENIED'. "</center>";
                            return $actionBtn;
                        }
                        else{
                            $actionBtn = "<center>".'PENDING'. "</center>";
                            return $actionBtn;
                        }
                            
                    })
                    ->addColumn('updated_at', function($row){
                        $actionBtn = "<center>". $row->updated_at. "</center>";
                        return $actionBtn;
                    })
                     ->rawColumns(['description','brName','request_type','request_info','elecom_status2','canvas_status2','status2','updated_at','created_at'])
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
            
            return Response::json(['success'=> true]);    


        }


        public function editRequest(Request $request){

            $id = $request->get('id');
            $where = array('id' => $id);
            $br_req = DB::table('branch_request')
            ->join('branches', 'branch_request.brCode', '=', 'branches.brCode')
            ->select('branch_request.*','branches.brName')
            ->where($where)
            ->first();
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

            return Response::json(['success'=> true]);
    
    
        }

        public function removeRequest(Request $request){

            $id = $request->get('id');
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

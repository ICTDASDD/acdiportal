<?php

namespace App\Http\Controllers\ovs\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
//use App\\Models\\User::id();
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use DataTables;
use Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function listUser(Request $request)
    {
       /* if ($request->ajax()) {
            $data = user::latest()->get();
            return Datatables::of($data)
            ->make(true);
        }*/

        if ($request->ajax()) {
            $data = DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            //->select('users.name', 'users.branch_of_operation','roles.description','users.email')
            ->select('users.*','roles.description')
            ->get();
            return Datatables::of($data) 
            ->addIndexColumn()
                ->addColumn('fullName', function($row){
                    $actionBtn = "<center>". $row->lname. ", "  . $row->name . "</center>";
                    return $actionBtn;
                })
                ->addColumn('branch_of_operation', function($row){
                    $actionBtn = "<center>". $row->branch_of_operation. "</center>";
                    return $actionBtn;
                })
                ->addColumn('description', function($row){
                    $actionBtn = "<center class='text-success'>". $row->description. "</center>";
                    return $actionBtn;
                })
                ->rawColumns(['fullName','branch_of_operation','description','emp_id'])
            ->addIndexColumn()->make(true);

        }
    }

    public function editUser(Request $request)
    {
        $id = $request->get('id');
        $where = array('id' => $id);
        $user  = User::where($where)->first();

        return Response::json($user);
    }

    public function removeUser(Request $request)
    {
        $id = $request->get('id');
        $user = User::where('id',$id)->delete();

        if(!$user)
        {
            return Response::json(['success'=> false]);
        } 
        else 
        {
            return Response::json(['success'=> true]);
        }
    }

    public function addUser(Request $request)
    { 
        $validator = \Validator::make($request->all(), [
           // 'branch_of_operation' => 'required',\
           
            'name' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'emp_id' => 'required',
            'email' => 'required',
            'password' => 'required',

            'role_id' => 'required',

        ]);
        
        if ($validator->fails()) {
            return Response::json(['errors' => $validator->errors()->all()]);
        }
        
        $user = new User([
            
            'branch_of_operation' => $request->get('branch_of_operation'),
            'name' => $request->get('name'),
            'mname' => $request->get('mname'),
            'lname' => $request->get('lname'),
            'emp_id' => $request->get('emp_id'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);
        $user->save();
       // $id = User::getPdo()->lastInsertId();
       // $id = $user->id;
        //$id = DB::table('users')->max('id');

        //$id = DB::table('users')
        //->select('id')
        //->where(max(id))
        //->get();

        $id = $request->get('emp_id');
        $where = array('emp_id' => $id);
        $users  = User::where($where)->first();

        $data = DB::table('role_user')->insert(
            [
                'user_id' => $users->id,
                'role_id' => $request->get('role_id'), 
                'user_type' => "App\Models\User", 
            ]
            );

  
        return Response::json(['success'=> true]);
    }

    public function updateUser(User $user, Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'branch_of_operation' => 'required',
            'name' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'emp_id' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        
        if ($validator->fails()) {
            return Response::json(['errors' => $validator->errors()->all()]);
        }

        $id = $request->get('id');
        $user = User::find($id);
        $user->branch_of_operation = $request->get('branch_of_operation');
        $user->name = $request->get('name');
        $user->mname = $request->get('mname');
        $user->lname = $request->get('lname');
        $user->emp_id = $request->get('emp_id');
        $user->email = $request->get('email');
        $user->password = $request->get('password');
        $user->save();
        //$candidate = Candidate::find($candidateID)->update($request->all());
        //$candidate->update($request->all());
      
        return Response::json(['success'=> true]);
    } 

}

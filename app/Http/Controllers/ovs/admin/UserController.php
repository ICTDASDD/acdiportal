<?php

namespace App\Http\Controllers\ovs\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\ovs\admin\Branch;
use Illuminate\Support\Facades\DB;
use DataTables;
use Response;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    
    public function listUser(Request $request)
    {

        if ($request->ajax()) {
            $data = DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->join('branches', 'users.brCode', '=', 'branches.brCode')
            ->select('users.*','roles.description','branches.brName')
            ->get();
            return Datatables::of($data) 
            ->addIndexColumn()
                ->addColumn('fullName', function($row){
                    $actionBtn = "<center>". $row->lname. ", "  . $row->name . "</center>";
                    return $actionBtn;
                })
                ->addColumn('brName', function($row){
                    $actionBtn = "<center>". $row->brName. "</center>";
                    return $actionBtn;
                })
                ->addColumn('description', function($row){
                    $actionBtn = "<center>". $row->description. "</center>";
                    return $actionBtn;
                })
                ->addColumn('email', function($row){
                    $actionBtn = "<center>". $row->email. "</center>";
                    return $actionBtn;
                })
                ->addColumn('emp_id', function($row){
                    $actionBtn = "<center>". $row->emp_id. "</center>";
                    return $actionBtn;
                })
                ->rawColumns(['fullName','brName','description','email','emp_id'])
            ->addIndexColumn()->make(true);
        }
    }

    public function listBranchSelect2(Request $request)
    {
    	$input = $request->all();

        if (!empty($input['query'])) {

            $data = Branch::select(["brName", "brCode"])
                ->where("brName", "LIKE", "%{$input['query']}%")
                ->orderBy('brName')
                ->get();
        } else {

            $data = Branch::select(["brName", "brCode"])
                ->orderBy('brName')
                ->get();
        }

        $branches = [];

        if (count($data) > 0) {

            foreach ($data as $branch) {
                $branches[] = array(
                    "id" => $branch->brCode,
                    "text" => $branch->brName,
                );
            }
        }
        return response()->json($branches);
    } 

    public function editUser(Request $request)
    {
        $id = $request->get('id');
        $where = array('id' => $id);
        $user = DB::table('users')
        ->join('branches', 'users.brCode', '=', 'branches.brCode')
        ->select('users.*','branches.brName')
        ->where($where)
        ->first();
        return Response::json($user);
    }

    public function removeUser(Request $request)
    {
        $id = $request->get('id');
        $user = User::where('id',$id)->delete();

        $user = DB::table('role_user')
        ->where('role_user.user_id', '=', $id)
        ->delete();

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
            'brCode' => 'required',
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
            'brCode' => $request->get('brCode'),
            'name' => $request->get('name'),
            'mname' => $request->get('mname'),
            'lname' => $request->get('lname'),
            'emp_id' => $request->get('emp_id'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);
        $user->save();

        /*

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
            
            */
            
        $user->attachRole($request->role_id);
            
        return Response::json(['success'=> true]);
    }

    public function updateUser(User $user, Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'brCode' => 'required',
            'name' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'emp_id' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role_id'=> 'required',
        ]);
        
        if ($validator->fails()) {
            return Response::json(['errors' => $validator->errors()->all()]);
        }

        $id = $request->get('id');
        $user = User::find($id);

        $user->brCode = $request->get('brCode');
        $user->name = $request->get('name');
        $user->mname = $request->get('mname');
        $user->lname = $request->get('lname');
        $user->emp_id = $request->get('emp_id');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->save();


      /*
        $data = DB::table('role_user')
        ->where('user_id', $id)
          ->update(['role_id' => $request->get('role_id')]);
      */

      $user->syncRoles([$request->input('role_id')], $id);

       // $user->roles()->sync([$request->input('role_id')]);
        return Response::json(['success'=> true]);
    } 

}

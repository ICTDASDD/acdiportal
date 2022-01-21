<?php

namespace App\Http\Controllers\ovs\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\Role_User;
use App\Models\ovs\admin\Branch;
use App\Models\ovs\admin\UserLog;
use Illuminate\Support\Facades\DB;
use DataTables;
use Response;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Support\Facades\Auth;
use File;

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
                ->rawColumns(['avatar','fullName','brName','description','email','emp_id'])
            //->addIndexColumn()->make(true);
            ->make(true);
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
  
        $user = User::where('id',$id)
            ->join('branches', 'users.brCode', '=', 'branches.brCode')
            ->select('users.*','branches.brName')
            ->first();
        
        $surname = $user->lname;
        $firstname = $user->name;
        $fullName = $surname . ', ' . $firstname;

        $save_userlog = new UserLog();
        $save_userlog->emp_id = Auth::user()->emp_id; 
        $save_userlog->process = 'Deleted User "' . $fullName . '" of ' . $user->brName . ' branch';
        $save_userlog->save();
        
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
            $oldFile = public_path('material\\img\\user\\'. $request->get('fileNameFromEdit'));
                    
            $isExists = File::exists($oldFile);
            if($isExists)
            {
                unlink(public_path('material\\img\\user\\'. $request->get('fileNameFromEdit')));
            }
            
            return Response::json(['success'=> true]);
        }
    }

    public function addUser(Request $request)
    { 
        $validator = \Validator::make($request->all(), [
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:max_width=500,max_height=500',
            'brCode' => 'required',
            'name' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'emp_id' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role_id' => 'required',
        ]);

        $id = $request->get('id');
        
        if ($validator->fails()) {
            return Response::json(['errors' => $validator->errors()->all()]);
        }

        $lname = str_replace(' ', '_', $request->get('lname'));
        $name = str_replace(' ', '_', $request->get('name'));
        $mname = str_replace(' ', '_', $request->get('mname'));
        $surname = $request->get('lname');
        $firstname = $request->get('name');
        $profilePictureName = $lname . '-' . $name . '-' . $mname .'.'.request()->avatar->getClientOriginalExtension();
        $fullName = $surname . ', ' . $firstname;
 

        $user = new User([
            'avatar' => $profilePictureName,
            'brCode' => $request->get('brCode'),
            'name' => $request->get('name'),
            'mname' => $request->get('mname'),
            'lname' => $request->get('lname'),
            'emp_id' => $request->get('emp_id'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);
        $user->save();

        if($user)
        {
            if($validator->passes()){
                request()->avatar->move(public_path('material/img/user'), $profilePictureName);
            }
        }
            
        $user->attachRole($request->role_id);
        $user_id = $user->id;

        $role = DB::table('users')
        ->join('role_user', 'users.id', '=', 'role_user.user_id')
        ->join('roles', 'roles.id', '=', 'role_user.role_id')
        ->select('roles.description')
        ->where('role_user.user_id', '=', $user_id)
        ->first(); 

        $save_userlog = new UserLog();
        $save_userlog->emp_id = Auth::user()->emp_id; 
        $save_userlog->process = 'Created User "' . $fullName . '" with "' . $role->description . '" access';
        $save_userlog->save();
            
        return Response::json(['success'=> true]);
    }

    public function updateUser(User $user, Request $request)
    {
        $isChanged = false;
        $validator;
        if(request()->avatar == "" || request()->avatar == NULL)
        {
            //NO CHANGES IN PROFILE PICTURE
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
        } 
        else 
        {
            $isChanged = true;
            $validator = Validator::make($request->all(), [
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:max_width=500,max_height=500',
                'brCode' => 'required',
                'name' => 'required',
                'mname' => 'required',
                'lname' => 'required',
                'emp_id' => 'required',
                'email' => 'required',
                'password' => 'required',
                'role_id'=> 'required',
            ]);
        }
        
        if ($validator->fails()) {
            return Response::json(['errors' => $validator->errors()->all()]);
        }

        $lname = str_replace(' ', '_', $request->get('lname'));
        $name = str_replace(' ', '_', $request->get('name'));
        $mname = str_replace(' ', '_', $request->get('mname'));
        $surname = $request->get('lname');
        $firstname = $request->get('name');
        $fullName = $surname . ', ' . $firstname;
       
        $id = $request->get('id');
        $user = User::find($id);

        if($isChanged)
        {
            $profilePictureName = $lname . '-' . $name . '-' . $mname .'.'.request()->avatar->getClientOriginalExtension();
            $user->avatar = $profilePictureName;
        }

        $user->brCode = $request->get('brCode');
        $user->name = $request->get('name');
        $user->mname = $request->get('mname');
        $user->lname = $request->get('lname');
        $user->emp_id = $request->get('emp_id');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->save();
   
        $save_userlog = new UserLog();
        $save_userlog->emp_id = Auth::user()->emp_id; 
        $save_userlog->process = 'Edited Information of User "' . $fullName . '"';
        $save_userlog->save();

        if($user)
        {
            if($validator->passes())
            {
                if($isChanged)
                {
                    if($request->get('fileNameFromEdit') != "default-avatar.png")
                    {
                        $oldFile = public_path('material\\img\\user\\'. $request->get('fileNameFromEdit'));
                    
                        $isExists = File::exists($oldFile);
                        if($isExists)
                        {
                            unlink(public_path('material\\img\\user\\'. $request->get('fileNameFromEdit')));
                        }
                    }
                    
                    request()->avatar->move(public_path('material/img/user'), $profilePictureName);
                }
            }
        }

        $user->syncRoles([$request->input('role_id')], $id);
        return Response::json(['success'=> true]);
    } 

}

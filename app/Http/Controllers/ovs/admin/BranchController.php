<?php

namespace App\Http\Controllers\ovs\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ovs\admin\Branch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\ovs\admin\UserLog;
use DataTables;
use Response;

class BranchController extends Controller
{
    public function listBranch(Request $request)
    {
        if ($request->ajax()) {
                $data = DB::table('branches')
                ->select('branches.*', DB::raw('ISNULL(isLocked, 0) as isLocked'))
                ->get();

                return Datatables::of($data)
                    ->addColumn('isLocked', function($row){
                        if($row->isLocked == 0)
                        {
                            return "NO";
                        } 
                        else 
                        {
                            return "YES";
                        }
                    })
                    ->rawColumns(['isDefault'])
                    ->make(true);
            
        }
    }

    public function listBranch2(Request $request)
    {
        if ($request->ajax()) {
                $data = DB::table('branches')
                ->select('branches.*', DB::raw('ISNULL(isLocked, 0) as isLocked'))
                ->get();

                return Datatables::of($data)
                    ->addColumn('isLocked', function($row){
                        if($row->isLocked == 0)
                        {
                            return "NO";
                        } 
                        else 
                        {
                            return "YES";
                        }
                    })
                    ->addColumn('migs', function($row){
                        return $migs = DB::table('GADATA')->where('GADATA.MYBR', $row->brCode)->count();
                    })
                    ->addColumn('regmigs', function($row){
                        return  $regMigs = DB::table('GAData')
                        ->join('member_registration', 'member_registration.afsn', '=', 'GAData.afsn')
                        ->where('member_registration.brRegistered', $row->brCode)
                        ->count();
                    })
                    ->addColumn('active_admin', function($row){
                        return  $active_admin = DB::table('users')
                        ->join('role_user', 'role_user.user_id', '=', 'users.id')
                        ->where('users.brCode', $row->brCode)
                        ->where('role_user.role_id', 20)
                        ->count();
                    })
                    ->addColumn('reg_unit', function($row){
                        return  $reg_unit = DB::table('users')
                        ->join('role_user', 'role_user.user_id', '=', 'users.id')                
                        ->where('users.brCode', $row->brCode)
                        ->where('role_user.role_id', 19)
                        ->count();
                    })
                    ->rawColumns(['isDefault','migs','regmigs','active_admin','reg_unit'])
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
            
            if(!empty($input['isAllShow']))
            {
                if($input['isAllShow'] == "true")
                {
                    $branches[] = array(
                        "id" => "0",
                        "text" => "All Branch",
                    );     
                }
            }

            foreach ($data as $branch) {
                $branches[] = array(
                    "id" => $branch->brCode,
                    "text" => $branch->brName,
                );
            }
        }
        return response()->json($branches);
    } 
    
    public function lockingBranch(Request $request)
    {
        $isLocked = 0;
        if($request->get('isLocked') == "true")
        {
            $isLocked = 1;
        } 

        $brCode = $request->get('brCode');

        $branches = DB::table('branches')
            ->where('brCode', $brCode)
            ->update(['isLocked' => $isLocked]);


        $branch = DB::table('branches')
            ->where('brCode', $brCode)
            ->select('branches.*')
            ->first();

        $locked = $branch->isLocked;

        if($locked == 1)
        {
            $process =  'Locked ' . $branch->brName . ' branch ';
        }
        else
        {
            $process =  'Unlocked ' . $branch->brName . ' branch ';
        }
        
        $save_userlog = new UserLog();
        $save_userlog->emp_id = Auth::user()->emp_id; 
        $save_userlog->process = $process;
        $save_userlog->save();

        if($branches)
        {
            return Response::json([
                'success'=> true]);
        } 
        else 
        {
            return Response::json([
                'success'=> false]);
        }
    }

    public function checkBranchLocking(Request $request)
    {
        $candidateID = Auth::user()->brCode;
        $where = array('brCode' => $candidateID);
        //$candidate  = Candidate::where($where)->first();
        $branches = DB::table('branches')
            ->select('isLocked','brName')
            ->where($where)
            ->first();

        if($branches->isLocked == "1")
        {
            return Response::json([
                'success'=> true]);
        } 
        else 
        {
            return Response::json([
                'branchName' => $branches->brName,
                'success'=> false]);
        }
    }
}

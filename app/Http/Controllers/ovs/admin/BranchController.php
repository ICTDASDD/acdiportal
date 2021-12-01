<?php

namespace App\Http\Controllers\ovs\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
                    ->make(true);
            
        }
    }
}

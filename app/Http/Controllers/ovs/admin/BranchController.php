<?php

namespace App\Http\Controllers\ovs\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ovs\admin\Branch;
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

        if($branches)
        {
            return Response::json(['success'=> true]);
        } 
        else 
        {
            return Response::json(['success'=> false]);
        }

    }
}

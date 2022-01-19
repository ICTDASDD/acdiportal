<?php

namespace App\Http\Controllers\ovs\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ovs\admin\CandidateType;
use App\Models\ovs\admin\UserLog;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Response;

class CandidateTypeController extends Controller
{
    public function listCandidateType(Request $request)
    {
        if ($request->ajax()) {
            $data = CandidateType::latest()->get();
            return Datatables::of($data)
                ->make(true);
        }
    }
    
    public function listCandidateTypeSelect2(Request $request)
    {
    	$input = $request->all();

        if (!empty($input['query'])) {

            $data = CandidateType::select(["candidateTypeID", "candidateTypeName"])
                ->where("candidateTypeName", "LIKE", "%{$input['query']}%")
                ->get();
        } else {

            $data = CandidateType::select(["candidateTypeID", "candidateTypeName"])
                ->get();
        }

        $candidateTypes = [];

        if (count($data) > 0) {

            foreach ($data as $candidateType) {
                $candidateTypes[] = array(
                    "id" => $candidateType->candidateTypeID,
                    "text" => $candidateType->candidateTypeName,
                );
            }
        }
        return response()->json($candidateTypes);
    }

    public function editCandidateType(Request $request)
    {
        $candidateTypeID = $request->get('candidateTypeID');
        $where = array('candidateTypeID' => $candidateTypeID);
        $candidateType  = CandidateType::where($where)->first();

        $save_userlog = new UserLog();
        $save_userlog->emp_id = Auth::user()->emp_id; 
        $save_userlog->process = 'View Information of Candidate Type ID ' . $candidateTypeID;
        $save_userlog->save();

        return Response::json($candidateType);
    }

    public function removeCandidateType(Request $request)
    {
        $candidateTypeID = $request->get('candidateTypeID');

        $ctype = CandidateType::where('candidateTypeID',$candidateTypeID)
        ->select('candidate_types.*')
        ->first();

        $save_userlog = new UserLog();
        $save_userlog->emp_id = Auth::user()->emp_id; 
        $save_userlog->process = 'Deleted Candidate Type "' . $ctype->candidateTypeName . '"';
        $save_userlog->save();

        $candidateType = CandidateType::where('candidateTypeID',$candidateTypeID)->delete();

        if(!$candidateType)
        {
            return Response::json(['success'=> false]);
        } 
        else 
        {
            return Response::json(['success'=> true]);
        }
    }

    public function addCandidateType(Request $request)
    { 
        $validator = \Validator::make($request->all(), [
            'candidateTypeName' => 'required',
        ]);
        
        if ($validator->fails()) {
            return Response::json(['errors' => $validator->errors()->all()]);
        }

        $ctype = $request->get('candidateTypeName');
        
        $candidateType = new CandidateType([
            'candidateTypeName' => $request->get('candidateTypeName'),
        ]);
        $candidateType->save();    

        $save_userlog = new UserLog();
        $save_userlog->emp_id = Auth::user()->emp_id; 
        $save_userlog->process = 'Added Candidate Type "' . $ctype . '"';
        $save_userlog->save();

        return Response::json(['success'=> true]);
    }

    public function updateCandidateType(CandidateType $candidateType, Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'candidateTypeName' => 'required',
        ]);
        
        if ($validator->fails()) {
            return Response::json(['errors' => $validator->errors()->all()]);
        }

        $candidateTypeID = $request->get('candidateTypeID');

        $candidateType = CandidateType::find($candidateTypeID);
        $candidateType->candidateTypeName = $request->get('candidateTypeName');
        $candidateType->save();
        //$candidate = Candidate::find($candidateID)->update($request->all());
        //$candidate->update($request->all());
        
        $save_userlog = new UserLog();
        $save_userlog->emp_id = Auth::user()->emp_id; 
        $save_userlog->process = 'Edited Candidate Type ID ' . $candidateTypeID;
        $save_userlog->save();
        
        return Response::json(['success'=> true]);
    }
}

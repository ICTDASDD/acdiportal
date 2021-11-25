<?php

namespace App\Http\Controllers\ovs\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ovs\admin\CandidateType;
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

    public function editCandidateType(Request $request)
    {
        $candidateTypeID = $request->get('candidateTypeID');
        $where = array('candidateTypeID' => $candidateTypeID);
        $candidateType  = CandidateType::where($where)->first();

        return Response::json($candidateType);
    }

    public function removeCandidateType(Request $request)
    {
        $candidateTypeID = $request->get('candidateTypeID');
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
        
        $candidateType = new CandidateType([
            'candidateTypeName' => $request->get('candidateTypeName'),
        ]);
        $candidateType->save();    
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
        
        return Response::json(['success'=> true]);
    }
}

<?php

namespace App\Http\Controllers\ovs\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ovs\admin\Candidate;
use App\Models\ovs\admin\CandidateType;
use Illuminate\Support\Facades\DB;
use DataTables;
use Response;

class CandidateController extends Controller
{
    //Candidate List
    public function listCandidate(Request $request)
    {
        if ($request->ajax()) {
            $data = Candidate::latest()->get();
            $data = DB::table('candidates')
            ->join('candidate_types', 'candidates.candidateTypeID', '=', 'candidate_types.candidateTypeID')
            ->select('candidates.*','candidate_types.candidateTypeName')
            ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('fullName', function($row){
                    $actionBtn = "<center>". $row->lastName. ", "  . $row->firstName . "</center>";
                    return $actionBtn;
                })
                ->addColumn('candidateFor', function($row){
                    
                    $x = "";
                    if($row->candidateTypeName == "Board of Director")
                    {
                        $x = "text-success";
                    } 
                    else 
                    {
                        $x = "text-info";
                    }

                    $output ="<center class='" . $x . "'>". $row->candidateTypeName . "</center>";
                    return $output;
                })
                ->rawColumns(['profilePicture','fullName','candidateFor'])
                ->make(true);
        }
    }

    public function listCandidateSelect2(Request $request)
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

    public function editCandidate(Request $request)
    {
        $candidateID = $request->get('candidateID');
        $where = array('candidateID' => $candidateID);
        //$candidate  = Candidate::where($where)->first();
        $candidate = DB::table('candidates')
            ->join('candidate_types', 'candidates.candidateTypeID', '=', 'candidate_types.candidateTypeID')
            ->select('candidates.*','candidate_types.candidateTypeName')
            ->where($where)
            ->first();

        return Response::json($candidate);
    }

    public function removeCandidate(Request $request)
    {
        $candidateID = $request->get('candidateID');
        $candidate = Candidate::where('candidateID',$candidateID)->delete();

        if(!$candidate)
        {
            return Response::json(['success'=> false]);
        } 
        else 
        {
            return Response::json(['success'=> true]);
        }
    }

    public function addCandidate(Request $request)
    { 
        $validator = \Validator::make($request->all(), [
            'candidateTypeID' => 'required',
            'lastName' => 'required',
            'firstName' => 'required',
            'middleName' => 'required',
            'information1' => 'required',
            'information2' => 'required',
        ]);
        
        if ($validator->fails()) {
            return Response::json(['errors' => $validator->errors()->all()]);
        }
        
        $candidate = new Candidate([
            'candidateTypeID' => $request->get('candidateTypeID'),
            'lastName' => $request->get('lastName'),
            'firstName' => $request->get('firstName'),
            'middleName' => $request->get('middleName'),
            'information1' => $request->get('information1'),
            'information2' => $request->get('information2'),
        ]);
        $candidate->save();    
        return Response::json(['success'=> true]);
    }

    public function updateCandidate(Candidate $candidate, Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'candidateTypeID' => 'required',
            'lastName' => 'required',
            'firstName' => 'required',
            'middleName' => 'required',
            'information1' => 'required',
            'information2' => 'required',
        ]);
        
        if ($validator->fails()) {
            return Response::json(['errors' => $validator->errors()->all()]);
        }

        $candidateID = $request->get('candidateID');

        $candidate = Candidate::find($candidateID);
        $candidate->candidateTypeID = $request->get('candidateTypeID');
        $candidate->lastName = $request->get('lastName');
        $candidate->firstName = $request->get('firstName');
        $candidate->middleName = $request->get('middleName');
        $candidate->information1 = $request->get('information1');
        $candidate->information2 = $request->get('information2');
        $candidate->save();
        //$candidate = Candidate::find($candidateID)->update($request->all());
        //$candidate->update($request->all());
        
        return Response::json(['success'=> true]);
    }
}

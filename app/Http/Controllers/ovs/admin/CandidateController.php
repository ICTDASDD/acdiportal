<?php

namespace App\Http\Controllers\ovs\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ovs\admin\Candidate;
use DataTables;
use Response;

class CandidateController extends Controller
{
    public function clist(){
        return view('ovs.admin.candidatelist',['title' => 'Candidate List', 'activeparents' => 'BODs & Amendments']);
    }
    //Candidate List
    public function listCandidate(Request $request)
    {
        if ($request->ajax()) {
            $data = Candidate::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('fullName', function($row){
                    $actionBtn = "<center>". $row->lastName. ", "  . $row->firstName . "</center>";
                    return $actionBtn;
                })
                ->addColumn('candidateFor', function($row){
                    
                    $x = "";
                    if($row->candidateFor == "Board of Director")
                    {
                        $x = "text-success";
                    } 
                    else 
                    {
                        $x = "text-info";
                    }

                    $output ="<center class='" . $x . "'>". $row->candidateFor . "</center>";
                    return $output;
                })
                ->rawColumns(['profilePicture','fullName','candidateFor'])
                ->make(true);
        }
    }

    public function editCandidate(Request $request)
    {
        $candidateID = $request->get('candidateID');
        $where = array('candidateID' => $candidateID);
        $candidate  = Candidate::where($where)->first();

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
            'candidateFor' => 'required',
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
            'candidateFor' => $request->get('candidateFor'),
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
            'candidateFor' => 'required',
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
        $candidate->candidateFor = $request->get('candidateFor');
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

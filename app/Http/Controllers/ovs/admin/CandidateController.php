<?php

namespace App\Http\Controllers\ovs\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ovs\admin\Candidate;
use Illuminate\Support\Facades\DB;
use App\Models\ovs\admin\UserLog;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Response;
use Validator;

class CandidateController extends Controller
{
    //Candidate List
    public function listCandidate(Request $request)
    {
        if ($request->ajax()) {
                //$data = Candidate::latest()->get();
                $votingPeriodID = "";
                if (!empty($request->get('votingPeriodID'))) {
                    $votingPeriodID = $request->get('votingPeriodID');
                }
                $data = DB::table('candidates')
                ->join('candidate_types', 'candidates.candidateTypeID', '=', 'candidate_types.candidateTypeID')
                ->select('candidates.*','candidate_types.candidateTypeName')
                ->get();

                if($votingPeriodID != "")
                {
                    $data = DB::table('candidates')
                    ->join('candidate_types', 'candidates.candidateTypeID', '=', 'candidate_types.candidateTypeID')
                    ->select('candidates.*','candidate_types.candidateTypeName')
                    ->where('votingPeriodID', $votingPeriodID)
                    ->get();
                
                }
                
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

    public function defaultCandidate(Request $request)
    {
        $votingPeriodID = $request->get('votingPeriodID');
        $candidateTypeID = $request->get('candidateTypeID');
        $branchCode = $request->get('branchCode');
        $subDiv = $request->get('subDiv');

    	$data = DB::table('candidates')
                    ->join('candidate_types', 'candidates.candidateTypeID', '=', 'candidate_types.candidateTypeID')
                    ->select('candidates.*','candidate_types.candidateTypeName')
                    ->where('candidates.votingPeriodID', $votingPeriodID)
                    ->where('candidates.candidateTypeID', $candidateTypeID)
                    ->orderBy('candidate_types.candidateTypeID', 'asc')
                    ->get();
                
        $candidates = [];

        if (count($data) > 0) {
            foreach ($data as $row) {

                $totalVotes = 0;
                if($branchCode != "0" && $branchCode != "09")
                {
                    $totalVotes = DB::table('candidate_votes')
                    ->join('member_registration', 'member_registration.id', '=', 'candidate_votes.mrID')
                    ->where('candidate_votes.vpID', $votingPeriodID)
                    ->where('candidate_votes.cID', $row->candidateID)
                    ->where('member_registration.brRegistered', $branchCode)
                    ->count();
                } 
                else 
                { 
                    $totalVotes = DB::table('candidate_votes')
                    ->where('candidate_votes.vpID', $votingPeriodID)
                    ->where('candidate_votes.cID', $row->candidateID)
                    ->count();
                }

                $candidates[] = array(
                    "isNoCandidateFound" => "false",
                    "subDiv" => $subDiv,
                    "candidateID" => $row->candidateID,
                    "profilePicture" => $row->profilePicture,
                    "lastName" => $row->lastName,
                    "firstName" => $row->firstName,
                    "middleName" => $row->middleName,
                    "information1" => $row->information1,
                    "information2" => $row->information2,
                    "candidateTypeID" => $row->candidateTypeID,
                    "candidateTypeName" => $row->candidateTypeName,
                    "totalVotes" => $totalVotes,
                );
            }
        } else 
        {
            $candidates[] = array(
                "isNoCandidateFound" => "true",
                "subDiv" => $subDiv
            );
        }

        return response()->json($candidates);
    }

    public function votedCandidate(Request $request)
    {
        $votingPeriodID = $request->get('votingPeriodID');
        $candidateTypeID = $request->get('candidateTypeID');
        $subDiv = $request->get('subDiv');
        $mrID = $request->get('mrID');

    	$data = DB::table('candidates')
                    ->join('candidate_types', 'candidates.candidateTypeID', '=', 'candidate_types.candidateTypeID')
                    ->select('candidates.*','candidate_types.candidateTypeName')
                    ->where('candidates.votingPeriodID', $votingPeriodID)
                    ->where('candidates.candidateTypeID', $candidateTypeID)
                    ->orderBy('candidate_types.candidateTypeID', 'asc')
                    ->get();
                
        $candidates = [];

        if (count($data) > 0) {
            foreach ($data as $row) {

                $totalVotes = DB::table('candidate_votes')
                    ->where('candidate_votes.vpID', $votingPeriodID)
                    ->where('candidate_votes.cID', $row->candidateID)
                    ->where('candidate_votes.mrID', $mrID)
                    ->count();

                $candidates[] = array(
                    "isNoCandidateFound" => "false",
                    "subDiv" => $subDiv,
                    "candidateID" => $row->candidateID,
                    "profilePicture" => $row->profilePicture,
                    "lastName" => $row->lastName,
                    "firstName" => $row->firstName,
                    "middleName" => $row->middleName,
                    "information1" => $row->information1,
                    "information2" => $row->information2,
                    "candidateTypeID" => $row->candidateTypeID,
                    "candidateTypeName" => $row->candidateTypeName,
                    "totalVotes" => $totalVotes,
                );
            }
        } else 
        {
            $candidates[] = array(
                "isNoCandidateFound" => "true",
                "subDiv" => $subDiv
            );
        }

        return response()->json($candidates);
    }

    public function editCandidate(Request $request)
    {
        $candidateID = $request->get('candidateID');
        $where = array('candidateID' => $candidateID);
        //$candidate  = Candidate::where($where)->first();
        $candidate = DB::table('candidates')
            ->join('candidate_types', 'candidates.candidateTypeID', '=', 'candidate_types.candidateTypeID')
            ->join('voting_periods', 'candidates.votingPeriodID', '=', 'voting_periods.votingPeriodID')
            ->select('candidates.*','candidate_types.candidateTypeName','voting_periods.cy')
            ->where($where)
            ->first();


        $surname = $candidate->lastName;
        $firstname = $candidate->firstName;
        $fullName = $surname . ', ' . $firstname;

        $save_userlog = new UserLog();
        $save_userlog->emp_id = Auth::user()->emp_id; 
        $save_userlog->process = 'View Information of Canidate "' . $fullName . '" (' . $candidate->candidateTypeName . '/Voting Period ' . $candidate->cy . ')';
        $save_userlog->save();
    

        return Response::json($candidate);
    }

    public function removeCandidate(Request $request)
    {
        $candidateID = $request->get('candidateID');

        $candidate = Candidate::where('candidateID',$candidateID)
        ->join('candidate_types', 'candidates.candidateTypeID', '=', 'candidate_types.candidateTypeID')
        ->join('voting_periods', 'candidates.votingPeriodID', '=', 'voting_periods.votingPeriodID')
        ->select('candidates.*','candidate_types.candidateTypeName','voting_periods.cy')
        ->first();

        $surname = $candidate->lastName;
        $firstname = $candidate->firstName;
        $fullName = $surname . ', ' . $firstname;

        $save_userlog = new UserLog();
        $save_userlog->emp_id = Auth::user()->emp_id; 
        $save_userlog->process = 'Removed "' . $fullName . '" from candidates for ' . $candidate->candidateTypeName . ' during Voting Period ' . $candidate->cy;
        $save_userlog->save();


        $candidate = Candidate::where('candidateID',$candidateID)->delete();

        if(!$candidate)
        {
            return Response::json(['success'=> false]);
        } 
        else 
        {
            unlink(public_path('material\\img\\candidate\\'. $request->get('fileNameFromEdit')));
                    
            return Response::json(['success'=> true]);
        }
    }

    public function addCandidate(Request $request)
    { 
        //$input = $request->all();

        $validator = Validator::make($request->all(), [
            'profilePicture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:max_width=350,max_height=600',
            'votingPeriodID' => 'required',
            'candidateTypeID' => 'required',
            'lastName' => 'required',
            'firstName' => 'required',
            'middleName' => 'required',
            'information1' => 'required',
            'information2' => 'required',
        ]);

        $votingPeriodID = $request->get('votingPeriodID');
        $candidateTypeID = $request->get('candidateTypeID');

        $totalCandidate = DB::table('candidates')
        ->where([ 
            'candidateTypeID' => $candidateTypeID, 
            'votingPeriodID' => $votingPeriodID
        ])
        ->count();

        $where = array('votingPeriodID' => $votingPeriodID, 'candidateTypeID' => $candidateTypeID);
        //$candidate  = Candidate::where($where)->first();
        $totalCandidateLimit = DB::table('candidate_limits')
            ->select(DB::raw('ISNULL(candidateLimitCount, 0) as climit'))
            ->where($where)
            ->first()->climit;

        if($totalCandidateLimit == $totalCandidate)
        {
            return Response::json(['limitexceed' => true]);
        }

        if ($validator->fails()) {
            return Response::json(['errors' => $validator->errors()->all()]);
        }
        
        $lastname = str_replace(' ', '_', $request->get('lastName'));
        $firstName = str_replace(' ', '_', $request->get('firstName'));
        $middleName = str_replace(' ', '_', $request->get('middleName'));

        $surname = $request->get('lastName');
        $firstname = $request->get('firstName');
        $fullName = $surname . ', ' . $firstname;
        
        $profilePictureName = $lastname . '-' . $firstName . '-' . $middleName .'.'.request()->profilePicture->getClientOriginalExtension();
        
        $candidate = new Candidate([
            'profilePicture' => $profilePictureName,
            'votingPeriodID' => $request->get('votingPeriodID'),
            'candidateTypeID' => $request->get('candidateTypeID'),
            'lastName' => $request->get('lastName'),
            'firstName' => $request->get('firstName'),
            'middleName' => $request->get('middleName'),
            'information1' => $request->get('information1'),
            'information2' => $request->get('information2'),
        ]);
        $candidate->save();   
        
        if($candidate)
        {
            if($validator->passes()){
                request()->profilePicture->move(public_path('material/img/candidate'), $profilePictureName);
            }
        }
        
        $c_id = $candidate->candidateID;
        $candidate = DB::table('candidates')
            ->join('candidate_types', 'candidates.candidateTypeID', '=', 'candidate_types.candidateTypeID')
            ->join('voting_periods', 'candidates.votingPeriodID', '=', 'voting_periods.votingPeriodID')
            ->select('candidates.*','candidate_types.candidateTypeName','voting_periods.cy')
            ->where('candidates.candidateID', '=', $c_id)
            ->first();

        $save_userlog = new UserLog();
        $save_userlog->emp_id = Auth::user()->emp_id; 
        $save_userlog->process = 'Added Candidate "' . $fullName . '" as candidate for ' . $candidate->candidateTypeName . ' during Voting Period ' . $candidate->cy;
        $save_userlog->save();
        
        return Response::json(['success'=> true]);
    }

    public function updateCandidate(Candidate $candidate, Request $request)
    {
        $isChanged = false;
        $validator;
        if(request()->profilePicture == "" || request()->profilePicture == NULL)
        {
            //NO CHANGES IN PROFILE PICTURE
            $validator = Validator::make($request->all(), [
                //'profilePicture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:max_width=350,max_height=600',
                'votingPeriodID' => 'required',
                'candidateTypeID' => 'required',
                'lastName' => 'required',
                'firstName' => 'required',
                'middleName' => 'required',
                'information1' => 'required',
                'information2' => 'required',
            ]);
        } 
        else 
        {
            $isChanged = true;
            $validator = Validator::make($request->all(), [
                //'profilePicture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:max_width=350,max_height=600',
                'votingPeriodID' => 'required',
                'candidateTypeID' => 'required',
                'lastName' => 'required',
                'firstName' => 'required',
                'middleName' => 'required',
                'information1' => 'required',
                'information2' => 'required',
            ]);
        }

        if ($validator->fails()) {
            return Response::json(['errors' => $validator->errors()->all()]);
        }
        
        $lastname = str_replace(' ', '_', $request->get('lastName'));
        $firstName = str_replace(' ', '_', $request->get('firstName'));
        $middleName = str_replace(' ', '_', $request->get('middleName'));
        
        
        $surname = $request->get('lastName');
        $firstname = $request->get('firstName');
        $fullName = $surname . ', ' . $firstname;


        $candidateID = $request->get('candidateID');

        $candidate = Candidate::find($candidateID);
        //$candidate->votingPeriodID = $request->get('votingPeriodID');

        if($isChanged)
        {
            $profilePictureName = $lastname . '-' . $firstName . '-' . $middleName .'.'.request()->profilePicture->getClientOriginalExtension();
            $candidate->profilePicture = $profilePictureName;
        }

        $candidate->candidateTypeID = $request->get('candidateTypeID');
        $candidate->lastName = $request->get('lastName');
        $candidate->firstName = $request->get('firstName');
        $candidate->middleName = $request->get('middleName');
        $candidate->information1 = $request->get('information1');
        $candidate->information2 = $request->get('information2');
        $candidate->save();  

        $c_id = $candidate->candidateID;
        $candidate = DB::table('candidates')
            ->join('candidate_types', 'candidates.candidateTypeID', '=', 'candidate_types.candidateTypeID')
            ->join('voting_periods', 'candidates.votingPeriodID', '=', 'voting_periods.votingPeriodID')
            ->select('candidates.*','candidate_types.candidateTypeName','voting_periods.cy')
            ->where('candidates.candidateID', '=', $c_id)
            ->first();

        $save_userlog = new UserLog();
        $save_userlog->emp_id = Auth::user()->emp_id; 
        $save_userlog->process = 'Edited Information of "' . $fullName . '" , candidate for ' . $candidate->candidateTypeName . ' during Voting Period ' . $candidate->cy;
        $save_userlog->save();

        
        if($candidate)
        {
            if($validator->passes())
            {
                if($isChanged)
                {
                    unlink(public_path('material\\img\\candidate\\'. $request->get('fileNameFromEdit')));
                    
                    request()->profilePicture->move(public_path('material/img/candidate'), $profilePictureName);
                }
            }
        }
        
        return Response::json(['success'=> true]);
        /*
        $validator = \Validator::make($request->all(), [
            'votingPeriodID' => 'required',
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
        //$candidate->votingPeriodID = $request->get('votingPeriodID');
        $candidate->candidateTypeID = $request->get('candidateTypeID');
        $candidate->lastName = $request->get('lastName');
        $candidate->firstName = $request->get('firstName');
        $candidate->middleName = $request->get('middleName');
        $candidate->information1 = $request->get('information1');
        $candidate->information2 = $request->get('information2');
        $candidate->save();
        
        return Response::json(['success'=> true]);
        */
    }
}

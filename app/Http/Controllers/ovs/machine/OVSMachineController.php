<?php

namespace App\Http\Controllers\ovs\machine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use DataTables;
use Response;
use Carbon\Carbon;

class OVSMachineController extends Controller
{
    //---------------------------------------------------- Online Voting System Branch Admin ------------------------------------------//

        //------------- Navigation -----------------//

        //Profile nav
        public function layoutVoting(){
            //Session::forget('mrID'); for testing
            if (Session::has('mrID')){
                //PROCEED TO VOTING
                return view('ovs.machine.voting',['title' => 'Onine Voting System', 'activeparents' => 'Profile']);
            }
            else 
            {
                //PROCEED TO MEMBER LOGIN - NO SESSION FOUND!
                return view('ovs.machine.dashboard',['title' => 'Onine Voting System', 'activeparents' => 'Dashboard']);
            }
            //return view('ovs.machine.voting',['title' => 'Onine Voting System', 'activeparents' => 'Profile']);
        }

        public function memberLogin(Request $request)
        {
            $votingPeriodID = session("votingPeriodID");
            $afsn = $request->get('afsn');
            $code = $request->get('code');

            $where = array(
                'GAData.AFSN' => $afsn 
            );
            //$candidate  = Candidate::where($where)->first();
            $member_registration = DB::table('GAData')
            ->leftJoin('branches AS membershipBranch', 'GAData.MYBR', '=', 'membershipBranch.brCode')
            ->leftJoin('member_registration', function($join) use ($votingPeriodID)
            {
                $join->on('GAData.AFSN', '=', 'member_registration.AFSN');
                $join->where('member_registration.votingPeriodID','=', $votingPeriodID);
            }) 
            ->leftJoin('branches AS registeredBranch', 'member_registration.brRegistered', '=', 'registeredBranch.brCode')
            ->select('GAData.*', 'member_registration.id', 'member_registration.isVoted', 'member_registration.code', 'membershipBranch.brName' , 'registeredBranch.brName as brRegistered')    
            ->where($where)
            ->first();

            if($member_registration)
            {
                if($member_registration->id != null)
                {
                    if($member_registration->code == $code)
                    {
                        if($member_registration->isVoted == 0)
                        {
                            $brMembership = $member_registration->brName;
                            $fullName = $member_registration->FN . ", " . $member_registration->GN . " " . $member_registration->MN;
                    
                            session([
                                'mrID' => $member_registration->id,
                                'mrBrMembership' => $brMembership,
                                'mrBrRegistered' => $member_registration->brRegistered,
                                'mrAFSN' => $member_registration->AFSN,
                                'mrFULLNAME' => $fullName,
                                'mrCode' => $member_registration->code,
                            ]);

                            $voting_logs = DB::table('voting_logs')
                            ->insertGetId([
                                'created_at' => Carbon::now()->timezone('Asia/Manila'),
                                'brRegistered' => $member_registration->brRegistered, 
                                'afsn' => $afsn, 
                                'description' => "Login to Voting System",
                                'status' =>  "Done",
                            ]);

                            return Response::json([
                                'success'=> true,
                            ]);
                        } 
                        else 
                        {
                            return Response::json([
                                'success'=> false,
                                'title' => "Unable to Proceed!",
                                'icon' => "info", //info, error, warning, question, success
                                'message' => "Already voted!"
                            ]);
                        }

                    } 
                    else 
                    {
                        return Response::json([
                            'success'=> false,
                            'title' => "Unable to Proceed!",
                            'icon' => "info", //info, error, warning, question, success
                            'message' => "Wrong code please try again!"
                        ]);
                    }
                } 
                else 
                {
                    return Response::json([
                        'success'=> false,
                        'title' => "Unable to Proceed!",
                        'icon' => "info", //info, error, warning, question, success
                        'message' => "Please register first!"
                    ]);
                }
            } 
            else 
            {
                return Response::json([
                    'success'=> false,
                    'title' => "Unable to Proceed!",
                    'icon' => "info", //info, error, warning, question, success
                    'message' => "Member Not Found!"
                ]);
            }
        }

        public function submitVote(Request $request)
        {
            $totalVote = $request->get('totalVote');
            $counter = $request->get('counter');
            $totalAmendment = $request->get('totalAmendment');
            $counterAmendment = $request->get('counterAmendment');
            $isCandidate = $request->get('isCandidate');
            $isAmendment = $request->get('isAmendment');
            $listOfSelectedCandidate = $request->get('listOfSelectedCandidate');
            $listOfSelectedAmendment = $request->get('listOfSelectedAmendment');

            if($totalVote != $counter && $isCandidate)
            {
                return Response::json([
                    'success'=> false,
                    'title' => "Unable to Submit Vote!",
                    'icon' => "info", //info, error, warning, question, success
                    'message' => "Incorrect count of vote!",
                ]);
            }
            
            if($totalAmendment != $counterAmendment && $isAmendment)
            {
                return Response::json([
                    'success'=> false,
                    'title' => "Unable to Submit Vote!",
                    'icon' => "info", //info, error, warning, question, success
                    'message' => "Incorrect count of vote!",
                ]);
            }

            $votingPeriodID = session("votingPeriodID");
            $afsn =session("mrAFSN");
            $brRegistered =session("mrBrRegistered");
            $mrID =session("mrID");
            $code =session("mrCode");

            $where = array(
                'GAData.AFSN' => $afsn,
                'member_registration.id' => $mrID,
            );
            //$candidate  = Candidate::where($where)->first();
            $member_registration = DB::table('GAData')
                ->leftJoin('branches AS membershipBranch', 'GAData.MYBR', '=', 'membershipBranch.brCode')
                ->leftJoin('member_registration', function($join) use ($votingPeriodID)
                {
                    $join->on('GAData.AFSN', '=', 'member_registration.AFSN');
                    $join->where('member_registration.votingPeriodID','=', $votingPeriodID);
                }) 
                ->leftJoin('branches AS registeredBranch', 'member_registration.brRegistered', '=', 'registeredBranch.brCode')
                ->select('GAData.*', 'member_registration.id', 'member_registration.isVoted', 'member_registration.code', 'membershipBranch.brName' , 'registeredBranch.brName as brRegistered')    
                ->where($where)
                ->first();
                
            if($member_registration)
            {
                if($member_registration->id != null)
                {
                    if($member_registration->code == $code)
                    {
                        if($member_registration->isVoted == 0)
                        {
                            if($isCandidate == "true")
                            {
                                foreach ($listOfSelectedCandidate as $candidateID) 
                                {
                                    $candidate_votes = DB::table('candidate_votes')
                                    ->insertGetId([
                                        'created_at' => Carbon::now()->timezone('Asia/Manila'),
                                        'mrID' => $mrID, 
                                        'vpID' => $votingPeriodID,
                                        'cID' => $candidateID,
                                    ]);
                                }
                            }
                            
                            if($isAmendment == "true")
                            {
                                if (is_array($listOfSelectedAmendment) || is_object($listOfSelectedAmendment))
                                {
                                    foreach ($listOfSelectedAmendment as $amendmentDetails) 
                                    {
                                        $answered = ($amendmentDetails['answered'] == "YES") ? 1 : 0;
        
                                        $amendment_votes = DB::table('amendment_votes')
                                        ->insertGetId([
                                            'created_at' => Carbon::now()->timezone('Asia/Manila'),
                                            'mrID' => $mrID, 
                                            'vpID' => $votingPeriodID,
                                            'aID' => $amendmentDetails['amendmentID'] ,
                                            'vote' => $answered,
                                        ]);
                                    }
                                }
                            }
                            
                            $updateMemberRegistration = DB::table('member_registration')
                                ->where('id', $mrID)
                                ->update(['isVoted' => 1]);

                            $voting_logs = DB::table('voting_logs')
                            ->insertGetId([
                                'created_at' => Carbon::now()->timezone('Asia/Manila'),
                                'brRegistered' => $brRegistered, 
                                'afsn' => $afsn, 
                                'description' => "Vote Submitted",
                                'status' =>  "Done",
                            ]);

                            //$votingPeriodID = session("votingPeriodID");
                            //$afsn = $request->get('afsn');
                            //$code = $request->get('code');
                            
                            return Response::json([
                                'success'=> true
                            ]);
                        } 
                        else 
                        {
                            return Response::json([
                                'success'=> false,
                                'title' => "Unable to Vote!",
                                'icon' => "info", //info, error, warning, question, success
                                'message' => "Already voted!"
                            ]);
                        }
                    } 
                    else 
                    {
                        return Response::json([
                            'success'=> false,
                            'title' => "Unable to Vote!",
                            'icon' => "info", //info, error, warning, question, success
                            'message' => "Wrong code please try again!"
                        ]);
                    }
                } 
                else 
                {
                    return Response::json([
                        'success'=> false,
                        'title' => "Unable to Vote!",
                        'icon' => "info", //info, error, warning, question, success
                        'message' => "Please register first!"
                    ]);
                }
            } 
            else 
            {
                return Response::json([
                    'success'=> false,
                    'title' => "Unable to Vote!",
                    'icon' => "info", //info, error, warning, question, success
                    'message' => "Member Not Found!",

                ]);
            }
        }

        //------------- Navigation End-----------------//

        //----------------------------------------------------  End -------------------------------------------//
}

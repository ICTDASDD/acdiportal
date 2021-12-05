<?php

namespace App\Http\Controllers\ovs\machine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Response;

class OVSMachineController extends Controller
{
    //---------------------------------------------------- Online Voting System Branch Admin ------------------------------------------//

        //------------- Navigation -----------------//

        //Profile nav
        public function layoutVoting(){
            return view('ovs.machine.voting',['title' => 'Onine Voting System', 'activeparents' => 'Profile']);
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
                                'mrFULLNAME' => $fullName
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

        //------------- Navigation End-----------------//

        //----------------------------------------------------  End -------------------------------------------//
}

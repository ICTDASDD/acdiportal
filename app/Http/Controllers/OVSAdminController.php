<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use DataTables;
use Response;

class OVSAdminController extends Controller
{
    //---------------------------------------------------- Online Voting System Admin ------------------------------------------//

        //------------- Navigation -----------------//

        //Profile nav
        public function profile(){
            return view('ovs.admin.profile',['title' => 'Admin Profile', 'activeparents' => 'Profile']);
        }
        public function settings(){
            return view('ovs.admin.settings',['title' => 'Admin Settings', 'activeparents' => 'Profile']);
        }

        //Dashboard nav
        public function reports(){
            return view('ovs.admin.reports',['title' => 'Reports', 'activeparents' => 'Dashboard']);
        }

        public function bstatus(){
            return view('ovs.admin.bstatus',['title' => 'Branch Status', 'activeparents' => 'Monitoring']);
        }


        //this will be change to bstatus($id)
        public function bstatusid(){
            return view('ovs.admin.bstatusid',['title' => 'Branch Status', 'activeparents' => 'Monitoring']);
        }

        public function systemlog(){
            return view('ovs.admin.systemlog',['title' => 'System Log', 'activeparents' => 'Monitoring']);
        }

        public function request(){
            return view('ovs.admin.request',['title' => 'General Request', 'activeparents' => 'Monitoring']);
        }

        public function alist(){
            return view('ovs.admin.amendmentlist',['title' => 'Amendment List', 'activeparents' => 'BODs & Amendments']);
        }

        public function bblocking(){
            return view('ovs.admin.bblocking',['title' => 'Branch Blocking', 'activeparents' => 'Voting Tools']);
        }

        public function eblocking(){
            return view('ovs.admin.eblocking',['title' => 'Entry Blocking', 'activeparents' => 'Voting Tools']);
        }
        
        public function viewVotingConfiguration(){
            return view('ovs.admin.votingConfiguration',['title' => 'Voting Configuration', 'activeparents' => 'Voting Tools']);
        }

        public function memlist(){
            return view('ovs.admin.memberlist',['title' => 'Voting Member List', 'activeparents' => 'Memlist']);
        }

<<<<<<< HEAD
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


=======
>>>>>>> jms
        public function wall(){
            return view('ovs.admin.wall',['title' => 'Freedom Wall', 'activeparents' => 'Dashboard']);
        }

        // Users nav
        public function activeusers(){
            return view('ovs.admin.users',['title' => 'Active User', 'activeparents' => 'User']);
        }
        public function adduser(){
            return view('ovs.admin.adduser',['title' => 'Add User', 'activeparents' => 'User']);
        }
        public function accessrequest(){
            return view('ovs.admin.accessrequest',['title' => 'Access Request', 'activeparents' => 'User']);
        }

        //------------- Navigation End-----------------//

        //----------------------------------------------------  End ------------------------------------------//
}

<?php

namespace App\Http\Controllers;
use App\Models\ovs\admin\UserLog;
use Illuminate\Support\Facades\Auth;

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

            $save_userlog = new UserLog();
            $save_userlog->emp_id = Auth::user()->emp_id; 
            $save_userlog->process = 'View "System Log" Tab';
            $save_userlog->save();

            return view('ovs.admin.systemlog',['title' => 'System Log', 'activeparents' => 'Monitoring']);
        }

        public function request(){

            $save_userlog = new UserLog();
            $save_userlog->emp_id = Auth::user()->emp_id; 
            $save_userlog->process = 'View "Request" Tab';
            $save_userlog->save();

            return view('ovs.admin.request',['title' => 'General Request', 'activeparents' => 'Monitoring']);
        }

        public function alist(){

            $save_userlog = new UserLog();
            $save_userlog->emp_id = Auth::user()->emp_id; 
            $save_userlog->process = 'View "Amendment List" Tab';
            $save_userlog->save();

            return view('ovs.admin.amendmentlist',['title' => 'Amendment List', 'activeparents' => 'BODs & Amendments']);
        }

        public function bblocking(){

            $save_userlog = new UserLog();
            $save_userlog->emp_id = Auth::user()->emp_id; 
            $save_userlog->process = 'View "Branch Locking" Tab';
            $save_userlog->save();

            return view('ovs.admin.bblocking',['title' => 'Branch Blocking', 'activeparents' => 'Voting Tools']);
        }

        public function eblocking(){
            return view('ovs.admin.eblocking',['title' => 'Entry Blocking', 'activeparents' => 'Voting Tools']);
        }

        public function layoutCandidate(){

            $save_userlog = new UserLog();
            $save_userlog->emp_id = Auth::user()->emp_id; 
            $save_userlog->process = 'View "Candidate List" Tab';
            $save_userlog->save();

            return view('ovs.admin.candidatelist',['title' => 'Candidate List', 'activeparents' => 'BODs & Amendments']);
        }

        public function layoutVotingConfiguration(){

            $save_userlog = new UserLog();
            $save_userlog->emp_id = Auth::user()->emp_id; 
            $save_userlog->process = 'View "Voting Configuration" Tab';
            $save_userlog->save();

            return view('ovs.admin.votingConfiguration',['title' => 'Voting Configuration', 'activeparents' => 'Voting Tools']);
        }

        public function layoutUser(){

            $save_userlog = new UserLog();
            $save_userlog->emp_id = Auth::user()->emp_id; 
            $save_userlog->process = 'View "Users" Tab';
            $save_userlog->save();

            return view('ovs.admin.users',['title' => 'User List', 'activeparents' => 'User']);
        }

        public function memlist(){

            $save_userlog = new UserLog();
            $save_userlog->emp_id = Auth::user()->emp_id; 
            $save_userlog->process = 'View "Voting Member List" Tab';
            $save_userlog->save();

            return view('ovs.admin.memberlist',['title' => 'Voting Member List', 'activeparents' => 'Memlist']);
        }

        public function wall(){
            return view('ovs.admin.wall',['title' => 'Freedom Wall', 'activeparents' => 'Dashboard']);
        }

        // Users nav
        public function adduser(){
            return view('ovs.admin.adduser',['title' => 'Add User', 'activeparents' => 'User']);
        }
        public function accessrequest(){
            return view('ovs.admin.accessrequest',['title' => 'Access Request', 'activeparents' => 'User']);
        }

        //------------- Navigation End-----------------//

        //----------------------------------------------------  End ------------------------------------------//
}

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

        public function layoutCandidate(){
            return view('ovs.admin.candidatelist',['title' => 'Candidate List', 'activeparents' => 'BODs & Amendments']);
        }

        public function layoutVotingConfiguration(){
            return view('ovs.admin.votingConfiguration',['title' => 'Voting Configuration', 'activeparents' => 'Voting Tools']);
        }

        public function layoutUser(){
            return view('ovs.admin.users',['title' => 'User List', 'activeparents' => 'User']);
        }

        public function memlist(){
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

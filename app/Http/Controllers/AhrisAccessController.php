<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AhrisAccessController extends Controller
{
    //---------------------------------------------------- Access Manager ------------------------------------------//

        //------------- Admin Navigation -----------------//

        //Profile nav
        public function profile(){
            return view('ahris.access.profile',['title' => 'Admin Profile', 'activeparents' => 'Profile']);
        }
        public function settings(){
            return view('ahris.access.settings',['title' => 'Admin Settings', 'activeparents' => 'Profile']);
        }

        //Dashboard nav
        public function reports(){
            return view('ahris.access.reports',['title' => 'Reports', 'activeparents' => 'Dashboard']);
        }
        public function wall(){
            return view('ahris.access.wall',['title' => 'Freedom Wall', 'activeparents' => 'Dashboard']);
        }

        // Users nav
        public function activeusers(){
            return view('ahris.access.users',['title' => 'Active User', 'activeparents' => 'User']);
        }
        public function adduser(){
            return view('ahris.access.adduser',['title' => 'Add User', 'activeparents' => 'User']);
        }
        public function accessrequest(){
            return view('ahris.access.accessrequest',['title' => 'Access Request', 'activeparents' => 'User']);
        }

        //------------- Super Admin Navigation End-----------------//

        //---------------------------------------------------- Super Admin End ------------------------------------------//
}

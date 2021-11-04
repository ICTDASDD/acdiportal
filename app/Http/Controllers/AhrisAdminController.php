<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AhrisAdminController extends Controller
{
   
    //---------------------------------------------------- Access Manager ------------------------------------------//

        //------------- Admin Navigation -----------------//

        //Profile nav
        public function profile(){
            return view('ahris.admin.profile',['title' => 'Admin Profile', 'activeparents' => 'Profile']);
        }
        public function settings(){
            return view('ahris.admin.settings',['title' => 'Admin Settings', 'activeparents' => 'Profile']);
        }

        //Dashboard nav
        public function reports(){
            return view('ahris.admin.reports',['title' => 'Reports', 'activeparents' => 'Dashboard']);
        }
        public function wall(){
            return view('ahris.admin.wall',['title' => 'Freedom Wall', 'activeparents' => 'Dashboard']);
        }

        // Users nav
        public function activeusers(){
            return view('ahris.admin.users',['title' => 'Active User', 'activeparents' => 'User']);
        }
        public function adduser(){
            return view('ahris.admin.adduser',['title' => 'Add User', 'activeparents' => 'User']);
        }
        public function accessrequest(){
            return view('ahris.admin.accessrequest',['title' => 'Access Request', 'activeparents' => 'User']);
        }

        //------------- Super Admin Navigation End-----------------//

        //---------------------------------------------------- Super Admin End ------------------------------------------//
}

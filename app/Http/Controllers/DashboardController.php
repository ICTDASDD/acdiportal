<?php

namespace App\Http\Controllers;
use App\Models\ovs\admin\UserLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;



class DashboardController extends Controller
{   
        //------------- Role Validator -----------------//
        public function index()
        {
            if(Auth::user()->hasRole('superadministrator')){
                return view('superadmin.monitoring',['title' => 'Monitoring', 'activeparents' => 'Dashboard']);
            }


            // AHRIS admin
            elseif(Auth::user()->hasRole('ahris-admin')){
                return view('ahris.admin.monitoring',['title' => 'Monitoring', 'activeparents' => 'Dashboard']);
            }

            
            // AHRIS access manager
            elseif(Auth::user()->hasRole('ahris-access')){
                return view('ahris.access.monitoring',['title' => 'Monitoring', 'activeparents' => 'Dashboard']);
            }

            // Online Voting System ICTD-Admin
            elseif(Auth::user()->hasRole('ictd-admin')){

                $save_userlog = new UserLog();
                $save_userlog->emp_id = Auth::user()->emp_id; 
                $save_userlog->process = 'View "Dashboard" Tab';
                $save_userlog->save();

                return view('ovs.admin.dashboard',['title' => 'Dashboard', 'activeparents' => 'Dashboard']);
            }

            // Online Voting SystemElecom
            elseif(Auth::user()->hasRole('elecom-admin')){

                $save_userlog = new UserLog();
                $save_userlog->emp_id = Auth::user()->emp_id; 
                $save_userlog->process = 'View "Dashboard" Tab';
                $save_userlog->save();

                return view('ovs.elecom.dashboard',['title' => 'Dashboard', 'activeparents' => 'Dashboard']);
            }

            // Online Voting System Branch Admin
            elseif(Auth::user()->hasRole('branch-officer')){

                $save_userlog = new UserLog();
                $save_userlog->emp_id = Auth::user()->emp_id; 
                $save_userlog->process = 'View "Dashboard" Tab';
                $save_userlog->save();

                return view('ovs.ba.dashboard',['title' => 'Dashboard', 'activeparents' => 'Dashboard']);
            }

            // Online Voting System Branch Admin
            elseif(Auth::user()->hasRole('canv-officer')){

                $save_userlog = new UserLog();
                $save_userlog->emp_id = Auth::user()->emp_id; 
                $save_userlog->process = 'View "Dashboard" Tab';
                $save_userlog->save();

                return view('ovs.canva.dashboard',['title' => 'Dashboard', 'activeparents' => 'Dashboard']);
            }

            // Online Voting System Machine
            elseif(Auth::user()->hasRole('branch-machine')){

                $save_userlog = new UserLog();
                $save_userlog->emp_id = Auth::user()->emp_id; 
                $save_userlog->process = 'Logged In';
                $save_userlog->save();


                return view('ovs.machine.dashboard',['title' => 'Onine Voting System', 'activeparents' => 'Dashboard']);
            }

            // EMP
            elseif(Auth::user()->hasRole('emp')){
                return view('emp.dashboard',['title' => 'Dashboard', 'activeparents' => 'Dashboard']);
            }



            elseif(Auth::user()->hasRole('administrator')){
                return view('admin.dashboard');
            }
            elseif(Auth::user()->hasRole('heads')){
                return view('heads.dashboard');
            }
            elseif(Auth::user()->hasRole('emp')){
                return view('emp.dashboard');
            }
        }
        //------------- Role Validator End -----------------//

        //---------------------------------------------------- Super Admin ------------------------------------------//

        //------------- Super Admin Navigation -----------------//

        //Profile nav
        public function spadminprofile(){
            return view('superadmin.profile',['title' => 'Admin Profile', 'activeparents' => 'Profile']);
        }
        public function spadminsetings(){
            return view('superadmin.settings',['title' => 'Admin Settings', 'activeparents' => 'Profile']);
        }

        //Dashboard nav
        public function spadminreports(){
            return view('superadmin.reports',['title' => 'Reports', 'activeparents' => 'Dashboard']);
        }
        public function spwall(){
            return view('superadmin.wall',['title' => 'Freedom Wall', 'activeparents' => 'Dashboard']);
        }

        // Users nav
        public function activeusers(){
            return view('superadmin.users',['title' => 'Active User', 'activeparents' => 'User']);
        }
        public function adduser(){
            return view('superadmin.adduser',['title' => 'Add User', 'activeparents' => 'User']);
        }
        public function accessrequest(){
            return view('superadmin.accessrequest',['title' => 'Access Request', 'activeparents' => 'User']);
        }

        //Systems nav
        public function ahris(){
            return view('superadmin.ahris',['title' => 'AHRIS - Monitoring', 'activeparents' => 'System']);
        }

        //------------- Super Admin Navigation End-----------------//

        //---------------------------------------------------- Super Admin End ------------------------------------------//





        public function logout(Request $request)
                {
                    Auth::logout();

                    $request->session()->invalidate();

                    $request->session()->regenerateToken();

                    return redirect('/login');
                }

}
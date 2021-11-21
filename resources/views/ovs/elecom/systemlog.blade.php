@extends('ovs.elecom.layouts.app') 

@section('sidebar')
@include('ovs.elecom.layouts.sidebar')
@parent
@endsection


    <!-- Navbar -->
    @section('navbar')
    @include('ovs.elecom.layouts.navbar')
    @parent
    @endsection
    <!-- End Navbar  -->

    @section('main-content')
    <div class="content">
        <div class="content">
          <div class="container-fluid">
            


            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">assignment</i>
                    </div>
                    <h4 class="card-title">Primary User Log</h4>
                  </div>
                  <div class="card-body">
                    <div class="toolbar">
                      <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <div class="material-datatables">
                      <table id="datatables-user-log" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                          <tr>
                            <th style="text-align: center">Log Time</th>
                            <th style="text-align: center">User Type</th>                            
                            <th style="text-align: center">Branch Designation</th>
                            <th style="text-align: center">Process/Description</th>
                            <th style="text-align: center">Status</th>
                          </tr>
                        </thead>

                        <tbody>
                          <tr>
                            <td style="text-align: center">10/21/2021 08:00:31</td>
                            <td style="text-align: center">Branch Admin</td>                            
                            <td style="text-align: center">GHQ Branch</td>
                            <td style="text-align: center">Registered MIGS for voting 'S-10001010'</td>
                            <td style="text-align: center" class="text-success">Done</td>  
                          </tr>

                          <tr class="text-warning">
                            <td style="text-align: center">10/21/2021 08:03:15</td>
                            <td style="text-align: center">Branch Admin</td>                            
                            <td style="text-align: center">Lipa Branch</td>
                            <td style="text-align: center">Request for MIGS Late Registration 'S-15364486'</td>
                            <td style="text-align: center">Submited</td>  
                          </tr>

                          <tr class="text-info">
                            <td style="text-align: center">10/21/2021 08:13:15</td>
                            <td style="text-align: center">ICTD Admin</td>                            
                            <td style="text-align: center">Head Office</td>
                            <td style="text-align: center">Received request for MIGS Late Registration 'S-15364486'</td>
                            <td style="text-align: center">Recieved</td>  
                          </tr>

                          <tr class="text-success">
                            <td style="text-align: center">10/21/2021 08:25:00</td>
                            <td style="text-align: center">ICTD Admin</td>                            
                            <td style="text-align: center">Head Office</td>
                            <td style="text-align: center">Encoded request for MIGS Late Registration 'S-15364486'</td>
                            <td style="text-align: center">Complete</td>  
                          </tr>

                          <tr>
                            <td style="text-align: center">10/21/2021 08:29:00</td>
                            <td style="text-align: center">Branch Admin</td>                            
                            <td style="text-align: center">Lipa Branch</td>
                            <td style="text-align: center">Registered MIGS for voting 'S-15364486'</td>
                            <td style="text-align: center" class="text-success">Done</td>  
                          </tr>

                          
                          <tr>
                            <td style="text-align: center">10/21/2021 08:32:31</td>
                            <td style="text-align: center">Branch Admin</td>                            
                            <td style="text-align: center">CDO Branch</td>
                            <td style="text-align: center">Registered MIGS for voting 'S-12345678'</td>
                            <td style="text-align: center" class="text-success">Done</td>  
                          </tr>

                          <tr class="text-danger">
                            <td style="text-align: center">10/21/2021 08:35:18</td>
                            <td style="text-align: center">Branch Admin</td>                            
                            <td style="text-align: center">CDO Branch</td>
                            <td style="text-align: center">Request for Vote Cancellation 'S-12345678'</td>
                            <td style="text-align: center">Submited</td>  
                          </tr>

                          <tr class="text-info">
                            <td style="text-align: center">10/21/2021 08:37:55</td>
                            <td style="text-align: center">ICTD Admin</td>                            
                            <td style="text-align: center">Head Office</td>
                            <td style="text-align: center">Received request for Vote Cancellation 'S-12345678'</td>
                            <td style="text-align: center">Received</td>  
                          </tr>


                          <tr class="text-danger">
                            <td style="text-align: center">10/21/2021 08:37:55</td>
                            <td style="text-align: center">ICTD Admin</td>                            
                            <td style="text-align: center">Head Office</td>
                            <td style="text-align: center">Received request for Vote Cancellation 'S-12345678'</td>
                            <td style="text-align: center">Denied</td>  
                          </tr>

                          <tr class="text-danger">
                            <td style="text-align: center">10/21/2021 08:49:00</td>
                            <td style="text-align: center">Branch Admin</td>                            
                            <td style="text-align: center">CDO Branch</td>
                            <td style="text-align: center">Request for Vote Cancellation 'S-12345678'</td>
                            <td style="text-align: center">Submited</td>  
                          </tr>

                          <tr class="text-info">
                            <td style="text-align: center">10/21/2021 08:55:00</td>
                            <td style="text-align: center">ICTD Admin</td>                            
                            <td style="text-align: center">Head Office</td>
                            <td style="text-align: center">Received request for Vote Cancellation 'S-12345678'</td>
                            <td style="text-align: center">Received</td>  
                          </tr>

                          <tr class="text-success">
                            <td style="text-align: center">10/21/2021 09:00:00</td>
                            <td style="text-align: center">ICTD Admin</td>                            
                            <td style="text-align: center">Head Office</td>
                            <td style="text-align: center">Encoded request for Vote Cancellation 'S-12345678'</td>
                            <td style="text-align: center">Complete</td>  
                          </tr>



                          <tr>
                            <td style="text-align: center">10/21/2021 08:07:31</td>
                            <td style="text-align: center">Branch Admin</td>                            
                            <td style="text-align: center">GHQ Branch</td>
                            <td style="text-align: center">Registered MIGS for voting 'S-1555555'</td>
                            <td style="text-align: center" class="text-success">Done</td>  
                          </tr>
                        </tbody>


                        <tfoot>
                          <tr>
                            <th style="text-align: center">Log Time</th>
                            <th style="text-align: center">User Type</th>                            
                            <th style="text-align: center">Branch Designation</th>
                            <th style="text-align: center">Process/Description</th>
                            <th style="text-align: center">Status</th>
                          </tr>
                        </tfoot>
                        
                      </table>
                    </div>
                  </div>
                  <!-- end content-->
                </div>
                <!--  end card  -->
              </div>


              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">assignment</i>
                    </div>
                    <h4 class="card-title">Voting Log</h4>
                  </div>
                  <div class="card-body">
                    <div class="toolbar">
                      <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <div class="material-datatables">
                      <table id="datatables-voting-log" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                          <tr>
                            <th style="text-align: center">Log Time</th>
                            <th style="text-align: center">Branch Registered</th>                          
                            <th style="text-align: center">AFSN</th>
                            <th style="text-align: center">Process/Description</th>
                            <th style="text-align: center">Status</th>
                          </tr>
                        </thead>

                        <tbody>

                          <tr>
                            <td style="text-align: center">10/21/2021 08:05:31</td>
                            <td style="text-align: center">GHQ Branch</td>                            
                            <td style="text-align: center">S-10001010</td>
                            <td style="text-align: center">Login to Voting System</td>
                            <td style="text-align: center" class="text-success">Done</td>  
                          </tr>

                          <tr>
                            <td style="text-align: center">10/21/2021 08:09:31</td>
                            <td style="text-align: center">GHQ Branch</td>                            
                            <td style="text-align: center">S-10001010</td>
                            <td style="text-align: center">Vote Submitted</td>
                            <td style="text-align: center" class="text-success">Done</td>  
                          </tr>

                          <tr>
                            <td style="text-align: center">10/21/2021 08:11:31</td>
                            <td style="text-align: center">GHQ Branch</td>                            
                            <td style="text-align: center">S-1555555</td>
                            <td style="text-align: center">Login to Voting System</td>
                            <td style="text-align: center" class="text-success">Done</td>  
                          </tr>

                          <tr>
                            <td style="text-align: center">10/21/2021 08:16:31</td>
                            <td style="text-align: center">GHQ Branch</td>                            
                            <td style="text-align: center">S-1555555</td>
                            <td style="text-align: center">Vote Submitted</td>
                            <td style="text-align: center" class="text-success">Done</td>  
                          </tr>

                          <tr>
                            <td style="text-align: center">10/21/2021 08:32:31</td>
                            <td style="text-align: center">Lipa Branch</td>                            
                            <td style="text-align: center">S-15364486</td>
                            <td style="text-align: center">Login to Voting System</td>
                            <td style="text-align: center" class="text-success">Done</td>  
                          </tr>

                          <tr>
                            <td style="text-align: center">10/21/2021 08:33:31</td>
                            <td style="text-align: center">CDO Branch</td>                            
                            <td style="text-align: center">S-12345678</td>
                            <td style="text-align: center">Login to Voting System</td>
                            <td style="text-align: center" class="text-success">Done</td>  
                          </tr>

                          <tr>
                            <td style="text-align: center">10/21/2021 08:34:31</td>
                            <td style="text-align: center">CDO Branch</td>                            
                            <td style="text-align: center">S-12345678</td>
                            <td style="text-align: center">Vote Submitted</td>
                            <td style="text-align: center" class="text-success">Done</td>  
                          </tr>

                          <tr class="text-danger">
                            <td style="text-align: center">10/21/2021 09:00:00</td>
                            <td style="text-align: center">CDO Branch</td>                            
                            <td style="text-align: center">S-12345678</td>
                            <td style="text-align: center">Vote Rollover</td>
                            <td style="text-align: center">Complete</td>  
                          </tr>

                          <tr>
                            <td style="text-align: center">10/21/2021 08:35:31</td>
                            <td style="text-align: center">Lipa Branch</td>                            
                            <td style="text-align: center">S-15364486</td>
                            <td style="text-align: center">Vote Submitted</td>
                            <td style="text-align: center" class="text-success">Done</td>  
                          </tr>

                          <tr>
                            <td style="text-align: center">10/21/2021 09:05:31</td>
                            <td style="text-align: center">CDO Branch</td>                            
                            <td style="text-align: center">S-12345678</td>
                            <td style="text-align: center">Login to Voting System</td>
                            <td style="text-align: center" class="text-success">Done</td>  
                          </tr>

                          <tr>
                            <td style="text-align: center">10/21/2021 09:08:31</td>
                            <td style="text-align: center">CDO Branch</td>                            
                            <td style="text-align: center">S-12345678</td>
                            <td style="text-align: center">Vote Submitted</td>
                            <td style="text-align: center" class="text-success">Done</td>  
                          </tr>

                        </tbody>


                        <tfoot>
                          <tr>
                            <th style="text-align: center">Log Time</th>
                            <th style="text-align: center">User Type</th>                            
                            <th style="text-align: center">Branch Designation</th>
                            <th style="text-align: center">Process/Description</th>
                            <th style="text-align: center">Status</th>
                          </tr>
                        </tfoot>
                        
                      </table>
                    </div>
                  </div>
                  <!-- end content-->
                </div>
                <!--  end card  -->
              </div>



              <!-- end col-md-12 -->
            </div>


            

          </div>

        </div>
    </div>
    @endsection

    <!--footer -->
    @section('footer')
    @include('ovs.elecom.layouts.footer')
    @parent
    @endsection
    <!--footer -->

    <!--side filter -->
    @section('sidefilter')
    @include('ovs.elecom.layouts.sidefilter')
    @parent
    @endsection
    <!-- side filter -->

    <!--   Core JS Files   -->
    @section('corejs')
    @include('layouts.corejs')
    @parent
    @endsection
<!--   Core JS Files   -->

<!--   Script Plugins -->
    @section('adminplugin')
    @include('ovs.elecom.layouts.plugins.adminplugin')
    @parent
    @endsection
<!--   Script Plugins -->

<!--   dashboard Plugins -->
@section('pageplugin')
@include('ovs.elecom.layouts.plugins.dplugin')
@include('ovs.elecom.layouts.plugins.datatables')

@parent
@endsection
<!--   Script Plugins -->
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
                    <h4 class="card-title">Request List</h4>
                  </div>
                  <div class="card-body">
                    <div class="toolbar">
                      <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <div class="material-datatables">
                      <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                          <tr>
                            <th style="text-align: left">R. Date</th>
                            <th style="text-align: center">R. Branch</th>
                            <th style="text-align: center">User Type</th>
                            <th style="text-align: center">Request Type</th>                            
                            <th style="text-align: center">Request Info</th>
                            <th style="text-align: center">Status</th>
                            <th style="text-align: center">Last Update</th>
                            <th style="text-align: center">Action</th>
                          </tr>
                        </thead>

                        <tbody>
                          <tr>
                            <td style="text-align: left">10/21/2021 08:03:15</td>
                            <td style="text-align: center">Lipa Branch</td>                            
                            <td style="text-align: center">Branch Admin</td>
                            <td style="text-align: center">Late Registration</td>
                            <td style="text-align: center">Request for MIGS Late Registration 'S-15364486'</td>
                            <td style="text-align: center" class="text-success">Granted</td>
                            <td style="text-align: center">10/21/2021 08:25:00</td>
                            <td style="text-align: right; max-width:250px;">
                              <a href="">
                                <button class="btn btn-info btn-sm">
                                  View
                                </button>
                                </a>
                            </td>
                          </tr>
                          
                          <tr>
                            <td style="text-align: left">10/21/2021 08:35:18</td>
                            <td style="text-align: center">CDO Branch</td>                            
                            <td style="text-align: center">Branch Admin</td>
                            <td style="text-align: center">Vote Cancellation</td>
                            <td style="text-align: center">Request for Vote Cancellation 'S-12345678'</td>
                            <td style="text-align: center" class="text-danger">Denied</td>
                            <td style="text-align: center">10/21/2021 08:37:55</td>
                            <td style="text-align: right; max-width:250px;">
                              <a href="">
                              <button class="btn btn-info btn-sm">
                                View
                              </button>
                              </a>
                            </td>
                          </tr> 

                          <tr>
                            <td style="text-align: left">10/21/2021 08:49:00</td>
                            <td style="text-align: center">CDO Branch</td>                            
                            <td style="text-align: center">Branch Admin</td>
                            <td style="text-align: center">Vote Cancellation</td>
                            <td style="text-align: center">Request for Vote Cancellation 'S-12345678'</td>
                            <td style="text-align: center" class="text-success">Granted</td>
                            <td style="text-align: center">10/21/2021 09:00:00</td>
                            <td style="text-align: right; max-width:250px;">
                              <a href="">
                              <button class="btn btn-info btn-sm">
                                View
                              </button>
                              </a>
                            </td>
                          </tr>

                          <tr>
                            <td style="text-align: left">10/21/2021 08:50:00</td>
                            <td style="text-align: center">Tarlac Branch</td>                            
                            <td style="text-align: center">Branch Admin</td>
                            <td style="text-align: center">TVI</td>
                            <td style="text-align: center">Request for Branch Temporary Voting Inactivity</td>
                            <td style="text-align: center" class="text-success">--</td>
                            <td style="text-align: center">--</td>
                            <td style="text-align: right; max-width:250px;">
                              <a href="">
                              <button class="btn btn-primary btn-sm">
                                Mark as Received
                              </button>
                              </a>
                              <a href="">
                                <button class="btn btn-success btn-sm">
                                  Grant
                                </button>
                                </a>
                                <a href="">
                                  <button class="btn btn-danger btn-sm">
                                    Deny
                                  </button>
                                  </a>
                            </td>
                          </tr>
                             
                        </tbody>


                        <tfoot>
                          <tr>
                            <th style="text-align: left">R. Date</th>
                            <th style="text-align: center">R. Branch</th>
                            <th style="text-align: center">User Type</th>
                            <th style="text-align: center">Request Type</th>                            
                            <th style="text-align: center">Request Info</th>
                            <th style="text-align: center">Status</th>
                            <th style="text-align: center">Action</th>
                          </tr>
                        </tfoot>
                        
                      </table>
                    </div>
                  </div>
                  <!-- end content-->
                </div>

                      <button id="addRequest" class="btn btn-success btn-round" data-toggle="modal" data-target="#modalRequest">
                        <i class="material-icons">add</i> Add Request
                      </button>

                          <div class="modal fade" id="modalRequest" tabindex="-1" role="dialog" aria-labelledby="myModalRequest" aria-hidden="true">                   
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title text-info">Request Details</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    <i class="material-icons">clear</i>
                                  </button>
                                </div>
                                
                                <form class="cmxform block-form block-form-default" id="userForm" enctype="application/x-www-form-urlencoded" method="POST" action=""  autocomplete="off">
              
                                <div class="modal-body">
              
                                    <input type="hidden" name="id" id="id" value="" />
                                  
                                    <div class="row">
              
              
                                      <div class="col-sm-6">
                                        <select id="branch_of_operation" class="selectpicker" data-size="7" data-style="btn btn-primary btn-round btn-sm" title="Branch of Operation">
                                          <option value="TEST BRANCH" class="text-success">TEST BRANCH</option>
                                        </select>
                                      </div>
              
                                      <div class="col-sm-6">
                                        <select id="role_id" class="selectpicker" data-size="7" data-style="btn btn-primary btn-round btn-sm" title="User Type">
                                          <option value="16">ICTD (VOTING)</option>
                                          <option value="17">ELECOM (VOTING)</option>
                                          <option value="18">CANVASSING (VOTING)</option>
                                          <option value="19">Gen. Public (VOTING)</option>
                                          <option value="20">Branch Office (VOTING)</option>
                                        </select>
                                      </div>
              
              
                                      <div class="col-sm-4">
                                        <div class="form-group">
                                          <input id="lname" class="form-control" type="text" name="lname" placeholder="Last Name" required="true" />
                                        </div>
                                      </div>
                                      <div class="col-sm-4">
                                        <div class="form-group">
                                          <input id="name" class="form-control" type="text" name="name" placeholder="First Name" required="true" />
                                        </div>
                                      </div>
                                      <div class="col-sm-4">
                                        <div class="form-group">
                                          <input id="mname" class="form-control" type="text" name="mname" placeholder="Middle Name" required="true" />
                                        </div>
                                      </div>
              
                                      <div class="col-sm-6">
                                        <div class="form-group">
                                          <input id="emp_id" class="form-control" type="text" name="emp_id" placeholder="Emp ID (ex. 1-****)" required="true" />
                                        </div>
                                      </div>
                                      <div class="col-sm-6">
                                        <div class="form-group">
                                          <input id="email" class="form-control" type="email" name="email" placeholder="Email" required="true" />
                                        </div>
                                      </div>
              
                                      <div class="col-sm-6">
                                        <div class="form-group">
                                          <input id="password" class="form-control" type="password" name="password" placeholder="Password" required="true" />
                                        </div>
                                      </div>
                                      <div class="col-sm-6">
                                        <div class="form-group">
                                          <input id="repassword" class="form-control" type="password" name="repassword" placeholder="Re-Type Password" required="true" />
                                        </div>
                                      </div>
                                      
                                    </div>
              
                                  
                                </div>
                                <div class="modal-footer">
                                  <button id="btnSaveUser" type="submit" class="col btn btn-round btn-success d-block btn-sm">  Save </button> 
                                  <button id="btnUpdateUser" type="submit" class="col btn btn-round btn-success d-none btn-sm"> Update </button>
                                  <button id="btnRemoveUser" type="button" class="col btn btn-round  btn-danger d-none removeUser btn-sm">Delete</button>
                                  <button type="button" class="col btn btn-round btn-danger btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                                </div>
                                          
                              </form>
                              </div>
                            </div>
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


<script>
  $(document).ready(function() {
    $('#datatables').DataTable({
      "pagingType": "full_numbers",
      "lengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
      ],
      responsive: true,
      language: {
        search: "INPUT",
        searchPlaceholder: "Search records",
      }
    });

    var table = $('#datatables').DataTable();

    // Edit record

    table.on('click', '.edit', function() {
      $tr = $(this).closest('tr');

      if ($($tr).hasClass('child')) {
        $tr = $tr.prev('.parent');
      }

      var data = table.row($tr).data();
      alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
    });

    // Delete a record

    table.on('click', '.remove', function(e) {
      $tr = $(this).closest('tr');

      if ($($tr).hasClass('child')) {
        $tr = $tr.prev('.parent');
      }

      table.row($tr).remove().draw();
      e.preventDefault();
    });

    //Like record

    table.on('click', '.like', function() {
      alert('You clicked on Like button');
    });
  });
</script>


@parent
@endsection
<!--   Script Plugins -->
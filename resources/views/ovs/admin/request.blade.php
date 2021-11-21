@extends('ovs.admin.layouts.app') 

@section('sidebar')
@include('ovs.admin.layouts.sidebar')
@parent
@endsection


    <!-- Navbar -->
    @section('navbar')
    @include('ovs.admin.layouts.navbar')
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
    @include('ovs.admin.layouts.footer')
    @parent
    @endsection
    <!--footer -->

    <!--side filter -->
    @section('sidefilter')
    @include('ovs.admin.layouts.sidefilter')
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
    @include('ovs.admin.layouts.plugins.adminplugin')
    @parent
    @endsection
<!--   Script Plugins -->

<!--   dashboard Plugins -->
@section('pageplugin')
@include('ovs.admin.layouts.plugins.dplugin')


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
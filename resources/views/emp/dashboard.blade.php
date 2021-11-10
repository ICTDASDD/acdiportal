@extends('emp.layouts.app') 

@section('sidebar')
@include('emp.layouts.sidebar')
@parent
@endsection


    <!-- Navbar -->
    @section('navbar')
    @include('emp.layouts.navbar')
    @parent
    @endsection
    <!-- End Navbar -->

    @section('main-content')
    <div class="content">
        <div class="content">
          <div class="container-fluid">
            
            <div class="header text-center ml-auto mr-auto">
              <h3 class="title">Leave Credits Monitoring</h3>
              <p class="category">As of: </p>
            </div>
            
            <div class="row">
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">playlist_add_circle</i>
                    </div>
                    <p class="card-category">Total Leave Credits</p>
                    <h3 class="card-title">3</h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">date_range</i>
                      <a href="#pablo">View Details</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">library_books</i>
                    </div>
                    <p class="card-category">Total Used Credits</p>
                    <h3 class="card-title">2</h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">date_range</i>
                      <a href="#pablo">View Details</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-danger card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">quiz</i>
                    </div>
                    <p class="card-category">Unregistered Leave</p>
                    <h3 class="card-title">2</h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">date_range</i>
                      <a href="#pablo">View Details</a>
                    </div>
                  </div>
                </div>
              </div>              
            </div>

            
            
            <div class="row col-sm-12">
              <div class="col-md-4">
                <div class="header text-center ml-auto mr-auto">
                  <h3 class="title">Time Keeping</h3>
                  <p class="category">Last Update:</p>
                </div>
                
                <div class="card">
                  <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">list</i>
                    </div>
                    <h4 class="card-title">Daily Log</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                          <tr class="text-center">
                            <th >Date</th>
                            <th>Time-In</th>
                            <th>Time-Out</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="text-center">          
                            <td>11/01/2021</td>
                            <td>08:14:00</td>
                            <td>17:25:00</td>                            
                          </tr>

                          <tr class="text-center">          
                            <td>11/02/2021</td>
                            <td>07:45:00</td> 
                            <td>17:35:00</td>                             
                          </tr>

                          <tr class="text-center">          
                            <td>11/03/2021</td>
                            <td>07:42:00</td> 
                            <td>17:15:00</td>  
                          </tr>

                          <tr class="text-center">          
                            <td>11/04/2021</td>
                            <td>08:11:00</td> 
                            <td>17:11:00</td>  
                          </tr>

                          <tr class="text-center">          
                            <td>11/05/2021</td>
                            <td>07:30:00</td> 
                            <td>17:56:00</td>  
                          </tr>
                          
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-8">
                <div class="header text-center ml-auto mr-auto">
                  <h3 class="title">Leave Request</h3>
                  <p class="category">Latest Status</p>
                </div>
                
                <div class="card">
                  <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">event_available</i>
                    </div>
                    <h4 class="card-title">Pending/For Approval</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>                            
                            <th>Leave Type</th>
                            <th>Start Date</th>
                            <th>End Date</th>                         
                            <th>Purpose of Leave</th>
                            <th>Status</th>
                            <th class="text-right">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Vacation Leave</td>
                            <td>12/28/2020</td>
                            <td>01/01/2021</td>
                            <td>Going to province for year end</td>
                            <td class="text-info">For Approval</td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" class="btn btn-info">
                                <i class="material-icons">visibility</i>
                              </button>
                              <button type="button" rel="tooltip" class="btn btn-success">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" class="btn btn-danger">
                                <i class="material-icons">close</i>
                              </button>
                            </td>
                          </tr>
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

              <!-- end col-md-12 -->
            </div>


            

          </div>

        </div>
    </div> </div>
    @endsection

    <!--footer -->
    @section('footer')
    @include('emp.layouts.footer')
    @parent
    @endsection
    <!--footer -->

    <!--side filter -->
    @section('sidefilter')
    @include('emp.layouts.sidefilter')
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
    @include('emp.layouts.plugins.adminplugin')
    @parent
    @endsection
<!--   Script Plugins -->

<!--   dashboard Plugins -->
@section('pageplugin')
@include('emp.layouts.plugins.dplugin')


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
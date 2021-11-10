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
            
            




            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">list</i>
                    </div>
                    <h4 class="card-title">Leave History</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                          <tr>
                            
                            <th>Leave Type</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Date Filed</th>                            
                            <th>Purpose of Leave</th>
                            <th>No. of Day/s</th>
                            <th>Status</th>
                            <th class="text-right">View Details</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Vacation Leave</td>
                            <td>12/28/2020</td>
                            <td>01/01/2021</td>
                            <td>12/22/2020</td>
                            <td>Going to province for year end</td>
                            <td>5</td>
                            <td class="text-info">For Approval</td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" class="btn btn-info">
                                <i class="material-icons">visibility</i>
                              </button>
                              <button type="button" rel="tooltip" class="btn btn-danger">
                                <i class="material-icons">close</i>
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td>Vacation Leave</td>
                            <td>12/28/2020</td>
                            <td>01/01/2021</td>
                            <td>12/22/2020</td>
                            <td>Going to province for year end</td>
                            <td>5</td>
                            <td class="text-success">Approved</td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" class="btn btn-info">
                                <i class="material-icons">visibility</i>
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td>Vacation Leave</td>
                            <td>12/28/2020</td>
                            <td>01/01/2021</td>
                            <td>12/22/2020</td>
                            <td>Going to province for year end</td>
                            <td>5</td>
                            <td class="text-success">Approved</td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" class="btn btn-info">
                                <i class="material-icons">visibility</i>
                              </button>
                            </td>
                          </tr>

                          <tr>
                            <td>Vacation Leave</td>
                            <td>12/28/2020</td>
                            <td>01/01/2021</td>
                            <td>12/22/2020</td>
                            <td>Going to province for year end</td>
                            <td>5</td>
                            <td class="text-success">Approved</td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" class="btn btn-info">
                                <i class="material-icons">visibility</i>
                              </button>
                            </td>
                          </tr>

                          <tr>
                            <td>Vacation Leave</td>
                            <td>12/28/2020</td>
                            <td>01/01/2021</td>
                            <td>12/22/2020</td>
                            <td>Going to province for year end</td>
                            <td>5</td>
                            <td class="text-danger">Denied</td>
                            <td class="td-actions text-right">
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
              </div>
              <!-- end col-md-12 -->
            </div>
            

            <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#JobSixBelow">
              Leave Form (JB 6 & below)
            </button>



            <div class="modal fade" id="JobSixBelow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">              
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title text-info">Leave Information (JG 6 Below)</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                      <i class="material-icons">clear</i>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="#" action="#">

                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 mx-auto">
                          <select class="selectpicker" data-size="7" data-style="btn btn-primary btn-round" title="Leave Type">
                            <option disabled selected>Leave Type</option>
                            <option value="">Vacation Laeve</option>
                            <option value="">Sick Leave</option>
                            <option value="">Vacation Laeve w/o Pay</option>
                            <option value="">Sick Leave w/o Pay</option>
                            <option value="">Maternity /Paternity</option>
                            <option value="">Study Leave</option>
                            <option value="" class="text-danger">Late Filing</option>
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <input type="text" class="form-control datepicker" placeholder="Start Date">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <input type="text" class="form-control datepicker" placeholder="End Date">
                              </div>
                            </div>
                            
                          </div>
                        </div>
                      </div> 

                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <input class="form-control" type="text" name="purpose" placeholder="Purpose of Leave" required="true" />
                            </div>
                          </div>
                          <label class="col-sm-3 label-on-right">
                          </label>
                      </div>


                      <div class="row">
                        <div class="col-sm-12">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <select class="selectpicker" data-size="7" data-style="btn btn-primary btn-round" title="Reliever">
                                  <option disabled selected>Reliever</option>
                                  <option value="" disabled>List from Database</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <select class="selectpicker" data-size="7" data-style="btn btn-primary btn-round" title="Endorser">
                                  <option disabled selected>Endorser</option>
                                  <option value="" disabled>List from Database</option>
                                </select>
                            </div>                            
                          </div>
                        </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-12">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <input class="form-control" type="text" name="recommendee" value="Department Head" required="true" />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <input class="form-control" type="text" name="recommendee" value="Division Head" required="true" />
                              </div>
                            </div>
                            
                          </div>
                        </div>
                      </div>

                     
                                            
                    </form>
                    
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-success">  Submit </button> &nbsp;
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </div>
            </div>

            

          </div>

        </div>
    </div>
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

<script>
  $(document).ready(function() {
    // initialise Datetimepicker and Sliders
    md.initFormExtendedDatetimepickers();
    if ($('.slider').length != 0) {
      md.initSliders();
    }
  });
</script>


@parent
@endsection
<!--   Script Plugins -->
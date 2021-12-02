@extends('ovs.machine.layouts.app') 

@section('sidebar')
@include('ovs.machine.layouts.sidebar')
@parent
@endsection


    <!-- Navbar -->
    @section('navbar')
    @include('ovs.machine.layouts.navbar')
    @parent
    @endsection
    <!-- End Navbar -->

    @section('main-content')
    <div class="content">
        <div class="content">
          <div class="container-fluid">
            

            <br><br>
            <div class="header text-center ml-auto mr-auto">
              <h3 class="title">ACDI-MPC SAGA 2022</h3>
              <p class="category">{{Auth::user()->brCode}}</p>
            </div>
            
            <div class="row">
              <div class="col-lg-4 col-md-8 col-sm-6 ml-auto mr-auto">
                <form class="form" method="" action="">
                  <div class="card card-login card-hidden">
                    <div class="card-header card-header-info text-center">
                      <h4 class="card-title">Voters Validation</h4>
                    </div>
                    <div class="card-body ">
                      <p class="card-description text-center">Please login with the information provided on the Registration</p>
                      

                      <br>
                      <span class="bmd-form-group h3">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">fingerprint</i>
                            </span>
                          </div>
                          <input type="text" class="form-control text-center"  center placeholder="AFSN">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons"></i>
                            </span>
                          </div>
                        </div>
                      </span>

                      <br>


                      <span class="bmd-form-group h3">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">password</i>
                            </span>
                          </div>
                          <input type="password" class="form-control text-center" placeholder="6-Digit Generated CODE">  
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons"></i>
                            </span>
                          </div>                        
                        </div>
                      </span>

                      <br>


                      <span class="bmd-form-group h3">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <input class="form-check-input" type="checkbox" value="" required> First Checkbox
                            </span>
                          </div>
                          <input type="password" class="form-control text-center" placeholder="6-Digit Generated CODE">  
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons"></i>
                            </span>
                          </div>                        
                        </div>
                      </span>

                      <br>

                      <span class="bmd-form-group h3">
                        <div class="input-group">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="" required> First Checkbox
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>               
                        </div>
                      </span>


                    </div>
                    <div class="card-footer justify-content-center">
                      <a href="#pablo" class="btn btn-info btn-link btn-lg">Proceed</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>

            

            



            

          </div>

        </div>
    </div>
    @endsection

   

    <!--side filter -->
    @section('sidefilter')
    @include('ovs.machine.layouts.sidefilter')
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
    @include('ovs.machine.layouts.plugins.adminplugin')
    @parent
    @endsection
<!--   Script Plugins -->

<!--   dashboard Plugins -->
@section('pageplugin')
@include('ovs.machine.layouts.plugins.dplugin')


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
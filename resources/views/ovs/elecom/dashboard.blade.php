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
    <!-- End Navbar -->

    @section('main-content')
    <div class="content">
        <div class="content">
          <div class="container-fluid">
            
            <div class="header text-center ml-auto mr-auto">
              <h3 class="title">Board of Directors</h3>
              <p class="category">Data as of:</p>
            </div>
            
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <img src="{{ asset('material/img/candidate/candidate1.jpg')}}" style="width: 100px; height:100px;"/>
                    </div>
                    <p class="card-category">BGEN Candidate N. One (RET)</p>
                    <p class="card-category text-success small">Total Votes</p>  
                    <h3 class="card-title">4073</h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">                      
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <img src="{{ asset('material/img/candidate/candidate2.jpg')}}" style="width: 100px; height:100px;"/>
                    </div>
                    <p class="card-category">BGEN Candidate N. Two (RET)</p>
                    <p class="card-category text-success small">Total Votes</p>  
                    <h3 class="card-title">4073</h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">                      
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <img src="{{ asset('material/img/candidate/candidate3.jpg')}}" style="width: 100px; height:100px;"/>
                    </div>
                    <p class="card-category">BGEN Candidate N. Three (RET)</p>
                    <p class="card-category text-success small">Total Votes</p>  
                    <h3 class="card-title">4073</h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">                      
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <img src="{{ asset('material/img/candidate/candidate4.jpg')}}" style="width: 100px; height:100px;"/>
                    </div>
                    <p class="card-category">BGEN Candidate N. Four (RET)</p>
                    <p class="card-category text-success small">Total Votes</p>  
                    <h3 class="card-title">4073</h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">                      
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <img src="{{ asset('material/img/candidate/candidate5.jpg')}}" style="width: 100px; height:100px;"/>
                    </div>
                    <p class="card-category">BGEN Candidate N. Five (RET)</p>
                    <p class="card-category text-success small">Total Votes</p>  
                    <h3 class="card-title">4073</h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">                      
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <img src="{{ asset('material/img/candidate/candidate6.jpg')}}" style="width: 100px; height:100px;"/>
                    </div>
                    <p class="card-category">BGEN Candidate N. Six (RET)</p>
                    <p class="card-category text-success small">Total Votes</p>  
                    <h3 class="card-title">4073</h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">                      
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <img src="{{ asset('material/img/candidate/candidate7.jpg')}}" style="width: 100px; height:100px;"/>
                    </div>
                    <p class="card-category">BGEN Candidate N. Seven (RET)</p>
                    <p class="card-category text-success small">Total Votes</p>  
                    <h3 class="card-title">4073</h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">                      
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <img src="{{ asset('material/img/candidate/candidate8.jpg')}}" style="width: 100px; height:100px;"/>
                    </div>
                    <p class="card-category">BGEN Candidate N. Eight (RET)</p>
                    <p class="card-category text-success small">Total Votes</p>  
                    <h3 class="card-title">4073</h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">                      
                    </div>
                  </div>
                </div>
              </div>

            </div>


            <div class="header text-center ml-auto mr-auto">
              <h3 class="title">Audit Committee</h3>
              <p class="category">Data as of:</p>
            </div>
            
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                      <img src="{{ asset('material/img/candidate/candidate1.jpg')}}" style="width: 100px; height:100px;"/>
                    </div>
                    <p class="card-category">BGEN Candidate N. One (RET)</p>
                    <p class="card-category text-success small">Total Votes</p>  
                    <h3 class="card-title">4073</h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">                      
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                      <img src="{{ asset('material/img/candidate/candidate2.jpg')}}" style="width: 100px; height:100px;"/>
                    </div>
                    <p class="card-category">BGEN Candidate N. Two (RET)</p>
                    <p class="card-category text-success small">Total Votes</p>  
                    <h3 class="card-title">4073</h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">                      
                    </div>
                  </div>
                </div>
              </div>

            </div>

            

            <div class="header text-center ml-auto mr-auto">
              <h3 class="title">Amendments Vote Counter</h3>
              <p class="category">Data as of:</p>
            </div>


            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">assignment</i>
                    </div>
                    <h4 class="card-title">Sample Table for Amenment Monitoring</h4>
                  </div>
                  <div class="card-body">
                    <div class="toolbar">
                      <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <div class="material-datatables">
                      <table class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                          <tr>
                            <th style="text-align: center">MIGS</th>
                            <th style="text-align: center">REGISTERED MIGS</th>
                            <th style="text-align: center">% REGISTERED</th>
                            <th style="text-align: center">Amendment No.</th>
                            <th style="text-align: center">Total YES</th>
                            <th style="text-align: center">Total NO</th>
                            <th style="text-align: center">% YES VOTES</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th style="text-align: center" >MIGS</th>
                            <th style="text-align: center">REGISTERED MIGS</th>
                            <th style="text-align: center">% REGISTERED</th>
                            <th style="text-align: center">Amendment No.</th>
                            <th style="text-align: center">Total YES</th>
                            <th style="text-align: center">Total NO</th>
                            <th style="text-align: center">% YES VOTES</th>
                          </tr>
                        </tfoot>
                        <tbody>
                          <tr>
                            <td style="text-align: center"  rowspan="3">4775</th>
                            <td style="text-align: center" rowspan="3">4075</th>
                            <td style="text-align: center" rowspan="3">98%</th>
                            <td style="text-align: center">Amendment 1 - Article I</th>
                            <td style="text-align: center">4050</th>
                            <td style="text-align: center">25</th>
                            <td style="text-align: center">95%</th>
                          </tr>
                          <tr>
                            <td style="text-align: center">Amendment 2 - Article II</th>
                            <td style="text-align: center">4050</th>
                            <td style="text-align: center">25</th>
                            <td style="text-align: center">95%</th>
                          </tr>
                          <tr>
                            <td style="text-align: center">Amendment 3 - Article III</th>
                            <td style="text-align: center">4050</th>
                            <td style="text-align: center">25</th>
                            <td style="text-align: center">95%</th>
                          </tr>
                        </tbody>
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
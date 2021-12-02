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
                    <h4 class="card-title">Branch Data</h4>
                  </div>
                  <div class="card-body">
                    <div class="toolbar">
                      <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <div class="material-datatables">
                      <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                          <tr>
                            <th style="text-align: center">BR-CODE</th>
                            <th style="text-align: center">BR-DESC</th>                            
                            <th style="text-align: center">MIGS</th>
                            <th style="text-align: center">REG-MIGGS</th>
                            <th style="text-align: center">Active Admin</th>
                            <th style="text-align: center">Registered Unit</th>
                            <th style="text-align: center">Status</th>
                            <th style="text-align: right; max-width:250px;">Action</th>
                          </tr>
                        </thead>

                        <tbody>
                          <tr>
                            <td style="text-align: center">01</td>
                            <td style="text-align: center">CJVAB Branch</td>                            
                            <td style="text-align: center">400</td>
                            <td style="text-align: center">317</td>
                            <td style="text-align: center">1</td>
                            <td style="text-align: center">2</td>
                            <td style="text-align: center" class="text-success">Active</td>
                            <td style="text-align: right; max-width:250px;">
                              <a href="{{route('OVSAdminBstatus-id')}}">
                              <button class="btn btn-success btn-sm">
                                View
                              </button>
                              </a>
                            </td>
                          </tr> 
                          
                          <tr>
                            <td style="text-align: center">11</td>
                            <td style="text-align: center">GHQ Branch</td>                            
                            <td style="text-align: center">380</td>
                            <td style="text-align: center">289</td>
                            <td style="text-align: center">1</td>
                            <td style="text-align: center">2</td>
                            <td style="text-align: center" class="text-success">Active</td>
                            <td style="text-align: right; max-width:250px;">
                              <button class="btn btn-success btn-sm">
                                View
                              </button>
                            </td>
                          </tr>    

                          <tr>
                            <td style="text-align: center">10</td>
                            <td style="text-align: center">Fort Bonifacio</td>                            
                            <td style="text-align: center">300</td>
                            <td style="text-align: center">287</td>
                            <td style="text-align: center">1</td>
                            <td style="text-align: center">2</td>
                            <td style="text-align: center" class="text-success">Active</td>
                            <td style="text-align: right; max-width:250px;">
                              <button class="btn btn-success btn-sm">
                                View
                              </button>
                            </td>
                          </tr>    
                        </tbody>


                        <tfoot>
                          <tr>
                            <th style="text-align: center">BR-CODE</th>
                            <th style="text-align: center">BR-DESC</th>                            
                            <th style="text-align: center">MIGS</th>
                            <th style="text-align: center">REG-MIGGS</th>
                            <th style="text-align: center">Active Admin</th>
                            <th style="text-align: center">Registered Unit</th>
                            <th style="text-align: center">Status</th>
                            <th style="text-align: right; max-width:250px;">Action</th>
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
    @include('ovs.machine.layouts.footer')
    @parent
    @endsection
    <!--footer -->

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
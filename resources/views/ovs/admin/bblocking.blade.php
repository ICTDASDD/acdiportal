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
                    <h4 class="card-title">Branch List 
                      <button id="addCandidate" class="btn btn-success btn-sm btn-round" >
                        <i class="material-icons">add</i> Add Branch
                      </button>
                    </h4>
                  </div>
                  <div class="card-body">
                    <div class="toolbar">
                      <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <div class="material-datatables">
                      <table id="branchTable" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
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
    var branchTable = $('#branchTable').DataTable({
      processing: true,
      serverSide: true,
      cache: false,
      ajax: {
          url: "{{ route('branch.list') }}",
          //PASSING WITH DATA
          /*dataType: 'json',
          data: function (d) {
                d.votingPeriodID = $('#selectVotingPeriod').val() || ""
                //d.search = $('input[type="search"]').val(),
            }*/
          },
      columns: [
          {
            data: 'brCode',
            name: 'brCode'
          },
          {
            data: 'brName',
            name: 'brName'
          },
          {
            data: 'brName',
            name: 'brName'
          }, 
          {
            data: 'brName',
            name: 'brName'
          },
          {
            data: 'brName',
            name: 'brName'
          },
          {
            data: 'brName',
            name: 'brName'
          },
          {
            data: 'isLocked',
            name: 'isLocked'
          },
          {
            'data': null,
            'render': function (data) {
                var x = "";
                x = "<td style='text-align: right; max-width:250px;'>" +
                              "<div class='togglebutton'>" +
                                "<label>" +
                                  "<input type='checkbox' >" +
                                  "<span class='toggle'></span>" +
                                "</label>" +
                              "</div>" +
                            "</td>" ;
                    
                return "<center>"+ x + "</center>";
            }
          },
      ],
    });
  });
</script>


@parent
@endsection
<!--   Script Plugins -->
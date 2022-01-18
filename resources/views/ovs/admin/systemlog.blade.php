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
                    <h4 class="card-title">Voting Log</h4>
                  </div>
                  <div class="card-body">
                    <div class="toolbar">
                      <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <div class="material-datatables">
                      <table id="votingLogs" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
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

                        </tbody>


                        <tfoot>
                          <tr>
                            <th style="text-align: center">Log Time</th>
                            <th style="text-align: center">User Type</th>                            
                            <th style="text-align: center">AFSN</th>
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
                    <h4 class="card-title">Primary User Log</h4>
                  </div>
                  <div class="card-body">
                    <div class="toolbar">
                      <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <div class="material-datatables">
                      <!--<table id="datatables-user-log" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">-->
                      <table id="userLogs" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                          <tr>
                            <th style="text-align: center">Log Time</th>
                            <th style="text-align: center">Employee ID</th>
                            <th style="text-align: center">Name</th>
                            <th style="text-align: center">User Type</th>                            
                            <th style="text-align: center">Branch Designation</th>
                            <th style="text-align: center">Process/Description</th>
                          </tr>
                        </thead>

                        <tbody>
                         <!-- <tr>
                            <td style="text-align: center">10/21/2021 08:00:31</td>
                            <td style="text-align: center">Mika Ellah Sampang</td>
                            <td style="text-align: center">Branch Admin</td>                            
                            <td style="text-align: center">GHQ Branch</td>
                            <td style="text-align: center">Registered MIGS for voting 'S-10001010'</td>
                          </tr> -->
                        </tbody>


                        <tfoot>
                          <tr>
                            <th style="text-align: center">Log Time</th>
                            <th style="text-align: center">Employee ID</th>
                            <th style="text-align: center">Name</th>
                            <th style="text-align: center">User Type</th>                            
                            <th style="text-align: center">Branch Designation</th>
                            <th style="text-align: center">Process/Description</th>
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
@include('ovs.admin.layouts.plugins.datatables')

<script>
  $(document).ready(function() {
    
    var votingLogsDataTables = $('#votingLogs').DataTable({
      processing: true,
      serverSide: true,
      cache: false,
      responsive: true,
      ajax: {
          url: "{{ route('systemLog.votingLogs') }}",
          //PASSING WITH DATA
          type: 'POST',
          dataType: 'json',
          },         
      columns: [
          {
            data: 'logTime',
            name: 'logTime'
          },
          {
            data: 'brRegistered',
            name: 'brRegistered'
          },
          {
            data: 'afsn',
            name: 'afsn'
          }, 
          {
            data: 'description',
            name: 'description'
          },
          {
            data: 'status',
            name: 'status'
          } 
      ],
    });

   var userLogsDataTables = $('#userLogs').DataTable({
      processing: true,
      serverSide: true,
      cache: false,
      responsive: true,
      ajax: {
          url: "{{ route('systemLog.userLogs') }}",
          //PASSING WITH DATA
          type: 'POST',
          dataType: 'json',
          },      
      columns: [
          {
            data: 'created_at',
            name: 'created_at'
          },
          {
            data: 'emp_id',
            name: 'emp_id'
          },
          {
            data: 'fullName',
            name: 'fullName'
          }, 
          {
            data: 'description',
            name: 'description'
          },
          {
            data: 'brName',
            name: 'brName'
          }, 
          {
            data: 'process',
            name: 'process'
          } 
      ],
     order:[[1, 'desc']],
    }); 
}) 



</script>
@parent
@endsection
<!--   Script Plugins -->
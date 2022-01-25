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

            {{-- SUMMARY REPORT --}}            
            <div class="row">
              <div class="col-md-12">

                
            <div class="card">
              <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">assignment</i>
                </div>
               
                
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                      <h4 class="card-title">ELECTION RESULT PER VENUE
                        <select id="selectVotingPeriod2" class="form-control" style="width: 25%"  required="true">
                        </select>  
                      </h4>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="toolbar">
                  <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="material-datatables">
                  <table id="elecomResultPerVenue" class="table table-striped table-no-bordered table-hover nowrap" cellspacing="0" width="100%" style="width:100%">
                    

                    <tbody>

                    </tbody>
                  </table>
                </div>
              </div>
              <!-- end content-->
            </div>

            


                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                      <div class="card-icon">
                        <i class="material-icons">assignment</i>
                      </div>
                     
                      
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                            <h4 class="card-title">Summary Report
                              <select id="selectVotingPeriod" class="form-control" style="width: 25%"  required="true">
                              </select>  
                            </h4>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                      </div>
                      <div class="material-datatables">
                        <table id="summaryTable" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                          <thead>
                            <tr>                       
                              <th style="text-align: center">BRANCH</th>
                              <th style="text-align: center">TOTAL REGISTERED</th> 
                              <th style="text-align: center">TOTAL VOTED</th>                                                                              
                            </tr>
                          </thead>
      
                          <tfoot>
                            <tr>
                                <th style="text-align: center">BRANCH</th>
                                <th style="text-align: center">TOTAL REGISTERED</th> 
                                <th style="text-align: center">TOTAL VOTED</th>                                                                                   
                            </tr>
                          </tfoot>
      
                          <tbody>
      
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <!-- end content-->
                  </div>


               


            </div>

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

      //SUMMARY TABLE SELECT 2
      var votingPeriodSelect = $('#selectVotingPeriod').select2({
      placeholder: "Choose year",
      //dropdownParent: "#modalCandidateLimit", //UNCOMMENT WHEN IN MODAL
      minimumInputLength: -1,
      allowClear: true,
      ajax: {
          url: "{{ route('elecom.votingPeriod.select2') }}",
          delay: 250,
          dataType: 'json',
          data: function(params) {
              return {
                  query: params.term, // search term
              };
          },
          processResults: function(response) {
              return {
                  results: response
              };
          },
          cache: true
      }
    }).on('change', function () {
      
      summaryTable.ajax.reload();  
    });

    //selectVotingPeriod3
    var votingPeriodSelect2 = $('#selectVotingPeriod2').select2({
      placeholder: "Choose year",
      //dropdownParent: "#modalCandidateLimit", //UNCOMMENT WHEN IN MODAL
      minimumInputLength: -1,
      allowClear: true,
      ajax: {
          url: "{{ route('elecom.votingPeriod.select2') }}",
          delay: 250,
          dataType: 'json',
          data: function(params) {
              return {
                  query: params.term, // search term
              };
          },
          processResults: function(response) {
              return {
                  results: response
              };
          },
          cache: true
      }
    }).on('change', function () {
      
      elecomResultPerVenue.ajax.reload();  
    });

var summaryTable = $('#summaryTable').DataTable({
    dom: 'Bfrtip',
          buttons: [

      'copy', 'csv', 'pdf',
          {              
                        extend: 'print',
            title: 'Summary Report 2022',
            messageTop: 'This print was produced using the Print button for DataTables'
          },

          {
          extend: 'excelHtml5',
          autoFilter: true,
          title: 'Summary Report 2022',
          sheetName: 'Summary Report 2022'
          
          }
        ],
    processing: true,
    serverSide: true,
    cache: false,
    ajax: {

    url: "{{ route('summary.report') }}",
    dataType: 'json',
        type: "POST",
        data: function (d) {
                d.votingPeriodID = $('#selectVotingPeriod').val() || ""
                //d.search = $('input[type="search"]').val(),
            }
            //,
       // headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
      },

      columns: [
        {
          data: 'brName',
          name: 'brName'
        },
        {
          data: 'totalRegistered',
          name: 'totalRegistered'
        },
        {
          data: 'totalVoted',
          name: 'totalVoted'
        },
        
        ]
      });




}); 
 var elecomResultPerVenue;
$.ajax({
    type: 'POST',
    dataType: 'json',
    url: "{{ route('elecom.electionresultpervenuecolumn') }}",
    
    success: function(a) {
      console.log(a);
       elecomResultPerVenue = $('#elecomResultPerVenue').DataTable({
        processing: true,
        dom: 'Bfrtip', 
        buttons: [

                'copy', 'csv', 'pdf',
              {              
                  extend: 'print',
                  title: 'Election Result Per Venue',
                  messageTop: 'ACDI Multipurpose Cooperative'
                },

              {
                  extend: 'excelHtml5',
                  autoFilter: true,
                  title: 'Election Result Per Venue',
                  sheetName: 'Election Result Per Venue'
    
              }
              ],
       
        "scrollX": true,
        serverSide: true,
        cache: false,
        //responsive: true,
        ajax: {
          url: "{{ route('elecom.electionresultpervenue') }}",
          //PASSING WITH DATA
          type: 'POST',
          dataType: 'json',
          data: function (d) {
                d.votingPeriodID = $('#selectVotingPeriod2').val() || ""
                //d.search = $('input[type="search"]').val(),
            },
        },
        columns: a,
      });
    }
});


 
    </script>



@parent
@endsection
<!--   Script Plugins -->
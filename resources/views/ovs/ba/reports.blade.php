@extends('ovs.ba.layouts.app') 

@section('sidebar')
@include('ovs.ba.layouts.sidebar')
@parent
@endsection


    <!-- Navbar -->
    @section('navbar')
    @include('ovs.ba.layouts.navbar')
    @parent
    @endsection
    <!-- End Navbar -->

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
                   
                    
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                          <h4 class="card-title">List of Registered Members
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
                      <table id="registeredTable" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                          <tr>                       
                            <th style="text-align: center">BALLOT#</th>
                            <th style="text-align: center">AFSN</th> 
                            <th style="text-align: center">ATTENDEE</th>                           
                            <th style="text-align: center">SECURITY CODE</th>                      
                          </tr>
                        </thead>
    
                        <tfoot>
                          <tr>
                            <th style="text-align: center">BALLOT#</th>
                            <th style="text-align: center">AFSN</th>
                            <th style="text-align: center">ATTENDEE</th>                             
                            <th style="text-align: center">SECURITY CODE</th>                        
                          </tr>
                        </tfoot>
    
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
                      <h4 class="card-title">List of Voted Members
                        <select id="selectVotingPeriodV" class="form-control" style="width: 25%"  required="true">
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
                  <table id="votedTable" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                    <thead>
                      <tr>                       
                        <th style="text-align: center">BALLOT#</th>
                        <th style="text-align: center">AFSN</th> 
                        <th style="text-align: center">ATTENDEE</th>                           
                        <th style="text-align: center">SECURITY CODE</th>                      
                      </tr>
                    </thead>

                    <tfoot>
                      <tr>
                        <th style="text-align: center">BALLOT#</th>
                        <th style="text-align: center">AFSN</th>
                        <th style="text-align: center">ATTENDEE</th>                             
                        <th style="text-align: center">SECURITY CODE</th>                        
                      </tr>
                    </tfoot>

                    <tbody>

                    </tbody>
                  </table>
                </div>
              </div>
              <!-- end content-->
            </div>


            {{-- ELECTION RESULT ON CURRENT VENUE --}}

            <div class="card">
              <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">assignment</i>
                </div>
               
                
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                      <h4 class="card-title">ELECTION RESULT ON CURRENT VENUE
                        <select id="selectVotingPeriodE" class="form-control" style="width: 25%"  required="true">
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
                  <table id="eResultTable" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                    <thead>
                      <tr>                       
                        <th style="text-align: center">CANDIDATE NAME</th>
                        <th style="text-align: center">CANDIDATE TYPE</th> 
                        <th style="text-align: center">TOTAL VOTES</th>                                                                         
                      </tr>
                    </thead>

                    <tfoot>
                      <tr>
                        <th style="text-align: center">CANDIDATE NAME</th>
                        <th style="text-align: center">CANDIDATE TYPE</th> 
                        <th style="text-align: center">TOTAL VOTES</th>                       
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
   @include('ovs.ba.layouts.footer')
   @parent
   @endsection
   <!--footer -->

   <!--side filter -->
   @section('sidefilter')
   @include('ovs.ba.layouts.sidefilter')
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
   @include('ovs.ba.layouts.plugins.adminplugin')
   @parent
   @endsection
<!--   Script Plugins -->

<!--   Wizard Plugins -->
@section('pageplugin')
@include('ovs.ba.layouts.plugins.datatables')
@parent
<script>

$(document).ready(function() {

//VOTED select 2
var votingPeriodSelect2 = $('#selectVotingPeriodV').select2({
placeholder: "Choose year",
//dropdownParent: "#modalCandidateLimit", //UNCOMMENT WHEN IN MODAL
minimumInputLength: -1,
allowClear: true,
ajax: {
    url: "{{ route('ba.votingPeriod.select2') }}",
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

var votingPeriod = $('#selectVotingPeriodV').select2('data');
var $option = $("<option selected></option>").val(votingPeriod[0].id).text(votingPeriod[0].text);
$('#selectVotingPeriod2').append($option).trigger('change');

votedTable.ajax.reload();  
});

//REGISTERED SELECT2
var votingPeriodSelect2 = $('#selectVotingPeriod').select2({
placeholder: "Choose year",
//dropdownParent: "#modalCandidateLimit", //UNCOMMENT WHEN IN MODAL
minimumInputLength: -1,
allowClear: true,
ajax: {
    url: "{{ route('ba.votingPeriod.select2') }}",
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

var votingPeriod = $('#selectVotingPeriod').select2('data');
var $option = $("<option selected></option>").val(votingPeriod[0].id).text(votingPeriod[0].text);
$('#selectVotingPeriod2').append($option).trigger('change');

registeredTable.ajax.reload();  
});

//ELECTION RESULT SELECT2
var votingPeriodSelect2 = $('#selectVotingPeriodE').select2({
placeholder: "Choose year",
//dropdownParent: "#modalCandidateLimit", //UNCOMMENT WHEN IN MODAL
minimumInputLength: -1,
allowClear: true,
ajax: {
    url: "{{ route('ba.votingPeriod.select2') }}",
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

var votingPeriod = $('#selectVotingPeriodE').select2('data');
var $option = $("<option selected></option>").val(votingPeriod[0].id).text(votingPeriod[0].text);
$('#selectVotingPeriod2').append($option).trigger('change');

eResultTable.ajax.reload();  
});

//VOTED TABLE
  var votedTable = $('#votedTable').DataTable({
      dom: 'Bfrtip',
			buttons: [

        'copy', 'csv', 'pdf',
            {              
						  extend: 'print',
              title: 'List of Voted Members',
              messageTop: 'This print was produced using the Print button for DataTables'
            },

            {
            extend: 'excelHtml5',
            autoFilter: true,
            title: 'List of Voted Members',
            sheetName: 'List of Voted Members'
            
            }
          ],
      processing: true,
      serverSide: true,
      cache: false,
      ajax: {

      url: "{{ route('voted.list') }}",
          type: "POST",
          data: function (d) {
                d.votingPeriodID = $('#selectVotingPeriodV').val() || ""
                //d.search = $('input[type="search"]').val(),
            }
        },

        columns: [
          {
            data: 'ballotNo',
            name: 'ballotNo'
          },
          {
            data: 'afsn',
            name: 'afsn'
          },
          {
            data: 'fullName',
            name: 'fullName'
          },
          {
            data: 'code',
            name: 'code'
          }, 
          
          ]
        });


        //REGISTERED TABLE
        var registeredTable = $('#registeredTable').DataTable({
      dom: 'Bfrtip',
			buttons: [

        'copy', 'csv', 'pdf',
            {              
						  extend: 'print',
              title: 'List of Registered Members',
              messageTop: 'This print was produced using the Print button for DataTables'
            },

            {
            extend: 'excelHtml5',
            autoFilter: true,
            title: 'List of Registered Members',
            sheetName: 'List of Registered Members'
            
            }
          ],
          processing: true,
          serverSide: true,
          cache: false,
          ajax: {

          url: "{{ route('registered.list') }}",
          type: "POST",
          data: function (d) {
                d.votingPeriodID2 = $('#selectVotingPeriod').val() || ""
                //d.search = $('input[type="search"]').val(),
            }
        },

        columns: [
          {
            data: 'ballotNo',
            name: 'ballotNo'
          },
          {
            data: 'afsn',
            name: 'afsn'
          },
          {
            data: 'fullName',
            name: 'fullName'
          },
          {
            data: 'code',
            name: 'code'
          }, 
          
          ]
        });


        
        //ELECTION RESULT ON CURRENT VENUE TABLE
        var eResultTable = $('#eResultTable').DataTable({
      dom: 'Bfrtip',
			buttons: [

        'copy', 'csv', 'pdf',
            {              
						  extend: 'print',
              title: 'Election Result on Current Venue',
              messageTop: 'ACDI Multipurpose Cooperative'
            },

            {
            extend: 'excelHtml5',
            autoFilter: true,
            title: 'Election Result on Current Venue',
            sheetName: 'Election Result on Current Venue'
            
            }
          ],
          processing: true,
          serverSide: true,
          cache: false,
          ajax: {

          url: "{{ route('election.result.current') }}",
          type: "POST",
          data: function (d) {
                d.votingPeriodID3 = $('#selectVotingPeriodE').val() || ""
                //d.search = $('input[type="search"]').val(),
            }
        },

        columns: [
          {
            data: 'fullName',
            name: 'fullName'
          },
          {
            data: 'candidateTypeName',
            name: 'candidateTypeName'
          },
          {
            data: 'totalVote',
            name: 'totalVote'
          },
          
          
          ]
        });


}); 


</script>
@endsection

<!--   Script Plugins -->
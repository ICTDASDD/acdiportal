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
    <!-- End Navbar -->

    @section('main-content')
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">assignment</i>
                </div>
                <h4 class="card-title">Member List
                  <select id="selectVotingPeriod" class="form-control" style="width: 25%"  required="true">
                  </select>

                </h4>
              </div>
              <div class="card-body">
                <div class="toolbar">
                  <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="material-datatables">
                  <table id="memberTable" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                    <thead>
                      <tr>
                        <th style="text-align: left">Name</th>
                        <th style="text-align: center">Branch <BR>Membership</th>                            
                        <th style="text-align: center">AFSN</th>
                        <th style="text-align: center">SCNO</th>
                        <th style="text-align: center">Branch <BR>Registered</th>
                        <th style="text-align: center">Code</th>
                        <th style="text-align: center">Action</th>
                      </tr>
                    </thead>

                    <tfoot>
                      <tr>
                        <th style="text-align: left">Name</th>
                        <th style="text-align: center">Branch <BR>Membership</th>                            
                        <th style="text-align: center">AFSN</th>
                        <th style="text-align: center">SCNO</th>
                        <th style="text-align: center">Branch <BR>Registered</th>
                        <th style="text-align: center">Code</th>
                        <th style="text-align: center">Action</th>
                      </tr>
                    </tfoot>

                    <tbody>

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
        <button class="btn btn-danger btn-round" data-toggle="modal" data-target="#AddCandidate">
          <i class="material-icons">add</i> Late Registration Form
        </button>
        <!-- end row -->
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

<!--   Wizard Plugins -->
    @section('pageplugin')
    @include('ovs.admin.layouts.plugins.datatables')


    <script>
      $(document).ready(function() {

        var votingPeriodSelect2 = $('#selectVotingPeriod').select2({
          placeholder: "Choose year",
          //dropdownParent: "#modalCandidateLimit", //UNCOMMENT WHEN IN MODAL
          minimumInputLength: -1,
          allowClear: true,
          ajax: {
              url: "{{ route('votingPeriod.select2') }}",
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

          memberTable.ajax.reload();  
        });

        var memberTable = $('#memberTable').DataTable({
          processing: true,
          serverSide: true,
          cache: false,
          responsive: true,
          ajax: {
              url: "{{ route('member.list') }}",
              //PASSING WITH DATA
              dataType: 'json',
              data: function (d) {
                    d.votingPeriodID = $('#selectVotingPeriod').val() || ""
                    //d.search = $('input[type="search"]').val(),
                }
              },
          columns: [
              {
                data: 'fullName',
                name: 'fullName'
              },
              {
                data: 'brName',
                name: 'brName'
              },
              {
                data: 'AFSN',
                name: 'AFSN'
              }, 
              {
                data: 'SCNO',
                name: 'SCNO'
              },
              {
                data: 'brRegistered',
                name: 'brRegistered'
              }, 
              {
                data: 'code',
                name: 'code'
              }, 
              {
                data: 'actionButton',
                name: 'actionButton'
              }, 
              
              /*
              {
                'data': null,
                'render': function (data) {
                    var x = "";
                    var isLocked = "";
                    if(data.isLocked == "YES")
                    {
                      isLocked ="checked";
                    }
    
                    x = "<td style='text-align: right; max-width:250px;'>" +
                          "<div class='togglebutton'>" +
                            "<label>" +
                              "<input type='checkbox' class='branchLocking' value='" + data.brCode + "' " + isLocked + ">" +
                              "<span class='toggle'></span>" +
                            "</label>" +
                          "</div>" +
                        "</td>" ;
                        
                    return "<center>"+ x + "</center>";
                }
              },
              */
          ],
        });
      });
    </script>
    @parent
    @endsection
<!--   Script Plugins -->
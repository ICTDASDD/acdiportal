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
                name: 'actionButton',
                orderable: false, 
                searchable: false
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

        $('#memberTable').on('click','.registerButton',function(){
          var afsn = this.value
          var fullName = $(this).data('fullname');           
          var isaccumudating = $(this).data('isaccumudating'); 
          var votingPeriod = $('#selectVotingPeriod').select2('data');
          var votingPeriodID = votingPeriod[0].id;
          var votingPeriodDetails = votingPeriod[0].text;

          //Auth::user()->brCode
          if(isaccumudating == true)
          {
            swal({
              title: 'Accomodating other branch member!',
              text: "You're registering member of other branch?",
              type: 'warning',
              showCancelButton: false,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Confirm'
            }).then((result) => {
              if (result.value) {
                register(afsn, fullName,isaccumudating, votingPeriodID);
              }
            });
          } else 
          {
              register(afsn, fullName,isaccumudating, votingPeriodID);
          }
        });
      });

      function register(afsn, fullName,isaccumudating, votingPeriodID)
      {
          swal({
            title: 'Register ' + fullName + ' as Voter!',
            text: "Are you sure?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm'
          }).then((result) => {
            if (result.value) {
              $.ajax({
                  type: "GET",
                  url: "{{ route('member.register') }}",
                  data: { afsn : afsn, votingPeriodID : votingPeriodID },
                  contentType: "application/json; charset=utf-8",
                  beforeSend:  function() {
                      swal({ title: 'Loading..', onOpen: () => swal.showLoading(), allowOutsideClick: () => !swal.isLoading() });
                  },
                  error: function (jqXHR, exception) {
                      swal.close();

                      console.log(jqXHR.responseText);
                      swal({ title: "Error " + jqXHR.status, text: "Please try again later.", type: "error", buttonsStyling: false, confirmButtonClass: "btn btn-success"});
                  },
                  success: function (data) {
                      swal.close();
   
                      if(!data.success)
                      {
                        swal({ title:"Unable to Register!", text: "Please try again.", type: "error", buttonsStyling: false, confirmButtonClass: "btn btn-success"});
                      } 
                      else 
                      {           
                        swal({ title:"Successfully Registered!", text: "Member can vote now!", type: "success", buttonsStyling: false, confirmButtonClass: "btn btn-success"});
                        var memberTable = $('#memberTable').DataTable();
                        memberTable.ajax.reload(null, false);

                        var a = window.open('', '', 'height=500, width=500');
                       a.document.write('<html>'); 
                       a.document.write('<body><h4> REGISTRATION DETAILS </h4>');
                       a.document.write('<table name= "detailsTable" border ="1" cellspacing = "1" callpadding = "5">'); 
                       a.document.write('<tr>');                     
                       a.document.write('<td> Name: </td>');
                       a.document.write('<td>' + fullName + '</td>');
                       a.document.write('</tr>'); 
                       a.document.write('<tr>');   
                       a.document.write('<td> AFSN: </td>');
                       a.document.write('<td>' + afsn + '</td>');
                       a.document.write('</tr>');
                       a.document.write('<tr>'); 
                       a.document.write('<td> Code: </td>');
                       a.document.write('<td>' + data.code + '</td>');
                       a.document.write('</tr>');
                       a.document.write('<table>');
                       a.document.write('</body></html>'); 
                       a.style.textAlign = "center";                                    
                       a.print();                      
                       a.close();
                       

                      }
                  }
              });   
            }
          });
      }

     
 
    </script>
    @parent
    @endsection
<!--   Script Plugins -->
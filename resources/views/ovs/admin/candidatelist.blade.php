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
               
                
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                      <h4 class="card-title">Candidate for SAGA </h4>
                      <select id="selectVotingPeriod" class="form-control" style="width: 100%"  required="true">
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="toolbar">
                  <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="material-datatables">
                  <table id="candidateTable" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                    <thead>
                      <tr>
                        <th style="text-align: center">Picture</th>
                        <th style="text-align: center">Name</th>
                        <th style="text-align: center">Information 1</th>                            
                        <th style="text-align: center">Information 2</th>
                        <th style="text-align: center">Candidate for</th>
                        <th style="text-align: right; max-width:250px;">Action</th>
                      </tr>
                    </thead>

                    <tfoot>
                      <tr>
                        <th style="text-align: center">Picture</th>
                        <th style="text-align: center">Name</th>
                        <th style="text-align: center">Information 1</th>                            
                        <th style="text-align: center">Information 2</th>
                        <th style="text-align: center">Candidate for</th>
                        <th style="text-align: right; max-width:250px;">Action</th>
                      </tr>
                    </tfoot>

                    <tbody>

                    </tbody>
                  </table>
                </div>
              </div>
              <!-- end content-->
            </div>
            <button id="addCandidate" class="btn btn-success btn-round" data-toggle="modal" data-target="#modalCandidate">
              <i class="material-icons">add</i> Add Candidate
            </button>

            <div class="modal fade" id="modalCandidate" tabindex="-1" role="dialog" aria-labelledby="myModalCandidate" aria-hidden="true">              
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title text-info">Information of Candidate</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                      <i class="material-icons">clear</i>
                    </button>
                  </div>
                  
                  <form class="cmxform block-form block-form-default" id="candidateForm" enctype="application/x-www-form-urlencoded" method="POST" action=""  autocomplete="off">

                  <div class="modal-body">

                      <input type="hidden" name="candidateID" id="candidateID" value="" />
                    
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                            <select id="candidateTypeID" class="form-control" style="width: 100%"  required="true">
                            </select>
                          </div>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <input id="lastName" class="form-control" type="text" name="lastName" placeholder="Last Name of Candidate" required="true" />
                          </div>
                        </div>
                        <label class="col-sm-3 label-on-right">
                        </label>
                      </div>
                      
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <input id="firstName" class="form-control" type="text" name="firstName" placeholder="First Name of Candidate" required="true" />
                          </div>
                        </div>
                        <label class="col-sm-3 label-on-right">
                        </label>
                      </div>

                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <input id="middleName" class="form-control" type="text" name="middleName" placeholder="Middle Name of Candidate" required="true" />
                          </div>
                        </div>
                        <label class="col-sm-3 label-on-right">
                        </label>
                      </div>

                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <input id="info1" class="form-control" type="text" name="info1" placeholder="Information 1" required="true" />
                          </div>
                        </div>
                        <label class="col-sm-3 label-on-right">
                        </label>
                      </div>

                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <input id="info2" class="form-control" type="text" name="info2" placeholder="Information 2" required="true" />
                          </div>
                        </div>
                        <label class="col-sm-3 label-on-right">
                        </label>
                      </div>

                      <div class="row">
                        
                      </div>

                      <div class="card-body col-lg-5 mx-auto">
                        <div class="fileinput text-center fileinput-new" data-provides="fileinput">
                          <div class="fileinput-new thumbnail img-circle">
                            <img src="{{ asset('material/img/placeholder.jpg')}}"  alt="...">
                          </div>
                          <div class="fileinput-preview fileinput-exists thumbnail img-circle" style=""></div>
                          <div>
                            <span class="btn btn-round btn-rose btn-file">
                              <span class="fileinput-new">Add Photo</span>
                              <span class="fileinput-exists">Change</span>
                              <input type="hidden" value="" name="..."><input type="file" name="">
                            <div class="ripple-container"></div></span>
                            <br>
                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove<div class="ripple-container"><div class="ripple-decorator ripple-on ripple-out" style="left: 59.0156px; top: 31.6094px; background-color: rgb(255, 255, 255); transform: scale(15.5098);"></div></div></a>
                          </div>
                        </div>
                      </div> 
                                  
                    
                  </div>
                  <div class="modal-footer">
                    <button id="btnSaveCandidate" type="submit" class="col btn btn-round btn-success d-block">  Save </button> 
                    <button id="btnUpdateCandidate" type="submit" class="col btn btn-round btn-success d-none"> Update </button>
                    <button id="btnRemoveCandidate" type="button" class="col btn btn-round  btn-danger d-none removeCandidate">Remove</button>
                    <button type="button" class="col btn btn-round btn-secondary" data-dismiss="modal">Cancel</button>
                  </div>
                            
                </form>
                </div>
              </div>
            </div>



            <!--  end card  -->
          </div>
          <!-- end col-md-12 -->
        </div>
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
@parent
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
    var votingPeriodID = votingPeriod[0].id;

    var candidateTable = $('#candidateTable').DataTable();
    candidateTable.ajax.reload();  
  });

  var candidateTypeSelect2 = $('#candidateTypeID').select2({
    placeholder: "Candidate For",
    dropdownParent: "#modalCandidate" ,
    minimumInputLength: -1,
    allowClear: true,
    ajax: {
        url: "{{ route('candidateType.select2') }}",
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
  });

  var candidateTable = $('#candidateTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('candidate.list') }}",
    columns: [
        {
          'data': null,
          'render': function (data) {
              var x = "";
              x = data.profilePicture;
              var link = "{{ asset('material/img/candidate/')}}";

              x = "<center><img src='"+ link + "/" + data.profilePicture + "' style='max-width: 50px;'/></center>";
              return x;
          }
        },
        {
          data: 'fullName',
          name: 'fullName'
        },
        {
          data: 'information1',
          name: 'information1'
        },
        {
          data: 'information2',
          name: 'information2'
        }, 
        {
          data: 'candidateFor',
          name: 'candidateFor'
        },
        {
          'data': null,
          'render': function (data) {
              var x = "";
              x = 
                      "<button class='btn btn-success btn-sm editCandidate' value='" + data.candidateID + "'> " +
                      "  Edit " +
                      "</button> " ;
                  
              return "<center>"+ x + "</center>";
          }
        },
    ],
    "fnServerParams": function (aoData) {
        aoData.push({ "name": "votingPeriodID", "value": document.getElementById("votingPeriodID").value });
    }
  });

  $('#candidateTable').on('click','.editCandidate',function(){
    var candidateID = this.value;

    $.ajax({
        type: "GET",
        url: "{{ route('candidate.edit') }}",
        data: { candidateID : candidateID },
        contentType: "application/json; charset=utf-8",
        beforeSend:  function() {
            swal({ title: 'Loading..', onOpen: () => swal.showLoading(), allowOutsideClick: () => !swal.isLoading() });
        },
        error: function (jqXHR, exception) {
            swal.close();
            
            console.log(jqXHR.responseText);
            swal({ title: "Error " + jqXHR.status, text: "Please try again later.", type: "error", buttonsStyling: false, confirmButtonClass: "btn btn-success"})
        },
        success: function (data) {
          swal.close();

          if(data.candidateID)
          {
            $('#candidateID').val(data.candidateID);
            //$('#candidateTypeID').val(data.candidateTypeID);
                
            //var $select = $('#candidateTypeID');
            //var $select = $($('#candidateTypeID').data('target'));
            //select2_search($select, data.candidateTypeName);
            
            var $option = $("<option selected></option>").val(data.candidateTypeID).text(data.candidateTypeName);
            $('#candidateTypeID').append($option).trigger('change');

            $('#lastName').val(data.lastName);
            $('#firstName').val(data.firstName);
            $('#middleName').val(data.middleName);
            $('#info1').val(data.information1);
            $('#info2').val(data.information2);
            
            $('#btnSaveCandidate').removeClass('d-block').addClass('d-none');
            $('#btnUpdateCandidate').removeClass('d-none').addClass('d-block');
            $('#btnRemoveCandidate').removeClass('d-none').addClass('d-block');

            $('#modalCandidate').modal('show');
          } 
          else 
          {
            swal({ title: "Unable to Edit", text: "Please try again later.", type: "error", buttonsStyling: false, confirmButtonClass: "btn btn-success"})
          }
        }
    });   
  });

  
  $(document).on("click", "#addCandidate", function (e) {
      $('#candidateID').val("0");

      $('#candidateTypeID').val("");
      $('#lastName').val("");
      $('#firstName').val("");
      $('#middleName').val("");
      $('#info1').val("");
      $('#info2').val("");
            
      $('#btnSaveCandidate').removeClass('d-none').addClass('d-block');
      $('#btnUpdateCandidate').removeClass('d-block').addClass('d-none');
      $('#btnRemoveCandidate').removeClass('d-block').addClass('d-none');
      
  });
  
  $(document).on("click", "#btnSaveCandidate", function (e) {
    
      $('#candidateForm').attr('action', 'Saving');
      validateCandidateForm();
  });
  
  $(document).on("click", "#btnUpdateCandidate", function (e) {
      $('#candidateForm').attr('action', 'Updating');
      validateCandidateForm();
  });

  $("#candidateForm").on("click", ".removeCandidate", function (e) {
      swal({
          title: 'Remove Candidate!',
          text: "Are you sure?",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Confirm'
      }).then((result) => {
          if (result.value) {
            var candidateID = $("#candidateID").val();
            
            $.ajax({
                type: "GET",
                url: "{{ route('candidate.delete') }}",
                data: { candidateID : candidateID},
                contentType: "application/json; charset=utf-8",
                beforeSend:  function() {
                    swal({ title: 'Loading..', onOpen: () => swal.showLoading(), allowOutsideClick: () => !swal.isLoading() });
                },
                error: function (jqXHR, exception) {
                    swal.close();

                    console.log(jqXHR.responseText);
                    swal({ title: "Error " + jqXHR.status, text: "Please try again later.", type: "error", buttonsStyling: false, confirmButtonClass: "btn btn-success"})
                },
                success: function (data) {
                    swal.close();

                    if(!data.success)
                    {
                      swal({ title:"Unable to Remove!", text: "Please try again.", type: "error", buttonsStyling: false, confirmButtonClass: "btn btn-success"})
                    } 
                    else 
                    {
                      swal({ title:"Successfully Remove!", text: "You remove candidate!", type: "success", buttonsStyling: false, confirmButtonClass: "btn btn-success"})

                      var candidateTable = $('#candidateTable').DataTable();
                      candidateTable.ajax.reload();  

                      $('#modalCandidate').modal('hide');
                    }
                }
            });   
          } 
      });
  });

  $("#candidateForm").bind("invalid-form.validate", function () {
      // Do something useful e.g. display the Validation Summary in a popup dialog
  });

  $('#candidateForm').submit(function (evt) {
      evt.preventDefault(); //prevents the default action
  });
});

function validateCandidateForm(action)
{
$("#candidateForm").validate({
  ignore: 'input[type=hidden]',
  rules:{    
      'candidateTypeID':{
          required: true
      },   
      'lastName':{
          required: true
      },   
      'firstName':{
          required: true
      },   
      'middleName':{
          required: true
      },   
      'info1':{
          required: true
      },   
      'info2':{
          required: true
      },       
  },
  submitHandler: function(form){
    var candidateID = $("#candidateID").val();
    var candidateType = $('#candidateTypeID').select2('data');
    var candidateTypeID = candidateType[0].id;
    var lastName = $("#lastName").val();
    var firstName = $("#firstName").val();
    var middleName = $("#middleName").val();
    var info1 = $("#info1").val();
    var info2 = $("#info2").val();

    if("Saving" ==  $('#candidateForm').attr('action'))
    {
         
      $.ajax({
          type: "GET",
          url: "{{ route('candidate.add') }}",
          data: { 
            candidateTypeID : candidateTypeID,
            lastName : lastName,
            firstName  : firstName,
            middleName  : middleName,
            information1  : info1,
            information2  : info2,
          },
          contentType: "application/json; charset=utf-8",
          beforeSend:  function() {
              swal({ title: 'Loading..', onOpen: () => swal.showLoading(), allowOutsideClick: () => !swal.isLoading() });
          },
          error: function (jqXHR, exception) {
              swal.close();
              
              console.log(jqXHR.responseText);
              swal({ title: "Error " + jqXHR.status, text: "Please try again later.", type: "error", buttonsStyling: false, confirmButtonClass: "btn btn-success"})
          },
          success: function (data) {
              swal.close();

              if(data.errors)
              {
                var errorMessage= "";
                $.each(data.errors, function(key, value) {
                  errorMessage = errorMessage + value + "\n";
                });

                swal({ title:"Unable to Save!", text: errorMessage, type: "error", buttonsStyling: false, confirmButtonClass: "btn btn-success"})
              } 
              else 
              {
                swal({ title:"Successfully Saved!", text: "You add new candidate!", type: "success", buttonsStyling: false, confirmButtonClass: "btn btn-success"})

                var candidateTable = $('#candidateTable').DataTable();
                candidateTable.ajax.reload();  

                $('#modalCandidate').modal('hide');
              }
          }
      });    
    } 
    else 
    {
      $.ajax({
          type: "GET",
          url: "{{ route('candidate.update') }}",
          data: { 
            candidateID : candidateID,
            candidateTypeID : candidateTypeID,
            lastName : lastName,
            firstName  : firstName,
            middleName  : middleName,
            information1  : info1,
            information2  : info2,
          },
          contentType: "application/json; charset=utf-8",
          beforeSend:  function() {
              swal({ title: 'Loading..', onOpen: () => swal.showLoading(), allowOutsideClick: () => !swal.isLoading() });
          },
          error: function (jqXHR, exception) {
              swal.close();

              console.log(jqXHR.responseText);
              swal({ title: "Error " + jqXHR.status, text: "Please try again later.", type: "error", buttonsStyling: false, confirmButtonClass: "btn btn-success"})
          },
          success: function (data) {
              swal.close();

              if(data.errors)
              {
                var errorMessage= "";
                $.each(data.errors, function(key, value) {
                  errorMessage = errorMessage + value + "\n";
                });

                swal({ title:"Unable to Update!", text: errorMessage, type: "error", buttonsStyling: false, confirmButtonClass: "btn btn-success"})
              } 
              else 
              {
                swal({ title:"Successfully Update!", text: "You update candidate!", type: "success", buttonsStyling: false, confirmButtonClass: "btn btn-success"})

                var candidateTable = $('#candidateTable').DataTable();
                candidateTable.ajax.reload();  

                $('#modalCandidate').modal('hide');
              }
          }
      });  
    }
    /*
    var candidateTable = $('#candidateTable').DataTable();
    candidateTable.ajax.reload();  

    $('#modalCandidate').modal('hide');
    */
    return false;
  }
});
}
</script>
@endsection

<!--   Script Plugins -->

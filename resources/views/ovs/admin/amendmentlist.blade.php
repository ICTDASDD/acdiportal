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
                <h4 class="card-title">Amendment List 
                  <select id="selectVotingPeriod" class="form-control" style="width: 25%"  required="true">
                  </select>
                  <button id="addAmendment" class="btn btn-success btn-sm btn-round" >
                    <i class="material-icons">add</i> Add Amendment
                  </button>
                </h4>
              </div>
              <div class="card-body">
                <div class="toolbar">
                  <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="material-datatables">
                  <table id="amendmentTable" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                    <thead>
                      <tr>
                        <th style="text-align: center">Amendment No.</th>
                        <th style="text-align: center">Article Details</th>                            
                        <th style="text-align: center">Present Provision</th>
                        <th style="text-align: center">Proposed Revision</th>
                        <th style="text-align: center">Proposed Provision</th>
                        <th style="text-align: center">Rationale</th>
                        <th style="text-align: center">Question</th>
                        <th style="text-align: center">Action</th>
                      </tr>
                    </thead>

                    <tfoot>
                      <tr>
                        <th style="text-align: center">Amendment No.</th>
                        <th style="text-align: center">Article Details</th>                            
                        <th style="text-align: center">Present Provision</th>
                        <th style="text-align: center">Proposed Revision</th>
                        <th style="text-align: center">Proposed Provision</th>
                        <th style="text-align: center">Rationale</th>
                        <th style="text-align: center">Question</th>
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

            <div class="modal fade" id="modalAmendment" tabindex="-1" role="dialog" aria-labelledby="myModalAmendment" aria-hidden="true">                   
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title text-info">Information of amendment</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                      <i class="material-icons">clear</i>
                    </button>
                  </div>
                  
                 <!-- <form class="cmxform block-form block-form-default" id="userForm" enctype="application/x-www-form-urlencoded" method="POST" action=""  autocomplete="off"> -->
                  <form class="cmxform block-form block-form-default" id="amendmentForm" enctype="multipart/form-data" method="POST" action=""  autocomplete="off">
                  @csrf <!-- {{ csrf_field() }} -->
                  <div class="modal-body">       

                      <input type="hidden" name="id" id="id" value="" />

                      <div class="row">

                        <div class="row">
                          <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                              <select id="selectVotingPeriod2" class="form-control" style="width: 100%"  required="true">
                              </select>
                            </div>
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <input id="amendmentNo" class="form-control" type="text" name="amendmentNo" placeholder="Amendment Number" required="true" />
                            </div>
                          </div>
                          <label class="col-sm-3 label-on-right">
                          </label>
                        </div>
                        
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <input id="articleDetails" class="form-control" type="text" name="articleDetails" placeholder="Article Number" required="true" />
                            </div>
                          </div>
                          <label class="col-sm-3 label-on-right">
                          </label>
                        </div>
  
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <input id="presentProvision" class="form-control" type="text" name="presentProvision" placeholder="Present Provision" required="true" />
                            </div>
                          </div>
                          <label class="col-sm-3 label-on-right">
                          </label>
                        </div>

                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <input id="proposedRevision" class="form-control" type="text" name="proposedRevision" placeholder="Proposed Revision" required="true" />
                            </div>
                          </div>
                          <label class="col-sm-3 label-on-right">
                          </label>
                        </div>

                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <input id="proposedProvision" class="form-control" type="text" name="proposedProvision" placeholder="Proposed Provision" required="true" />
                            </div>
                          </div>
                          <label class="col-sm-3 label-on-right">
                          </label>
                        </div>

                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <input id="rationale" class="form-control" type="text" name="rationale" placeholder="Rationale" required="true" />
                            </div>
                          </div>
                          <label class="col-sm-3 label-on-right">
                          </label>
                        </div>

                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <input id="question" class="form-control" type="text" name="question" placeholder="Question" required="true" />
                            </div>
                          </div>
                          <label class="col-sm-3 label-on-right">
                          </label>
                        </div>
                        
                      </div>

                    
                  </div>

                  <div class="modal-footer">
                    <button id="btnSaveAmendment" type="submit" class="col btn btn-round btn-success d-block">  Save </button> 
                    <button id="btnUpdateAmendment" type="submit" class="col btn btn-round btn-success d-none"> Update </button>
                    <button id="btnRemoveAmendment" type="button" class="col btn btn-round  btn-danger d-none removeAmendment">Remove</button>
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
      var $option = $("<option selected></option>").val(votingPeriod[0].id).text(votingPeriod[0].text);
      $('#selectVotingPeriod2').append($option).trigger('change');

      amendmentTable.ajax.reload();  
    });

    var votingPeriodSelect2modal = $('#selectVotingPeriod2').select2({
      placeholder: "Choose year",
      dropdownParent: "#modalAmendment", //UNCOMMENT WHEN IN MODAL
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
    
    });


    var amendmentTable = $('#amendmentTable').DataTable({
      processing: true,
      serverSide: true,
      cache: false,
      ajax: {
          url: "{{ route('amendment.list') }}",
          //PASSING WITH DATA
          dataType: 'json',
          data: function (d) {
                d.votingPeriodID = $('#selectVotingPeriod').val() || ""
                //d.search = $('input[type="search"]').val(),
            }
          },
      columns: [
          {
            data: 'amendmentNo',
            name: 'amendmentNo'
          },
          {
            data: 'articleDetails',
            name: 'articleDetails'
          },
          {
            data: 'presentProvision',
            name: 'presentProvision'
          }, 
          {
            data: 'proposedRevision',
            name: 'proposedRevision'
          }, 
          {
            data: 'proposedProvision',
            name: 'proposedProvision'
          }, 
          {
            data: 'rationale',
            name: 'rationale'
          }, 
          {
            data: 'question',
            name: 'question'
          }, 
          {
            'data': null,
            'render': function (data) {
                var x = "";
                x = 
                        "<button class='btn btn-success btn-sm editAmendment' value='" + data.id + "'> " +
                        "  Edit " +
                        "</button> " ;
                    
                return "<center>"+ x + "</center>";
            }
          },
      ],
    });
  
    $('#amendmentTable').on('click','.editAmendment',function(){

      if(isValid())
      {
        swal({ title:"Unable to Edit!", text: "Please choose voting period", type: "info", buttonsStyling: false, confirmButtonClass: "btn btn-success"})
        return;
      }

      var id = this.value;
  
      $.ajax({
          type: "GET",
          url: "{{ route('amendment.edit') }}",
          data: { id : id },
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
  
            if(data.id)
            {
              $('#id').val(data.id);
              $("#selectVotingPeriod2").prop('disabled', true);

            //  $('#votingPeriodID').val(data.votingPeriodID);

              $('#amendmentNo').val(data.amendmentNo);
              $('#articleDetails').val(data.articleDetails);
              $('#presentProvision').val(data.presentProvision);
              $('#proposedRevision').val(data.proposedRevision);
              $('#proposedProvision').val(data.proposedProvision);
              $('#rationale').val(data.rationale);
              $('#question').val(data.question);
              
              $('#btnSaveAmendment').removeClass('d-block').addClass('d-none');
              $('#btnUpdateAmendment').removeClass('d-none').addClass('d-block');
              $('#btnRemoveAmendment').removeClass('d-none').addClass('d-block');
  
              $('#modalAmendment').modal('show');
            } 
            else 
            {
              swal({ title: "Unable to Edit", text: "Please try again later.", type: "error", buttonsStyling: false, confirmButtonClass: "btn btn-success"})
            }
          }
      });   
    });

    function isValid()
    {
      var votingPeriod = $('#selectVotingPeriod').select2('data');
      var isValid = false;
      try 
      {
        var votingPeriodID = votingPeriod[0].id;
        if(votingPeriodID == null || votingPeriodID == "" )
        {
          return true;
        }
      } catch (ex)
      {
          return true;
      }

      return false;
    }
  
    
    $(document).on("click", "#addAmendment", function (e) {

      if(isValid())
      {
        swal({ title:"Unable to Add!", text: "Please choose voting period", type: "info", buttonsStyling: false, confirmButtonClass: "btn btn-success"})
        return;
      }

      $('#id').val("0");
      $('#votingPeriodID').val("");
      $('#amendmentNo').val("");
      $('#articleDetails').val("");
      $('#presentProvision').val("");
      $('#proposedRevision').val("");
      $('#proposedProvision').val("");
      $('#rationale').val("");
      $('#question').val("");

      $('#btnSaveAmendment').removeClass('d-none').addClass('d-block');
      $('#btnUpdateAmendment').removeClass('d-block').addClass('d-none');
      $('#btnRemoveAmendment').removeClass('d-block').addClass('d-none');

      $('#modalAmendment').modal('show');
      $('#modalAmendment').focus();
        
    });
    
    $(document).on("click", "#btnSaveAmendment", function (e) {
      
        $('#amendmentForm').attr('action', 'Saving');
        validateAmendmentForm();
    });
    
    $(document).on("click", "#btnUpdateAmendment", function (e) {
        $('#amendmentForm').attr('action', 'Updating');
        validateAmendmentForm();
    });
  
    $("#amendmentForm").on("click", ".removeAmendment", function (e) {
        swal({
            title: 'Remove amendment!',
            text: "Are you sure?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm'
        }).then((result) => {
            if (result.value) {
              var id = $("#id").val();
              
              $.ajax({
                  type: "GET",
                  url: "{{ route('amendment.delete') }}",
                  data: { id : id},
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
                        swal({ title:"Successfully Remove!", text: "You remove amendment!", type: "success", buttonsStyling: false, confirmButtonClass: "btn btn-success"})
  
                        var amendmentTable = $('#amendmentTable').DataTable();
                        amendmentTable.ajax.reload();  
  
                        $('#modalAmendment').modal('hide');
                      }
                  }
              });   
            } 
        });
    }); 
  
    $("#amendmentForm").bind("invalid-form.validate", function () {
        // Do something useful e.g. display the Validation Summary in a popup dialog
    });
  
    $('#amendmentForm').submit(function (evt) {
        evt.preventDefault(); //prevents the default action
    });
  });
  
  function validateAmendmentForm(action)
  {
    var isRequired = false
    if("Saving" == $('#amendmentForm').attr('action'))
    {
      isRequired = true;
    }
  $("#amendmentForm").validate({
    ignore: 'input[type=hidden]',
    rules:{     
        'votingPeriodID':{
            required: true
        },   
        'amendmentNo':{
            required: true
        },   
        'articleDetails':{
            required: true
        },   
        'presentProvision':{
            required: true
        },  
        'proposedRevision':{
            required: true
        },  
        'proposedProvision':{
            required: true
        },  
        'rationale':{
            required: true
        },  
        'question':{
            required: true
        },              
    },
    submitHandler: function(form){
      var id = $("#id").val();
      var selectVotingPeriod2 = $('#selectVotingPeriod2').select2('data');
      var votingPeriodID = selectVotingPeriod2[0].id;
     // var votingPeriodID = $("#votingPeriodID").val();
      var amendmentNo = $("#amendmentNo").val();
      var articleDetails = $("#articleDetails").val();
      var presentProvision = $("#presentProvision").val();
      var proposedRevision = $("#proposedRevision").val();
      var proposedProvision = $("#proposedProvision").val();
      var rationale = $("#rationale").val();
      var question = $("#question").val();
   
      let formData = new FormData(document.getElementById("amendmentForm"));
      formData.append('isAdding', isRequired);
      formData.append('votingPeriodID', votingPeriodID);
      formData.append('amendmentNo', amendmentNo);
      formData.append('articleDetails', articleDetails);
      formData.append('presentProvision', presentProvision); 
      formData.append('proposedRevision', proposedRevision);
      formData.append('proposedProvision', proposedProvision);
      formData.append('rationale', rationale);
      formData.append('question', question); 
    
      if("Saving" ==  $('#amendmentForm').attr('action'))
      { 
        $.ajax({
            type: "post",
            url: "{{ route('amendment.add') }}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend:  function() {
                swal({ title: 'Loading..', onOpen: () => swal.showLoading(), allowOutsideClick: () => !swal.isLoading() });
            },
            error: function (jqXHR, exception) {
                swal.close();
                
                console.log(jqXHR.responseText);
                swal({ title: "Error " + jqXHR.status, text: "Please try again later.", type: "error", buttonsStyling: false, confirmButtonClass: "btn btn-success"})
            },
            success: function (data) {
               console.log(data);
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
                  swal({ title:"Successfully Saved!", text: "You add new amendment!", type: "success", buttonsStyling: false, confirmButtonClass: "btn btn-success"})
  
                  var amendmentTable = $('#amendmentTable').DataTable();
                  amendmentTable.ajax.reload();  
  
                  $('#modalAmendment').modal('hide');
                }
            }
        });    
      } 
      else 
      {
        $.ajax({
            type: "post",
            url: "{{ route('amendment.update') }}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
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
                  swal({ title:"Successfully Update!", text: "You update amendment!", type: "success", buttonsStyling: false, confirmButtonClass: "btn btn-success"})
  
                  var amendmentTable = $('#amendmentTable').DataTable();
                  amendmentTable.ajax.reload();  
  
                  $('#modalAmendment').modal('hide');
                }
            }
        });  
      }
     
      return false;
    
    }
  });
} //function validateAmendmentForm(action)  


  </script>

@endsection
<!--   Script Plugins -->


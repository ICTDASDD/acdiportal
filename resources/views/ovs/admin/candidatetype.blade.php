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
                <h4 class="card-title">Candidate Type</h4>
              </div>
              <div class="card-body">
                <div class="toolbar">
                  <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="material-datatables">
                  <table id="candidateTypeTable" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th style="text-align: center; max-width:250px;">Action</th>
                      </tr>
                    </thead>

                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th style="text-align: center; max-width:250px;">Action</th>
                      </tr>
                    </tfoot>

                    <tbody>

                    </tbody>
                  </table>

                  
                </div>
                
              </div>
              <!-- end content-->
            </div>
            <button id="addCandidateType" class="btn btn-success btn-round" data-toggle="modal" data-target="#modalCandidateType">
              <i class="material-icons">add</i> Add Candidate Type
            </button>

            <div class="modal fade" id="modalCandidateType" tabindex="-1" role="dialog" aria-labelledby="myModalCandidateType" aria-hidden="true">              
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title text-info">Information of Candidate Type</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                      <i class="material-icons">clear</i>
                    </button>
                  </div>
                  
                  <form class="cmxform block-form block-form-default" id="candidateTypeForm" enctype="application/x-www-form-urlencoded" method="POST" action=""  autocomplete="off">

                  <div class="modal-body">
                      <input id="candidateTypeID" class="form-control" type="hidden" name="candidateTypeID" placeholder="Candidate Type ID" disabled />
                          
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <input id="candidateTypeName" class="form-control" type="text" name="candidateTypeName" placeholder="Candidate Type Name" required="true" />
                          </div>
                        </div>
                        <label class="col-sm-3 label-on-right">
                        </label>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button id="btnSaveCandidateType" type="submit" class="col btn btn-round btn-success d-block"> Save </button> 
                    <button id="btnUpdateCandidateType" type="submit" class="col btn btn-round btn-success d-none"> Update </button>
                    <button id="btnRemoveCandidateType" type="button" class="col btn btn-round  btn-danger d-none removeCandidateType"> Remove </button>
                    <button type="button" class="col btn btn-round btn-secondary" data-dismiss="modal"> Cancel </button>
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
  var candidateTypeTable = $('#candidateTypeTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('candidateType.list') }}",
    columns: [
        {
          data: 'candidateTypeID',
          name: 'candidateTypeID'
        },
        {
          data: 'candidateTypeName',
          name: 'candidateTypeName'
        },
        {
          'data': null,
          'render': function (data) {
              var x = "";
              x = 
                      "<button class='btn btn-success btn-sm editCandidateType' value='" + data.candidateTypeID + "'> " +
                      "  Edit " +
                      "</button> " ;
                  
              return "<center>"+ x + "</center>";
          }
        },
    ]
  });

  $('#candidateTypeTable').on('click','.editCandidateType',function(){
    var candidateTypeID = this.value;

    $.ajax({
        type: "GET",
        url: "{{ route('candidateType.edit') }}",
        data: { candidateTypeID : candidateTypeID },
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

          if(data.candidateTypeID)
          {
            $('#candidateTypeID').val(data.candidateTypeID);
            $('#candidateTypeName').val(data.candidateTypeName);
          
            $('#btnSaveCandidateType').removeClass('d-block').addClass('d-none');
            $('#btnUpdateCandidateType').removeClass('d-none').addClass('d-block');
            $('#btnRemoveCandidateType').removeClass('d-none').addClass('d-block');

            $('#modalCandidateType').modal('show');
          } 
          else 
          {
            swal({ title: "Unable to Edit", text: "Please try again later.", type: "error", buttonsStyling: false, confirmButtonClass: "btn btn-success"})
          }
        }
    });   
  });

  $(document).on("click", "#addCandidateType", function (e) {
      $('#candidateTypeID').val("0");
      $('#candidateTypeName').val("");  
      $('#btnSaveCandidateType').removeClass('d-none').addClass('d-block');
      $('#btnUpdateCandidateType').removeClass('d-block').addClass('d-none');
      $('#btnRemoveCandidateType').removeClass('d-block').addClass('d-none');
  });
  
  $(document).on("click", "#btnSaveCandidateType", function (e) {
      $('#candidateTypeForm').attr('action', 'Saving');
      validateCandidateTypeForm();
  });
  
  $(document).on("click", "#btnUpdateCandidateType", function (e) {

      $('#candidateTypeForm').attr('action', 'Updating');
      validateCandidateTypeForm();
  });

  $("#candidateTypeForm").on("click", ".removeCandidateType", function (e) {
      swal({
          title: 'Remove Candidate Type!',
          text: "Are you sure?",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Confirm'
      }).then((result) => {
          if (result.value) {
            var candidateTypeID = $("#candidateTypeID").val();
            
            $.ajax({
                type: "GET",
                url: "{{ route('candidateType.delete') }}",
                data: { candidateTypeID : candidateTypeID},
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
                      swal({ title:"Successfully Remove!", text: "You remove candidate type!", type: "success", buttonsStyling: false, confirmButtonClass: "btn btn-success"})

                      candidateTypeTable.ajax.reload();  

                      $('#modalCandidateType').modal('hide');
                    }
                }
            });   
          } 
      });
  });

  $("#candidateTypeForm").bind("invalid-form.validate", function () {
      // Do something useful e.g. display the Validation Summary in a popup dialog
  });

  $('#candidateTypeForm').submit(function (evt) {
      evt.preventDefault(); //prevents the default action
  });
});

function validateCandidateTypeForm(action)
{
$("#candidateTypeForm").validate({
  ignore: 'input[type=hidden]',
  rules:{    
      'candidateTypeName':{
          required: true
      },      
  },
  submitHandler: function(form){
    var candidateTypeID = $("#candidateTypeID").val();
    var candidateTypeName = $("#candidateTypeName").val();

    if("Saving" ==  $('#candidateTypeForm').attr('action'))
    {
      $.ajax({
          type: "GET",
          url: "{{ route('candidateType.add') }}",
          data: { 
            candidateTypeName : candidateTypeName,
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
                swal({ title:"Successfully Saved!", text: "You add new candidate type!", type: "success", buttonsStyling: false, confirmButtonClass: "btn btn-success"})

                var candidateTypeTable = $('#candidateTypeTable').DataTable();
                candidateTypeTable.ajax.reload();  

                $('#modalCandidateType').modal('hide');
              }
          }
      });    
    } 
    else 
    {
       
      $.ajax({
          type: "GET",
          url: "{{ route('candidateType.update') }}",
          data: { 
            candidateTypeID : candidateTypeID,
            candidateTypeName : candidateTypeName,
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
                swal({ title:"Successfully Update!", text: "You update candidate type!", type: "success", buttonsStyling: false, confirmButtonClass: "btn btn-success"})

                var candidateTypeTable = $('#candidateTypeTable').DataTable();
                candidateTypeTable.ajax.reload();  

                $('#modalCandidateType').modal('hide');
              }
          }
      });  
    }

    return false;
  }
});
}
</script>
@endsection

<!--   Script Plugins -->

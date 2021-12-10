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
                      <h4 class="card-title">Candidate List  
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
                  <table id="candidateTable" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                    <thead>
                      <tr>                       
                        <th style="text-align: center">Name</th>
                        <th style="text-align: center">Information 1</th>                            
                        <th style="text-align: center">Information 2</th>
                        {{-- <th style="text-align: right; max-width:250px;">Action</th> --}}
                      </tr>
                    </thead>

                    <tfoot>
                      <tr>
                        <th style="text-align: center">Name</th>
                        <th style="text-align: center">Information 1</th>                            
                        <th style="text-align: center">Information 2</th>                        
                        {{-- <th style="text-align: right; max-width:250px;">Action</th> --}}
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
let fileNameFromEdit = "";

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

    candidateTable.ajax.reload();  
  });

  var votingPeriodSelect2modal = $('#selectVotingPeriod2').select2({
    placeholder: "Choose year",
    dropdownParent: "#modalCandidate", //UNCOMMENT WHEN IN MODAL
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
    //candidateTable.ajax.reload();  
  });

  //DEFAULT SELECTED VALUE IN SELECT2
  //$('#selectVotingPeriod').select2().select2('val', $('.select2 option:eq(1)').val());

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
    dom: 'Bfrtip',
					buttons: [
						'copy', 'csv', 'excel', 'pdf', 'print'
					],
    processing: true,
    serverSide: true,
    cache: false,
    ajax: {
        url: "{{ route('candidate.list') }}",
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
          data: 'information1',
          name: 'information1'
        },
        {
          data: 'information2',
          name: 'information2'
        }, 
        // {
        //   'data': null,
        //   'render': function (data) {
        //       var x = "";
        //       x = 
        //               "<button class='btn btn-success btn-sm editCandidate' value='" + data.candidateID + "'> " +
        //               "  Edit " +
        //               "</button> " ;
                  
        //       return "<center>"+ x + "</center>";
        //   }
        // },
    ],
  });

  $('#candidateTable').on('click','.editCandidate',function(){
    if(isValid())
    {
      swal({ title:"Unable to Edit!", text: "Please choose voting period", type: "info", buttonsStyling: false, confirmButtonClass: "btn btn-success"})
      return;
    }

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
            
            $('#profilePicture').prop('required',false);

            $("#removeProfilePicture").trigger("click");
            $("#previewProfilePicture").attr("src","{{ asset('material/img/candidate/')}}/" + data.profilePicture);
            fileNameFromEdit = data.profilePicture;
            $("#selectVotingPeriod2").prop('disabled', true);
            
            //$("#profilePicture").val(data.profilePicture);

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
  
  $(document).on("click", "#addCandidate", function (e) {
      
      if(isValid())
      {
        swal({ title:"Unable to Add!", text: "Please choose voting period", type: "info", buttonsStyling: false, confirmButtonClass: "btn btn-success"})
        return;
      }

      $('#profilePicture').prop('required',true);
      $('#selectVotingPeriod2').prop('disabled', false);

      $('#removeProfilePicture').trigger('click');
      //$('#profilePicture').val("0");
      $('#candidateID').val("0");
      
      fileNameFromEdit = "";

      $('#candidateTypeID').val("");
      $('#lastName').val("");
      $('#firstName').val("");
      $('#middleName').val("");
      $('#info1').val("");
      $('#info2').val("");
            
      $('#btnSaveCandidate').removeClass('d-none').addClass('d-block');
      $('#btnUpdateCandidate').removeClass('d-block').addClass('d-none');
      $('#btnRemoveCandidate').removeClass('d-block').addClass('d-none');
      
      $('#modalCandidate').modal('show');
      $('#modalCandidate').focus();
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
                data: { candidateID : candidateID, fileNameFromEdit : fileNameFromEdit},
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
  var isRequired = false
  if("Saving" == $('#candidateForm').attr('action'))
  {
    isRequired = true;
  }

  $("#candidateForm").validate({
    ignore: 'input[type=hidden]',
    rules:{    
      /*'profilePicture':{
          required: isRequired, 
          accept: "image/jpeg, image/pjpeg"
      },
      */
      'selectVotingPeriod2':{
          required: true
      },  
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
  errorPlacement: function (error, element) {
    var name = $(element).attr("id");
      if(name == "profilePicture")
      {
        error.addClass("text-danger");
        error.appendTo($("#" + name + "_validate"));
      } else 
      {
        error.insertAfter(element); 
      }
  },  
  submitHandler: function(form){

    var candidateID = $("#candidateID").val();

    var votingPeriod = $('#selectVotingPeriod2').select2('data');
    var votingPeriodIDD = votingPeriod[0].id;

    var candidateType = $('#candidateTypeID').select2('data');
    var candidateTypeID = candidateType[0].id;
    var lastName = $("#lastName").val();
    var firstName = $("#firstName").val();
    var middleName = $("#middleName").val();
    var info1 = $("#info1").val();
    var info2 = $("#info2").val();

    let formData = new FormData(document.getElementById("candidateForm"));
    formData.append('isAdding', isRequired);
    //formData.append('filename', filename);
    formData.append('fileNameFromEdit', fileNameFromEdit);
    formData.append('votingPeriodID', votingPeriodIDD);
    formData.append('candidateTypeID', candidateTypeID);
    formData.append('information1', info1);
    formData.append('information2', info2);

    if("Saving" ==  $('#candidateForm').attr('action'))
    {
         
      $.ajax({
          type: "post",
          url: "{{ route('candidate.add') }}",
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
          type: "POST",
          url: "{{ route('candidate.update') }}",
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
                swal({ title:"Successfully Update!", text: "You update candidate!", type: "success", buttonsStyling: false, confirmButtonClass: "btn btn-success"})

                var candidateTable = $('#candidateTable').DataTable();
                candidateTable.ajax.reload();  

                $('#modalCandidate').modal('hide');
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
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
                <h4 class="card-title">Candidate for SAGA 2022</h4>
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
<!--
                      <tr>
                        <td style="text-align: center" ><img src="{{ asset('material/img/candidate/candidate1.jpg')}}" style="max-width: 50px;"/></td>
                        <td style="text-align: center">BGEN Candidate N. One (RET)</td>                            
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center" class="text-success">Board of Director</td>
                        <td style="text-align: right; max-width:250px;">
                          <a href="">
                            <button class="btn btn-success btn-sm">
                              Update
                            </button>
                          </a>
                          <a href="">
                            <button class="btn btn-danger btn-sm">
                              Disable
                            </button>
                          </a>
                        </td>
                      </tr>
                      
                      <tr>
                        <td style="text-align: center" ><img src="{{ asset('material/img/candidate/candidate2.jpg')}}" style="max-width: 50px;"/></td>
                        <td style="text-align: center">BGEN Candidate N. Two (RET)</td>                            
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center" class="text-success">Board of Director</td>
                        <td style="text-align: right; max-width:250px;">
                          <a href="">
                            <button class="btn btn-success btn-sm">
                              Update
                            </button>
                          </a>
                          <a href="">
                            <button class="btn btn-danger btn-sm">
                              Disable
                            </button>
                          </a>
                        </td>
                      </tr> 

                      <tr>
                        <td style="text-align: center" ><img src="{{ asset('material/img/candidate/candidate3.jpg')}}" style="max-width: 50px;"/></td>
                        <td style="text-align: center">BGEN Candidate N. Three (RET)</td>                            
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center" class="text-success">Board of Director</td>
                        <td style="text-align: right; max-width:250px;">
                          <a href="">
                            <button class="btn btn-success btn-sm">
                              Update
                            </button>
                          </a>
                          <a href="">
                            <button class="btn btn-danger btn-sm">
                              Disable
                            </button>
                          </a>
                        </td>
                      </tr> 

                      <tr>
                        <td style="text-align: center" ><img src="{{ asset('material/img/candidate/candidate4.jpg')}}" style="max-width: 50px;"/></td>
                        <td style="text-align: center">BGEN Candidate N. Four (RET)</td>                            
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center" class="text-success">Board of Director</td>
                        <td style="text-align: right; max-width:250px;">
                          <a href="">
                            <button class="btn btn-success btn-sm">
                              Update
                            </button>
                          </a>
                          <a href="">
                            <button class="btn btn-danger btn-sm">
                              Disable
                            </button>
                          </a>
                        </td>
                      </tr>
                      
                      
                      <tr>
                        <td style="text-align: center" ><img src="{{ asset('material/img/candidate/candidate5.jpg')}}" style="max-width: 50px;"/></td>
                        <td style="text-align: center">BGEN Candidate N. Five (RET)</td>                            
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center" class="text-success">Board of Director</td>
                        <td style="text-align: right; max-width:250px;">
                          <a href="">
                            <button class="btn btn-success btn-sm">
                              Update
                            </button>
                          </a>
                          <a href="">
                            <button class="btn btn-danger btn-sm">
                              Disable
                            </button>
                          </a>
                        </td>
                      </tr>

                      <tr>
                        <td style="text-align: center" ><img src="{{ asset('material/img/candidate/candidate6.jpg')}}" style="max-width: 50px;"/></td>
                        <td style="text-align: center">BGEN Candidate N. Six (RET)</td>                            
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center" class="text-success">Board of Director</td>
                        <td style="text-align: right; max-width:250px;">
                          <a href="">
                            <button class="btn btn-success btn-sm">
                              Update
                            </button>
                          </a>
                          <a href="">
                            <button class="btn btn-danger btn-sm">
                              Disable
                            </button>
                          </a>
                        </td>
                      </tr>

                      <tr>
                        <td style="text-align: center" ><img src="{{ asset('material/img/candidate/candidate7.jpg')}}" style="max-width: 50px;"/></td>
                        <td style="text-align: center">BGEN Candidate N. Seven (RET)</td>                            
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center" class="text-success">Board of Director</td>
                        <td style="text-align: right; max-width:250px;">
                          <a href="">
                            <button class="btn btn-success btn-sm">
                              Update
                            </button>
                          </a>
                          <a href="">
                            <button class="btn btn-danger btn-sm">
                              Disable
                            </button>
                          </a>
                        </td>
                      </tr>

                      <tr>
                        <td style="text-align: center" ><img src="{{ asset('material/img/candidate/candidate8.jpg')}}" style="max-width: 50px;"/></td>
                        <td style="text-align: center">BGEN Candidate N. Eight (RET)</td>                            
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center" class="text-success">Board of Director</td>
                        <td style="text-align: right; max-width:250px;">
                          <a href="">
                            <button class="btn btn-success btn-sm">
                              Update
                            </button>
                          </a>
                          <a href="">
                            <button class="btn btn-danger btn-sm">
                              Disable
                            </button>
                          </a>
                        </td>
                      </tr>

                      <tr>
                        <td style="text-align: center" ><img src="{{ asset('material/img/candidate/candidate1.jpg')}}" style="max-width: 50px;"/></td>
                        <td style="text-align: center">BGEN Candidate N. One (RET)</td>                            
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center" class="text-info">Committee</td>
                        <td style="text-align: right; max-width:250px;">
                          <a href="">
                            <button class="btn btn-success btn-sm">
                              Update
                            </button>
                          </a>
                          <a href="">
                            <button class="btn btn-danger btn-sm">
                              Disable
                            </button>
                          </a>
                        </td>
                      </tr>

                      <tr>
                        <td style="text-align: center" ><img src="{{ asset('material/img/candidate/candidate2.jpg')}}" style="max-width: 50px;"/></td>
                        <td style="text-align: center">BGEN Candidate N. Two (RET)</td>                            
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center" class="text-info">Committee</td>
                        <td style="text-align: right; max-width:250px;">
                          <a href="">
                            <button class="btn btn-success btn-sm">
                              Update
                            </button>
                          </a>
                          <a href="">
                            <button class="btn btn-danger btn-sm">
                              Disable
                            </button>
                          </a>
                        </td>
                      </tr>
                    -->
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
                        <div class="col-lg-6 col-md-6 col-sm-6 mx-auto">
                          <select id="candidateFor" class="selectpicker" data-size="7" data-style="btn btn-primary btn-round" title="Candidating for">
                            <option value="Board of Director" class="text-success">Board of Director</option>
                            <option value="Committee" class="text-info">Committee</option>
                          </select>
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
    ]
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
            $('#candidateFor').val(data.candidateFor);
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
        
      $('#candidateFor').val("");
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
      'candidateFor':{
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
    var candidateFor = $("#candidateFor").val();
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
            candidateFor : candidateFor,
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
            candidateFor : candidateFor,
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

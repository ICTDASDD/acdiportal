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
                <h4 class="card-title">User List
                  <button id="addUser" class="btn btn-sm btn-success btn-round" data-toggle="modal" data-target="#modalUser">
                    <i class="material-icons">add</i> Add user
                  </button>
                </h4>
              </div>
              <div class="card-body">
                <div class="toolbar">
                  <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="material-datatables">
                  <table id="userTable" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                    <thead>
                      <tr>
                        <th style="text-align: center">Picture</th>
                        <th style="text-align: center">Name</th>
                        <th style="text-align: center">Branch Registered</th>                            
                        <th style="text-align: center">User Type</th>
                        <th style="text-align: center">Email</th>
                        <th style="text-align: center;">Employee ID</th>
                        <th style="text-align: center; max-width:250px;">Action</th>
                      </tr>
                    </thead>

                    <tfoot>
                      <tr>
                        <th style="text-align: center">Picture</th>
                        <th style="text-align: center">Name</th>
                        <th style="text-align: center">Branch Registered</th>                            
                        <th style="text-align: center">User Type</th>
                        <th style="text-align: center">Email</th>
                        <th style="text-align: center;">Employee ID</th>
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

            <div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="myModalUser" aria-hidden="true">                   
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title text-info">Information of User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                      <i class="material-icons">clear</i>
                    </button>
                  </div>
                  
                 <!-- <form class="cmxform block-form block-form-default" id="userForm" enctype="application/x-www-form-urlencoded" method="POST" action=""  autocomplete="off"> -->
                  <form class="cmxform block-form block-form-default" id="userForm" enctype="multipart/form-data" method="POST" action=""  autocomplete="off">
                  @csrf <!-- {{ csrf_field() }} -->
                  <div class="modal-body">

                      <div class="card-body col-lg-5 mx-auto">
                        <div class="fileinput text-center fileinput-new" data-provides="fileinput">
                          <div class="fileinput-new thumbnail img-circle">
                            <img id="previewProfilePicture" src="{{ asset('material/img/placeholder.jpg')}}"  alt="...">
                          </div>
                          <div class="fileinput-preview fileinput-exists thumbnail img-circle" style=""></div>
                          <div>
                            <span class="btn btn-round btn-rose btn-file">
                              <span class="fileinput-new">Add Photo</span>
                              <span class="fileinput-exists">Change</span>
                              <input type="hidden" value="" name="..."><input id="avatar" type="file" name="avatar" required="true">
                            <div class="ripple-container"></div></span>
                            <br>
                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput" id="removeProfilePicture"><i class="fa fa-times"></i> Remove<div class="ripple-container"><div class="ripple-decorator ripple-on ripple-out" style="left: 59.0156px; top: 31.6094px; background-color: rgb(255, 255, 255); transform: scale(15.5098);"></div></div></a>
                          </div>
                          
                          <div id="avatar_validate" class="text-danger"></div>
                        </div>
                      </div> 

                      <input type="hidden" name="id" id="id" value="" />

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                            <select id="brCode" class ="form-control" style="width: 100%"  required="true">
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                            <select id="role_id" class="form-control" style="width: 100%"  required="true" placeholder="User Type">
                              <option value="" disabled selected>Select User Type</option>
                              <option value="16">ICTD</option>
                              <option value="17">ELECOM</option>
                              <option value="18">CANVASSING</option>
                              <option value="20">BRANCH OFFICER</option>                              
                              <option value="19">Branch-Machine</option>
                            </select>
                          </div>
                        </div>
                      </div>


                      <div class="row">

                        <div class="col-sm-4">
                          <div class="form-group">
                            <input id="lname" class="form-control" type="text" name="lname" placeholder="Last Name" required="true" />
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <input id="name" class="form-control" type="text" name="name" placeholder="First Name" required="true" />
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <input id="mname" class="form-control" type="text" name="mname" placeholder="Middle Name" required="true" />
                          </div>
                        </div>

                        <div class="col-sm-6">
                          <div class="form-group">
                            <input id="emp_id" class="form-control" type="text" name="emp_id" placeholder="Emp ID (ex. 1-****)" required="true" />
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <input id="email" class="form-control" type="email" name="email" placeholder="Email" required="true" />
                          </div>
                        </div>

                        <div class="col-sm-6">
                          <div class="form-group">
                            <input id="password" class="form-control" type="password" name="password" placeholder="Password" required="true" />
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <input id="repassword" class="form-control" type="password" name="repassword" placeholder="Re-Type Password" required="true" />
                          </div>
                        </div>
                        
                      </div>

                    
                  </div>
                  <div class="modal-footer">
                    <button id="btnSaveUser" type="submit" class="col btn btn-round btn-success d-block btn-sm">  Save </button> 
                    <button id="btnUpdateUser" type="submit" class="col btn btn-round btn-success d-none btn-sm"> Update </button>
                    <button id="btnRemoveUser" type="button" class="col btn btn-round  btn-danger d-none removeUser btn-sm">Delete</button>
                    <button type="button" class="col btn btn-round btn-danger btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
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
  let fileNameFromEdit = "";

  $(document).ready(function() {

   $('#role_id').select2();

    var branchSelect2 = $('#brCode').select2({
    placeholder: "Branch of Operation",
    dropdownParent: "#modalUser" ,
    minimumInputLength: -1,
    allowClear: true,
    ajax: {
        url: "{{ route('users.select2') }}",
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

    var userTable = $('#userTable').DataTable({
      processing: true,
      serverSide: true,
      cache: false,
      ajax: {
            url: "{{ route('users.list') }}",
            type: "POST"
      },
      columns: [
        {
          'data': null,
          'render': function (data) 
          {
              var x = "";
              x = data.avatar;
              var link = "{{ asset('material/img/user/')}}";
              var timestamp = new Date().getTime();     
              x = "<center><img src='"+ link + "/" + data.avatar + "?t=" + timestamp + "' style='max-width: 50px;'/></center>";
              return x;
        }},
          {
            data: 'fullName',
            name: 'fullName'
          },
          {
            data: 'brName',
            name: 'brName'
          },
          {
            data: 'description',
            name: 'description'
          }, 
          {
            data: 'email',
            name: 'email'
          },
          {
            data: 'emp_id',
            name: 'emp_id'
          },
          {
            'data': null,
            'render': function (data) {
                var x = "";
                x = 
                        "<button class='btn btn-success btn-sm editUser' value='" + data.id + "'> " +
                        "  Edit " +
                        "</button> " ;
                    
                return "<center>"+ x + "</center>";
            }
          },
      ]
    });
  
  $('#userTable').on('click','.editUser',function(){
      var id = this.value;
  
      $.ajax({
          type: "GET",
          url: "{{ route('users.edit') }}",
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

              $('#avatar').prop('required',false);
              $("#removeProfilePicture").trigger("click");
              $("#previewProfilePicture").attr("src","{{ asset('material/img/user/')}}/" + data.avatar);
              fileNameFromEdit = data.avatar;

              var $option = $("<option selected></option>").val(data.brCode).text(data.brName);
            $('#brCode').append($option).trigger('change');

            $('#description').val(data.description);
            $('#name').val(data.name);
            $('#mname').val(data.mname);
            $('#lname').val(data.lname);
            $('#emp_id').val(data.emp_id);
            $('#email').val(data.email);
             // $('#password]').val(data.password);
              
              $('#btnSaveUser').removeClass('d-block').addClass('d-none');
              $('#btnUpdateUser').removeClass('d-none').addClass('d-block');
              $('#btnRemoveUser').removeClass('d-none').addClass('d-block');
  
              $('#modalUser').modal('show');
            } 
            else 
            {
              swal({ title: "Unable to Edit", text: "Please try again later.", type: "error", buttonsStyling: false, confirmButtonClass: "btn btn-success"})
            }
          }
      });   
    });
  
    
    $(document).on("click", "#addUser", function (e) {

      $('#avatar').prop('required',true);

      $('#removeProfilePicture').trigger('click');

        $('#id').val("0");

        fileNameFromEdit = "";

        $('#brCode').val("");
        $('#name').val("");
        $('#mname').val("");
        $('#lname').val("");
        $('#emp_id').val("");
        $('#email').val("");
        $('#password').val("");

        $('role_id').val("");
      

        $('#btnSaveUser').removeClass('d-none').addClass('d-block');
        $('#btnUpdateUser').removeClass('d-block').addClass('d-none');
        $('#btnRemoveUser').removeClass('d-block').addClass('d-none');

        $('#modalUser').modal('show');
        $('#modalUser').focus();
        
    });
    
    $(document).on("click", "#btnSaveUser", function (e) {
      
        $('#userForm').attr('action', 'Saving');
        validateUserForm();
    });
    
    $(document).on("click", "#btnUpdateUser", function (e) {
        $('#userForm').attr('action', 'Updating');
        validateUserForm();
    });
  
    $("#userForm").on("click", ".removeUser", function (e) {
        swal({
            title: 'Remove User!',
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
                  url: "{{ route('users.delete') }}",
                  data: { id : id, fileNameFromEdit : fileNameFromEdit},
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
                        swal({ title:"Successfully Remove!", text: "You remove user!", type: "success", buttonsStyling: false, confirmButtonClass: "btn btn-success"})
  
                        var userTable = $('#userTable').DataTable();
                        userTable.ajax.reload();  
  
                        $('#modalUser').modal('hide');
                      }
                  }
              });   
            } 
        });
    }); 
  
    $("#userForm").bind("invalid-form.validate", function () {
        // Do something useful e.g. display the Validation Summary in a popup dialog
    });
  
    $('#userForm').submit(function (evt) {
        evt.preventDefault(); //prevents the default action
    });
  });
  
  function validateUserForm(action)
  {
    var isRequired = false
    if("Saving" == $('#userForm').attr('action'))
    {
      isRequired = true;
    }
  $("#userForm").validate({
    ignore: 'input[type=hidden]',
    rules:{    
      'id':{
            required: true
        }, 
        'brCode':{
            required: true
        },   
        'name':{
            required: true
        },   
        'mname':{
            required: true
        },   
        'lname':{
            required: true
        },   
        'emp_id':{
            required: true
        },   
        'email':{
            required: true
        }, 
        'password':{
            required: true
        },             
    },
    errorPlacement: function (error, element) {
    var name = $(element).attr("id");
      if(name == "avatar")
      {
        error.addClass("text-danger");
        error.appendTo($("#" + name + "_validate"));
      } else 
      {
        error.insertAfter(element); 
      }
  },  
    submitHandler: function(form){
      var id = $("#id").val();
      var brSelect2 = $('#brCode').select2('data');
      var brCode = brSelect2[0].id;
      var name = $("#name").val();
      var mname = $("#mname").val();
      var lname = $("#lname").val();
      var emp_id = $("#emp_id").val();
      var email = $("#email").val();
      var password = $("#password").val();
      var role_id = $("#role_id").val();

      let formData = new FormData(document.getElementById("userForm"));
    formData.append('isAdding', isRequired);
    formData.append('fileNameFromEdit', fileNameFromEdit);
    formData.append('brCode', brCode);
    formData.append('emp_id', emp_id);
    formData.append('email', email);
    formData.append('password', password);
    formData.append('role_id', role_id);
    
  
      if("Saving" ==  $('#userForm').attr('action'))
      {
           
        $.ajax({
            type: "post",
            url: "{{ route('users.add') }}",
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
                  swal({ title:"Successfully Saved!", text: "You add new user!", type: "success", buttonsStyling: false, confirmButtonClass: "btn btn-success"})
  
                  var userTable = $('#userTable').DataTable();
                  userTable.ajax.reload();  
  
                  $('#modalUser').modal('hide');
                }
            }
        });    
      } 
      else 
      {
        $.ajax({
            type: "post",
            url: "{{ route('users.update') }}",
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
                  swal({ title:"Successfully Update!", text: "You update user!", type: "success", buttonsStyling: false, confirmButtonClass: "btn btn-success"})
  
                  var userTable = $('#userTable').DataTable();
                  userTable.ajax.reload();  
  
                  $('#modalUser').modal('hide');
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
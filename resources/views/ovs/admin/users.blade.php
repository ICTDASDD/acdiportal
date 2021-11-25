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
                <h4 class="card-title">User List</h4>
              </div>
              <div class="card-body">
                <div class="toolbar">
                  <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="material-datatables">
                  <table id="userTable" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                    <thead>
                      <tr>
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
            <button id="addUser" class="btn btn-success btn-round" data-toggle="modal" data-target="#modalUser">
              <i class="material-icons">add</i> Add user
            </button>

            <div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="myModalUser" aria-hidden="true">                   
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title text-info">Information of User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                      <i class="material-icons">clear</i>
                    </button>
                  </div>
                  
                  <form class="cmxform block-form block-form-default" id="userForm" enctype="application/x-www-form-urlencoded" method="POST" action=""  autocomplete="off">

                  <div class="modal-body">

                      <input type="hidden" name="id" id="id" value="" />
                    

                      <div class="card-body col-lg-4 mx-auto">
                        <div class="fileinput text-center fileinput-new" data-provides="fileinput">
                          <div class="fileinput-new thumbnail img-circle">
                            <img src="{{ asset('material/img/placeholder.jpg')}}"  alt="...">
                          </div>
                          <div class="fileinput-preview fileinput-exists thumbnail img-circle" style=""></div>
                          <div>
                            <span class="btn btn-round btn-rose btn-file btn-sm" >
                              <span class="fileinput-new">Add Photo</span>
                              <span class="fileinput-exists">Change</span>
                              <input type="hidden" value="" name="..."><input type="file" name="">
                            <div class="ripple-container"></div></span>
                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists btn-sm" data-dismiss="fileinput">Remove<div class="ripple-container"><div class="ripple-decorator ripple-on ripple-out" style="left: 59.0156px; top: 31.6094px; background-color: rgb(255, 255, 255); transform: scale(15.5098);"></div></div></a>
                          </div>
                        </div>
                      </div>

                      
                      <div class="row">


                        <div class="col-sm-6">
                          <select id="branch_of_operation" class="selectpicker" data-size="7" data-style="btn btn-primary btn-round btn-sm" title="Branch of Operation">
                            <option value="TEST BRANCH" class="text-success">TEST BRANCH</option>
                          </select>
                        </div>

                        <div class="col-sm-6">
                          <select id="role_id" class="selectpicker" data-size="7" data-style="btn btn-primary btn-round btn-sm" title="User Type">
                            <option value="16">ICTD (VOTING)</option>
                            <option value="17">ELECOM (VOTING)</option>
                            <option value="18">CANVASSING (VOTING)</option>
                            <option value="19">Gen. Public (VOTING)</option>
                            <option value="20">Branch Office (VOTING)</option>
                          </select>
                        </div>


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
  $(document).ready(function() {
    var userTable = $('#userTable').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('users.list') }}",
      columns: [
          {
            data: 'name',
            name: 'name'
          },
          {
            data: 'branch_of_operation',
            name: 'branch_of_operation'
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
           //   $('#branch_of_operation').val(data.branch_of_operation);
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
        $('#id').val("0");
        $('#branch_of_operation').val("");
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
  $("#userForm").validate({
    ignore: 'input[type=hidden]',
    rules:{    
      'id':{
            required: true
        }, 
        'branch_of_operation':{
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
    submitHandler: function(form){
      var id = $("#id").val();
      var branch_of_operation = $("#branch_of_operation").val();
      var name = $("#name").val();
      var mname = $("#mname").val();
      var lname = $("#lname").val();
      var emp_id = $("#emp_id").val();
      var email = $("#email").val();
      var password = $("#password").val();

      var role_id = $("#role_id").val();
    
  
      if("Saving" ==  $('#userForm').attr('action'))
      {
           
        $.ajax({
            type: "GET",
            url: "{{ route('users.add') }}",
            data: { 
              branch_of_operation : branch_of_operation,
              name : name,
              mname  : mname,
              lname  : lname,
              emp_id  : emp_id,
              email  : email,
              password  : password,

              role_id  : role_id,
             
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
            type: "GET",
            url: "{{ route('users.update') }}",
            data: { 
              branch_of_operation : branch_of_operation,
              name : name,
              mname  : mname,
              lname  : lname,
              emp_id  : emp_id,
              email  : email,
              password  : password,

              role_id  : role_id,
            
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
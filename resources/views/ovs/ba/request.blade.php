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
    <!-- End Navbar  -->

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
                    <h4 class="card-title">Request List</h4>
                  </div>
                  <div class="card-body">
                    <div class="toolbar">
                      <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <div class="material-datatables">
                      <table id="requestTable" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                          <tr>
                            <th style="text-align: center">R. Date</th>
                            <th style="text-align: center">R. Branch</th>
                            <th style="text-align: center">User Type</th>
                            <th style="text-align: center">Request Type</th>                            
                            <th style="text-align: center">Request Info</th>
                            <th style="text-align: center">Elecom Status</th>
                            <th style="text-align: center">Canvassing Status</th>
                            <th style="text-align: center">Status</th>
                            <th style="text-align: center">Last Update</th>
                            <th style="text-align: center">Action</th>
                          </tr>
                        </thead>

                        <tfoot>
                          <tr>
                            <th style="text-align: center">R. Date</th>
                            <th style="text-align: center">R. Branch</th>
                            <th style="text-align: center">User Type</th>
                            <th style="text-align: center">Request Type</th>                            
                            <th style="text-align: center">Request Info</th>
                            <th style="text-align: center">Elecom Status</th>
                            <th style="text-align: center">Canvassing Status</th>
                            <th style="text-align: center">Status</th>
                            <th style="text-align: center">Last Update</th>
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
                       
                      <button id="addRequest" class="btn btn-success btn-round" data-toggle="modal" data-target="#modalRequest">
                        <i class="material-icons">add</i> Add Request
                      </button>

                      {{-- ADD REQUEST MODAL --}}
                          <div class="modal fade" id="modalRequest" tabindex="-1" role="dialog" aria-labelledby="myModalRequest" aria-hidden="true">                   
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title text-info">Request Details</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    <i class="material-icons">clear</i>
                                  </button>
                                </div>
                                
                                <form class="cmxform block-form block-form-default" id="requestForm" enctype="application/x-www-form-urlencoded" method="POST" action=""  autocomplete="off">
                                  @CSRF
                                <div class="modal-body">
              
                                    <input type="hidden" name="id" id="id" value="" />
                                  
                                    <div class="row">
              
              
                                      <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                        <select id="request_type" name="request_type" class="selectpicker" data-size="7" data-style="btn btn-primary btn-round btn-sm" title="Request Type">
                                          <option value="Late Registration" >LATE REGISTRATION</option>
                                          <option value="Vote Cancellation" >VOTE CANCELLATION</option>
                                          <option value="TVI" >TVI</option>
                                        </select>
                                      </div>
                                    </div>
              
     
                                      <div class="col-sm-12">
                                        <div class="form-group">
                                          <input id="request_info" class="form-control" type="text" name="request_info" placeholder="Request Info" required="true" />
                                        </div>
                                      </div>

                                    </div>
                                                
                                </div>
                                <div class="modal-footer">
                                  <button id="btnSaveRequest" type="submit" class="col btn btn-round btn-success d-block btn-sm">  Save </button> 
                                  <button id="btnUpdateRequest" type="submit" class="col btn btn-round btn-success d-none btn-sm"> Update </button>
                                  <button id="btnRemoveRequest" type="button" class="col btn btn-round  btn-danger d-none removeRequest btn-sm">Delete</button>
                                  <button type="button" class="col btn btn-round btn-danger btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                                </div>
                                          
                              </form>
                              </div>
                            </div>
                          </div>

                           {{-- VIEW REQUEST MODAL --}}
                           <div class="modal fade" id="modalViewRequest" tabindex="-1" role="dialog" aria-labelledby="myViewModalRequest" aria-hidden="true">                   
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title text-info">Request Details</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    <i class="material-icons">clear</i>
                                  </button>
                                </div>
                                
                                <form class="cmxform block-form block-form-default" id="requestForm" enctype="application/x-www-form-urlencoded" method="POST" action=""  autocomplete="off">
                                  @CSRF
                                <div class="modal-body">
              
                                    <input type="hidden" name="id" id="id" value="" />
                                  
                                    <div class="row">

                                      <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                          <input type="text" class="form-control" name="request_type2" id="request_type2" value="" disabled/>
                                        </div>
                                      </div>

                                      <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                          <input type="text" class="form-control" name="request_info2" id="request_info2" value="" disabled/>
                                        </div>
                                      </div>
              
                                    </div>
                                          
                                </div>
                                <div class="modal-footer">
                                  
                                  <button type="button" class="col btn btn-round btn-danger btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                </div>
                                          
                              </form>
                              </div>
                            </div>
                          </div>


                <!--  end card  -->
              </div>
              <!-- end col-md-12 -->
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

<!--   dashboard Plugins -->
@section('pageplugin')
@include('ovs.ba.layouts.plugins.dplugin')



<script>
  $(document).ready(function() {

    var requestTable = $('#requestTable').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
          url: "{{ route('request.list') }}",
          type: "POST"
      },
      columns: [
          {
            data: 'created_at',
            name: 'created_at'
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
            data: 'request_type',
            name: 'request_type'
          },
          {
            data: 'request_info',
            name: 'request_info'
          },
          {
            data: 'elecom_status2',
            name: 'elecom_status2'
          },
          {
            data: 'canvas_status2',
            name: 'canvas_status2'
          },
          {
            data: 'status2',
            name: 'status2'
          },
          {
            data: 'updated_at',
            name: 'updated_at'
          },
          
          {
            'data': null,
            'render': function (data) {

              if(data.status == 0 && data.elecom_status == 0 && data.canvas_status == 0){
                var x = "";
                x = 
                        "<button class='btn btn-success btn-sm editRequest' value='" + data.id + "'> " +
                        "  Edit " +
                        "</button> "  ;
                    
                return "<center>"+ x + "</center>";
              }

              else {
                var y = "";
            y = 
                    "<button class='btn btn-info btn-sm viewRequest' value='" + data.id + "'> " +
                    "  VIEW " +
                    "</button> " ;

            return "<center>"+ y + "</center>";
              }
            }
          },

         
      ]
    });
  });


  $('#requestTable').on('click','.viewRequest',function(){
  var id = this.value;

  $.ajax({
      type: "GET",
      url: "{{ route('request.view') }}",
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

        //   var $option = $("<option selected></option>").val(data.brCode).text(data.brName);
        // $('#brCode').append($option).trigger('change');

        $('#request_info2').val(data.request_info);
        $('#request_type2').val(data.request_type);
        
        
          $('#btnSaveRequest').removeClass('d-block').addClass('d-none');
          $('#btnUpdateRequest').removeClass('d-none').addClass('d-block');
       
          $('#modalViewRequest').modal('show');
        } 
        else 
        {
          swal({ title: "Unable to View", text: "Please try again later.", type: "error", buttonsStyling: false, confirmButtonClass: "btn btn-success"})
        }
      }
  });   
});

  $('#requestTable').on('click','.editRequest',function(){
      var id = this.value;
  
      $.ajax({
          type: "GET",
          url: "{{ route('request.edit') }}",
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

            //   var $option = $("<option selected></option>").val(data.brCode).text(data.brName);
            // $('#brCode').append($option).trigger('change');

            $('#request_type').val(data.request_type);
            $('#request_info').val(data.request_info);
            
              $('#btnSaveRequest').removeClass('d-block').addClass('d-none');
              $('#btnUpdateRequest').removeClass('d-none').addClass('d-block');
              $('#btnRemoveRequest').removeClass('d-none').addClass('d-block');
  
              $('#modalRequest').modal('show');
            } 
            else 
            {
              swal({ title: "Unable to Edit", text: "Please try again later.", type: "error", buttonsStyling: false, confirmButtonClass: "btn btn-success"})
            }
          }
      });   
    });

    


    $(document).on("click", "#addRequest", function (e) {
        $('#id').val("0");

        $('#request_type').val("");
        $('#request_info').val("");
     
        $('#btnSaveRequest').removeClass('d-none').addClass('d-block');
        $('#btnUpdateRequest').removeClass('d-block').addClass('d-none');
        $('#btnRemoveRequest').removeClass('d-block').addClass('d-none');
        
    });
    
    $(document).on("click", "#btnSaveRequest", function (e) {
      
        $('#requestForm').attr('action', 'Saving');
        validateRequestForm();
    });

    $("#requestForm").on("click", ".removeRequest", function (e) {
        swal({
            title: 'Remove Request!',
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
                  url: "{{ route('request.delete') }}",
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
                        swal({ title:"Successfully Remove!", text: "You remove a request!", type: "success", buttonsStyling: false, confirmButtonClass: "btn btn-success"})
  
                        var requestTable = $('#requestTable').DataTable();
                        requestTable.ajax.reload();  
  
                        $('#modalRequest').modal('hide');
                      }
                  }
              });   
            } 
        });
    }); 


    $(document).on("click", "#btnUpdateRequest", function (e) {
        $('#requestForm').attr('action', 'Updating');
        validateRequestForm();
    });

    

  //   $("#requestForm").bind("invalid-form.validate", function () {
  //       // Do something useful e.g. display the Validation Summary in a popup dialog
  //   });
  
  //   $('#requestForm').submit(function (evt) {
  //       evt.preventDefault(); //prevents the default action
  //   });
  // });
  
  function validateRequestForm(action)
  {
  $("#requestForm").validate({
    ignore: 'input[type=hidden]',
    rules:{    
      'id':{
            required: true
        }, 
        'request_type':{
            required: true
        },   
        'request_info':{
            required: true
        },        
    },
    submitHandler: function(form){
      var id = $("#id").val();
  
      // var brSelect2 = $('#brCode').select2('data');
      // var brCode = brSelect2[0].id;

      var request_type = $("#request_type").val();
      var request_info = $("#request_info").val();

      if("Saving" ==  $('#requestForm').attr('action'))
      {
           
        $.ajax({
            type: "GET",
            url: "{{ route('request.add') }}",
            data: { 
              request_type : request_type,
              request_info : request_info,           
             
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
                  swal({ title:"Successfully Saved!", text: "You add new request!", type: "success", buttonsStyling: false, confirmButtonClass: "btn btn-success"})
  
                  var requestTable = $('#requestTable').DataTable();
                  requestTable.ajax.reload();  
  
                  $('#modalRequest').modal('hide');
                }
            }
        });    
      } 
      else 
      {
        $.ajax({
            type: "GET",
            url: "{{ route('request.update') }}",
            data: { 
              id : id,
              request_type : request_type,
              request_info : request_info,
            
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
                  swal({ title:"Successfully Update!", text: "You updated a request!", type: "success", buttonsStyling: false, confirmButtonClass: "btn btn-success"})
  
                  var requestTable = $('#requestTable').DataTable();
                  requestTable.ajax.reload();  
  
                  $('#modalRequest').modal('hide');
                }
            }
        });  
      }
     
      return false;
    }
  });
  } 

  
    

    </script>


@parent
@endsection
<!--   Script Plugins -->
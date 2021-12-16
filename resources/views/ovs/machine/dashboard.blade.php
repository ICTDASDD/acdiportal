@extends('ovs.machine.layouts.app') 

@section('sidebar')
@include('ovs.machine.layouts.sidebar')
@parent
@endsection


    <!-- Navbar -->
    @section('navbar')
    @include('ovs.machine.layouts.navbar')
    @parent
    @endsection
    <!-- End Navbar -->

    @section('main-content')
    <div class="content">
        <div class="content">
          <div class="container-fluid">
            

            <br><br>
            <div class="header text-center ml-auto mr-auto">
              <h3 class="title" id="cy">ACDI MPC</h3>
              <p class="category">{{Auth::user()->brCode}}</p>
            </div>
            
            <div class="row d-none" id="loginDiv">
              <div class="col-lg-4 col-md-8 col-sm-6 ml-auto mr-auto">
                <form class="form" method="" action="">
                  <div class="card card-login card-hidden">
                    <div class="card-header card-header-info text-center">
                      <h4 class="card-title">Voters Validation</h4>
                    </div>
                    <div class="card-body ">
                      <p class="card-description text-center">Please login with the information provided on the Registration</p>
                      

                      <br>
                      <span class="bmd-form-group h3">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">fingerprint</i>
                            </span>
                          </div>
                          <input id="afsn" type="text" class="form-control text-center" center placeholder="AFSN" autocomplete="off">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons"></i>
                            </span>
                          </div>
                        </div>
                      </span>

                      <br>


                      <span class="bmd-form-group h3">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">password</i>
                            </span>
                          </div>
                          <input id="code" type="password" class="form-control text-center" placeholder="6-Digit Generated CODE">  
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons"></i>
                            </span>
                          </div>                        
                        </div>
                      </span>

                      <div class="col-md-12 ml-auto mr-auto">
                        <div class="card">
                          <div class="card-body text-center">
                            <span class="bmd-form-group small center">
                              <div class="input-group">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input id="isAgree" class="form-check-input" type="checkbox" value="" required> I Accept Terms and Condition, Please <a href="#"> Clik here </a> for info
                                    <span class="form-check-sign">
                                      <span class="check"></span>
                                    </span>
                                  </label>
                                </div>               
                              </div>
                            </span>
                          </div>
                        </div>
                      </div>


                    </div>
                    <div class="card-footer justify-content-center">
                      <input id="btnProceed" type="button" class="btn btn-info btn-link btn-lg" value="Proceed">
                    </div>
                  </div>
                </form>
              </div>
            </div>

            

            



            

          </div>

        </div>
    </div>
    @endsection

   

    <!--side filter -->
    @section('sidefilter')
    @include('ovs.machine.layouts.sidefilter')
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
    @include('ovs.machine.layouts.plugins.adminplugin')
    @parent
    @endsection
<!--   Script Plugins -->

<!--   dashboard Plugins -->
@section('pageplugin')
@include('ovs.machine.layouts.plugins.dplugin')


<script>
  $(document).ready(function() {

    $.ajax({
      type: "GET",
      url: "{{ route('machine.branch.locking') }}",
      //data: { votingPeriodID : votingPeriodID },
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
        //var xx = "{{ session('votingPeriodID') }}";
        if(data.success)
        {  
          swal({ title: "Branch Locked", text: "Voting currently not available", type: "warning", buttonsStyling: false, confirmButtonClass: "btn btn-success"});
        
            $('#cy').addClass("d-none");
            $('#loginDiv').addClass("d-none");
          } 
        else 
        {
          getVotingPeriod();
        }
      }
    });

    function getVotingPeriod()
    {
      $.ajax({
        type: "GET",
        url: "{{ route('machine.votingPeriod.default') }}",
        //data: { votingPeriodID : votingPeriodID },
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
          //var xx = "{{ session('votingPeriodID') }}";
          if(data.votingPeriodID)
          {
            $('#cy').html(data.cy);
            $('#cy').addClass("d-block");
            $('#loginDiv').addClass("d-block").fadeIn(500);
          } 
          else 
          {
            swal({ title: "No Voting Period Available", text: "Voting currently not available", type: "warning", buttonsStyling: false, confirmButtonClass: "btn btn-success"});
        
            $('#cy').html("ACDI MPC - Not Available");
            $('#cy').addClass("d-none");
            $('#loginDiv').addClass("d-none");
          }
        }
      });
    }

    

    $('#btnProceed').on('click', function(){
      var afsn = $('#afsn').val();
      var code = $('#code').val();
      var isAgree = $('#isAgree').is(":checked");

      if(!isAgree)
      {
        swal({ title: "Unable to Proceed", text: "Please accept the terms and condition to proceed.", type: "warning", buttonsStyling: false, confirmButtonClass: "btn btn-success"});
        return;
      }

      $.ajax({
        type: "GET",
        url: "{{ route('machine.memberLogin') }}",
        data: { afsn : afsn, code :code },
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

          if(data.success)
          {
            swal({
              allowOutsideClick : false, 
              title: "Account Verified", 
              text: "", 
              type: "success", 
              buttonsStyling: false, 
              confirmButtonClass: "btn btn-success",
              confirmButtonText: "Proceed to Vote",
            }).then((result) => {
              if(result)
              { 
                window.open("{{ route('Votinglayout') }}","_self");
              }
            }); 
          } 
          else 
          {
            swal({ title: data.title, text: data.message, type: data.icon, buttonsStyling: false, confirmButtonClass: "btn btn-success"});
          }
        }
        
      });   
    });
  
  });
</script>


@parent
@endsection
<!--   Script Plugins -->
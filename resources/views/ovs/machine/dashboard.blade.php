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
            <br>
            <div class="header text-center ml-auto mr-auto text-white">
              <h2 class="text-white" id="cy">ACDI MPC</h2>
              <b><p id="branchInfo" class="category">{{Auth::user()->brCode}}</p></b>
            </div>
            
            <div class="row d-none" id="loginDiv">
              <div class="col-lg-4 col-md-8 col-sm-6 ml-auto mr-auto">
                <form class="form" method="" action="">
                  <div class="card card-login card-hidden">
                    

                    <div class="card-header card-header-info text-center">
                      
                      <span class="pull-right">
                        <div class="togglebutton">
                          <label class="text-white">
                            <input id="onScreenKeyboard" type="checkbox">
                            <span class="toggle"></span>
                            <span class="material-icons align-middle">
                              keyboard
                            </span>
                          </label>
                        </div>
                      </span>

                      <h4 class="card-title">Voters Validation 
                      </h4>
                      
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
                          <input id="afsn_onscreenkeys" type="text" class="d-none form-control text-center" center placeholder="AFSN" autocomplete="off">
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
                          <input id="code" type="password" class="form-control text-center" placeholder="4-Digit Generated CODE" max="4">  
                          <input id="code_onscreenkeys" type="password" class="d-none form-control text-center" placeholder="4-Digit Generated CODE" max="4">  
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

<script type="text/javascript" src="{{ asset('js/jqbtk.js') }}"></script>
<script>
  $(document).ready(function() {

    $("#onScreenKeyboard").click( function() {
        if($("#onScreenKeyboard").is(':checked'))
        {
          $('#afsn').addClass("d-none").removeClass("d-block");
          $('#afsn_onscreenkeys').addClass("d-block").removeClass("d-none");
          
          $('#code').addClass("d-none").removeClass("d-block");
          $('#code_onscreenkeys').addClass("d-block").removeClass("d-none");

          $('#afsn_onscreenkeys').val("");
          $('#code_onscreenkeys').val("");
        } 
        else 
        {
          $('#afsn').addClass("d-block").removeClass("d-none");
          $('#afsn_onscreenkeys').addClass("d-none").removeClass("d-block");
          
          $('#code').addClass("d-block").removeClass("d-none");
          $('#code_onscreenkeys').addClass("d-none").removeClass("d-block");
          
          $('#afsn').val("");
          $('#code').val("");
        }
    });

    $('#afsn_onscreenkeys').keyboard(
      {
        layout:[
          [['1','1'],['2','2'],['3','3'],['4','4'],['5','5'],['6','6'],['7','7'],['8','8'],['9','9'],['0','0'],['-','-']],
          [['Q','Q'],['W','W'],['E','E'],['R','R'],['T','T'],['Y','Y'],['U','U'],['I','I'],['O','O'],['P','P'],['del','del']],
          [['A','A'],['S','S'],['D','D'],['F','F'],['G','G'],['H','H'],['J','J'],['K','K'],['L','L']],
          [['Z','Z'],['X','X'],['C','C'],['V','V'],['B','B'],['N','N'],['M','M']],
          [['close','close'],['space','space'],['close','close']]
        ],
        placement:'bottom',
        initCaps:true,
      },
    );

    $('#code_onscreenkeys').keyboard(
      { 
        layout:[
          [['7','7'],['8','8'],['9','9']],
          [['4','4'],['5','5'],['6','6']],
          [['1','1'],['2','2'],['3','3']],
          [['0','0'],['close','close']]
        ],
        placement:'bottom',
        initCaps:true,
      },
    );

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
            $("#branchInfo").html("{{Auth::user()->brCode}} - " + data.branchName);
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
      var afsn ="";
      var code = "";

      if($("#onScreenKeyboard").is(':checked'))
      {
        afsn = $('#afsn_onscreenkeys').val();
        code = $('#code_onscreenkeys').val();
      } 
      else 
      {
        afsn = $('#afsn').val();
        code = $('#code').val();
        
      }

      if(afsn.trim() == "")
      {
        swal({ title: "Unable to Proceed", text: "Please input AFSN.", type: "warning", buttonsStyling: false, confirmButtonClass: "btn btn-success"});
        return;
      }

      if(code.trim() == "")
      {
        swal({ title: "Unable to Proceed", text: "Please input Generated CODE.", type: "warning", buttonsStyling: false, confirmButtonClass: "btn btn-success"});
        return;
      }

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
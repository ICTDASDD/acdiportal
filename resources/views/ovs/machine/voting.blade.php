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
      <div class="container-fluid">
        <div class="col-md-10 col-12 mr-auto ml-auto">
          <!--      Wizard container        -->
          <div class="wizard-container">
            <!--card-wizard-->
            <div class="card card-wizard" data-color="blue" id="wizardProfile">
              <form id="votingForm" action="" method="">
                <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                <div class="card-header text-center">
                  <h3 class="card-title">
                    {{ session('cy') }}
                  </h3>
                  <h5 class="card-description">Welcome {{ session('mrFULLNAME') }}, ({{ session('mrAFSN') }}) of {{ session('mrBrMembership') }}. You're registered voter in  {{ session('mrBrRegistered') }}</h5>
                </div>
                <div class="wizard-navigation">
                  <ul class="nav nav-pills" id="candidateTypeDiv">
                   
                  </ul>
                </div>
                <div class="card-body">

                  <div class="tab-content"  id="candidateListDiv">

                  </div>
                </div>
                <div class="card-footer">
                  <div class="mr-auto">
                    <input type="button" class="btn btn-previous btn-fill btn-default btn-wd disabled" name="previous" value="Previous">
                  </div>
                  <div class="ml-auto">
                    <input type="button" class="btn btn-next btn-fill btn-rose btn-wd" name="next" value="Next">
                    <input type="button" class="btn btn-finish btn-fill btn-rose btn-wd" name="finish" value="Finish" style="display: none;">
                  </div>
                  <div class="clearfix"></div>
                </div>
              </form>
            </div>
          </div>
          <!-- wizard container -->
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

<!--   Wizard Plugins -->
@section('pageplugin')
<script>

$(document).ready(function() {
  let votingPeriodID = "{{ session('votingPeriodID') }}";
  $.ajax({
    type: "GET",
    url: "{{ route('machine.candidateLimit.default') }}",
    data: { votingPeriodID : votingPeriodID },
    contentType: "application/json; charset=utf-8",
    beforeSend:  function() {
      swal({ title: 'Getting candidate list..', onOpen: () => swal.showLoading(), allowOutsideClick: () => !swal.isLoading() });
    },
    error: function (jqXHR, exception) {
      swal.close();
    
      console.log(jqXHR.responseText);
      swal({ title: "Error " + jqXHR.status, text: "Please try again later.", type: "error", buttonsStyling: false, confirmButtonClass: "btn btn-success"});
    },
    success: function (data2) {
      //swal.close();
        
      var myArr = JSON.parse(JSON.stringify(data2));
       
      for (var i = 0; i < $(myArr).toArray().length; i++) 
      {
        var candidateTypeID = myArr[i].candidateTypeID.toString();
        var candidateTypeName = myArr[i].candidateTypeName.toString();
        var memberVotingLimitCount = myArr[i].memberVotingLimitCount.toString();
        
        var isActive = "";
        if(i == 0)
        {
          isActive = "active";
        }
        var subDiv = "subDiv" + i;
        $("#candidateTypeDiv").append("" +
          "<li class='nav-item' style='pointer-events: none;'> " + 
            "<a class='nav-link " + isActive + "' href='#" + subDiv + "' data-toggle='tab' role='tab' > " + 
              "" + candidateTypeName  +
            "</a> " + 
          "</li> " + 
        "");

        $("#candidateListDiv").append("" +
          "<div class='tab-pane " + isActive + "' id='" + subDiv + "'>"+
            "<input type='hidden' id='" + subDiv + "_mvlc' value='" + memberVotingLimitCount + "'>" +
            "<input type='hidden' id='" + subDiv + "_ctn' value='" + candidateTypeName + "'>" +
            "<h5 class='info-text' id='"+ subDiv +"_display'> Select (" + memberVotingLimitCount + ") " +  candidateTypeName + "</h5>" +
              "<br>" +
              "<div class='row justify-content-center' id='" + subDiv+ "_sub'>" +
              "</div>" +
          "</div>" +
        "");
        
        $.ajax({
          type: "GET",
          url: "{{ route('machine.candidate.default') }}",
          data: { 
            subDiv : subDiv, //FOR DESIGN
            votingPeriodID : votingPeriodID, 
            candidateTypeID :  candidateTypeID 
          },
          contentType: "application/json; charset=utf-8",
          beforeSend:  function() {
            //swal({ title: 'Loading..', onOpen: () => swal.showLoading(), allowOutsideClick: () => !swal.isLoading() });
          },
          error: function (jqXHR, exception) {
            swal.close();
          
            console.log(jqXHR.responseText);
            swal({ title: "Error " + jqXHR.status, text: "Please try again later.", type: "error", buttonsStyling: false, confirmButtonClass: "btn btn-success"})
          },
          success: function (data3) {
            swal.close();

            var myArr2 = JSON.parse(JSON.stringify(data3));
            
            for (var i2 = 0; i2 < $(myArr2).toArray().length; i2++) 
            {
              var subDiv = myArr2[i2].subDiv.toString();
              var isNoCandidateFound = myArr2[i2].isNoCandidateFound.toString();

              if(isNoCandidateFound == "true")
              {
                $("#" + subDiv +"_sub").append("" +
                "<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'> " +
                  "<div class='card'> " +
                    "<div class='header text-center ml-auto mr-auto'>" +
                      "<h4 class='title'>NO CANDIDATE FOUND!</h4>" +
                    "</div>" + 
                  "</div> " +
                "</div> " +
                "");
              } 
              else 
              {
                var profilePicture = myArr2[i2].profilePicture.toString();
                var lastName = myArr2[i2].lastName.toString();
                var firstName = myArr2[i2].firstName.toString();
                var middleName = myArr2[i2].middleName.toString();
                var information1 = myArr2[i2].information1.toString();
                var information2 = myArr2[i2].information2.toString();
                
                var imgPath = "{{ asset('material/img/candidate/')}}";

                var cardDiv = subDiv + "_card_" + i2;
                var avatarDiv = subDiv + "_avatar_" + i2;
                var btnDiv = subDiv + "_btn_" + i2;
                $("#" + subDiv + "_sub").append("" +
                  "<div class='col-md-3'>" +
                    "<div id='" + cardDiv + "' class='card card-profile voting-not-selected'>" +
                      "<div id='" + avatarDiv + "' class='card-avatar voting-not-selected-photo'>" +
                        "<img class='img' src='"+imgPath+"/" + profilePicture+ "' >" +
                      "</div>" +
                      "<div class='card-body'>" +
                        "<h4 class='card-title'>"+ lastName +", " + firstName + " " + middleName + "</h4>" +
                        "<p class='card-description'>" +
                          information1 +
                        "</p>" +
                        "<div id='" + btnDiv + "' class='validate_selected btn btn-default btn-round'>" +
                          "<i class='material-icons'>star</i> VOTE" +
                        "</div>" +
                      "</div>" +
                    "</div>" +
                  "</div>" +
                "");
              }
            }
          }
        });
        
        if($(myArr).toArray().length == (i + 1))
        {
          demo.initMaterialWizard();
        }
      }

      if($(myArr).toArray().length == 0)
      {
        swal.close();
        /*
        $("#mainDiv").append("" +
          "<div class='header text-center ml-auto mr-auto'>" +
            "<h3 class='title'>NO CANDIDATE TYPE FOUND!</h3>" +
          "</div>" +
        "");
        */
      } 
    }
  });

  $(".nav-tabs a[data-toggle=tab]").on("click", function(e) {
    if ($(this).hasClass("disabled")) {
      e.preventDefault();
      return false;
    }
  });

  $('#votingForm').on('click','.validate_selected',function(){
    var id = this.id;
    var split_id = id.split("_");

    var ctn = $("#"+split_id[0] + "_ctn").val();
    var mvlc = $("#"+split_id[0] + "_mvlc").val();
    
    if($("#"+split_id[0] + "_btn_"+ split_id[2]).hasClass("btn-success"))
    {
      mvlc++;

      $("#"+split_id[0] + "_btn_"+ split_id[2]).addClass("btn-default").removeClass("btn-success");
      $("#"+split_id[0] + "_card_"+ split_id[2]).addClass("voting-not-selected").removeClass("voting-selected");
      $("#"+split_id[0] + "_avatar_"+ split_id[2]).addClass("voting-not-selected-photo").removeClass("voting-selected-photo");
      
      $("#"+split_id[0] + "_mvlc").val(mvlc);
      $("#"+split_id[0] + "_display").html("Select (" + mvlc + ") " + ctn);
    } 
    else 
    {
      
      if (mvlc != 0)
      {
        mvlc--;

        $("#"+split_id[0] + "_btn_"+ split_id[2]).addClass("btn-success").removeClass("btn-default");
        $("#"+split_id[0] + "_card_"+ split_id[2]).addClass("voting-selected").removeClass("voting-not-selected");
        $("#"+split_id[0] + "_avatar_" + split_id[2]).addClass("voting-selected-photo").removeClass("voting-not-selected-photo");

        $("#"+split_id[0] + "_mvlc").val(mvlc);
        $("#"+split_id[0] + "_display").html("Select (" + mvlc + ") " + ctn);
      } 
      else 
      {
        swal({ title: "Reach maximum vote \nfor "+ ctn, text: "Proceed to next step", type: "info", buttonsStyling: false, confirmButtonClass: "btn btn-success"});
            
      }
    }

  });
});
</script>

@include('ovs.machine.layouts.wizard')
@parent
@endsection
<!--   Script Plugins -->
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
                    <input type="button" id="btnPrevious" class="btn btn-previous btn-fill btn-default btn-wd disabled" name="previous" value="Previous">
                  </div>
                  <div class="ml-auto">
                    <input type="button" id="btnNext" class="btn btn-next btn-fill btn-rose btn-wd" name="next" value="Next">
                    <input type="button" id="btnFinish" class="btn btn-finish btn-fill btn-rose btn-wd" name="finish" value="Finish" style="display: none;">
                  </div>
                  <div class="clearfix"></div>
                </div>
              </form>
            </div>
          </div>
          <!-- wizard container -->
        </div>

        
        <div class="modal fade" id="modalSummary" tabindex="-1" role="dialog" aria-labelledby="modalSummary" aria-hidden="true">              
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title text-info">Detailed Summary</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                  <i class="material-icons">clear</i>
                </button>
              </div>
              
              <div class="modal-body">
                <div id="summaryTable" class="material-datatables">
                  
                </div>
              </div>

              <div class="modal-footer">
                <button id="btnConfirm" type="button" class="col btn btn-round btn-success d-block">  Confirm </button> 
                <button type="button" class="col btn btn-round btn-secondary" data-dismiss="modal">Cancel</button>
              </div>
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

<!--   Wizard Plugins -->
@section('pageplugin')
<script>

$(document).ready(function() {

  $('#detailsSummaryDataTable').dataTable();

  let votingPeriodID = "{{ session('votingPeriodID') }}";
  let totalCandidateType = 0;
  let totalAmendment = 0;
  let isCandidate = true;
  let isAmendment = true;
  
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
        
      var candidateLimitTypeArray = JSON.parse(JSON.stringify(data2));
      totalCandidateType = $(candidateLimitTypeArray).toArray().length;

      for (var candidateLimitRow = 0; candidateLimitRow < $(candidateLimitTypeArray).toArray().length; candidateLimitRow++) 
      {
        var candidateTypeID = candidateLimitTypeArray[candidateLimitRow].candidateTypeID.toString();
        var candidateTypeName = candidateLimitTypeArray[candidateLimitRow].candidateTypeName.toString();
        var memberVotingLimitCount = candidateLimitTypeArray[candidateLimitRow].memberVotingLimitCount.toString();
        
        var isActive = "";
        if(candidateLimitRow == 0)
        {
          isActive = "active";
        }
        var subDiv = "subDiv" + candidateLimitRow;
        $("#candidateTypeDiv").append("" +
          "<li class='nav-item' style='pointer-events: none;'> " + 
            "<a class='nav-link " + isActive + "' href='#" + subDiv + "' data-toggle='tab' role='tab' > " + 
              "" + candidateTypeName  +
            "</a> " + 
          "</li> " + 
        "");

        $("#candidateListDiv").append("" +
          "<div class='tab-pane " + isActive + "' id='" + subDiv + "'>"+
            "<input type='hidden' id='" + subDiv + "_mvlcTotal' value='" + memberVotingLimitCount + "'>" +
            "<input type='hidden' id='" + subDiv + "_mvlc' value='" + memberVotingLimitCount + "'>" +
            "<input type='hidden' id='" + subDiv + "_ctn' value='" + candidateTypeName + "'>" +
            "<h5 class='info-text' id='"+ subDiv +"_display'> Select (" + memberVotingLimitCount + ") " +  candidateTypeName + "</h5>" +
              "<br>" +
              "<div class='row justify-content-center' id='" + subDiv+ "_sub'>" +
              "</div>" +
          "</div>" +
        "");
        
        getCandidate(subDiv, votingPeriodID, candidateTypeID);
        
        if($(candidateLimitTypeArray).toArray().length == (candidateLimitRow + 1))
        {
          getAmendment(votingPeriodID);     
        }
      }

      if($(candidateLimitTypeArray).toArray().length == 0)
      {
        isCandidate = false;
        swal.close();
        
        getAmendment(votingPeriodID);
      } 
    }
  });

  function getCandidate(subDiv, votingPeriodID, candidateTypeID)
  {
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
            var candidateID = myArr2[i2].candidateID.toString();
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
            var idDiv = subDiv + "_id_" + i2;
            var displayDiv = subDiv + "_display_" + i2;
            var profilePictureDiv = subDiv + "_profilePicture_" + i2;
            var fullName = lastName +", " + firstName + " " + middleName ;
            $("#" + subDiv + "_sub").append("" +
              "<div class='col-md-3'>" +
                "<div id='" + cardDiv + "' class='card card-profile voting-not-selected'>" +
                  "<div id='" + avatarDiv + "' class='card-avatar voting-not-selected-photo'>" +
                    "<img class='img' src='"+imgPath+"/" + profilePicture+ "' >" +
                  "</div>" +
                  "<div class='card-body'>" +
                    "<input type='hidden' id='" + idDiv + "' value='" + candidateID + "'>" +
                    "<input type='hidden' id='" + displayDiv + "' value='" + fullName + "'>" +
                    "<input type='hidden' id='" + profilePictureDiv + "' value='" + profilePicture + "'>" +
                    "<h4 class='card-title'>"+ fullName + "</h4>" +
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

  }

  function getAmendment(votingPeriodID)
  {
    $.ajax({
      type: "GET",
      url: "{{ route('machine.amendment.default') }}",
      data: { votingPeriodID : votingPeriodID },
      contentType: "application/json; charset=utf-8",
      beforeSend:  function() {
        swal({ title: 'Getting amendment list..', onOpen: () => swal.showLoading(), allowOutsideClick: () => !swal.isLoading() });
      },
      error: function (jqXHR, exception) {
        swal.close();
      
        console.log(jqXHR.responseText);
        swal({ title: "Error " + jqXHR.status, text: "Please try again later.", type: "error", buttonsStyling: false, confirmButtonClass: "btn btn-success"});
      },
      success: function (dataAmendment) {
        swal.close();

        var dataAmendmentArray = JSON.parse(JSON.stringify(dataAmendment));
        totalAmendment = $(dataAmendmentArray).toArray().length;
        for (var amendRow = 0; amendRow < $(dataAmendmentArray).toArray().length; amendRow++) 
        {
          var isNoAmendmentFound = dataAmendmentArray[amendRow].isNoAmendmentFound.toString();

          if(isNoAmendmentFound == "true")
          {
            isAmendment = false;
            
            noVotingAvailable();
          } 
          else 
          {
            if (amendRow == 0)
            {
              $("#candidateTypeDiv").append("" +
                "<li class='nav-item' style='pointer-events: none;'> " + 
                  "<a class='nav-link' href='#amendment' data-toggle='tab' role='tab' > " + 
                    "Amendment" +
                  "</a> " + 
                "</li> " + 
              "");

              $("#candidateListDiv").append("" +
                "<div class='tab-pane' id='amendment'>"+
                  //"<input type='hidden' id='" + subDiv + "_mvlc' value='" + memberVotingLimitCount + "'>" +
                  //"<input type='hidden' id='" + subDiv + "_ctn' value='" + candidateTypeName + "'>" +
                  "<h5 class='info-text'> Amendment List</h5>" +
                    "<br>" +
                    "<div class='row justify-content-center' id='amendment_sub'>" +
                    "</div>" +
                "</div>" +
              "");
              
              //initWizard();
            }
            
            var amendmentID = dataAmendmentArray[amendRow].amendmentID.toString();
            var amendmentNo = dataAmendmentArray[amendRow].amendmentNo.toString();
            var articleDetails = dataAmendmentArray[amendRow].articleDetails.toString();
            var presentProvision = dataAmendmentArray[amendRow].presentProvision.toString();
            var proposedRevision = dataAmendmentArray[amendRow].proposedRevision.toString();
            var proposedProvision = dataAmendmentArray[amendRow].proposedProvision.toString();
            var rationale = dataAmendmentArray[amendRow].rationale.toString();
            var question = dataAmendmentArray[amendRow].question.toString();

            var amendmentDiv = "amendmentDiv" + amendRow;
            $("#amendment_sub").append("" +
              "<div class='col-lg-12 mt-3'> " +
                "<h3 class='info-text'> " + articleDetails + " </h3> " +
                "<h5 class='info-text'> Amendment " + amendmentNo + " of " + totalAmendment + "</h5>" +
                "<div class='table-responsive'>" +
                  "<table class='table border border-1' border='1'>" +
                    "<thead>" +
                      "<tr>" +                                   
                        "<th class='text-left text-danger' colspan='2'><h4>PRESENT PROVISION</h4></th>" +
                        "<th class='text-left text-info' colspan='2'><h4>PROPOSED REVISION</h4></th>" +
                        "<th class='text-left text-success' colspan='2'><h4>PROPOSED PROVISION</h4></th>" +
                      "</tr>" +
                    "</thead>" +
                    "<tbody>" +
                      "<tr>" +                                   
                        "<td colspan='2'>" + presentProvision + "</td>" +
                        "<td colspan='2'>" + proposedRevision + "</td>" +
                        "<td colspan='2'>" + proposedProvision + " </td>" +
                      "</tr>" +
                      "<tr>" +
                        "<td class='text-center text-default' colspan='6'><h4>RATIONAL</h4></td>" +
                      "</tr>" +
                      "<tr>" +
                        "<td colspan='6'>" + rationale + "</td>" +
                      "</tr>" +
                      "<tr>" +
                        "<td class='text-center text-default' colspan='4'><h4>QUESTION/S</h4></td>" +
                        "<td class='text-center text-default' colspan='1'><h4>YES</h4></td>" +
                        "<td class='text-center text-default' colspan='1'><h4>NO</h4></td>" +
                      "</tr>" +
                      "<tr>" +
                        "<td colspan='4'>" + question + "</td>" +
                        "<input type='hidden' id='" + amendmentDiv + "_question' value='" + question + "'>" +
                        "<input type='hidden' id='" + amendmentDiv + "_id' value='" + amendmentID + "'>" +
                        "<td colspan='1'><center><input class='' type='radio' value='YES' name='" + amendmentDiv + "' id='flexRadioDefault1' style='height:35px; width:35px; vertical-align: middle;'></center></td>" +
                        "<td colspan='1'><center><input class='' type='radio' value='NO' name='" + amendmentDiv + "' id='flexRadioDefault1' style='height:35px; width:35px; vertical-align: middle;'></center></td>" +
                      "</tr>" +
                    "</tbody>" +
                  "</table>" +
                  "</div>" +

                          "</div>" +

            "");
           
            if($(dataAmendmentArray).toArray().length == (amendRow + 1))
            {
              initWizard();
            }
          }
        }
      }
    });
  }

  function noVotingAvailable()
  {
    $("#candidateTypeDiv").append("" +
      "<li class='nav-item' style='pointer-events: none;'> " + 
        "<a class='nav-link' href='#ammendment' data-toggle='tab' role='tab' > " + 
          "Not Available" +
        "</a> " + 
      "</li> " + 
    "");

    $("#candidateListDiv").append("" +
      "<div class='tab-pane' id='ammendment'>"+
        //"<input type='hidden' id='" + subDiv + "_mvlc' value='" + memberVotingLimitCount + "'>" +
        //"<input type='hidden' id='" + subDiv + "_ctn' value='" + candidateTypeName + "'>" +
        "<h5 class='info-text'></h5>" +
          "<br>" +
          "<div class='row justify-content-center' id='ammendment_sub'>" +
            "No voting period available at the moment"+
          "</div>" +
      "</div>" +
    "");

    initWizard();
  }
  
  function initWizard()
  {
    $('#wizardProfile').bootstrapWizard({
      'tabClass': 'nav nav-pills',
      'nextSelector': '.btn-next',
      'previousSelector': '.btn-previous',

      onNext: function(tab, navigation, index) {
        var indexOf = parseInt(index) - 1;
        var subDiv = "#subDiv" + indexOf + "_mvlc";
        var subDivDisplay = "#subDiv" + indexOf + "_ctn";
        
        var mvlc = $(subDiv).val();
        var ctn = $(subDivDisplay).val();
        
        if($(subDiv).val() != 0)
        { 
          swal({ title: "Select (" + mvlc + ") " + ctn, text: "Choose the required number to proceed", type: "info", buttonsStyling: false, confirmButtonClass: "btn btn-success"});
          return false;
        }
      },

      onInit: function(tab, navigation, index) {
        //check number of tabs and fill the entire row
        var $total = navigation.find('li').length;
        var $wizard = navigation.closest('.card-wizard');

        $first_li = navigation.find('li:first-child a').html();
        $moving_div = $('<div class="moving-tab">' + $first_li + '</div>');
        $('.card-wizard .wizard-navigation').append($moving_div);

        refreshAnimation($wizard, index);

        $('.moving-tab').css('transition', 'transform 0s');
      },
      /*
      onTabClick: function(tab, navigation, index) {

        var $valid = $('.card-wizard form').valid();

        if (!$valid) {
          return false;
        } else {
          return true;
        }
      },
      */
      onTabShow: function(tab, navigation, index) {
        var $total = navigation.find('li').length;
        var $current = index + 1;

        var $wizard = navigation.closest('.card-wizard');

        // If it's the last tab then hide the last button and show the finish instead
        if ($current >= $total) {
          $($wizard).find('.btn-next').hide();
          $($wizard).find('.btn-finish').show();
        } else {
          $($wizard).find('.btn-next').show();
          $($wizard).find('.btn-finish').hide();
        }

        button_text = navigation.find('li:nth-child(' + $current + ') a').html();

        setTimeout(function() {
          $('.moving-tab').text(button_text);
        }, 150);
        /*
        var checkbox = $('.footer-checkbox');

        if (!index == 0) {
          $(checkbox).css({
            'opacity': '0',
            'visibility': 'hidden',
            'position': 'absolute'
          });
        } else {
          $(checkbox).css({
            'opacity': '1',
            'visibility': 'visible'
          });
        }
        */
        refreshAnimation($wizard, index);
      }
    });
  }

  $("#btnFinish").on("click", function(e) {

    $("#summaryTable").html("");

    if(isCandidate)
    {
      $('.voting-selected').each(function() {
        var split_id = this.id.split("_");
        //alert($("#"+split_id[0] + "_ctn").val());
        //alert($("#"+split_id[0] + "_id_"+ split_id[2]).val());
        //alert($("#"+split_id[0] + "_display_"+ split_id[2]).val());
        var tableNameDisplay = $("#"+split_id[0] + "_ctn").val();
        var tableDiv = split_id[0] + "_summaryTable";
        if($("#"+ tableDiv).length == 0) {
          $("#summaryTable").append(
            "<table id='" + tableDiv + "' border='1' class='table table-striped table-no-bordered table-hover' cellspacing='0' width='100%' style='width:100%'> " + 
              "<thead> " + 
                "<tr> " + 
                  "<th colspan='2' style='text-align: center'><h3><b>For " + tableNameDisplay + "</b></h3></th> " + 
                "</tr> " + 
              "</thead> " + 

              "<tbody> " + 
              "</tbody> " + 
            "</table> " + 
          "");
        } 

        var profilePicture = $("#"+split_id[0] + "_profilePicture_"+ split_id[2]).val();
        var candidateName = $("#"+split_id[0] + "_display_"+ split_id[2]).val();
        var imgPath = "{{ asset('material/img/candidate/')}}";
        $("#" + tableDiv + " > tbody:last").append("" +
          "<tr>" +
            "<td width='35%' style='text-align: center'>" +
              "<div class='card-avatar'>" +
                "<img class='img' src='"+imgPath+"/" + profilePicture + "' height='35px' >" +
              "</div>" +
            "</td>" +
            "<td width='65%'>" +
              candidateName +
            "</td>" +
          "</tr>"+
          ""); 

      });
    }

    if(isAmendment)
    {
      $("#summaryTable").append(
        "<table id='amendmentTable' border='1' class='table table-striped table-no-bordered table-hover border' cellspacing='0' width='100%' style='width:100%'> " + 
          "<thead> " + 
            "<tr> " + 
              "<th colspan='2' style='text-align: center'><h3><b>Amendment</b></h3></th> " + 
            "</tr> " + 
          "</thead> " + 

          "<tbody> " + 
          "</tbody> " + 
        "</table> " + 
      "");

      for(var amendRow = 0; amendRow < totalAmendment; amendRow++)
      {
        var amendmentID = $("#amendmentDiv" + amendRow + "_id").val();
        var question = $("#amendmentDiv" + amendRow + "_question").val();
        var answered = $('input[name="amendmentDiv' + amendRow + '"]:checked').val();

        if(answered == undefined)
        {
          swal({ title: "Please answer amendment", text: "", type: "info", buttonsStyling: false, confirmButtonClass: "btn btn-success"}); 
            
          return;
        }

        $("#amendmentTable > tbody:last").append("" +
          "<tr>" +
            "<td width='1%'>" +
              " " + 
            "</td>" +
            "<td width='69%' style='text-align: center'>" +
              question + 
            "</td>" +
            "<td width='30%'>" +
              answered +
            "</td>" +
          "</tr>"+
          ""); 
      }
    }

    $('#modalSummary').modal({
        backdrop: 'static',
        keyboard: false
    })
    $('#modalSummary').modal("show"); 
  });

  $("#btnConfirm").on("click", function(e) {  

    var totalVote = 0;
    for(var i = 0; i < totalCandidateType; i++)
    {
      var currentTotal = $("#subDiv"+ i + "_mvlcTotal").val();
      totalVote = parseInt(totalVote) + parseInt(currentTotal);
    }

    var listOfSelectedCandidate = [];
    var counter = 0;
    
    $('.voting-selected').each(function() {
      var split_id = this.id.split("_");
      //alert($("#"+split_id[0] + "_ctn").val());
      //alert($("#"+split_id[0] + "_id_"+ split_id[2]).val());
      //alert($("#"+split_id[0] + "_display_"+ split_id[2]).val());
      //var tableNameDisplay = $("#"+split_id[0] + "_ctn").val();
      //var tableDiv = split_id[0] + "_summaryTable";
      var candidateID = $("#"+split_id[0] + "_id_"+ split_id[2]).val();
      listOfSelectedCandidate.push(candidateID);
      //var profilePicture = $("#"+split_id[0] + "_profilePicture_"+ split_id[2]).val();
      //var candidateName = $("#"+split_id[0] + "_display_"+ split_id[2]).val();
      counter++;
    });

    var listOfSelectedAmendment = [];
    var counterAmendment = 0;
    
    for(var amendRow = 0; amendRow < totalAmendment; amendRow++)
    {
      var amendmentID = $("#amendmentDiv" + amendRow + "_id").val();
      var question = $("#amendmentDiv" + amendRow + "_question").val();
      var answered = $('input[name="amendmentDiv' + amendRow + '"]:checked').val();
      
      var amendmendDetails = {
        'amendmentID' : amendmentID,
        'answered' : answered
      };
      listOfSelectedAmendment.push(amendmendDetails);
      counterAmendment++
    }

    console.log(listOfSelectedAmendment);

    $.ajax({
      type: "GET",
      url: "{{ route('submitVote') }}",
      data: { 
        totalVote : totalVote,
        counter : counter,
        totalAmendment : totalAmendment,
        counterAmendment : counterAmendment,
        listOfSelectedCandidate : listOfSelectedCandidate,
        listOfSelectedAmendment : listOfSelectedAmendment,
        isCandidate : isCandidate,
        isAmendment : isAmendment,
      },
      contentType: "application/json; charset=utf-8",
      beforeSend:  function() {

        swal({ title: 'Vote Submitting..', onOpen: () => swal.showLoading(), allowOutsideClick: () => !swal.isLoading() });
      },
      error: function (jqXHR, exception) {
        swal.close();
      
        console.log(jqXHR.responseText);
        swal({ title: "Error " + jqXHR.status, text: "Unable to process your vote.", type: "error", buttonsStyling: false, confirmButtonClass: "btn btn-success"});
      },
      success: function (data) {
        swal.close();
        
        if(data.success)
        {
          //for ballot printing       
          var divToPrint=document.getElementById("summaryTable");
            newWin= window.open('', '', 'height=500, width=500');
            newWin.document.write(divToPrint.outerHTML);
            newWin.document.write("<style> td:nth-child(1){display:none;} </style>");
            newWin.print();
            newWin.close();
            //end

          swal({ 
            allowOutsideClick : false,
            title: "Vote Submitted", 
            text: "Thank you for voting.", 
            type: "success", 
            buttonsStyling: false, 
            confirmButtonClass: "btn btn-success", 
            confirmButtonText: 'Back to Members Login',
          }).then((result) => {
            if(result)
            {                
              window.open("{{ route('dashboard') }}","_self");
            }
          }); 
          //window.open("{{ route('Votinglayout') }}","_self").delay(1000);
        } 
        else 
        {
          swal({ allowOutsideClick : false, title: data.title, text: data.message, type: data.icon, buttonsStyling: false, confirmButtonClass: "btn btn-success"});
        }

        //console.log(data.request);

      }
    });
  });

  //DISABLE WIZARD TAB SELECTION CLICK
  $(".wizard-navigation a[data-toggle=tab]").on("click", function(e) {
    if ($(this).hasClass("disabled")) {
      e.preventDefault();
      return false;
    }
  });

  function refreshAnimation($wizard, index) 
  {
    $total = $wizard.find('.nav li').length;
    $li_width = 100 / $total;

    total_steps = $wizard.find('.nav li').length;
    move_distance = $wizard.width() / total_steps;
    index_temp = index;
    vertical_level = 0;

    mobile_device = $(document).width() < 600 && $total > 3;

    if (mobile_device) {
      move_distance = $wizard.width() / 2;
      index_temp = index % 2;
      $li_width = 50;
    }

    $wizard.find('.nav li').css('width', $li_width + '%');

    step_width = move_distance;
    move_distance = move_distance * index_temp;

    $current = index + 1;

    if ($current == 1 || (mobile_device == true && (index % 2 == 0))) {
      move_distance -= 8;
    } else if ($current == total_steps || (mobile_device == true && (index % 2 == 1))) {
      move_distance += 8;
    }

    if (mobile_device) {
      vertical_level = parseInt(index / 2);
      vertical_level = vertical_level * 38;
    }

    $wizard.find('.moving-tab').css('width', step_width);
    $('.moving-tab').css({
      'transform': 'translate3d(' + move_distance + 'px, ' + vertical_level + 'px, 0)',
      'transition': 'all 0.5s cubic-bezier(0.29, 1.42, 0.79, 1)'

    });
  }
  

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
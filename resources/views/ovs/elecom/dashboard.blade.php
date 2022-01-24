@extends('ovs.elecom.layouts.app') 

@section('sidebar')
@include('ovs.elecom.layouts.sidebar')
@parent
@endsection


    <!-- Navbar -->
    @section('navbar')
    @include('ovs.elecom.layouts.navbar')
    @parent
    @endsection
    <!-- End Navbar -->

    @section('main-content')
    <div class="content">
      <div class="content">
        <div class="container-fluid">

          <div class="header text-center ml-auto mr-auto">
            <h2 class="title" id="cy"></h2>
            <p class="category">Data as of: {{ Carbon\Carbon::now() }}</p>
            
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-12"></div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                  <select id="brCode" class ="form-control" style="width: 100%"  required="true">
                  </select>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12"></div>
            </div>
          </div>

          <div id="mainDiv">

          </div>

          <div class="header text-center ml-auto mr-auto d-none">
            <h3 class="title">Amendments Vote Counter</h3>
            <p class="category">Data as of:</p>
          </div>


          <div class="row" id="amendmentDiv">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                  <h4 class="card-title">Amendment</h4>
                </div>
                <div class="card-body">
                  <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                  </div>
                 

              <!--   <div class="material-datatables"> -->
                  
                  <table id="amendmentTable" class="table table-striped table-no-bordered" cellspacing="0" width="100%" style="width:100%">       
                    <tbody>
                      <thead>
                        <tr>
                          <th>PARTICULAR</th>
                          <th style="text-align: center">ARTICLE DETAILS</th>
                          <th style="text-align: center">MIGS</th>
                          <th style="text-align: center">REGISTERED MIGS</th>
                          <th style="text-align: center">% REGISTERED</th>
                          <th style="text-align: center">YES</th>
                          <th style="text-align: center">NO</th>
                          <th style="text-align: center">% YES VOTES</th>
                        </tr>
                      </thead>   
                  </table>

             <!-- </div> -->
                <!-- end content-->
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
    @include('ovs.elecom.layouts.footer')
    @parent
    @endsection
    <!--footer -->

    <!--side filter -->
    @section('sidefilter')
    @include('ovs.elecom.layouts.sidefilter')
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
    @include('ovs.elecom.layouts.plugins.adminplugin')
    @parent
    @endsection
<!--   Script Plugins -->

<!--   dashboard Plugins -->
@section('pageplugin')
@include('ovs.elecom.layouts.plugins.dplugin')


<script>
  $(document).ready(function() { 
    
    var votingPeriodID;
    var branchSelect2 = $('#brCode').select2({
      placeholder: "Branch of Operation",
      //dropdownParent: "#modalUser" ,
      minimumInputLength: -1,
      //allowClear: true,
      ajax: {
          url: "{{ route('elecom.branch.select2') }}",
          delay: 250,
          dataType: 'json',
          data: function(params) {
              return {
                  query: params.term, // search term
                  isAllShow: true, // false to disable option All Branch in list
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
         /* 
      var votingPeriod = $('#selectVotingPeriod').select2('data');
      var $option = $("<option selected></option>").val(votingPeriod[0].id).text(votingPeriod[0].text);
      $('#selectVotingPeriod2').append($option).trigger('change');
      
      memberTable.ajax.reload();  */

      var brSelect2 = $('#brCode').select2('data');
      var brCode = brSelect2[0].id;

      getDashboard(votingPeriodID, brCode);
    });
    
    var $option = $("<option selected></option>").val("0").text("All Branch");
    $('#brCode').append($option).trigger('change');
    
    //$('#brCode').prop('selectedIndex', 1).trigger('change').trigger("select2:select"); //trigger both
    
    $.ajax({
        type: "GET",
        url: "{{ route('elecom.votingPeriod.default') }}",
        //data: { votingPeriodID : votingPeriodID },amendment
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

          if(data.votingPeriodID)
          {
            $('#cy').html(data.cy);
            votingPeriodID = data.votingPeriodID;
            
            var brSelect2 = $('#brCode').select2('data');
            var brCode = brSelect2[0].id;
            getDashboard(votingPeriodID, brCode);
          } 
          else 
          {
            //swal.close();
            
            $('#cy').html("NO VOTING PERIOD FOUND!");
            
            $("#brCode").prop( "disabled", true );
            
            $("#amendmentDiv").hide();
            
          }
        }
    });   

  });

  function getDashboard(votingPeriodID, branchCode)
  {
    $.ajax({
      type: "GET",
      url: "{{ route('elecom.candidateLimit.default') }}",
      data: { votingPeriodID : votingPeriodID },
      contentType: "application/json; charset=utf-8",
      beforeSend:  function() {
        swal({ title: 'Loading..', onOpen: () => swal.showLoading(), allowOutsideClick: () => !swal.isLoading() });
      },
      error: function (jqXHR, exception) {
        swal.close();
      
        console.log(jqXHR.responseText);
        swal({ title: "Error " + jqXHR.status, text: "Please try again later.", type: "error", buttonsStyling: false, confirmButtonClass: "btn btn-success"})
      },
      success: function (data2) {
        //swal.close();
          
        $("#mainDiv").html("");

        var myArr = JSON.parse(JSON.stringify(data2));
        
        for (var i = 0; i < $(myArr).toArray().length; i++) 
        {

          var candidateTypeID = myArr[i].candidateTypeID.toString();
          var candidateTypeName = myArr[i].candidateTypeName.toString();

          var subDiv = "subDiv" + i;
          $("#mainDiv").append("" +
            "<div class='header text-center ml-auto mr-auto'>" +
              "<h3 class='title'>" + candidateTypeName + "</h3>" +
            "</div>" +
    
            "<div class='row' id='" + subDiv + "'>" +
            "</div>" +
          "");
          
          $.ajax({
            type: "GET",
            url: "{{ route('elecom.candidate.default') }}",
            data: { 
              subDiv : subDiv, //FOR DESIGN
              votingPeriodID : votingPeriodID, 
              branchCode : branchCode, 
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
                  $("#" + subDiv).append("" +
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
                  var totalVotes = myArr2[i2].totalVotes.toString();
                  
                  var imgPath = "{{ asset('material/img/candidate/')}}";
                  $("#" + subDiv).append("" +
                    "<div class='col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12'> " +
                      "<div class='card card-stats'> " +
                        "<div class='card-header card-header-success card-header-icon'> " +
                          "<div class='card-icon'> " +
                            "<img src='" + imgPath + "/" + profilePicture + "' style='width: 100px; height:100px;'/> " +
                          "</div> " +
                          "<p class='card-category'>" + lastName + ", " + firstName + "</p> " +
                          "<p class='card-category text-success small'>Total Votes</p>   " +
                          "<h3 class='card-title'>" + totalVotes + "</h3> " +
                        "</div> " +
                        "<div class='card-footer'> " +
                          "<div class='stats'> " +                    
                          "</div> " +
                        "</div> " +
                      "</div> " +
                    "</div> " +
                  "");
                }
              }
            }
          });
        }

        $.ajax({
          type: "GET",
          url: "{{ route('elecom.amendment.dashboard') }}",
          data: { votingPeriodID : votingPeriodID, branchCode : branchCode },
          contentType: "application/json; charset=utf-8",
          beforeSend:  function() {
            //swal({ title: 'Getting amendment list..', onOpen: () => swal.showLoading(), allowOutsideClick: () => !swal.isLoading() });
          },
          error: function (jqXHR, exception) {
            swal.close();
          
            console.log(jqXHR.responseText);
            swal({ title: "Error " + jqXHR.status, text: "Please try again later.", type: "error", buttonsStyling: false, confirmButtonClass: "btn btn-success"});
          },
          success: function (dataAmendment) {
            //swal.close();

            $('#amendmentTable tbody').empty();
    
            var dataAmendmentArray = JSON.parse(JSON.stringify(dataAmendment));
            totalAmendment = $(dataAmendmentArray).toArray().length;
            for (var amendRow = 0; amendRow < $(dataAmendmentArray).toArray().length; amendRow++) 
            {
              var isNoAmendmentFound = dataAmendmentArray[amendRow].isNoAmendmentFound.toString();
              
              if(isNoAmendmentFound == "true")
              {
                $("#amendmentTable > tbody:last").append("" +
                  "<tr>" +
                    "<td colspan='8' style='text-align: center; vertical-align: middle; font-size: 12px; font-weight:bold; color: #0B5AB9'>No Amendment Vote Found</td>" +
                  "</tr>"+
                "");
              }
              else 
              {
                var amendmentNo = dataAmendmentArray[amendRow].amendmentNo.toString();
                var articleDetails = dataAmendmentArray[amendRow].articleDetails.toString();
                var migs = dataAmendmentArray[amendRow].migs.toString();
                var regMigs = dataAmendmentArray[amendRow].regMigs.toString();
                var percentReg = dataAmendmentArray[amendRow].percentReg.toString();
                var yes = dataAmendmentArray[amendRow].yes.toString();
                var no = dataAmendmentArray[amendRow].no.toString();
                var percentYes = dataAmendmentArray[amendRow].percentYes.toString();

                $("#amendmentTable > tbody:last").append("" +
                  "<tr>" +
                    "<td style='text-align: left; vertical-align: middle; font-size: 12px; font-weight:bold; color: #0B5AB9'>" + amendmentNo + "</td>" +
                    "<td style='text-align: center; vertical-align: middle; font-size: 12px; font-weight:bold;'>" + articleDetails + "</td>" +
                    "<td style='text-align: center; vertical-align: middle; font-size: 12px; font-weight:bold;' rowspan = '"+ totalAmendment+"' class='" + ((amendRow != 0) ? 'd-none' : '') + "'>" + migs + "</td>" +
                    "<td style='text-align: center; vertical-align: middle; font-size: 12px; font-weight:bold;' rowspan = '"+ totalAmendment+"' class='" + ((amendRow != 0) ? 'd-none' : '') + "'>" + regMigs + "</td>" +
                    "<td style='text-align: center; vertical-align: middle; font-size: 12px; font-weight:bold;' rowspan = '"+ totalAmendment+"' class='" + ((amendRow != 0) ? 'd-none' : '') + "'>" + percentReg +'%'+ "</td>" +
                    "<td style='text-align: center; vertical-align: middle; font-size: 12px; font-weight:bold;'>" + yes + "</td>" +
                    "<td style='text-align: center; vertical-align: middle; font-size: 12px; font-weight:bold;'>" + no + "</td>" +
                    "<td style='text-align: center; vertical-align: middle; font-size: 12px; font-weight:bold;'>" + percentYes +'%'+ "</td>" +
                  "</tr>"+
                "");
              }
            }
          }
        });

        if($(myArr).toArray().length == 0)
        {
          swal.close();
          $("#mainDiv").append("" +
            "<div class='header text-center ml-auto mr-auto'>" +
              "<h3 class='title'>NO CANDIDATE TYPE FOUND!</h3>" +
            "</div>" +
          "");
        }
      }
    });
  }
  
</script>



@parent
@endsection
<!--   Script Plugins -->
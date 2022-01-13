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
                <h4 class="card-title">Member List
                  <select id="selectVotingPeriod" class="form-control" style="width: 25%"  required="true">
                  </select>
                  <button id="testPrint" class="btn btn-info btn-sm float-right" value="ASFN" data-code="CODE GENERATED" data-fullname="FULL NAME" data-isaccumudating="false">
                    Test Print
                  </button>
                </h4>
              </div>
              <div class="card-body">
                <div class="toolbar">
                  <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="material-datatables">
                  <table id="memberTable" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                    <thead>
                      <tr>
                        <th style="text-align: left">Name</th>
                        <th style="text-align: center">Branch <BR>Membership</th>                            
                        <th style="text-align: center">AFSN</th>
                        <th style="text-align: center">SCNO</th>
                        <th style="text-align: center">Branch <BR>Registered</th>
                        <th style="text-align: center">Security<br>Code</th>
                        <th style="text-align: center">Voted</th>
                        <th style="text-align: center">Action</th>
                      </tr>
                    </thead>

                    <tfoot>
                      <tr>
                        <th style="text-align: left">Name</th>
                        <th style="text-align: center">Branch <BR>Membership</th>                            
                        <th style="text-align: center">AFSN</th>
                        <th style="text-align: center">SCNO</th>
                        <th style="text-align: center">Branch<BR>Registered</th>
                        <th style="text-align: center">Security<BR>Code</th>
                        <th style="text-align: center">Voted</th>
                        <th style="text-align: center">Action</th>
                      </tr>
                    </tfoot>

                    <tbody>

                    </tbody>

                    
                  </table>
                </div>
                
                <div id="summaryTableForPrinting" class="material-datatables d-none">
                  
                </div>
              </div>
              <!-- end content-->
            </div>
            <!--  end card  -->
          </div>
          <!-- end col-md-12 -->
        </div>
        <button class="btn btn-danger btn-round" data-toggle="modal" data-target="#AddCandidate">
          <i class="material-icons">add</i> Late Registration Form
        </button>
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


    <script>
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
        
          memberTable.ajax.reload();  
        });

        var memberTable = $('#memberTable').DataTable({
          processing: true,
          serverSide: true,
          cache: false,
          responsive: true,
          ajax: {
              url: "{{ route('member.list') }}",
              //PASSING WITH DATA
              type: 'POST',
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
                data: 'brName',
                name: 'brName'
              },
              {
                data: 'AFSN',
                name: 'AFSN'
              }, 
              {
                data: 'SCNO',
                name: 'SCNO'
              },
              {
                data: 'brRegistered',
                name: 'brRegistered'
              }, 
              {
                data: 'code',
                name: 'code'
              }, 
              {
                data: 'isVoted',
                name: 'isVoted',
              }, 
              {
                data: 'actionButton',
                name: 'actionButton',
                orderable: false, 
                searchable: false
              }, 
              
              /*
              {
                'data': null,
                'render': function (data) {
                    var x = "";
                    var isLocked = "";
                    if(data.isLocked == "YES")
                    {
                      isLocked ="checked";
                    }
    
                    x = "<td style='text-align: right; max-width:250px;'>" +
                          "<div class='togglebutton'>" +
                            "<label>" +
                              "<input type='checkbox' class='branchLocking' value='" + data.brCode + "' " + isLocked + ">" +
                              "<span class='toggle'></span>" +
                            "</label>" +
                          "</div>" +
                        "</td>" ;
                        
                    return "<center>"+ x + "</center>";
                }
              },
              */
          ],
        });

        $('#memberTable').on('click','.registerButton',function(){
           afsn = this.value   //ginawang global for print function
           fullName = $(this).data('fullname');   //ginawang global for print function      
          var isaccumudating = $(this).data('isaccumudating'); 
          var votingPeriod = $('#selectVotingPeriod').select2('data');
          var votingPeriodID = votingPeriod[0].id;
          var votingPeriodDetails = votingPeriod[0].text;

          //Auth::user()->brCode
          if(isaccumudating == true)
          {
            swal({
              title: 'Accomodating other branch member!',
              text: "You're registering member of other branch?",
              type: 'warning',
              showCancelButton: false,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Confirm'
            }).then((result) => {
              if (result.value) {
                register(afsn, fullName,isaccumudating, votingPeriodID);
              }
            });
          } else 
          {
              register(afsn, fullName,isaccumudating, votingPeriodID);
          }
        });
      });

     

      function register(afsn, fullName,isaccumudating, votingPeriodID)
      {
          swal({
            title: 'Register ' + fullName + ' as Voter!',
            text: "Are you sure?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm'
          }).then((result) => {
            if (result.value) {
              $.ajax({
                  type: "GET",
                  url: "{{ route('member.register') }}",
                  data: { afsn : afsn, votingPeriodID : votingPeriodID },
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
   
                      if(!data.success)
                      {
                        swal({ title:"Unable to Register!", text: "Please try again.", type: "error", buttonsStyling: false, confirmButtonClass: "btn btn-success"});
                      } 
                      else 
                      {           
                        swal({ title:"Successfully Registered!", text: "Member can vote now!", type: "success", buttonsStyling: false, confirmButtonClass: "btn btn-success"});
                        var memberTable = $('#memberTable').DataTable();
                        memberTable.ajax.reload(null, false);

                        //printDetails function call
                        code2 = data.code;
                        printDetails();
                       

                      }
                  }
              });   
            }
          });
      }

      //REPRINTING BUTTON
      $('#memberTable').on('click','.reprintButton',function(){
        afsn = this.value   //ginawang global
        fullName = $(this).data('fullname');   //ginawang global
        code2 = $(this).data('code');
        printDetails();
      });
      var brRegistered = "";
      var code2 = "";
      var ballotNo = "";
      var cy = "";
      $('#memberTable').on('click','.viewVote',function(){
        var mrID = this.value   //ginawang global
        //fullName = $(this).data('fullname');   //ginawang global
        code2 = $(this).data('code');
        brRegistered = $(this).data('brregistered');
        ballotNo = $(this).data('ballotno');
        var votingPeriod = $('#selectVotingPeriod').select2('data');
        var votingPeriodID = votingPeriod[0].id;
        cy = votingPeriod[0].cy;
        
        $("#summaryTableForPrinting").html("");

        $.ajax({
          type: "GET",
          url: "{{ route('candidateLimit.default') }}",
          data: { votingPeriodID : votingPeriodID },
          contentType: "application/json; charset=utf-8",
          beforeSend:  function() {
            swal({ title: 'Getting member voted list..', onOpen: () => swal.showLoading(), allowOutsideClick: () => !swal.isLoading() });
          },
          error: function (jqXHR, exception) {
            swal.close();
          
            console.log(jqXHR.responseText);
            swal({ title: "Error " + jqXHR.status, text: "Please try again later.", type: "error", buttonsStyling: false, confirmButtonClass: "btn btn-success"});
          },
          success: function (data2) {
            //swal.close();
              
            var candidateLimitTypeArray = JSON.parse(JSON.stringify(data2));
            var totalCandidateType = $(candidateLimitTypeArray).toArray().length;

            for (var candidateLimitRow = 0; candidateLimitRow < $(candidateLimitTypeArray).toArray().length; candidateLimitRow++) 
            {
              var candidateTypeID = candidateLimitTypeArray[candidateLimitRow].candidateTypeID.toString();
              var candidateTypeName = candidateLimitTypeArray[candidateLimitRow].candidateTypeName.toString();
              
              var tableDiv = "subDiv" + candidateLimitRow + "_summaryTableForPrinting";
              if($("#"+ tableDiv).length == 0) 
              {
                $("#summaryTableForPrinting").append(
                  "<br><center><table id='" + tableDiv + "' border='0' cellspacing='0' width='100%' style='width:100%'> " + 
                    "<thead> " + 
                      "<tr> " + 
                        "<th colspan='2' style='text-align: center; vertical-align: middle; font-size:15px'><b>" + candidateTypeName + "<b></th> " + 
                      "</tr> " + 
                    "</thead> " + 

                    "<tbody> " + 
                    "</tbody> " + 
                  "</table></center>" + 
                "");
              } 

              getCandidate(tableDiv, votingPeriodID, candidateTypeID, mrID);

              if(candidateLimitRow == (totalCandidateType - 1))
              {
                getAmendment(votingPeriodID, mrID);
              }
            }

            if(totalCandidateType == 0)
            {
              getAmendment(votingPeriodID, mrID);
            }
          }
        });
      });

      function getCandidate(tableDiv, votingPeriodID, candidateTypeID, mrID)
      {
        $.ajax({
          type: "GET",
          url: "{{ route('candidate.voted') }}",
          data: { 
            subDiv : tableDiv, //FOR DESIGN
            votingPeriodID : votingPeriodID, 
            candidateTypeID :  candidateTypeID, 
            mrID :  mrID, 
          },
          contentType: "application/json; charset=utf-8",
          beforeSend:  function() {
            //swal({ title: 'Loading..', onOpen: () => swal.showLoading(), allowOutsideClick: () => !swal.isLoading() });
          },
          error: function (jqXHR, exception) {
            swal.close();
          
            console.log(jqXHR.responseText);
            swal({ title: "Error " + jqXHR.status, text: "Please try again later.", type: "error", buttonsStyling: false, confirmButtonClass: "btn btn-success"});
          },
          success: function (data3) {
            //swal.close();

            var myArr2 = JSON.parse(JSON.stringify(data3));
            
            for (var i2 = 0; i2 < $(myArr2).toArray().length; i2++) 
            {
              var subDiv = myArr2[i2].subDiv.toString();
              var isNoCandidateFound = myArr2[i2].isNoCandidateFound.toString();

              if(isNoCandidateFound == "true")
              {
                swal.close();
                swal({ title: "Unable to get Vote Record", text: "Please try again later.", type: "error", buttonsStyling: false, confirmButtonClass: "btn btn-success"});
                
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
                var totalVotes = myArr2[i2].totalVotes.toString();
                
                var candidateName = lastName +", " + firstName + " " + middleName ;
                
                var isSelected = (totalVotes == 0) ? false : true;
                //🗹☐
                var selector = (isSelected == true) ? "🗹" : "☐";
                $("#" + subDiv + " > tbody:last").append("" +
                  "<tr>" +
                    "<td width='10%' style='text-align:center'>" +
                      selector +
                    "</td>" +
                    "<td width='90%' style='font-size:10px'>" +
                      candidateName +
                    "</td>" +
                  "</tr>"+
                  "");
              }
            }
          }
        });

      }

      function getAmendment(votingPeriodID, mrID)
      {
        $.ajax({
          type: "GET",
          url: "{{ route('amendment.voted') }}",
          data: { votingPeriodID : votingPeriodID, mrID: mrID },
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
            swal.close();

            $("#summaryTableForPrinting").append(
              "<br><table id='amendmentTableForPrinting' border='0' cellspacing='0' width='100%' style='width:100%'> " + 
                "<thead> " + 
                  "<tr> " + 
                    "<th colspan='1' style='text-align: center; vertical-align: middle; font-size:15px'><b>Amendment<b></th> " + 
                    "<th colspan='1' style='text-align: center; vertical-align: middle; font-size:15px'><b>Yes<b></th> " + 
                    "<th colspan='1' style='text-align: center; vertical-align: middle; font-size:15px'><b>No<b></th> " + 
                  "</tr> " + 
                "</thead> " + 

                "<tbody> " + 
                "</tbody> " + 
                
                "<tfoot> " + 
                  "<tr> " + 
                    "<th colspan='3' style='text-align: center; vertical-align: middle; font-size:15px;padding-top: 25px;'><b>Thank you for voting!<b></th> " + 
                  "</tr> " + 
                "</tfoot> " + 
              "</table> " + 
            "");

            var dataAmendmentArray = JSON.parse(JSON.stringify(dataAmendment));
            var totalAmendment = $(dataAmendmentArray).toArray().length;

            for (var amendRow = 0; amendRow < $(dataAmendmentArray).toArray().length; amendRow++) 
            {
              var isNoAmendmentFound = dataAmendmentArray[amendRow].isNoAmendmentFound.toString();

              if(isNoAmendmentFound == "true")
              {
                swal({ title: "Unable to get Vote Record", text: "Please try again later.", type: "error", buttonsStyling: false, confirmButtonClass: "btn btn-success"});
              } 
              else 
              {
                
                var amendmentID = dataAmendmentArray[amendRow].amendmentID.toString();
                var amendmentNo = dataAmendmentArray[amendRow].amendmentNo.toString();
                var articleDetails = dataAmendmentArray[amendRow].articleDetails.toString();
                var presentProvision = dataAmendmentArray[amendRow].presentProvision.toString();
                var proposedRevision = dataAmendmentArray[amendRow].proposedRevision.toString();
                var proposedProvision = dataAmendmentArray[amendRow].proposedProvision.toString();
                var rationale = dataAmendmentArray[amendRow].rationale.toString();
                var question = dataAmendmentArray[amendRow].question.toString();
                var vote = dataAmendmentArray[amendRow].vote.toString();

                var amendmentDiv = "amendmentDiv" + amendRow;
                var answered = (vote == "1") ? "YES" : "NO";
                
                var x1 = (answered == "YES") ? "🗹" : "☐";
                var x2 = (answered == "YES") ? "☐" : "🗹";

                $("#amendmentTableForPrinting > tbody:last").append("" +
                "<tr>" +
                  "<td width='70%' style='font-size:10px'>" +
                    question + 
                  "</td>" +
                  /*"<td width='20%' style='text-align: center; font-size:10px'>" +
                    answered +
                  "</td>" +*/
                  "<td width='15%' style='text-align: center; font-size:10px'>" +
                    x1 +
                  "</td>" +
                  "<td width='15%' style='text-align: center; font-size:10px'>" +
                    x2 +
                  "</td>" +
                "</tr>"+
                ""); 

                if($(dataAmendmentArray).toArray().length == (amendRow + 1))
                {
                  rePrint();
                }
              }
            }

            if(totalAmendment == 0)
            {
              rePrint();
            }
          }
        });
      }

      function rePrint()
      {
        var divToPrint=document.getElementById("summaryTableForPrinting");
        var height = $('#summaryTableForPrinting').height();
        var hw = "height="+height + ", width=500";
        var newWin= window.open('', '', hw);
        /*
        newWin.document.write('<html><body>'); 
        newWin.document.write("<center>ACDI MPC</center><br>");
        newWin.document.write("<center>" + brRegistered + "</center><br>");
        newWin.document.write("<p style='float:left;font-size:12px'><b>SECURITY CODE:<br>"+code2+"</b></p><p style='float: right;font-size:12px'><b>BALLOT #</b></p>");
        newWin.document.write(divToPrint.outerHTML);
        newWin.document.write('</body></html>');        

        //newWin.document.write("<style> td:nth-child(1){display:none;} </style>");
        newWin.print();
        newWin.close();
        */
       
            
        newWin.document.write('<html>' +
              '<head>' +
              '<meta charset="utf-8" />' +
              '<title>ACDI MPC Ballot Print</title>' +
              '<style type="text/css">body {-webkit-print-color-adjust: exact; font-family: Arial; }</style>' +
              '</head>' +
              '<body>'); 
                  /*
              <center><img src="https://www.acdicoop.com/images/acdimpc.png" alt="ACDI MPC" height="20px" weight="300px"></center>
                  <br>
                  <center> {{ session('mrBrRegistered') }} </center><br>
                  <p style='float:left;font-size:12px'><b>SECURITY CODE:<br> {{ session('mrCode') }} </b></p><p style='float: right;font-size:12px'><b>BALLOT #</b></p>
                  <br>
                  */
            var imglogo = "{{ asset('material/img/')}}/acdimpc.png";
            newWin.document.write("<center><img src='" + imglogo + "' alt='ACDI MPC' stlye='max-width: 100%; height: auto;'></center><br>");
           
            newWin.document.write("<center>" + cy + "</center><br>");
            newWin.document.write("<center>" + brRegistered + "</center><br>");
           
            newWin.document.write("<p style='float:left;font-size:12px'><b>SECURITY CODE:<br>" + code2 + "</b></p><p style='float: right;font-size:12px; text-align: right;'><b>BALLOT #:<br>" + ballotNo + "</b></p>");
            newWin.document.write(divToPrint.outerHTML);
            newWin.document.write('</body></html>');        
            newWin.document.close();

            newWin.onload = function()
            {
              newWin.print();
              newWin.close();
            };
            /*
            $(newWin.window).on("load", function () {
              alert("x");
              newWin.print();
              newWin.close();
            });
            */
      }
      
      $('#testPrint').on('click',function(){
        afsn = this.value   //ginawang global
        fullName = $(this).data('fullname');   //ginawang global
        code2 = $(this).data('code');
        printDetails();
      });
      //END

      function printDetails(){

        a = window.open('', '', 'height=500, width=500');
        a.document.write('<html>'); 
        a.document.write('<body><h4 style="text-align:center"> REGISTRATION DETAILS </h4>');
        a.document.write('<table name= "detailsTable" style="width:100%" border="1" border-style= "solid" cellpadding = "10">'); 
        a.document.write('<tr>');                     
        a.document.write('<td> Name: </td>');
        a.document.write('<td>' + fullName + '</td>');
        a.document.write('</tr>'); 
        a.document.write('<tr>');   
        a.document.write('<td> AFSN: </td>');
        a.document.write('<td>' + afsn + '</td>');
        a.document.write('</tr>');
        a.document.write('<tr>'); 
        a.document.write('<td> Security Code: </td>');
        a.document.write('<td>' + code2 + '</td>');
        a.document.write('</tr>');
        a.document.write('<table>');
        a.document.write('</body></html>');                                                          
        a.print();                      
        a.close();
      }

      

     
 
    </script>
    @parent
    @endsection
<!--   Script Plugins -->
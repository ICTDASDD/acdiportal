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
    <!-- End Navbar -->

    @section('main-content')
    <div class="content">
        <div class="content">
          <div class="container-fluid">
            
            <div class="header text-center ml-auto mr-auto">
              <h2 class="title" id="cy"></h2>
              <p class="category">Data as of: {{ Carbon\Carbon::now() }}</p>
            </div>

            <div id="mainDiv">

            </div>

            <div class="header text-center ml-auto mr-auto d-none">
              <h3 class="title">Amendments Vote Counter</h3>
              <p class="category">Data as of:</p>
            </div>


            <div class="row d-none">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">assignment</i>
                    </div>
                    <h4 class="card-title">Sample Table for Amenment Monitoring</h4>
                  </div>
                  <div class="card-body">
                    <div class="toolbar">
                      <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <div class="material-datatables">
                      <table class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                          <tr>
                            <th style="text-align: center">MIGS</th>
                            <th style="text-align: center">REGISTERED MIGS</th>
                            <th style="text-align: center">% REGISTERED</th>
                            <th style="text-align: center">Amendment No.</th>
                            <th style="text-align: center">Total YES</th>
                            <th style="text-align: center">Total NO</th>
                            <th style="text-align: center">% YES VOTES</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th style="text-align: center" >MIGS</th>
                            <th style="text-align: center">REGISTERED MIGS</th>
                            <th style="text-align: center">% REGISTERED</th>
                            <th style="text-align: center">Amendment No.</th>
                            <th style="text-align: center">Total YES</th>
                            <th style="text-align: center">Total NO</th>
                            <th style="text-align: center">% YES VOTES</th>
                          </tr>
                        </tfoot>
                        <tbody>
                          <tr>
                            <td style="text-align: center"  rowspan="3">4775</th>
                            <td style="text-align: center" rowspan="3">4075</th>
                            <td style="text-align: center" rowspan="3">98%</th>
                            <td style="text-align: center">Amendment 1 - Article I</th>
                            <td style="text-align: center">4050</th>
                            <td style="text-align: center">25</th>
                            <td style="text-align: center">95%</th>
                          </tr>
                          <tr>
                            <td style="text-align: center">Amendment 2 - Article II</th>
                            <td style="text-align: center">4050</th>
                            <td style="text-align: center">25</th>
                            <td style="text-align: center">95%</th>
                          </tr>
                          <tr>
                            <td style="text-align: center">Amendment 3 - Article III</th>
                            <td style="text-align: center">4050</th>
                            <td style="text-align: center">25</th>
                            <td style="text-align: center">95%</th>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
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
    $.ajax({
        type: "GET",
        url: "{{ route('ba.votingPeriod.default') }}",
        //data: { votingPeriodID : votingPeriodID },
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
          //swal.close();

          if(data.votingPeriodID)
          {
            $('#cy').html(data.cy);
            /*
            $('#votingPeriodID').val(data.votingPeriodID);
            $('#startDate').val(data.startDate);
            $('#endDate').val(data.endDate);
            $('#isDefault').prop('checked', ((data.isDefault == 1) ? true : false));

            $('#btnSaveVotingPeriod').removeClass('d-block').addClass('d-none');
            $('#btnUpdateVotingPeriod').removeClass('d-none').addClass('d-block');
            $('#btnRemoveVotingPeriod').removeClass('d-none').addClass('d-block');

            $('#modalVotingPeriod').modal('show');
            */
            $.ajax({
              type: "GET",
              url: "{{ route('ba.candidateLimit.default') }}",
              data: { votingPeriodID : data.votingPeriodID },
              contentType: "application/json; charset=utf-8",
              beforeSend:  function() {
                //swal({ title: 'Loading..', onOpen: () => swal.showLoading(), allowOutsideClick: () => !swal.isLoading() });
              },
              error: function (jqXHR, exception) {
                swal.close();
              
                console.log(jqXHR.responseText);
                swal({ title: "Error " + jqXHR.status, text: "Please try again later.", type: "error", buttonsStyling: false, confirmButtonClass: "btn btn-success"})
              },
              success: function (data2) {
                //swal.close();
                  
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
                    url: "{{ route('ba.candidate.default') }}",
                    data: { 
                      subDiv : subDiv, //FOR DESIGN
                      votingPeriodID : data.votingPeriodID, 
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
                                  "<h3 class='card-title'>0</h3> " +
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
          else 
          {
            swal.close();
            
            $('#cy').html("NO VOTING PERIOD FOUND!");
            //swal({ title: "Error", text: "Please try again later.", type: "error", buttonsStyling: false, confirmButtonClass: "btn btn-success"})
          }
        }
    });   

    $('#datatables').DataTable({
      "pagingType": "full_numbers",
      "lengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
      ],
      responsive: true,
      language: {
        search: "INPUT",
        searchPlaceholder: "Search records",
      }
    });
  });
  
</script>


@parent
@endsection
<!--   Script Plugins -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    {{-- Base Meta Tags --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset=utf-8 />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/2.1.0/styles/overlayscrollbars.min.css" integrity="sha512-SWInhnSfP5LyduITbBbAzzj0LCCw6CBqQIfLMACCnuihNPoTLoOGvT+YVmHsV6ub1VWKrQ2wPhZFmR+c5GZUMw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Configured Stylesheets --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css" integrity="sha512-IuO+tczf4J43RzbCMEFggCWW5JuX78IrCJRFFBoQEXNvGI6gkUw4OjuwMidiS4Lm9Q2lILzpJwZuMWuSEeT9UQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://kit.fontawesome.com/0c1b77a3c1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <meta charset=utf-8 />
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> --}}
  <!-- Include Chart.js -->
  {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
    <title>
        Income-Statment
    </title>
<style>
     .form-group {
  position: relative;
}

.title {
  position: absolute;
  top: -1.5em;
  left: 0.25em;
  background-color: #fff;
  padding: 0 0.5em;
}
.custom-col-2{
        flex:0 0 12.6%;
        max-width: 12.6%;
    }
.span2{
width: 110px;
font-size: 11px;

}
.card-body span{

}
.form-control{
    font-size: 11px;

}
/* .tableFixHead { overflow-y: auto; height: 750px; } */

      .chart-container {
      position: relative;
      height: 200px;
    }
</style>
</head>

<body>

<div class="container-fluid small">

    <div class="col-lg-12">

        <div class="card mt-3">
            <div style="background-color:#EEE;" class="card-header">
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-bs-toggle="collapse" data-bs-target="#collapseCard">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
              <div class="row">
                <h5 class="text-blue mx-auto">Profit / Loss Statement</h5>
              </div>
            </div>
            <div class="collapse show" id="collapseCard">
              <div class="card-body">
                <div class="row">
                  <div class="input-group col-sm-2 py-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="">Date From :</span>
                    </div>
                    <input id="TxtDateFrom" type="date" class="custom-input form-control" value="">
                  </div>
                  <div class="input-group col-sm-2 py-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="">Date to :</span>
                    </div>
                    <input id="TxtDateTo" type="date" class="custom-input form-control" value="">
                  </div>
                  <a name="CmdGo" id="CmdGo" class="btn btn-success col-sm-1" role="button">Go</a>
                  <div class="input-group col-sm-2 mx-auto py-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="">Uploaded User :</span>
                    </div>
                    <input id="WorkUser" readonly type="text" class="custom-input form-control text-uppercase" value="">
                  </div>
                  <div class="input-group col-sm-2 ml-auto py-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="">Uploaded Date :</span>
                    </div>
                    <input id="Updatedate" readonly type="date" class="custom-input form-control" value="">
                  </div>
                </div>
              </div>
            </div>
          </div>





        <div class="card mt-3">
            <div  style="background-color:#EEE; " class="card-header">
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-bs-toggle="collapse" data-bs-target="#collapseCard2">
                        <i class="fas fa-minus"></i>
                      </button>
                </div>


            </div>
            <div class="collapse show" id="collapseCard2">
            <div class="card-body">
                <div class="col-sm-12">
                    <div class="table-responsive tableFixHead border border-dark">
                        <table class="table table-striped table-bordered" id="Statmenttable">
                            <thead class="bg-info">
                                <tr>
                                    <th colspan="1">Title</th>
                                    <th colspan="5">Account&nbsp;Title</th>
                                    <th colspan="4" class="text-right">Amount</th>
                                    {{-- <th colspan="1" class="text-right">Total Amt</th> --}}
                                    <th colspan="1" class="text-right">Per</th>
                                </tr>
                            </thead>
                            <tbody id="Statmenttablebody">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </div>


<div class="row ">
            <div class="card col-lg-5 ml-auto mx-2">
                <div class="col-sm-12">
                    <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Sales</h3>
                        <a data-bs-toggle="collapse" data-bs-target="#collapseCard2" >View Report</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex">
                        <p class="d-flex flex-column">
                            <span class="totalams" class="text-bold text-lg"></span>
                            <span>Sales Over Time</span>
                        </p>
                        <p class="ml-auto d-flex flex-column text-right">
                <span class="dispercentage" class="">

                </span>
                            <span class="text-muted">Since last month</span>
                        </p>
                    </div>
                    <!-- /.d-flex -->

                    <div class="position-relative mb-4">
                        <canvas id="sales-chart" height="200"></canvas>
                    </div>

                    {{-- <div class="d-flex flex-row justify-content-end">
              <span class="mr-2">
                <i class="fas fa-square text-primary"></i> This year
              </span>

                        <span>
                <i class="fas fa-square text-gray"></i> Last year
              </span>
                    </div> --}}
                </div>
                  </div>




                </div>

            <div class="card col-lg-5 mr-auto mx-2">
                <div class="col-sm-12">
                    <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Sales</h3>
                        <a data-bs-toggle="collapse" data-bs-target="#collapseCard2" >View Report</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex">
                        <p class="d-flex flex-column">
                            <span class="totalams" class="text-bold text-lg"></span>
                            <span>Sales Over Time</span>
                        </p>
                        <p class="ml-auto d-flex flex-column text-right">
                <span class="dispercentage" class="">

                </span>
                            <span class="text-muted">Since last month</span>
                        </p>
                    </div>
                    <!-- /.d-flex -->

                    <div class="position-relative mb-4">
                        <canvas id="sales-chart2" height="200"></canvas>
                    </div>

                    {{-- <div class="d-flex flex-row justify-content-end">
              <span class="mr-2">
                <i class="fas fa-square text-primary"></i> This year
              </span>

                        <span>
                <i class="fas fa-square text-gray"></i> Last year
              </span>
                    </div> --}}
                </div>
                  </div>





                </div>
            </div>

</div>








<style>

</style>
<script src="{{url('/vendor/chart.js/Chart.min.js')}}"></script>

<script>
 function ca(monthlyTotals){

    var datefrom = $('#TxtDateFrom').val();
var dateto = $('#TxtDateTo').val();

// Parse the date strings into Date objects
var fromDate = new Date(datefrom);
var toDate = new Date(dateto);

// Generate an array of month labels
var labels = [];
for (var date = new Date(fromDate); date <= toDate; date.setMonth(date.getMonth() + 1)) {
  labels.push(date.toLocaleString('en-US', { month: 'short' }));
}





      var ticksStyle = {
        fontColor: '#495057',
        fontStyle: 'bold'
    }

    var mode = 'index'
    var intersect = true
    var $salesChart = $('#sales-chart')
    var $salesChart2 = $('#sales-chart2')
    // eslint-disable-next-line no-unused-vars
    var salesChart = new Chart($salesChart, {
        // type: 'line',
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    backgroundColor: '#007bff',
                    borderColor: '#007bff',
                    data: monthlyTotals
                },
                // {
                //     backgroundColor: '#ced4da',
                //     borderColor: '#ced4da',
                //     data: [700, 1700, 2700, 2000, 1800, 1500, 2000]
                // }
            ]
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                mode: mode,
                intersect: intersect
            },
            hover: {
                mode: mode,
                intersect: intersect
            },
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    // display: false,
                    gridLines: {
                        display: true,
                        lineWidth: '4px',
                        color: 'rgba(0, 0, 0, .2)',
                        zeroLineColor: 'transparent'
                    },
                    ticks: $.extend({
                        beginAtZero: true,

                        // Include a dollar sign in the ticks
                        callback: function (value) {
                            if (value >= 1000) {
                                value /= 1000
                                value += 'k'
                            }

                            return '$' + value
                        }
                    }, ticksStyle)
                }],
                xAxes: [{
                    display: true,
                    gridLines: {
                        display: false
                    },
                    ticks: ticksStyle
                }]
            }
        }
    });
    var salesChart2 = new Chart($salesChart2, {
        type: 'line',
        // type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    backgroundColor: '#007bff',
                    borderColor: '#007bff',
                    data: monthlyTotals
                },
                // {
                //     backgroundColor: '#ced4da',
                //     borderColor: '#ced4da',
                //     data: [700, 1700, 2700, 2000, 1800, 1500, 2000]
                // }
            ]
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                mode: mode,
                intersect: intersect
            },
            hover: {
                mode: mode,
                intersect: intersect
            },
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    // display: false,
                    gridLines: {
                        display: true,
                        lineWidth: '4px',
                        color: 'rgba(0, 0, 0, .2)',
                        zeroLineColor: 'transparent'
                    },
                    ticks: $.extend({
                        beginAtZero: true,

                        // Include a dollar sign in the ticks
                        callback: function (value) {
                            if (value >= 1000) {
                                value /= 1000
                                value += 'k'
                            }

                            return '$' + value
                        }
                    }, ticksStyle)
                }],
                xAxes: [{
                    display: true,
                    gridLines: {
                        display: false
                    },
                    ticks: ticksStyle
                }]
            }
        }
    });
}
  </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
  <script>
    $(document).ready( function () {
        var currentDate = new Date();
var previousMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() - 1, 1);
var previousMonthStart = new Date(previousMonth.getFullYear(), previousMonth.getMonth(), 1);
var previousMonthEnd = new Date(previousMonth.getFullYear(), previousMonth.getMonth() + 1, 0);

var previousMonthStartDate = formatDate(previousMonthStart);
var previousMonthEndDate = formatDate(previousMonthEnd);

$('#TxtDateFrom').val(previousMonthStartDate);
$('#TxtDateTo').val(previousMonthEndDate);

function formatDate(date) {
  var year = date.getFullYear();
  var month = (date.getMonth() + 1).toString().padStart(2, '0');
  var day = date.getDate().toString().padStart(2, '0');
  return year + '-' + month + '-' + day;
}


        $('#CmdGo').click(function(e){
            var TxtDateTo = $('#TxtDateTo').val();
            var TxtDateFrom = $('#TxtDateFrom').val();

            ajaxSetup()

            $.ajax({
                type : 'post',
                url : '{{URL::to('GetTempIncome')}}',
                data: {
                    TxtDateTo,
                    TxtDateFrom,
                },
                beforeSend: function() {
                    // Show the overlay and spinner before sending the request
                    $('.overlay').show();
                },
                    success: function(response) {
                        console.log(response);


                        if (response.Income) {
    var data = response.Income;
    if(data[0].WorkUser){
        $('#WorkUser').val(data[0].WorkUser);
    }
    if(data[0].UploadDate){
        var Update = new Date(data[0].UploadDate);
        const Updatedate = Update.toISOString().substring(0, 10);
        console.log(Updatedate);
        $('#Updatedate').val(Updatedate);
    }
    let output = '';

    // Assuming you have received the data array from AJAX in the variable 'data'

    const groupItemsGrouped = groupBy(data, 'GroupName');
const monthlyTotals = []; // Array to store monthly totals
const percentageChanges = [];

for (const groupName in groupItemsGrouped) {
  const groupItems = groupItemsGrouped[groupName];

  const distinctTitleName = groupItems[0].TitleName;
  const Currency = groupItems[0].Currency;
  let DSubtotal = 0;
  let groupSubtotal = 0;
  let groupPer = 0;

  groupItems.forEach((item, index) => {
    if (index === 0) {
      output += `<tr>
          <td class="text-center font-weight-bold" colspan='11'>${groupName}</td>
      </tr>
      <tr>
          <td colspan='1' rowspan="${groupItems.length}">${distinctTitleName}</td>
          <td colspan='4'>${item.AccountDes}</td>
          <td colspan='5' class="text-right">(${formatDebit(item.Debit)})${item.Currency}</td>
          <td colspan='1' class="text-blue">${formatDebit(item.Per)}%</td>
      </tr>`;
    } else {
      output += `<tr>
          <td colspan='4'>${item.AccountDes}</td>
          <td colspan='5' class="text-right">(${formatDebit(item.Debit)})${item.Currency}</td>
          <td colspan='1' class="text-blue">${formatDebit(item.Per)}%</td>
      </tr>`;
    }

    DSubtotal += parseDebit(item.Debit);
    groupSubtotal += parseDebit(item.TotalAmt);
    groupPer += parseDebit(item.Per);
  });

  output += `<tr>
      <th class="text-right" colspan="9">Total Of (${groupName}) :</th>
      <th class="text-right font-weight-bold" colspan="1">(${DSubtotal ? DSubtotal.toFixed(2) : groupSubtotal.toFixed(2)})${Currency}</th>
      <th class="text-right font-weight-bold">(${groupPer.toFixed(2)})%</th>
  </tr>`;

  // Store the monthly total in the monthlyTotals array
  monthlyTotals.push(DSubtotal.toFixed(2));
//   console.log(monthlyTotals);


}
if (monthlyTotals.length > 1) {
  const lastIndex = monthlyTotals.length - 1;
  const previousTotal = monthlyTotals[lastIndex - 1];
  const currentTotal = monthlyTotals[lastIndex];

  if (previousTotal !== 0) {
    const percentageChange = ((currentTotal - previousTotal) / previousTotal) * 100;
    percentageChanges.push(percentageChange);
  } else {
    // Handle division by zero or missing data by setting the percentage change as NaN
    percentageChanges.push(NaN);
  }
} else {
  // For the first month, set the percentage change as 0
  percentageChanges.push(0);
}
// Calculate the average percentage change
const averagePercentageChange = percentageChanges.reduce((sum, change) => sum + change, 0) / percentageChanges.length;

// Display the average percentage change as a single value
// console.log(`Average Percentage Change: ${averagePercentageChange.toFixed(2)}%`);
ca(monthlyTotals);

if(averagePercentageChange < 0){
    $('.dispercentage').html(`<i class="fas fa-arrow-down"></i> ${averagePercentageChange.toFixed(2)}%`);
    $('.dispercentage').css('color', 'red');
}else{
    $('.dispercentage').html(`<i class="fas fa-arrow-up"></i> ${averagePercentageChange.toFixed(2)}%`);
    $('.dispercentage').css('background-color', 'green');

}



// console.log(percentageChanges);
// Calculate the total sum by iterating over all groups
const totalSum = Object.values(groupItemsGrouped).reduce((sum, groupItems) => {
  return sum + groupItems.reduce((subtotal, item) => {
    return subtotal + parseDebit(item.Debit);
  }, 0);
}, 0);

output += `<tr>
    <th class="text-right text-success" colspan="10">Grand Total :</th>
    <th class="text-right text-info colspan="1" font-weight-bold borderd" id="totalammount">(${totalSum.toFixed(2)})$</th>
</tr>`;

    // Now you can use the 'output' variable to insert the generated HTML into your page
    // For example, if you have a table with the id 'Statmenttablebody', you can set the innerHTML of that table as follows:
    document.getElementById('Statmenttablebody').innerHTML = output;

    // Helper function to group items by a specific property
    function groupBy(array, property) {
        return array.reduce((acc, obj) => {
            const key = obj[property];
            if (!acc[key]) {
                acc[key] = [];
            }
            acc[key].push(obj);
            return acc;
        }, {});
    }

    // Helper function to parse the 'Debit' value as a number
    function parseDebit(debit) {
        const parsedDebit = parseFloat(debit);
        return isNaN(parsedDebit) ? '' : parsedDebit;
    }

    // Helper function to format the 'Debit' value with the 'toFixed' method
    function formatDebit(debit) {
        const parsedDebit = parseDebit(debit);
        return parsedDebit.toFixed(2);
    }
}

var totalammount = $('#totalammount').text();
console.log(totalammount);
$(".totalams").text(totalammount);
                    },
                    error: function(data) {
                    console.log(data);
                    $('.overlay').hide();
                },
                complete: function() {
                    $('.overlay').hide();
                    // Hide the overlay and spinner after the request is complete
                }
            });
        });

    });
//     $(document).ready( function () {
//         var table = $('#Statmenttable').DataTable({
//             scrollY:350,
//             deferRender: true,
//             scroller: true,
//             paging: false,
//             info: false,
//             ordering: false,
//             responsive: true,
//             fixedHeader: true,
//             searching:false,
//             scrollX: true,

//         });









// });




function ajaxSetup(){

    $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

}

  </script>
 </body>

 </html>

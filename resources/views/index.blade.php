@extends('_partials.app')
@section('content')
<section class="content-header">
   <h1>
      Dashboard {{ Request::segment(1) }}
      <small></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="{{ url("/") }}"><i class="fa fa-dashboard"></i> Gestor Projectos</a></li>
      <li class="active">Dashboard</li>
   </ol>
</section>
<section class="content">
   <div class="row">
      <div class="col-lg-3 col-xs-6">
         <div class="small-box bg-teal">
            <div class="inner">
               <h3>150</h3>
               <p>Técnicos</p>
            </div>
            <div class="icon">
               <i class="ion ion-ios-people"></i>
            </div>
            <a href="#" class="small-box-footer">Ver todos <i class="fa fa-arrow-circle-right"></i></a>
         </div>
      </div>
      <div class="col-lg-3 col-xs-6">
         <div class="small-box bg-teal">
            <div class="inner">
               <h3>200</h3>
               <p>Organismos/Entidades</p>
            </div>
            <div class="icon">
               <i class="ion ion-android-contacts"></i>
            </div>
            <a href="#" class="small-box-footer">Ver todos <i class="fa fa-arrow-circle-right"></i></a>
         </div>
      </div>
      <div class="col-lg-3 col-xs-6">
         <div class="small-box bg-teal">
            <div class="inner">
               <h3>200</h3>
               <p>Consultores</p>
            </div>
            <div class="icon">
               <i class="ion ion-ios-people"></i>
            </div>
            <a href="#" class="small-box-footer">Ver todos <i class="fa fa-arrow-circle-right"></i></a>
         </div>
      </div>
      <div class="col-lg-3 col-xs-6">
         <div class="small-box bg-teal">
            <div class="inner">
               <h3>15</h3>
               <p>Promotores</p>
            </div>
            <div class="icon">
               <i class="ion ion-filing"></i>
            </div>
            <a href="#" class="small-box-footer">Ver todos <i class="fa fa-arrow-circle-right"></i></a>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-6">
         <div class="box box-primary">
            <div class="box-header with-border">
               <h3 class="box-title">Valor Facturado Ano</h3>
               <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
               </div>
            </div>
            <div class="box-body">
               <div class="chart">
                  <canvas id="areaChart" style="height:250px"></canvas>
               </div>
            </div>
         </div>
         <div class="box box-danger">
            <div class="box-header with-border">
               <h3 class="box-title">Total Facturado por Distrito</h3>
               <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
               </div>
            </div>
            <div class="box-body">
               <canvas id="pieChart" style="height:250px"></canvas>
            </div>
         </div>
      </div>
      <div class="col-md-6">
         <div class="box box-info">
            <div class="box-header with-border">
               <h3 class="box-title">Facturaçao por programa</h3>
               <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
               </div>
            </div>
            <div class="box-body">
               <div class="chart">
                  <canvas id="radar" style="height:250px"></canvas>
               </div>
            </div>
         </div>
         <div class="box box-success">
            <div class="box-header with-border">
               <h3 class="box-title">grafico</h3>
               <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
               </div>
            </div>
            <div class="box-body">
               <div class="chart">
                  <canvas id="barChart" style="height:230px"></canvas>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
@section('javascript')
<script src="{{ asset ("theme/plugins/chartjs/chart.min.js") }}"></script>
<script>

  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var areaChart = new Chart(areaChartCanvas);

    var areaChartData = {
      labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro",],
      datasets: [
        {
          label: "Electronics",
          fillColor: "rgba(210, 214, 222, 1)",
          strokeColor: "rgba(210, 214, 222, 1)",
          pointColor: "rgba(210, 214, 222, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: [65, 59, 80, 81, 56, 55, 40, 80, 81, 56, 55, 40,]
        },
        {
          label: "Digital Goods",
          fillColor: "rgba(60,141,188,0.9)",
          strokeColor: "rgba(60,141,188,0.8)",
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [28, 48, 40, 19, 86, 27, 90, 40, 19, 86, 27, 90]
        }
      ]
    };

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: false,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - Whether the line is curved between points
      bezierCurve: true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension: 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot: false,
      //Number - Radius of each point dot in pixels
      pointDotRadius: 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth: 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius: 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke: true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth: 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true
    };

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions);

    //-------------
    //- radar
    //--------------
    //
   /*!
 * Chart.js
 * http://chartjs.org
 *
 * Copyright 2013 Nick Downie
 * Released under the MIT license
 * https://github.com/nnnick/Chart.js/blob/master/LICENSE.md
 */


// ======================================================
// Radar Chart
// ======================================================

//radar chart data
var radarData = {
   labels: ["PAE", "SouMais", "Investe Jovem", "PDR 2020", "CoopJovem",],
   datasets : [
      {
          fillColor: "rgba(102,45,145,.1)",
          strokeColor: "rgba(102,45,145,1)",
         pointColor : "rgba(220,220,220,1)",
         pointStrokeColor : "#fff",
        data: [28, 48, 40, 19, 86]
      },
      {
           fillColor: "rgba(63,169,245,.1)",
            strokeColor: "rgba(63,169,245,1)",
         pointColor : "rgba(151,187,205,1)",
         pointStrokeColor : "#fff",
         data: [65, 59, 80, 81, 56]
      }
   ]
}


   //Create Radar chart
   var ctx2 = document.getElementById("radar").getContext("2d");
   var myNewChart = new Chart(ctx2).Radar(radarData);

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
      {
        value: 700,
        color: "#f56954",
        highlight: "#f56954",
        label: "Aveiro"
      },
      {
        value: 500,
        color: "#00a65a",
        highlight: "#00a65a",
        label: "Beja"
      },
      {
        value: 400,
        color: "#f39c12",
        highlight: "#f39c12",
        label: "Braga"
      },
      {
        value: 600,
        color: "#00c0ef",
        highlight: "#00c0ef",
        label: "Bragança"
      },
      {
        value: 300,
        color: "#3c8dbc",
        highlight: "#3c8dbc",
        label: "Castelo Branco"
      },
      {
        value: 100,
        color: "#d2d6de",
        highlight: "#d2d6de",
        label: "Coimbra"
      }
    ];
    var pieOptions = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      //String - The colour of each segment stroke
      segmentStrokeColor: "#fff",
      //Number - The width of each segment stroke
      segmentStrokeWidth: 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps: 100,
      //String - Animation easing effect
      animationEasing: "easeOutBounce",
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate: true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale: false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions);

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas);
    var barChartData = areaChartData;
    barChartData.datasets[1].fillColor = "#00a65a";
    barChartData.datasets[1].strokeColor = "#00a65a";
    barChartData.datasets[1].pointColor = "#00a65a";
    var barChartOptions = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - If there is a stroke on each bar
      barShowStroke: true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth: 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing: 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing: 1,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to make the chart responsive
      responsive: true,
      maintainAspectRatio: true
    };

    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions);
  });
</script>
@endsection
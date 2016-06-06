<!DOCTYPE html>
<html>
<head>
	<title>Test chart js</title>
	<script type="text/javascript" src="{{ Asset('jqueryganttview/jquery-1.4.2.js') }}"></script>
	<script src="{{ Asset('chartjs/Chart.js') }}"></script>
</head>
<body>
<canvas id="pieChart" width="521" height="260"></canvas>

<div id="js-legend" class="chart-legend">
	
</div>

<script type="text/javascript">
//-------------
//- PIE CHART -
//-------------
// Get context with jQuery - using jQuery's .get() method.
var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
var pieChart = new Chart(pieChartCanvas);
var arrColor = ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'];

var PieData = [
  <?php
  foreach ($countStatus as $key => $itemStatus) {
    ?>
    {
      value: {{$itemStatus->countstatus}},
      color: arrColor[{{ $key }}],
      highlight: arrColor[{{ $key }}],
      label: "{{$itemStatus->label}}"
    },
    <?php
  }
  ?>
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
  legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].color%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
  labelAlign: 'center'
};

//Create pie or douhnut chart
// You can switch between pie and douhnut using the method below.
var pieDoughnut = pieChart.Doughnut(PieData, pieOptions);
document.getElementById('js-legend').innerHTML = pieDoughnut.generateLegend();

</script>
</body>
</html>
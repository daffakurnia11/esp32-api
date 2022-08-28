@extends('layouts.main')

@section('content')

  <!--Header-->
  <div class="page-breadcrumb d-flex flex-column flex-md-row align-items-center mb-3">
    <div class="breadcrumb-title pe-md-3">Panel 1 Monitoring</div>
    <div class="ps-md-3 ms-md-auto mx-auto mx-md-0 mt-3 mt-md-0">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item">
            <a href="/">
              Dashboard
            </a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Panel 1</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end of Header--> 

  <h6 class="mb-0 text-uppercase">First BMP280 Sensor</h6>
  <hr>
  <div class="card">
    <div class="card-body">
      <div id="firstSensor"></div>
    </div>
  </div>

  <h6 class="mb-0 text-uppercase">Second BMP280 Sensor</h6>
  <hr>
  <div class="card">
    <div class="card-body">
      <div id="secondSensor"></div>
    </div>
  </div>

  <h6 class="mb-0 text-uppercase">Third BMP280 Sensor</h6>
  <hr>
  <div class="card">
    <div class="card-body">
      <div id="thirdSensor"></div>
    </div>
  </div>

@endsection

@section('javascript')
<script>
  const url = window.location.origin;

  var chartOption = {
    chart: {
      type: 'line',
      height: 300
    },
    series: [{
      name: 'temperature',
      data: []
    }],
    stroke: {
      show: true,
      curve: 'smooth',
      lineCap: 'butt',
      colors: undefined,
      width: 3,
      dashArray: 0,      
    },
    xaxis: {
      labels: {
        show: false,
      },
      tooltip: {
        enabled: false,
      }
    },
    title: {
      text: undefined,
      align: 'center',
      style: {
        fontSize:  '14px',
        fontWeight:  'bold',
      },
    }
  }

  var firstChart = new ApexCharts(document.getElementById("firstSensor"), chartOption);
  firstChart.render();
  var secondChart = new ApexCharts(document.getElementById("secondSensor"), chartOption);
  secondChart.render();
  var thirdChart = new ApexCharts(document.getElementById("thirdSensor"), chartOption);
  thirdChart.render();

  var updateChart = function () {
      $.ajax({
        type: "GET",
        url: url + '/api/panel_sensor/Panel1/monitoring?sensor=1',
        dataType: 'JSON',
        success: function (resp) {
          const dataArray = [];

          resp.data.forEach(data => {
            let time = moment(data.created_at).format("MMM, DD YYYY - HH:mm:ss");
            let dataJson = {x: time, y: data.temperature};
            dataArray.push(dataJson);
          });
          console.log(dataArray)

          firstChart.updateOptions({
            series: [{
              name: 'temperature',
              data: dataArray
            }],
            title: {
              text: "First BMP280 Temperature Sensor"
            }
          })
        }
      });

      $.ajax({
        type: "GET",
        url: url + '/api/panel_sensor/Panel1/monitoring?sensor=2',
        dataType: 'JSON',
        success: function (resp) {
          const dataArray = [];

          resp.data.forEach(data => {
            let time = moment(data.created_at).format("MMM, DD YYYY - HH:mm:ss");
            let dataJson = {x: time, y: data.temperature};
            dataArray.push(dataJson);
          });
          console.log(dataArray)

          secondChart.updateOptions({
            series: [{
              name: 'temperature',
              data: dataArray
            }],
            title: {
              text: "Second BMP280 Temperature Sensor"
            }
          })
        }
      });

      $.ajax({
        type: "GET",
        url: url + '/api/panel_sensor/Panel1/monitoring?sensor=3',
        dataType: 'JSON',
        success: function (resp) {
          const dataArray = [];

          resp.data.forEach(data => {
            let time = moment(data.created_at).format("MMM, DD YYYY - HH:mm:ss");
            let dataJson = {x: time, y: data.temperature};
            dataArray.push(dataJson);
          });
          console.log(dataArray)

          thirdChart.updateOptions({
            series: [{
              name: 'temperature',
              data: dataArray
            }],
            title: {
              text: "Third BMP280 Temperature Sensor"
            }
          })
        }
      });
    }

    updateChart();
    setInterval(() => {
      updateChart();
    }, 5000);
  </script>
  @endsection
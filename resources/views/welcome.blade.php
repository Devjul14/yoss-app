@include('assets.header')

@include('assets.sidebar')

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    @yield('content')
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="fas fa-archive"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Penjualan</h4>
            </div>
            <div class="card-body">
              {{ $count_transaction }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="fas fa-dollar-sign"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Pendapatan</h4>
            </div>
            <div class="card-body">
              {{ $pendapatan }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="fas fa-shopping-bag"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Product</h4>
            </div>
            <div class="card-body">
              {{ $count_product }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="fas fa-users"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Pegawai</h4>
            </div>
            <div class="card-body">
              {{ $count_users }}
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-8">
        <div class="card">
          <div class="card-header">
            <h4>Statistics</h4>
          </div>
          <div class="card-body">
            <canvas id="mySales" height="158"></canvas>
            <div class="statistic-details mt-sm-4">
              <div class="statistic-details-item">
                <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 7%</span>
                <div class="detail-value">$243</div>
                <div class="detail-name">Today's Sales</div>
              </div>
              <div class="statistic-details-item">
                <span class="text-muted"><span class="text-danger"><i class="fas fa-caret-down"></i></span> 23%</span>
                <div class="detail-value">$2,902</div>
                <div class="detail-name">This Week's Sales</div>
              </div>
              <div class="statistic-details-item">
                <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span>9%</span>
                <div class="detail-value">$12,821</div>
                <div class="detail-name">This Month's Sales</div>
              </div>
              <div class="statistic-details-item">
                <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 19%</span>
                <div class="detail-value">$92,142</div>
                <div class="detail-name">This Year's Sales</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- Main Content -->
<script>
  var labels = <?= json_encode($labels) ?>;
  var data = <?= json_encode($datasets) ?>;
  // console.log(labels, data)
  "use strict";

  var statistics_chart = document.getElementById("mySales").getContext('2d');
  var mySales = new Chart(statistics_chart, {
    type: 'line',
    data: {
      labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
      datasets: [{
        label: 'Statistics',
        data: [640, 387, 530, 302, 430, 270, 488],
        borderWidth: 5,
        borderColor: '#6777ef',
        backgroundColor: 'transparent',
        pointBackgroundColor: '#fff',
        pointBorderColor: '#6777ef',
        pointRadius: 4
      }]
    },
    options: {
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          gridLines: {
            display: false,
            drawBorder: false,
          },
          ticks: {
            stepSize: 150
          }
        }],
        xAxes: [{
          gridLines: {
            color: '#fbfbfb',
            lineWidth: 2
          }
        }]
      },
    }
  });
</script>
@include('assets.footer')
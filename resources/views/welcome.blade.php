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
              Rp. {{ $pendapatanHarian }}
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
            <h4>Contoh Penjualan perbulan</h4>
          </div>
          <div class="card-body">
            <canvas id="mySales" height="158"></canvas>
            <div class="statistic-details mt-sm-4">
              <div class="statistic-details-item">
                <div class="detail-value">Rp. {{ $pendapatanHarian }} </div>
                <div class="detail-name">Perhari</div>
              </div>
              <div class="statistic-details-item">
                <div class="detail-value">Rp. {{ $pendapatanMingguan }}</div>
                <div class="detail-name">Perminggu</div>
              </div>
              <div class="statistic-details-item">
                <div class="detail-value">Rp. {{ $pendapatanBulanan }}</div>
                <div class="detail-name">Perbulan</div>
              </div>
              <div class="statistic-details-item">
                <div class="detail-value">Rp. {{ $pendapatanTahunan }}</div>
                <div class="detail-name">Pertahun</div>
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
  var labels = <?= $labels ?>;
  var data = <?= $datasets ?>;
  console.log(labels, data)

  "use strict";
  window.onload = function() {
    var statistics_chart = document.getElementById("mySales").getContext('2d');
    var mySales = new Chart(statistics_chart, {
      type: 'line',
      data: {
        labels: labels,
        datasets: [{
          label: 'Statistics',
          data: data,
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
  }
</script>
@include('assets.footer')
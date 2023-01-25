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
            <canvas id="myChart" height="158"></canvas>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- Main Content -->

@include('assets.footer')
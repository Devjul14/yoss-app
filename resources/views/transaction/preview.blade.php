@include('assets.header')

@include('assets.sidebar')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Print Invoice</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Invoice</div>
            </div>
        </div>

        @if (session()->has('success'))
        <div class="alert alert-success alert-has-icon">
            <div class="alert-icon"><i class="fa fa-check"></i></i></div>
            <div class="alert-body">
                <div class="alert-title"><strong>Success</strong></div>
                {{ session('success') }}
            </div>
        </div><br>
        <div class="text-md-center">
            <button class="btn btn-lg btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
        </div>
        @endif

        <div class="section-body">
            <div class="invoice">
                <div class="invoice-print">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="invoice-title">

                                <div class="invoice-number">Order #{{ $transactions->transaction_id }}</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <address>
                                        <h4 class="mb-0">{{ $transactions->store_name }}</h4><br>
                                        {{ $transactions->stores_phone }}<br>
                                        {{ $transactions->stores_address }}
                                    </address>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <address>
                                        Cirebon, {{ date('j F, Y', strtotime($transactions->date)) }}<br><br>

                                        {{ $transactions->customer }}<br>
                                        {{ $transactions->customers_phone }}<br>
                                        {{ $transactions->customers_address }}<br>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="section-title">Order Summary</div>
                            <p class="section-lead">All items here cannot be deleted.</p>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-md">
                                    <tr>
                                        <th data-width="40">#</th>
                                        <th>Type</th>
                                        <th>Item</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-right">Totals</th>
                                    </tr>
                                    <tbody id="container1"></tbody>
                                </table>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-12 text-right">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Total</div>
                                        <div class="invoice-detail-value invoice-detail-value-lg">0</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="text-md-right">
                    <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
                </div>
            </div>
        </div>

    </section>
</div>

@include('assets.footer')
@include('assets.header')

@include('assets.sidebar')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Invoice</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Invoice</div>
            </div>
        </div>

        <div class="section-body">
            <div class="invoice">
                <div class="invoice-print">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="invoice-title">
                                <h2>Yoss Elektronik</h2>
                                <div class="invoice-number">Order #12345</div>
                            </div>
                            <hr>
                            <div class="row">
                                <!-- <div class="form-group col-md-8"> -->
                                <div class="col-md-3">
                                    <strong>Product:</strong><br>
                                    <input type="text" class="form-control" name="product">
                                </div>
                                <div class="col-md-1">
                                    <strong>Qty:</strong><br>
                                    <input type="text" class="form-control" name="qty">
                                </div>
                                <!-- </div> -->
                                <div class="col-md-4 text-md-left"></div>
                                <div class="col-md-4 text-md-left">
                                    <strong>Customer:</strong><br>
                                    <input type="text" class="form-control" name="customer">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <address>
                                        <strong>Payment Method:</strong><br>
                                        Visa ending **** 4242<br>
                                        ujang@maman.com
                                    </address>
                                </div>
                                <div class="col-md-4 text-md-left"></div>
                                <div class="col-md-4 text-md-left">
                                    <address>
                                        <strong>Order Date:</strong><br>
                                        {{ $now }} <br><br>
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
                                        <th>Item</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-right">Totals</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Mouse Wireless</td>
                                        <td class="text-center">$10.99</td>
                                        <td class="text-center">1</td>
                                        <td class="text-right">$10.99</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Keyboard Wireless</td>
                                        <td class="text-center">$20.00</td>
                                        <td class="text-center">3</td>
                                        <td class="text-right">$60.00</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Headphone Blitz TDR-3000</td>
                                        <td class="text-center">$600.00</td>
                                        <td class="text-center">1</td>
                                        <td class="text-right">$600.00</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-12 text-right">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Total</div>
                                        <div class="invoice-detail-value invoice-detail-value-lg">$685.99</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="text-md-right">
                    <div class="float-lg-left mb-lg-0 mb-3">
                        <button class="btn btn-primary btn-icon icon-left"><i class="fas fa-credit-card"></i> Process Payment</button>
                        <button class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i> Cancel</button>
                    </div>
                    <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
                </div>
            </div>
        </div>
    </section>
</div>
@include('assets.footer')
@include('assets.header')

@include('assets.sidebar')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Invoice</h1>
        </div>
        <div class="section-body">
            <div class="invoice">
                <div class="invoice-print">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <address>
                                        No. Invoice <span>: </span>{{ $transactions->transaction_id }}<br>
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
                            <div class="section-title">Order Table</div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-md">
                                    <tr>
                                        <th data-width="40">Banyak</th>
                                        <th>Nama Barang</th>
                                        <th>Tipe</th>
                                        <th class="text-center">Harga Satuan</th>
                                        <th class="text-center">Jumlah</th>
                                    </tr>
                                    <tbody id="container1">
                                        @foreach ( $detail_transactions as $item)
                                        <tr>
                                            <td>{{ $item->qty }} </td>
                                            <td>{{ $item->name }} </td>
                                            <td>{{ $item->type }} </td>
                                            <td class="text-center">{{ $item->price }} </td>
                                            <td class="text-center">{{ $item->qty * $item->price}} </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-12 text-right">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Total</div>
                                        <div class="invoice-detail-value invoice-detail-value-lg">{{ $totalPrice }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
</div>

@include('assets.footer')
@include('assets.header')

@include('assets.sidebar')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Invoices</h1>
        </div>

        @if (session()->has('success'))
        <div class="alert alert-success alert-has-icon">
            <div class="alert-icon"><i class="fa fa-check"></i></i></div>
            <div class="alert-body">
                <div class="alert-title"><strong>Success</strong></div>
                {{ session('success') }}
            </div>
        </div>
        @endif

        <div class="section-body">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-header-action">
                            <a href="/create-invoice" class="btn btn-info">Add Invoice <i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-invoice">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Invoice ID</th>
                                        <th>Customer</th>
                                        <th>Status</th>
                                        <th>Due Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $item)
                                    <tr>
                                        <td>{{ $item->transaction_id }}</td>
                                        <td>{{ $item->customer }}</td>
                                        <td>@if($item->status ==1)
                                            <span class="badge badge-success">Paid</span>
                                            @else
                                            <span class="badge badge-warning">Un Paid</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->date }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('assets.footer')
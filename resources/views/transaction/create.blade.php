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
            <form action="{{ url('create-invoice') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="invoice">
                    <div class="invoice-print">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="invoice-title">
                                    <h2>Yoss Elektronik</h2>
                                    <!-- <div class="invoice-number">Order #12345</div> -->
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4"> </div>
                                    <div class="col-md-4 text-md-left"></div>
                                    <div class="col-md-4 text-md-left">
                                        <address>
                                            <strong>Order Date:</strong><br>
                                            {{ $now }} <br><br>
                                        </address>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <strong>Product:</strong><br>
                                        <input type="text" class="form-control" name="product_name" id="product_name" autofocus>
                                        <input type="hidden" class="form-control" name="product_id" id="product_id">
                                        <input type="hidden" class="form-control" name="price" id="price">
                                        <input type="hidden" class="form-control" name="stock" id="stock">
                                    </div>
                                    <div class="col-md-2">
                                        <strong>Qty:</strong><br>
                                        <input type="text" class="form-control" name="qty" id="qty">
                                    </div>
                                    <div class="col-md-3">
                                        <br>
                                        <button type="button" name="addBtn" id="addBtn" class="btn btn-success"><i class='fa fa-file-o'></i>&nbsp;New</button>
                                    </div>
                                    <div class="col-md-4 text-md-left">
                                        <strong>Customer:</strong><br>
                                        <input type="text" class="form-control" name="customer_name" id="customer_name">
                                        <input type="hidden" class="form-control" name="customer_id" id="customer_id">
                                        <input type="hidden" class="form-control" name="store_id" id="strore_id" value="1">
                                        <input type="hidden" class="form-control" name="user_id" id="user_id" value="1">
                                        <input type="hidden" class="form-control" name="date" id="date" value="{{ $transDate }}">
                                        <input type="hidden" class="form-control" name="status" id="status" value="1">
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
                        <div class="float-lg-left mb-lg-0 mb-3">
                            <button type="submit" class="btn btn-primary btn-icon icon-left"><i class="fas fa-credit-card"></i> Process Payment</button>
                            <a href="{{ url('transaction') }}" class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i> Cancel</a>
                        </div>
                        <!-- <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button> -->
                    </div>
                </div>
            </form>
        </div>

    </section>
</div>


<script type="text/javascript">
    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function() {
        $("#product_name").autocomplete({
            source: function(request, response) {
                // Fetch data
                $.ajax({
                    url: "{{route('product.getProducts')}}",
                    type: 'get',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                // Set selection
                $('#product_name').val(ui.item.label); // display the selected text
                $('#product_id').val(ui.item.value); // save selected id to input
                return false;
            }
        });

        $("#customer_name").autocomplete({
            source: function(request, response) {
                // Fetch data
                $.ajax({
                    url: "{{route('customer.getCustomers')}}",
                    type: 'get',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                // Set selection
                $('#customer_name').val(ui.item.label); // display the selected text
                $('#customer_id').val(ui.item.value); // save selected id to input
                return false;
            }
        });

        var i = 0;
        $("#addBtn").click(function() {
            if ($("#product_name").val() == '') {
                alert('Product harus diisi !!!');
                $("#product_name").focus();
                return false;
            }
            if ($("#qty").val() == '') {
                alert('Qty harus diisi !!!');
                $("#qty").focus();
                return false;
            }
            if ($("#customer_name").val() == '') {
                alert('Customer harus diisi !!!');
                $("#customer_name").focus();
                return false;
            }

            const productId = $("#product_id").val();
            let price = 0;
            let qty = 1;
            if ($("#qty").val() != '') {
                qty = $("#qty").val();
            };
            const URL = '{{ url("get-product-details") }}?id=' + productId;
            $.ajax({
                url: URL,
                dataType: 'json',
                cache: false,
                async: false,
                data: {
                    id: productId,
                },
                success: function(response) {
                    type = response.type;
                    price = response.price;
                    stock = response.stock;
                    $("#type").val(type);
                    $("#price").val(price);
                    $("#stock").val(stock);
                }
            });
            let total = qty * price;

            if (qty > stock) {
                alert('Qty ' + qty + ' melebihi stock ' + stock);
                return false;
            }
            i++;
            $("#container1").append(
                (isEven(i) ? '<tr class="alt">' : '<tr class="records">') +
                '<td>' + i + '<input id="product_' + i + '" name="product_' + i + '" type="hidden" style="width:175px" class="form-control" value="' + $('#product_id').val() + '"></td>' +
                '<td>' + type + '<input id="type_' + i + '" name="type_' + i + '" type="hidden" style="width:175px" class="form-control" value="' + $('#type').val() + '"></td>' +
                '<td>' + $('#product_name').val() + '<input id="item_' + i + '" name="item_' + i + '" type="hidden" style="width:175px" class="form-control" value="' + $('#product_name').val() + '"></td>' +
                '<td style="text-align: center;">' + price + '<input id="price_' + i + '" name="price_' + i + '" type="hidden" style="width:175px" class="form-control" value="' + price + '"></td>' +
                '<td style="text-align: center;">' + qty + '<input id="qty_' + i + '" name="qty_' + i + '" type="hidden" style="width:50px" class="form-control" value="' + qty + '"></td>' +
                '<td style="text-align: right;">' + total + '<input id="total_' + i + '" name="total_' + i + '" type="hidden" style="width:175px" class="form-control total" value="' + total + '">' +
                '<input id="rows_' + i + '" name="rows1[]" value="' + i + '" type="hidden"></td></tr>'
            );

            let sum = 0;
            let items = document.getElementsByClassName("total");
            for (let i = 0; i < items.length; i++) {
                sum += parseInt(items[i].value);
            }

            $('div.invoice-detail-value').text(sum);
            $("#product_name").val('');
            $("#product_id").val('');
            $("#qty").val('');
            $("#price").val('');
            $("#stock").val('');
        });

        function isEven(i) {
            return (i % 2) == 0;
        }
    });
</script>

@include('assets.footer')
<!-- myPDF.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        .full-width {
            width: 100%;
            margin-left: auto;
            margin-right: auto;
        }

        td {
            width: 100%;
        }

        .mytable {
            text-align: center;
        }

        .store {
            text-align: center;
            font-weight: bold;
            font-size: 25px;
            margin-bottom: auto;
        }
    </style>
</head>

<body>
    <table class="full-width">
        <tr>
            <td style="text-align: center;">
                <p class="store">{{ $transactions->store_name }} </p><br>
                {{ $transactions->stores_phone }}
                <br>
                {{ $transactions->stores_address }}
            </td>
            <td>&nbsp;</td>
            <td>
                Cirebon, {{ date('j F, Y', strtotime($transactions->date)) }} <br><br>
                Kepada Yth <span> : </span> {{ $transactions->customer }} <br>
                No Telp/HP <span> : </span> {{ $transactions->customers_phone }} <br>
                Alamat <span> : </span> {{ $transactions->customers_address }}
            </td>
        </tr>
    </table>
    <br><br>
    <p><b> No : {{ $transactions->transaction_id }} </b></p>
    <table border="1" class="full-width mytable">
        <tr>
            <td>Banyak</td>
            <td>Nama Barang</td>
            <td>Tipe</td>
            <td>Harga Satuan</td>
            <td>Jumlah</td>
        </tr>
        @foreach ( $detail_transactions as $item)
        <tr>
            <td>{{ $item->qty }} </td>
            <td>{{ $item->name }} </td>
            <td>{{ $item->type }} </td>
            <td class="text-center">{{ $item->price }} </td>
            <td class="text-center">{{ $item->qty * $item->price}} </td>
        </tr>
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>Total</td>
            <td>{{ $totalPrice }}</td>
        </tr>
    </table>
    <br>

    <p>MAAF barang yang sudah di beli <span style="margin-left: 120px;"> Terimakasih,</span><br>
        tidak dapat ditukar atau dikembalikan</p>
    <p style="margin-left: 300px;">...</p>
</body>

</html>
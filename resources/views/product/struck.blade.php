<html>

<head>
    <title>Faktur Pembayaran</title>
    <style>
        #tabel {
            font-size: 15px;
            border-collapse: collapse;
        }

        #tabel td {
            padding-left: 5px;
            border: 1px solid black;
        }
    </style>
</head>

<body style='font-family:tahoma; font-size:8pt;' onload="javascript:window.print()">
    <center>
        <table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border='0'>
            <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
                <span style='font-size:12pt'><b>Nama Toko</b></span></br>
                Alamat Toko Alamat Toko Alamat Toko Alamat Toko Alamat Toko Alamat Toko Alamat Toko Alamat Toko Alamat
                Toko Alamat Toko </br>
                Telp : 085797887711
            </td>
            <td style='vertical-align:top' width='30%' align='left'>
                <b><span style='font-size:12pt'>FAKTUR PENJUALAN</span></b></br>
                No Trans. : {{ rand(00000, 99999) }}</br>
                Tanggal :{{ date('Y-m-d') }}</br>
            </td>
        </table>
        <table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border='0'>
            <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
                Nama Kasir : {{ $nama }}</br>
                Alamat : -
            </td>
            <td style='vertical-align:top' width='30%' align='left'>
                No Telp : 085797887711
            </td>
        </table>
        <table cellspacing='0' style='width:550px; font-size:8pt; font-family:calibri;  border-collapse: collapse;'
            border='1'>

            <tr align='center'>
                <td width='10%'>Kode Barang</td>
                <td width='20%'>Nama Barang</td>
                <td width='13%'>Satuan</td>
                <td width='13%'>Harga</td>
                <td width='4%'>Qty</td>
                <td width='13%'>Total Harga</td>
            <tr>
                @foreach ($struck as $a)
                    <td>{{ $a->id_barang }}</td>
                    <td>{{ $a->nama_barang }}</td>
                    <td>{{ $a->satuan }}</td>
                    <td>Rp. {{ number_format($a->harga) }}</td>
                    <td> {{ $a->jumlah }}</td>
                    <td style='text-align:right'>Rp. {{ number_format($a->total) }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan='5'>
                    <div style='text-align:right'>Total Yang Harus Di Bayar Adalah : </div>
                </td>
                <td style='text-align:right'>Rp. {{ number_format($total_all) }}</td>
            </tr>

            <tr>
                <td colspan='5'>
                    <div style='text-align:right'>Cash : </div>
                </td>
                <td style='text-align:right'>Rp. {{ number_format($cash) }}</td>
            </tr>
            <tr>
                <td colspan='5'>
                    <div style='text-align:right'>Kembalian : </div>
                </td>
                <td style='text-align:right'>Rp. {{ number_format($cashback) }}</td>
            </tr>
        </table>

        <table style='width:650; font-size:7pt;' cellspacing='2'>
            <tr>
                <td align='center'>Diterima Oleh,</br></br><u>(............)</u></td>
                <td style='border:1px solid black; padding:5px; text-align:left; width:30%'></td>
                <td align='center'>TTD,</br></br><u>(...........)</u></td>
            </tr>
        </table>
    </center>
</body>
<script>
    function number(number, decimals, dec_point, thousands_sep) {
        // Strip all characters but numerical ones.
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : 'Rp. ' + Math.round(n)).split(',');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }
</script>

</html>

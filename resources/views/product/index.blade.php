@extends('layouts.app-admin')
@section('content')
{{--
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"> --}}

@include('sweetalert::alert')
<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        <i class="flaticon2-supermarket text-primary"></i>
                    </span>
                    <h3 class="card-label">Product</h3>
                </div>
            </div>
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">

                        <h3 class="card-label"></h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Dropdown-->
                        <div class="dropdown dropdown-inline mr-2">
                            <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="la la-download"></i>Export</button>
                            <!--begin::Dropdown Menu-->
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <ul class="nav flex-column nav-hover">
                                    <li class="nav-header font-weight-bolder text-uppercase text-primary pb-2">Choose an
                                        option:
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" onclick="printData()" class="nav-link">
                                            <i class="nav-icon la la-print"></i>
                                            <span class="nav-text">Print</span>
                                        </a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon la la-copy"></i>
                                            <span class="nav-text">Copy</span>
                                        </a>
                                    </li> --}}


                                    <li class="nav-item">
                                        <a href="/exportexcel" class="nav-link">
                                            <i class="nav-icon la la-file-excel-o"></i>
                                            <span class="nav-text">Excel</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/exportcsv" class="nav-link">
                                            <i class="nav-icon la la-file-text-o"></i>
                                            <span class="nav-text">CSV</span>
                                        </a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon la la-file-pdf-o"></i>
                                            <span class="nav-text">PDF</span>
                                        </a>
                                    </li> --}}


                                </ul>
                            </div>
                            <!--end::Dropdown Menu-->
                        </div>
                        <!--end::Dropdown-->
                        <!--begin::Button-->
                        <a href="/add_product" class="btn btn-primary font-weight-bolder">
                            <i class="la la-plus"></i>Tambah</a>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <div class="table-responsive text-nowrap">

                        <table class="table table-bordered table-hover table-checkable table-responsive" id="datatable"
                            style="margin-top: 13px !important, margin-right:13px;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Profit</th>
                                    <th>Stok</th>
                                    <th>Satuan</th>
                                    <th>Cabang</th>
                                    <th>Suplier</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php

                                $no = 1;
                                @endphp
                                @foreach($data as $a)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $a->id}}</td>
                                    <td style="width: 15%">{{ $a->nama_barang }}</td>
                                    <td>{{ $a->kategori}}</td>
                                    <td>Rp.{{ number_format($a->harga_beli) }}</td>
                                    <td>Rp.{{ number_format($a->harga_jual) }}</td>
                                    <td>Rp.{{ number_format($a->profit) }}</td>
                                    <td>{{ $a->stok }}</td>
                                    <td>{{ $a->satuan }}</td>
                                    <td>{{ $a->id_cabang }}</td>
                                    <td>{{ $a->id_suplier }}</td>
                                    <td nowrap="nowrap">
                                        <a href="" class=""><i style="color: forestgreen" class="fas fa-edit"></i></a>
                                        <button class="danger" data-url=""><i style="color: red"
                                                class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $data->links() }} --}}

                        <!--end: Datatable-->
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>







<script>
    function number_format(number, decimals, dec_point, thousands_sep) {
        // Strip all characters but numerical ones.
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
        var n = !isFinite(+number) ? 0 : +number
            , prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
            , sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep
            , dec = (typeof dec_point === 'undefined') ? '.' : dec_point
            , s = ''
            , toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
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
<script>
    function printData() {
        var print_ = document.getElementById("datatable");
        win = window.open("");
        win.document.write(print_.outerHTML);
        win.print();
        win.close();
    }

</script>

@endsection
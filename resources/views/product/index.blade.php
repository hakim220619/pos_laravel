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
                                    @foreach ($data as $a)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $a->id }}</td>
                                            <td style="width: 15%">{{ $a->nama_barang }}</td>
                                            <td>{{ $a->kategori }}</td>
                                            <td>Rp.{{ number_format($a->harga_beli) }}</td>
                                            <td>Rp.{{ number_format($a->harga_jual) }}</td>
                                            <td>Rp.{{ number_format($a->profit) }}</td>
                                            <td>{{ $a->stok }}</td>
                                            <td>{{ $a->satuan }}</td>
                                            <td>{{ $a->id_cabang }}</td>
                                            <td>{{ $a->id_suplier }}</td>
                                            <td nowrap="nowrap">
                                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                    data-bs-target="#editproduct{{ $a->id }}">Edit</button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#delete{{ $a->id }}">Delete</button>
                                            </td>
                                            <div class="modal fade" id="delete{{ $a->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="addNewDonaturLabel">Hapus Kategori
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Anda yakin ingin menghapus {{ $a->nama_barang }}</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <a href="{{ url('delete_product/product', $a->id) }} "
                                                                class="btn btn-primary">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade bd-example-modal-xl" id="editproduct{{ $a->id }}"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Kategori
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <form action="/proses_edit_product" method="POST"
                                                            enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                @csrf
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>ID <span
                                                                                        class="text-danger">*</span></label>
                                                                                <input type="text"
                                                                                    class="form-control form-control-solid"
                                                                                    placeholder="Generate Otomatis"
                                                                                    readonly value="{{ $a->id }}"
                                                                                    name="id" id="id" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>
                                                                                    Barcode
                                                                                    <span class="text-danger">
                                                                                        *
                                                                                    </span>
                                                                                </label>
                                                                                <input type="text" name="barcode"
                                                                                    id="barcode"
                                                                                    value="{{ $a->barcode }}"
                                                                                    class="form-control"
                                                                                    placeholder="Scans Barcode" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>Nama Barang</label>
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Nama Kategori"
                                                                                    name="nama_kategori"
                                                                                    id="nama_kategori"
                                                                                    value="{{ $a->nama_barang }}"
                                                                                    required />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>
                                                                                    Harga Beli
                                                                                </label>
                                                                                <input type="text" name="harga_beli"
                                                                                    id="harga_beli" onkeyup="sum();"
                                                                                    value="Rp. {{ number_format($a->harga_beli) }}"
                                                                                    class="form-control hrg_bli"
                                                                                    placeholder="Harga Beli" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>
                                                                                    Harga Jual
                                                                                </label>
                                                                                <input type="text" name="harga_jual"
                                                                                    id="harga_jual" onkeyup="sum();"
                                                                                    value="Rp. {{ number_format($a->harga_jual) }}"
                                                                                    class="form-control hrg_jul"
                                                                                    placeholder="Harga Jual" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>
                                                                                    Profit
                                                                                </label>
                                                                                <input type="text" name="profit"
                                                                                    id="profit"
                                                                                    value="Rp. {{ number_format($a->profit) }}"
                                                                                    class="form-control form-control-solid"
                                                                                    placeholder="Profit" readonly />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>
                                                                                    Stok
                                                                                </label>
                                                                                <input type="text" name="stok"
                                                                                    id="stok" class="form-control"
                                                                                    value="{{ $a->stok }}"
                                                                                    placeholder="Stok" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>
                                                                                    Kode Penjualan
                                                                                </label>
                                                                                <input type="text"
                                                                                    name="kode_penjualan"
                                                                                    id="kode_penjualan"
                                                                                    class="form-control"
                                                                                    value="{{ $a->kode_penjualan }}"
                                                                                    placeholder="Kode Penjualan" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>
                                                                                    Kode
                                                                                    Pembelian
                                                                                </label>
                                                                                <input type="text"
                                                                                    name="kode_pembelian"
                                                                                    id="kode_pembelian"
                                                                                    class="form-control"
                                                                                    value="{{ $a->kode_pembelian }}"
                                                                                    placeholder="Kode Pembelian" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label>
                                                                                    Kategori
                                                                                </label>
                                                                                <select class="form-control"
                                                                                    name="kategori" id="kategori">
                                                                                    <option selected="selected">
                                                                                        Pilih Kategori
                                                                                    </option>
                                                                                    @foreach ($kategori as $ab)
                                                                                        <option
                                                                                            value="{{ $ab->nama_kategori }}"
                                                                                            {{ $a->kategori == $ab->nama_kategori ? 'selected' : '' }}>
                                                                                            {{ $ab->nama_kategori }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label> ID Cabang </label>
                                                                                <div>
                                                                                </div>
                                                                                <select class="form-control"
                                                                                    name="id_cabang" id="id_cabang">
                                                                                    <option selected="selected">
                                                                                        Pilih Cabang
                                                                                    </option>
                                                                                    @foreach ($cabang as $ab)
                                                                                        <option
                                                                                            value="{{ $ab->id }}"
                                                                                            {{ $ab->id == $a->id_cabang ? 'selected' : '' }}>
                                                                                            {{ $ab->nama_cabang }} -
                                                                                            {{ $ab->alamat }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label>
                                                                                    Id
                                                                                    Suplier
                                                                                </label>
                                                                                <div>
                                                                                </div>
                                                                                <select class="form-control"
                                                                                    name="id_suplier" id="id_suplier">
                                                                                    <option selected="selected">
                                                                                        Pilih Suplier
                                                                                    </option>
                                                                                    @foreach ($suplier as $ab)
                                                                                        <option
                                                                                            value="{{ $ab->id_suplier }}"
                                                                                            {{ $ab->id_suplier == $a->id_suplier ? 'selected' : '' }}>
                                                                                            {{ $ab->nama_suplier }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label> Satuan </label>
                                                                                <select class="form-control"
                                                                                    name="satuan" id="satuan">
                                                                                    <option selected="selected">
                                                                                        Pilih Satuan
                                                                                    </option>
                                                                                    @foreach ($satuan as $ab)
                                                                                        <option
                                                                                            value="{{ $ab->nama_satuan }}"
                                                                                            {{ $ab->nama_satuan == $a->satuan ? 'selected' : '' }}>
                                                                                            {{ $ab->nama_satuan }}

                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>

                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <div class="form-group mb-1">
                                                                                <label for="Keterangan">
                                                                                    Keterangan
                                                                                </label>
                                                                                <textarea class="form-control" id="keterangan" name="keterangan" rows="3"> {{ $a->keterangan }}
                                        </textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Kembali</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary mr-2">Edit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
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
    <script>
        function
        sum() {
            var hrg_bli = $('#harga_beli').val();
            var hrg_jul = $('#harga_jual').val();
            var total = parseInt(hrg_jul) - parseInt(hrg_bli);
            $('#profit').val(total);
        }
    </script>
@endsection

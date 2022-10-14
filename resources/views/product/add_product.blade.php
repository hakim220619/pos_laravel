@extends('layouts.app-admin')
@section('content')
    <div class="container">
        <div class="card card-custom">
            <div class="card-header">
                <h3 class="card-title">
                    Add Product </h3>
                <div class="card-toolbar">
                    <div class="example-tools justify-content-center">
                        <span class="example-toggle" data - toggle="tooltip" title="View code">
                        </span>
                        <span class="example-copy" data - toggle="tooltip" title="Copy code">
                        </span>
                    </div>
                </div>
            </div>
            <!--begin::Form-->
            <form action="/proses_add_product" method="POST" enctype="multipart/form-data">
                @csrf <div class="card-body">
                    <div class="form-group mb-8">
                        <div class="alert alert-custom alert-default" role="alert">
                            <div class="alert-icon">
                                <i class="flaticon-warning text-primary">
                                </i>
                            </div>
                            <div class="alert-text">
                                The example form below
                                demonstrates common HTML form
                                elements that receive updated
                                styles
                                from
                                Bootstrap with additional
                                classes. </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>
                                    ID <span class="text-danger">
                                        *
                                    </span>
                                </label>
                                <input type="text" name="id" id="id" class="form-control form-control-solid"
                                    placeholder="Generate Otomatis" readonly
                                    value="{{  . rand(00000, 99999) * 30 }}" />
                                <span class="form-text text-muted">
                                    Generate
                                    Otomatis
                                </span>
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
                                <input type="text" name="barcode" id="barcode" class="form-control"
                                    placeholder="Scans Barcode" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>
                                    Nama
                                    Barang
                                </label>
                                <input type="text" name="nama_barang" id="nama_barang" class="form-control"
                                    placeholder="Nama Barang" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>
                                    Kategori
                                </label>
                                <select class="custom-select form-control" name="kategori" id="kategori">
                                    <option selected="selected">
                                        Pilih Kategori
                                    </option>
                                    @foreach ($kategori as $a)
                                        <option value="{{ $a->nama_kategori }}">
                                            {{ $a->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> ID Cabang </label>
                                <div>
                                </div>
                                <select class="custom-select form-control" name="id_cabang" id="id_cabang">
                                    <option selected="selected">
                                        Pilih Cabang
                                    </option>
                                    @foreach ($cabang as $a)
                                        <option value="{{ $a->id_cabang }}">
                                            {{ $a->nama_cabang }} - {{ $a->alamat }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>
                                    Id
                                    Suplier
                                </label>
                                <div>
                                </div>
                                <select class="custom-select form-control" name="id_suplier" id="id_suplier">
                                    <option selected="selected">
                                        Pilih Satuan
                                    </option>
                                    @foreach ($suplier as $a)
                                        <option value="{{ $a->id_suplier }}">
                                            {{ $a->nama_suplier }}

                                        </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>
                                    Harga Beli
                                </label>
                                <input type="text" name="harga_beli" id="harga_beli" onkeyup="sum();"
                                    class="form-control hrg_bli" placeholder="Harga Beli" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>
                                    Harga Jual
                                </label>
                                <input type="text" name="harga_jual" id="harga_jual" onkeyup="sum();"
                                    class="form-control hrg_jul" placeholder="Harga Jual" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>
                                    Profit
                                </label>
                                <input type="text" name="profit" id="profit" class="form-control form-control-solid"
                                    placeholder="Profit" readonly />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    Stok
                                </label>
                                <input type="text" name="stok" id="stok" class="form-control"
                                    placeholder="Stok" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Satuan </label>
                                <select class="custom-select form-control" name="satuan" id="satuan">
                                    <option selected="selected">
                                        Pilih Satuan
                                    </option>
                                    @foreach ($satuan as $a)
                                        <option value="{{ $a->nama_satuan }}">
                                            {{ $a->nama_satuan }}

                                        </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    Kode Penjualan
                                </label>
                                <input type="text" name="kode_penjualan" id="kode_penjualan" class="form-control"
                                    placeholder="Kode Penjualan" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    Kode
                                    Pembelian
                                </label>
                                <input type="text" name="kode_pembelian" id="kode_pembelian" class="form-control"
                                    placeholder="Kode Pembelian" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-1">
                                <label for="Keterangan">
                                    Keterangan
                                </label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="3">
                                        </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary mr-2">
                            Tambah
                        </button>
                        <a href="/product" class="btn btn-secondary">
                            Kembali
                        </a>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
        <br>
        <br>
    </div>
    </div>
    </div>
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

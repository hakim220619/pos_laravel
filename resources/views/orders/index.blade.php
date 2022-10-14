@extends('layouts.app-admin')
@section('content')
    <style>
        .form-control {
            border-color: #bdbdbd;
        }

        .form-control-solid {
            border-color: #e3e3e3;
            border-radius: 10px;
        }
    </style>
    @include('sweetalert::alert')
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-supermarket text-primary"></i>
                        </span>
                        <h3 class="card-label">Orders</h3>
                        <button type="button" class="btn btn-success" data-toggle="modal"
                            data-target=".bd-example-modal-lg">Pilih Barang</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">
                            <!--begin: Datatable-->
                            <div class="table-responsive text-nowrap" style="width: 710px">
                                <table class="table table-bordered table-hover table-checkable table-responsive"
                                    id="data_order" style="margin-top: 13px !important, margin-right:13px;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Satuan</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Total Belanja</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="show_data">

                                    </tbody>
                                </table>
                                <div class="modal fade bd-example-modal" id="ModalHapus" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <h4 class="modal-title" id="myModalLabel">Hapus Barang</h4>
                                            </div>
                                            <form class="form-horizontal">
                                                <div class="modal-body">

                                                    <input type="hidden" name="id" id="textkode" value="">
                                                    <div class="alert alert-warning">
                                                        <p>Apakah Anda yakin mau memhapus barang ini?</p>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade bd-example-modal" id="ModalLunas" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <h4 class="modal-title" id="myModalLabel">Yakin Pembelian Sudah Benar?
                                                    </h4>
                                            </div>
                                            <form action="/struck" class="form-horizontal">
                                                <div class="modal-body">
                                                    <div class="alert alert-info">
                                                        <p>Tekan Bayar Jika Sudah Benar</p>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control form-control-solid"
                                                    placeholder="Generate Otomatis" readonly value="{{ rand(0000, 9999) }}"
                                                    name="id_transaction" id="id_transaction" hidden />
                                                <input type="text" class="form-control form-control-solid"
                                                    placeholder="Generate Otomatis" readonly value="{{ $id }}"
                                                    name="id_user" id="id_user" hidden />
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button class="btn_hapus btn btn-primary" id="lunas">Bayar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade bd-example-modal" id="ModalBatal" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <h4 class="modal-title" id="myModalLabel">Yakin Ingin Membatalkan?
                                                    </h4>
                                            </div>
                                            <form class="form-horizontal">
                                                <div class="modal-body">
                                                    <div class="alert alert-info">
                                                        <p>Tekan Batal</p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button class="btn_hapus btn btn-primary"
                                                        id="batal">Batal</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--end: Datatable-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-supermarket text-primary"></i>
                        </span>
                        <h3 class="card-label">Orders</h3>
                    </div>
                </div>
                <div class="row" style="margin-left: 0px;">
                    <div class="col-md-5">

                        <div class="form-group">
                            <label>Id Cabang<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-solid" placeholder="Generate Otomatis"
                                readonly value="{{ $id_cabang }}" name="cabang" id="cabang" />
                            <input type="text" class="form-control form-control-solid" placeholder="Generate Otomatis"
                                readonly value="{{ $id_cabang }}" name="id_cabang" id="id_cabang" hidden />
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Kasir<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-solid" placeholder="Generate Otomatis"
                                readonly value="{{ $name }}" name="name" id="name" />
                            <input type="text" class="form-control form-control-solid" placeholder="Generate Otomatis"
                                readonly value="{{ $id }}" name="id_user" id="id_user" hidden />
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group gettotalbarang">
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group cash-all-lunas">
                            <label>Di Bayar<span class="text-danger">*</span>
                            </label>
                            <input type="text" id="cash" name="cash" onkeyup="getcashback(this.value)"
                                class="form-control rupiah" min="0" max="100" required>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <label>Kembalian<span class="text-danger">*</span></label>
                            <input type="text" id="caseback" class="form-control form-control-solid" readonly
                                name="caseback" min="0" max="100">
                        </div>
                    </div>
                    <div class="col-md-10" id="lunas-modal">
                        <div class="form-group">
                            <button class="btn btn-primary" id="lunas">Bayar</button>
                            <button class="btn btn-danger" id="batal">Batal</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Pilih Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered table-hover table-checkable table-responsive"
                                id="datatable" style="margin-top: 13px !important, margin-right:13px;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th hidden>id</th>
                                        <th>Nama Barang</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>stok</th>
                                        <th>Jumlah</th>
                                        <th>Satuan</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>

                                <tbody id="data_product">


                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        $(document).ready(function() {
            tampil_data_product();
            tampil_data_barang();
            gettotalbelanja();

            // $('#data_order').dataTable();

            function tampil_data_barang() {
                $.ajax({
                    type: 'GET',
                    url: '{{ route('load_data') }}',
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        var no = 1;
                        var symbol =
                            '<i style="color: red; margin-left: -40px" class="fas fa-trash"></i>'
                        for (i = 0; i < data.length; i++) {
                            html += '<tr>' +
                                '<td>' + no++ + '</td>' +
                                '<td>' + data[i].nama_barang + '</td>' +
                                '<td hidden>' + data[i].id_barang + '</td>' +
                                '<td>' + data[i].satuan + '</td>' +
                                '<td>' + number_format(data[i].harga) + '</td>' +
                                '<td hidden>' +
                                ' <input type="text" class="id_brg_ordr" hidden id="id_brg_order" value="' +
                                data[i].id + '">' +
                                '</td>' +
                                '<td hidden>' +
                                ' <input type="text" class="id_user" hidden id="id_user" value="' +
                                data[i].id_user + '">' +
                                '</td>' +
                                '<td>' +
                                '<input type="number" class="form-control form-control-solid jml_order_fix" name="jumlah_order" min="1" id="jumlah_order" value="' +
                                data[i].jumlah +
                                '" style="width: 100%; border-color: #e3e3e3; border-radius: 10px;">' +
                                '</td>' +
                                '<td>' +
                                '<input type="text" readonly class="form-control form-control-solid" name="total_order" id="total_order" value="' +
                                number_format(data[i].total) +
                                '" style="width: 100%; border-color: #e3e3e3; border - radius:10 px;">' +
                                '</td>' +
                                '<td hidden>' +
                                '<input type="text"  class="form-control form-control-solid" name="hrg" id="hrg" value="' +
                                data[i].harga +
                                '" style="width: 100%; border-color: #e3e3e3; border - radius:10px;">' +
                                '</td>' +
                                '<td style="text-align:right;">' +
                                '<a href="javascript:;" class="item_hapus" data="' +
                                data[i].id + '">' + symbol + '</a>' +
                                '</td>' +
                                '</tr>';
                        }
                        $('#show_data').html(html);
                    }
                });
            }

            function tampil_data_product() {
                $.ajax({
                    type: 'GET',
                    url: '{{ route('load_data_product') }}',
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        // console.log(data);
                        var html = '';
                        var i;
                        var no = 1;
                        var button =
                            '<button type="submit" class="btn btn-primary btnSelect" id="simpan" value="save">Pilih</button>';
                        for (i = 0; i < data.length; i++) {
                            html += '<tr>' +
                                '<td>' + no++ + '</td>' +
                                '<td>' + data[i].nama_barang +
                                '' +
                                '<input type="text" class="nmbrg form-control form-control-solid" name="nama_barang" id="nama_barang" readonly style="width: 100%" value="' +
                                data[i].nama_barang + '" hidden>' +
                                '</td>' +
                                '<td>' + data[i].kategori + '</td>' +
                                '<td>' +
                                '<input type="text" name="harga" id="harga" class="harga_jual" value="' +
                                data[i].harga_jual + '" hidden>' + data[i].harga_jual + '' +
                                '</td>' +

                                '<td>' +
                                '<input type="text" class="stok form-control form-control-solid stok" name="stok" id="stok" readonly style="width: 100%" value="' +
                                data[i].stok + '">' +
                                '</td>' +

                                '<td>' +
                                '<input type="number" class="jumlah" name="jumlah" id="jumlah" value="1" min="1" style="width: 100%; border-color: #e3e3e3; border-radius: 10px;">' +
                                '</td>' +
                                '<td>' + data[i].satuan + '</td>' +
                                '<td hidden>' + data[i].id + '</td>' +
                                '<td nowrap="nowrap">' + button + '</td>' +
                                '</tr>';
                        }
                        // console.log(html);
                        $('#data_product').html(html);
                    }
                });
            }

            function gettotalbelanja() {
                var id_user = $('#id_user').val();
                $.ajax({
                    type: 'GET',
                    url: '{{ route('order.gettotal') }}',
                    async: true,
                    dataType: 'json',
                    data: {
                        id_user: id_user,
                    },
                    success: function(data) {
                        var html = '';
                        html =
                            '<label>Total Belanja<span class="text-danger">*</span></label><input type="text" class="form-control form-control-solid jml_akhir" placeholder="Jumlah" value="' +
                            number_format(data) +
                            '" readonly name="jumlah" id="jumlah"/>'
                        $('.gettotalbarang').html(html);
                    }
                });
            }
            $("#datatable").on('click', '.btnSelect', function() {
                var currentRow = $(this).closest("tr");
                var nama_barang = currentRow.find("input.nmbrg").val();
                var kategori = currentRow.find("td:eq(2)").text();
                var harga = currentRow.find("input.harga_jual").val();
                var stok = currentRow.find("input.stok").val();
                var jumlah = currentRow.find("input.jumlah").val();
                var satuan = currentRow.find("td:eq(6)").text();
                var id_barang = currentRow.find("td:eq(7)").text();
                var id_cabang = $('#id_cabang').val();
                var id_user = $('#id_user').val();
                var total = harga * jumlah;
                if (jumlah > stok) {
                    alert("Jumlah Melebihi Stok Barang");
                    return tampil_data_product();
                }
                $.ajax({
                    type: "GET",
                    url: '{{ route('add_orders') }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id_barang: id_barang,
                        nama_barang: nama_barang,
                        kategori: kategori,
                        harga: harga,
                        jumlah: jumlah,
                        satuan: satuan,
                        id_cabang: id_cabang,
                        id_user: id_user,
                        total: total
                    },

                    success: function(data) {
                        tampil_data_barang();
                        gettotalbelanja();
                        tampil_data_product();
                        $("#cash").val('');
                        $("#caseback").val('');

                    },
                    cache: false,
                    dataType: 'html',
                });
                return false;
            });
            //MODAL HAPUS
            $('#show_data').on('click', '.item_hapus', function() {
                var id = $(this).attr('data');
                $('#ModalHapus').modal('show');
                $('[name="id"]').val(id);
            });
            //Hapus Barang
            $('#btn_hapus').on('click', function() {
                var id = $('#textkode').val();
                var id_barang = $('#id_brg_order').val();
                var jml_order = $('#jumlah_order').val();

                $.ajax({
                    type: "GET",
                    url: '{{ route('orders.delete') }}',
                    dataType: "JSON",
                    data: {
                        id: id,
                        id_barang: id_barang,
                        jml_order: jml_order
                    },
                    success: function(data) {
                        $('#ModalHapus').modal('hide');
                        tampil_data_product();
                        tampil_data_barang();
                        gettotalbelanja();
                    }
                });
                return false;
            });

            $("#data_order").on('change', '.jml_order_fix', function() {
                var currentRow = $(this).closest("tr");
                var id = currentRow.find("input.id_brg_ordr").val();
                var id_barang = currentRow.find("td:eq(2)").text();
                var id_user = currentRow.find("input.id_user").val();
                var jml_order = currentRow.find('#jumlah_order').val();
                var hrg = currentRow.find('#hrg').val();
                var tot = hrg * jml_order;
                $.ajax({
                    url: '{{ route('order.change.jml') }}',
                    dataType: 'JSON',
                    type: "get",
                    data: {
                        id: id,
                        id_barang: id_barang,
                        id_user: id_user,
                        jml_order: jml_order,
                        tot: tot
                    },
                    success: function() {
                        tampil_data_barang();
                        gettotalbelanja();
                        $("#cash").val('');
                        $("#caseback").val('');
                    }

                })
            });
            $('#lunas-modal').on('click', '#lunas', function() {
                $('#ModalLunas').modal('show');
            });
            $('#lunas-modal').on('click', '#batal', function() {
                $('#ModalBatal').modal('show');
            });
            $('#lunas').on('click', function() {
                var id_cabang = $('#id_cabang').val();
                var id_user = $('#id_user').val();
                var id_transaction = $('#id_transaction').val();
                var jumlah = $('#jumlah').val();
                var cash = $('#cash').val();
                var cashback = $('#caseback').val();
                // console.log(id_transaction);
                $.ajax({
                    url: '{{ route('order.add_orderdfix') }}',
                    dataType: 'JSON',
                    type: "get",
                    data: {
                        id_cabang: id_cabang,
                        id_user: id_user,
                        id_transaction: id_transaction,
                        jumlah: jumlah,
                        cash: cash,
                        cashback: cashback,
                    },
                    success: function() {
                        tampil_data_barang();
                        $("#cash").val('');
                        $("#caseback").val('');
                        tampil_data_product();
                        getstruck();

                    }

                })

            });
            $('#batal').on('click', function() {
                var id_user = $('#id_user').val();
                $.ajax({
                    url: '{{ route('orders.batal') }}',
                    dataType: 'JSON',
                    type: "get",
                    data: {
                        id_user: id_user,
                    },
                    success: function() {
                        tampil_data_barang();
                        $("#cash").val('');
                        $("#caseback").val('');
                        tampil_data_product();
                        alert("Pembelian Berhasil");
                    }
                })
            });
        });
    </script>
    <script type="text/javascript">
        function getcashback(cashba) {
            var cashback = parseInt(cashba.replace(/,.*|[^0-9]/g, ''), 10);
            var cash = $('.jml_akhir').val();
            var total_all = cash.replace(/[^0-9+\-Ee]/g, '');
            var getcashbackall = cashback - total_all;
            $('#caseback').val(number_format(getcashbackall));
        }
        var rupiah = document.getElementById('cash');
        rupiah.addEventListener('keyup', function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, 'Rp. ');
        });


        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : 'Rp. ' + (rupiah ? rupiah : '');
        }

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
        $('#btn_hapus').click(function() {
            $("#caseback").val('');
            $("#cash").val('');
        });
        $('.jml_order_fix').change(function() {
            $("#cash").val('');
        });


        $(document).ready(function() {
            // $('#lunas-modal').on('load', '#lunas', function() {
            //     $('#ModalLunas').modal('show');
            // });

            $('#lunas').click(function(event) {

                var id_transaction = $('#id_transaction').val();
                // console.log(id_transaction);
                $.ajax({
                    url: '{{ route('struck') }}',
                    dataType: 'JSON',
                    type: "get",
                    data: {
                        id_transaction: id_transaction,
                    },
                    success: function() {
                        $('#ModalBatal').modal('show');
                    }

                });
                // window.open("{{ route('struck') }}", "_blank");
            });
        });
    </script>
@endsection

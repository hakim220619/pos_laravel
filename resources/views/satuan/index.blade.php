@extends('layouts.app-admin')
@section('content')
@include('sweetalert::alert')
<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        <i class="flaticon2-supermarket text-primary"></i>
                    </span>
                    <h3 class="card-label">Satuan</h3>
                </div>
            </div>
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label"></h3>
                    </div>
                    <div class="card-toolbar">
                        <button type="button" class="btn btn-primary font-weight-bolder" data-bs-toggle="modal"
                            data-bs-target="#tambah_barang">
                            Tambah
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-bordered table-hover table-checkable" id="datatable"
                        style="margin-top: 13px !important">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Satuan</th>
                                <th>Nama Asli</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($data as $a)
                            <tr>
                                <td><input type="checkbox" onclick="getdata(this.value)" name="check_box" id="check_box"
                                        value={{ $a->id }}></td>
                                <td>{{ $no++ }}</td>
                                <td style="width: auto">{{ $a->nama_satuan }}</td>
                                <td style="width: auto">{{ $a->nama_asli }}</td>
                                <td style="text-align: center">
                                    <button type="button" class="btn btn-success">Edit</button>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $data->links() }}
                    <!--end: Datatable-->
                </div>
                <div class="modal fade" id="tambah_barang" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="/proses_add_satuan" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="modal-body">

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>ID <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-solid"
                                                        placeholder="Generate Otomatis" readonly
                                                        value="{{ 'STN' . rand(00, 99) * 30 }}" name="id" id="id" />
                                                    <span class="form-text text-muted">Generate Otomatis</span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Nama Satuan</label>
                                                    <input type="text" class="form-control" placeholder="Nama Satuan"
                                                        name="nama_satuan" id="nama_satuan" required />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Nama Asli</label>
                                                    <input type="text" class="form-control" placeholder="Nama Asli"
                                                        name="nama_asli" id="nama_asli" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Kembali</button>
                                        <button type="submit" class="btn btn-primary mr-2">Tambah</button>
                                    </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
    function getdata(atr){
        var c = document.querySelector("input[type=checkbox]");
       if (c.checked == true) {
        document.querySelector("div").innerText = atr;
       } else{
        document.querySelector("div").innerText = "";
       }
    }
</script>

@endsection
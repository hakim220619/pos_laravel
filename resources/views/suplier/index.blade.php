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
                        <h3 class="card-label">Suplier</h3>
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
                                    <th>Nama Suplier</th>
                                    <th>alamat Suplier</th>
                                    <th>Telepon</th>
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
                                        <td style="width: auto">{{ $a->nama_suplier }}</td>
                                        <td style="width: auto">{{ $a->alamat_suplier }}</td>
                                        <td style="width: auto">{{ $a->tlp }}</td>
                                        <td style="text-align: center">
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#edit{{ $a->id }}">Edit</button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#delete{{ $a->id }}">Delete</button>
                                        </td>
                                        <div class="modal fade" id="delete{{ $a->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="deletemodal" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deletemodal">Hapus Cabang</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Anda yakin ingin menghapus {{ $a->nama_suplier }}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <a href="{{ url('delete_suplier/suplier', $a->id) }} "
                                                            class="btn btn-primary">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="edit{{ $a->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="addNewDonaturLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Suplier</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="/proses_edit_suplier" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>ID <span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="text"
                                                                                class="form-control form-control-solid"
                                                                                placeholder="Generate Otomatis" readonly
                                                                                value="{{ $a->id }}" name="id"
                                                                                id="id" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Nama Suplier</label>
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Nama Cabang"
                                                                                name="nama_suplier" id="nama_suplier"
                                                                                value="{{ $a->nama_suplier }}" required />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>ALamat</label>
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Alamat" name="alamat_suplier"
                                                                                id="alamat_suplier"
                                                                                value="{{ $a->alamat_suplier }}"
                                                                                required />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Telepon</label>
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Telepon" name="tlp"
                                                                                id="tlp"
                                                                                value="{{ $a->tlp }}" required />
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
                                <form action="/proses_add_suplier" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>ID <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control form-control-solid"
                                                            placeholder="Generate Otomatis" readonly
                                                            value="{{ 'SPL' . rand(00, 99) * 30 }}" name="id_suplier"
                                                            id="id_suplier" />
                                                        <span class="form-text text-muted">Generate Otomatis</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Nama Suplier</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Nama Suplier" name="nama_suplier"
                                                            id="nama_suplier" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Alamat Suplier</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Nama Asli" name="alamat_suplier"
                                                            id="alamat_suplier" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>No Telpon</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Nama Asli" name="tlp" id="tlp"
                                                            required />
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
@endsection

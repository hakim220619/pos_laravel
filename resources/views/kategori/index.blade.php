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
                        <h3 class="card-label">Kategori</h3>
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
                                <!--end::Dropdown Menu-->
                            </div>
                            <!--end::Dropdown-->
                            <!--begin::Button-->
                            {{-- <a href="/add_kategori" class="btn btn-primary font-weight-bolder">
                            <i class="la la-plus"></i>Tambah</a> --}}
                            <button type="button" class="btn btn-primary font-weight-bolder" data-bs-toggle="modal"
                                data-bs-target="#tambah_barang">
                                Tambah
                            </button>
                            <!--end::Button-->
                        </div>
                    </div>
                    <div class="card-body">
                        <!--begin: Datatable-->
                        <table class="table table-bordered table-hover table-checkable" id="datatable"
                            style="margin-top: 13px !important">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
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
                                        <td style="width: 70%">{{ $a->nama_kategori }}</td>
                                        <td>
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#editkategori{{ $a->id }}">Edit</button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#deluser{{ $a->id }}">Delete</button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="deluser{{ $a->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="addNewDonaturLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addNewDonaturLabel">Hapus Kategori</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Anda yakin ingin menghapus {{ $a->nama_kategori }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <a href="{{ url('delete/kategori', $a->id) }} "
                                                        class="btn btn-primary">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="editkategori{{ $a->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="/proses_edit_kategori" method="POST"
                                                    enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        @csrf
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>ID <span class="text-danger">*</span></label>
                                                                        <input type="text"
                                                                            class="form-control form-control-solid"
                                                                            placeholder="Generate Otomatis" readonly
                                                                            value="{{ $a->id }}" name="id"
                                                                            id="id" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Nama Kategori</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Nama Kategori" name="nama_kategori"
                                                                            id="nama_kategori"
                                                                            value="{{ $a->nama_kategori }}" required />
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
                                @endforeach
                            </tbody>
                        </table>
                        <!--end: Datatable-->
                    </div>
                    <div class="modal fade" id="tambah_barang" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="/proses_add_kategori" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        @csrf
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>ID <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control form-control-solid"
                                                            placeholder="Generate Otomatis" readonly
                                                            value="{{ 'KTG' . rand(00, 99) * 30 }}" name="id"
                                                            id="id" />
                                                        <span class="form-text text-muted">Generate Otomatis</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Nama Kategori</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Nama Barang" name="nama_kategori"
                                                            id="nama_kategori" required />
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
@endsection

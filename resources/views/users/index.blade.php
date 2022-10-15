@extends('layouts.app-admin')
@section('content')
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-supermarket text-primary"></i>
                        </span>
                        <h3 class="card-label">Users</h3>
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
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Id Cabang</th>
                                    <th>User Level</th>
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
                                        <td style="width: auto">{{ $a->name }}</td>

                                        <td style="width: auto">{{ $a->email }}</td>
                                        <td style="width: auto">
                                            @if ($a->jenis_kelamin == 'L')
                                                Laki-Laki
                                            @elseif($a->jenis_kelamin == 'P')
                                                Perempuan
                                            @endif
                                        </td>
                                        <td style="width: auto">{{ $a->id_cabang }}</td>
                                        <td style="width: auto">
                                            @if ($a->user_level == 1)
                                                Admin
                                            @elseif($a->user_level == 2)
                                                Kasir
                                            @endif
                                        </td>
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
                                                        <h5 class="modal-title" id="deletemodal">Hapus User</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Anda yakin ingin menghapus {{ $a->name }}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <a href="{{ url('delete_users/users', $a->id) }} "
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
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="/proses_edit_users" method="POST"
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
                                                                            <label>Nama</label>
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Nama Cabang" name="name"
                                                                                id="name" value="{{ $a->name }}"
                                                                                required />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Email</label>
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Email" name="email"
                                                                                value="{{ $a->email }}"
                                                                                id="email" required />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Password</label>
                                                                            <input type="password" class="form-control"
                                                                                placeholder="Password" name="password"
                                                                                id="password" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Jenis Kelamin</label>
                                                                            <select class="custom-select form-control"
                                                                                name="jenis_kelamin" id="jenis_kelamin">
                                                                                <option selected="selected">
                                                                                    Pilih Jenis Kelamin
                                                                                </option>
                                                                                @foreach ($jk as $ab)
                                                                                    <option value="{{ $ab }}"
                                                                                        {{ $ab == $a->jenis_kelamin ? 'selected' : '' }}>
                                                                                        @if ($ab == 'L')
                                                                                            Laki-Laki
                                                                                        @elseif($ab == 'P')
                                                                                            Perempuan
                                                                                        @endif
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label> ID Cabang </label>
                                                                            <select class="custom-select form-control"
                                                                                name="id_cabang" id="id_cabang">
                                                                                <option selected="selected">
                                                                                    Pilih Cabang
                                                                                </option>
                                                                                @foreach ($cabang as $ab)
                                                                                    <option value="{{ $ab->id_cabang }}"
                                                                                        {{ $ab->id == $a->id_cabang ? 'selected' : '' }}>
                                                                                        {{ $ab->nama_cabang }} -
                                                                                        {{ $ab->alamat }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>User Level</label>
                                                                            <select class="custom-select form-control"
                                                                                name="user_level" id="user_level">
                                                                                <option selected="selected">
                                                                                    Pilih User Level
                                                                                </option>
                                                                                @foreach ($ul as $ab)
                                                                                    <option value="{{ $ab }}"
                                                                                        {{ $ab == $a->user_level ? 'selected' : '' }}>
                                                                                        @if ($ab == 1)
                                                                                            Admin
                                                                                        @elseif($ab == 2)
                                                                                            Kasir
                                                                                        @else
                                                                                            Super Level
                                                                                        @endif
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Kembali</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary mr-2">Edit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
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
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="/proses_add_users" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="card-body">
                                            <div class="row">
                                                {{-- <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>ID <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control form-control-solid"
                                                            placeholder="Generate Otomatis" readonly
                                                            value="{{ 'SPL' . rand(00, 99) * 30 }}" name="id"
                                                            id="id" />
                                                        <span class="form-text text-muted">Generate Otomatis</span>
                                                    </div>
                                                </div> --}}
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" class="form-control" placeholder="Nama"
                                                            name="name" id="name" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" class="form-control" placeholder="Email"
                                                            name="email" id="email" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password" class="form-control"
                                                            placeholder="Password" name="password" id="password"
                                                            required />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Jenis Kelamin</label>
                                                        <select class="custom-select form-control" name="jenis_kelamin"
                                                            id="jenis_kelamin">
                                                            <option selected="selected">
                                                                Pilih Jenis Kelamin
                                                            </option>
                                                            @foreach ($jk as $a)
                                                                <option value="{{ $a }}">
                                                                    @if ($a == 'L')
                                                                        Laki-Laki
                                                                    @elseif($a == 'P')
                                                                        Perempuan
                                                                    @endif
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label> ID Cabang </label>
                                                        <select class="custom-select form-control" name="id_cabang"
                                                            id="id_cabang">
                                                            <option selected="selected">
                                                                Pilih Cabang
                                                            </option>
                                                            @foreach ($cabang as $a)
                                                                <option value="{{ $a->id }}">
                                                                    {{ $a->nama_cabang }} -
                                                                    {{ $a->alamat }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>User Level</label>
                                                        <select class="custom-select form-control" name="user_level"
                                                            id="user_level">
                                                            <option selected="selected">
                                                                Pilih User Level
                                                            </option>
                                                            @foreach ($ul as $a)
                                                                <option value="{{ $a }}">
                                                                    @if ($a == 1)
                                                                        Admin
                                                                    @elseif($a == 2)
                                                                        Kasir
                                                                    @else
                                                                        Super Level
                                                                    @endif
                                                                </option>
                                                            @endforeach
                                                        </select>
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

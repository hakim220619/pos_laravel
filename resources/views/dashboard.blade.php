@extends('layouts.app-admin')
@section('content')
    <!--begin::Content-->
    <!--begin::Row-->
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <!--begin::Mixed Widget 14-->
                    <div class="card card-custom card-stretch gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title font-weight-bolder">Statistik Pengunjung</h3>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body d-flex flex-column">
                            <div class="flex-grow-1">
                                <div id="kt_mixed_widget_14_chart" style="height: 250px"></div>
                            </div>
                            <div class="pt-5">
                                <p class="text-center font-weight-normal font-size-lg pb-7">Data Pengunjung Harian
                                    <a href="#"
                                        class="btn btn-success btn-shadow-hover font-weight-bolder w-100 py-3">Cek
                                        Detail</a>
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 14-->
                </div>
                <div class="col-lg-8">
                    <!--begin::Advance Table Widget 4-->
                    <div class="card card-custom card-stretch gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 py-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark">Data Transaksi Penjualan
                                    Terbaru</span>
                                <span class="text-muted mt-3 font-weight-bold font-size-sm">Rincian Transaksi Hari
                                    Ini</span>
                            </h3>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-0 pb-3">
                            <div class="tab-content">
                                <!--begin::Table-->
                                <div class="table-responsive">
                                    <table
                                        class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                                        <thead>
                                            <tr class="text-left text-uppercase">
                                                <th style="min-width: 250px" class="pl-7">
                                                    <span class="text-dark-75">ID Cabang</span>
                                                </th>
                                                <th style="min-width: 100px">Total Pendapatan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach ($tot as $ab)
                                                    <td>
                                                        <span
                                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $ab->id_cabang }}</span>

                                                    </td>
                                                    <td>
                                                        <span
                                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">Rp.
                                                            {{ number_format($ab->total) }}</span>

                                                    </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!--end::Table-->
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Advance Table Widget 4-->
                </div>
            </div>
        </div>
        <!--end::Row-->
        <!--end::Dashboard-->
    </div>
    <!--end::Container-->
    </div>
    <!--end::Entry-->
    </div>
    <!--end::Content-->
@endsection

@extends('layouts.app')

@section('title', 'Transaksi')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Transaksi</h1>
                <div class="section-header-button">
                    <a href="/transaksi/create" class="btn btn-primary">Add Transaksi</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Transaksi</a></div>
                    <div class="breadcrumb-item">All Transaksi</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Transaksi</h4>
                            </div>
                            <div class="clearfix mb-3"></div>

                            <div class="table-responsive">
                                <table class="table-striped table">
                                    <tr>

                                        <th>No Transaksi</th>
                                        <th>Tanggal</th>
                                        <th>Total Bayar</th>
                                        {{-- <th>Created At</th> --}}
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($data_transaksi as $dd)
                                        <tr>


                                            <td>{{ $dd->no_transaksi }}
                                            </td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($dd->tgl_transaksi)->translatedFormat('d F Y H:i') }}
                                            </td>
                                            <td>
                                                Rp. {{ number_format($dd->total_bayar) }}
                                            </td>
                                            {{-- <td>{{ \Carbon\Carbon::parse($product->created_at)->translatedFormat('d F Y H:i') }}
                                                </td> --}}
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="#" target="_blank" class="btn btn-sm btn-info btn-icon">
                                                        <i class="fas fa-print"></i>
                                                        Cetak
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach


                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush

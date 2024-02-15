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
                        <form action="/transaksi/store" method="POST">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <h4>All Transaksi</h4> <button type="button" class="btn btn-primary"
                                        data-toggle="modal" data-target="#addDiskonModal">
                                        Add Transaksi
                                    </button>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>No</th>
                                            <th>Barang</th>
                                            <th>Harga</th>
                                            <th>Jumlah Beli</th>
                                            <th>Subtotal</th>
                                        </tr>
                                        <tbody id="transaksiBody">
                                        </tbody>

                                        <tr>
                                            <td colspan="4"></td>
                                            <td>Diskon</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4"></td>
                                            <td>Total Bayar</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 mx-auto">
                                        <div class="form-group">
                                            <label>No Transaksi</label>
                                            <input type="text" class="form-control" name="no_transaksi" value="HH-001"
                                                required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <input type="text" class="form-control" value="{{ date('d F Y H:i') }}"
                                                required readonly>
                                        </div>

                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Uang Pembeli</label>
                                            <input type="number" class="form-control" name="uang_pembeli" required>
                                        </div>
                                        <div class="form-group">
                                            <label> Kembalian</label>
                                            <input type="text" class="form-control" name="kembalian" readonly>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-info"><i class="fa fa-save">Save</i></button>
                                <a href="/transaksi" class="btn btn-danger"><i class="fa fa-undo">Cancel</i></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>




    <!-- Add Diskon Modal -->
<div class="modal fade" id="addDiskonModal" tabindex="-1" role="dialog" aria-labelledby="addDiskonModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="transaksiForm" action="/transaksi/store" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Jenis Makanan</label>
                        <select class="form-control" name="category_id" id="category_id" required>
                            <option value="" hidden>--Pilih Nama Barang---</option>
                            @foreach ($semuaBarang as $mkn)
                                <option value="{{ $mkn->id }}" data-harga="{{ $mkn->price }}">{{ $mkn->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" class="form-control" name="harga" id="harga" readonly>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Beli</label>
                        <input type="number" class="form-control" name="qty" id="qty" min="1" required>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="tambahBarang()">Add Transaksi</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>

    <script>
        function tambahBarang() {
            var selectedBarang = $("#category_id option:selected");
            var hargaBarang = selectedBarang.data("harga");
            var qty = $("#qty").val();

            // Hitung subtotal
            var subtotal = hargaBarang * qty;

            // Tambahkan data ke dalam tabel
            var newRow = "<tr>" +
                "<td>1</td>" +
                "<td>" + selectedBarang.text() + "</td>" +
                "<td>Rp. " + hargaBarang.toLocaleString() + "</td>" +
                "<td>" + qty + " Pcs</td>" +
                "<td>Rp. " + subtotal.toLocaleString() + "</td>" +
                "</tr>";

            // Masukkan ke dalam tabel
            $("#transaksiBody").append(newRow);

            // Clear form setelah menambahkan
            $("#category_id").val("");
            $("#harga").val("");
            $("#qty").val("");
        }

        // Update Harga based on selected product
        $("#category_id").change(function() {
            var selectedBarang = $("#category_id option:selected");
            var hargaBarang = selectedBarang.data("harga");
            $("#harga").val(hargaBarang.toLocaleString());
        });
    </script>
@endpush

@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush

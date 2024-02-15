@extends('layouts.app')

@section('title', 'Diskon')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Setting Diskon</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Diskon</a></div>
                    <div class="breadcrumb-item">Setting Diskon</div>
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
                                <h4>Setting Diskon</h4>
                                {{-- <button class="btn btn-primary" data-toggle="modal" data-target="#addDiskonModal">Add
                                    Diskon</button> --}}
                            </div>

                            <div class="card">
                                @foreach ($data_diskon as $i)
                                    <form action="/setdiskon/update/{{ $i->id }}" method="POST">
                                        @csrf
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Total Belanja</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend"><span class="input-group-text">RP.
                                                            </span></div>
                                                        <input type="number"
                                                            class="form-control @error('total_belanja') is-invalid @enderror"
                                                            name="total_belanja" value="{{ $i->total_belanja }}">
                                                    </div>
                                                    @error('total_belanja')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Diskon</label>
                                                    <div class="input-group mb-3">
                                                        <input type="number"
                                                            class="form-control @error('diskon') is-invalid @enderror"
                                                            name="diskon" value="{{ $i->diskon }}">
                                                        <div class="input-group-append"><span
                                                                class="input-group-text">%</span></div>
                                                    </div>
                                                    @error('diskon')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <button class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                @endforeach
                            </div>




                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Add Diskon Modal -->
    {{-- <div class="modal fade" id="addDiskonModal" tabindex="-1" role="dialog" aria-labelledby="addDiskonModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDiskonModalLabel">Add Diskon</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Your form for adding diskon goes here -->
                    <!-- Example: -->
                    <form>
                        <div class="form-group">
                            <label for="total_belanja">Total Belanja</label>
                            <input type="text" class="form-control" id="total_belanja" name="total_belanja">
                        </div>
                        <div class="form-group">
                            <label for="diskon">Diskon</label>
                            <input type="text" class="form-control" id="diskon" name="diskon">
                        </div>
                        <button type="submit" class="btn btn-primary">Add Diskon</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush

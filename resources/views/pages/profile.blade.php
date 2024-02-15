@extends('layouts.app')

@section('title', 'Profile Settings')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Setting Profile</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Profile</a></div>
                    <div class="breadcrumb-item">Setting Profile</div>
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
                                <h4>Setting Profile</h4>
                                {{-- <button class="btn btn-primary" data-toggle="modal" data-target="#addDiskonModal">Add
                                    Diskon</button> --}}
                            </div>

                            <div class="card">
                                @foreach ($data_profile as $f)
                                    <form action="/profile/updateprofile/{{ $f->id }}" method="POST">
                                        @csrf
                                        <div class="card-body">
                                            <input type="hidden" value="{{ $f->role }}" name="role" required>
                                            <div class="form-group">
                                                <label>Nama Lengkap</label>
                                                <input type="text" class="form-control" value="{{ $f->name }}"
                                                    name="name" placeholder="Nama Lengkap" required>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control" name="email"
                                                            placeholder="email" value="{{ $f->email }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password" class="form-control" name="password"
                                                            placeholder="password" value="{{ $f->password }}" required>
                                                    </div>
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

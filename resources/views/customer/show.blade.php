@extends('layouts.app')

@section('content')
    <div class="container-sm my-5">
        <div class="row justify-content-center">
            <div class="p-5 bg-light rounded-3 col-xl-4 border">
                <div class="mb-3 text-center">
                    <i class="bi-person-circle fs-1"></i>
                    <h4>Detail Customer</h4>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="firstName" class="form-label">Nama Depan</label>
                        <h5>{{ $customer->firstname }}</h5>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="lastName" class="form-label">Nama Belakang</label>
                        <h5>{{ $customer->lastname }}</h5>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <h5>{{ $customer->email }}</h5>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="age" class="form-label">Umur</label>
                        <h5>{{ $customer->age }}</h5>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="car" class="form-label">Mobil</label>
                        <h5>{{ $customer->car->name }}</h5>
                    </div>
                    <!-- Menambahkan Tanggal Peminjaman dan Tanggal Kembalian -->
                    <div class="col-md-12 mb-3">
                        <label for="rentalDate" class="form-label">Tanggal Peminjaman</label>
                        <h5>{{ $customer->rentalDate }}</h5>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="returnDate" class="form-label">Tanggal Kembalian</label>
                        <h5>{{ $customer->returnDate }}</h5>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 d-grid">
                        <a href="{{ route('customers.index') }}" class="btn btn-danger btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

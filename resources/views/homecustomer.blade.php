@extends('layouts.appCustomer')

@section('content')
<div class="container-sm my-5">
    <form action="{{ route('customers.store') }}" method="POST">
        @csrf
        <div class="row justify-content-center">
            <div class="p-5 bg-light rounded-3 border col-xl-6">
                <div class="mb-3 text-center">
                    <i class="bi-person-circle fs-1"></i>
                    <h4>Formulir Rental</h4>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nama_depan" class="form-label">Nama Depan</label>
                        <input class="form-control @error('nama_depan') is-invalid @enderror" type="text" name="nama_depan" id="nama_depan" value="{{ old('nama_depan') }}" placeholder="Masukkan Nama Depan">
                        @error('nama_depan')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nama_belakang" class="form-label">Nama Belakang</label>
                        <input class="form-control @error('nama_belakang') is-invalid @enderror" type="text" name="nama_belakang" id="nama_belakang" value="{{ old('nama_belakang') }}" placeholder="Masukkan Nama Belakang">
                        @error('nama_belakang')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Masukkan Email">
                        @error('email')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="age" class="form-label">Umur</label>
                        <input class="form-control @error('age') is-invalid @enderror" type="number" name="age" id="age" value="{{ old('age') }}" placeholder="Masukkan Umur">
                        @error('age')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="mobil" class="form-label">Mobil</label>
                        <select name="mobil" id="mobil" class="form-select">
                            @foreach ($availableCars as $car)
                                <option value="{{ $car->id }}" {{ old('mobil') == $car->id ? 'selected' : '' }}>{{ $car->code.' - '.$car->name }}</option>
                            @endforeach
                        </select>
                        @error('mobil')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                    </div>
                    <div class="col-md-7 mb-3">
                        <label for="ktp" class="form-label">KTP</label>
                        <input class="form-control @error('ktp') is-invalid @enderror" type="number" name="ktp" id="ktp" value="{{ old('ktp') }}" placeholder="Masukkan No. KTP">
                        @error('ktp')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                        <input class="form-control @error('tanggal_pinjam') is-invalid @enderror" type="date" name="tanggal_pinjam" id="tanggal_pinjam" value="{{ old('tanggal_pinjam') }}">
                        @error('tanggal_pinjam')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                        <input class="form-control @error('tanggal_kembali') is-invalid @enderror" type="date" name="tanggal_kembali" id="tanggal_kembali" value="{{ old('tanggal_kembali') }}">
                        @error('tanggal_kembali')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('customers.index') }}" class="btn btn-danger btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Batal</a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-success btn-lg mt-3"><i class="bi-check-circle me-2"></i> Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>        
    </div>
@endsection

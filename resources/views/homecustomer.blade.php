@extends('layouts.appCustomer') <!-- Menggunakan layout yang sama -->

@section('content')
    <div class="container-sm my-5">
        <form action="{{ route('customers.store') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-6">
                    <div class="mb-3 text-center">
                        <i class="bi-person-circle fs-1"></i>
                        <h4>Formulir Rental Nguengg</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName" class="form-label">Nama Depan</label>
                            <input class="form-control @error('firstName') is-invalid @enderror" type="text" name="firstName" id="firstName" value="{{ old('firstName') }}" placeholder="Masukkan Nama Depan">
                            @error('firstName')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName" class="form-label">Nama Belakang</label>
                            <input class="form-control @error('lastName') is-invalid @enderror" type="text" name="lastName" id="lastName" value="{{ old('lastName') }}" placeholder="Masukkan Nama Belakang">
                            @error('lastName')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email" value="{{ old('email') }}" placeholder="Masukkan Email">
                            @error('email')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="age" class="form-label">Umur</label>
                            <input class="form-control @error('age') is-invalid @enderror" type="text" name="age" id="age" value="{{ old('age') }}" placeholder="Masukkan Umur">
                            @error('age')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="car" class="form-label">Mobil</label>
                            <select name="car" id="car" class="form-select">
                                @foreach ($availableCars as $car)
                                    <option value="{{ $car->id }}" {{ old('car') == $car->id ? 'selected' : '' }}>{{ $car->code.' - '.$car->name }}</option>
                                @endforeach
                            </select>
                            @error('car')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>

                        <!-- Tanggal Peminjaman -->
                        <div class="col-md-6 mb-3">
                            <label for="rentalDate" class="form-label">Tanggal Peminjaman</label>
                            <input class="form-control @error('rentalDate') is-invalid @enderror" type="date" name="rentalDate" id="rentalDate" value="{{ old('rentalDate') }}">
                            @error('rentalDate')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>

                        <!-- Tanggal Kembalian -->
                        <div class="col-md-6 mb-3">
                            <label for="returnDate" class="form-label">Tanggal Kembalian</label>
                            <input class="form-control @error('returnDate') is-invalid @enderror" type="date" name="returnDate" id="returnDate" value="{{ old('returnDate') }}">
                            @error('returnDate')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                    </div>
                    <hr>
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

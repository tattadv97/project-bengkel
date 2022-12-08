@extends('template.layout')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Customer</h1>

        <div class="card shadow mb-4">
            <div class="card-header" py-3>
                <h6 class="m-0 font-weight-bold text-primary">Edit Customer</h6>
            </div>
            <div class="card-body">
                <form action="/customer/{{ $customer->id }}" method="POST">
                    @method('put')
                    @csrf
                    {{-- region nama --}}
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="@error('nama') is-invalid @enderror form-control"
                            id="nama" name="nama" value="{{ old('nama', $customer->nama) }}">

                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- region plat nomor --}}
                    <div class="mb-3">
                        <label for="plat_nomor" class="form-label">Plat Nomor</label>
                        <input type="text" class="@error('plat_nomor') is-invalid @enderror form-control"
                            id="plat_nomor" name="plat_nomor" value="{{ old('plat_nomor', $customer->plat_nomor) }}">

                        @error('plat_nomor')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- region jenis kendaraan --}}
                    <div class="mb-3">
                        <label for="jenis_kendaraan" class="form-label">Jenis Kendaraan</label>
                        <input type="text" class="@error('jenis_kendaraan') is-invalid @enderror form-control"
                            id="jenis_kendaraan" name="jenis_kendaraan" value="{{ old('jenis_kendaraan', $customer->jenis_kendaraan) }}">

                        @error('jenis_kendaraan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- region kontak --}}
                    <div class="mb-3">
                        <label for="kontak" class="form-label">Kontak</label>
                        <input type="text" class="@error('kontak') is-invalid @enderror form-control"
                            id="kontak" name="kontak" value="{{ old('kontak', $customer->kontak) }}">

                        @error('kontak')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Edit Customer</button>

                </form>
            </div>
        </div>
    </div>
@endsection
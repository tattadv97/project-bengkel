@extends('template.layout')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Jasa</h1>

        <div class="card shadow mb-4">
            <div class="card-header" py-3>
                <h6 class="m-0 font-weight-bold text-primary">Edit Jasa</h6>
            </div>
            <div class="card-body">
                <form action="/jasa/{{ $jasa->id }}" method="POST">
                    @method('put')
                    @csrf

                    {{-- region nama jasa --}}
                    <div class="mb-3">
                        <label for="nama_jasa" class="form-label">Nama Jasa</label>
                        <input type="text" class="@error('nama_jasa') is-invalid @enderror form-control"
                            id="nama_jasa" name="nama_jasa" value="{{ old('nama_jasa', $jasa->nama_jasa) }}">

                        @error('nama_jasa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- region price --}}
                    <div class="mb-3">
                        <label for="price" class="form-label">Harga</label>
                        <input type="text" class="@error('price') is-invalid @enderror form-control"
                            id="price" name="price" value="{{ old('price', $jasa->price) }}">

                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- region point --}}
                    <div class="mb-3">
                        <label for="point" class="form-label">Point</label>
                        <input type="text" class="@error('point') is-invalid @enderror form-control"
                            id="point" name="point" value="{{ old('point', $jasa->point) }}">

                        @error('point')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Edit Jasa</button>
                    <a href="/jasa" class="btn btn-danger ">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
@extends('template.layout')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Create Mechanic</h1>

        <div class="card shadow mb-4">
            <div class="card-header" py-3>
                <h6 class="m-0 font-weight-bold text-primary">Add Mechanic</h6>
            </div>
            <div class="card-body">
                <form action="/mechanic" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="@error('nama') is-invalid @enderror form-control"
                            id="nama" name="nama" value="{{ old('nama') }}">

                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" class="@error('status') is-invalid @enderror form-control"
                            id="status" name="status" value="{{ old('status') }}">

                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Add Mechanic</button>
                    <a href="/mechanic" class="btn btn-danger ">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
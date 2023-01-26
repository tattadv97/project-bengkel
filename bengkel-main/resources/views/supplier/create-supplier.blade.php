@extends('template.layout')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Create Supplier</h1>

        <div class="card shadow mb-4">
            <div class="card-header" py-3>
                <h6 class="m-0 font-weight-bold text-primary">Add Supplier</h6>
            </div>
            <div class="card-body">
                <form action="/supplier" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="company_name" class="form-label">Supplier</label>
                        <input type="text" class="@error('company_name') is-invalid @enderror form-control"
                            id="company_name" name="company_name" value="{{ old('company_name') }}">

                        @error('company_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <input type="text" class="@error('address') is-invalid @enderror form-control"
                            id="address" name="address" value="{{ old('address') }}">

                        @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="contact" class="form-label">Kontak</label>
                        <input type="text" class="@error('contact') is-invalid @enderror form-control"
                            id="contact" name="contact" value="{{ old('contact') }}">

                        @error('contact')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Add Supplier</button>
                    <a href="/supplier" class="btn btn-danger ">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
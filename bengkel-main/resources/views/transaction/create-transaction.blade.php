@extends('template.layout')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Create Transaction</h1>
        <div class="card shadow mb-4">
            <div class="card-header" py-3>
                <h6 class="m-0 font-weight-bold text-primary">Add Transaction</h6>
            </div>
            <div class="card-body">
                <form action="/transaction" method="POST">
                    @csrf

                    {{-- region nama jasa --}}
                    <div class="mb-3">
                        <label for="nama_jasa" class="form-label">Nama Jasa</label>
                        <input type="text" class="@error('nama_jasa') is-invalid @enderror form-control"
                            id="nama_jasa" name="nama_jasa" value="{{ old('nama_jasa') }}">

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
                            id="price" name="price" value="{{ old('price') }}">

                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- region point --}}
                    <div class="mb-3">
                        <label for="point" class="form-label">Poin</label>
                        <input type="text" class="@error('point') is-invalid @enderror form-control"
                            id="point" name="point" value="{{ old('point') }}">

                        @error('point')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Add </button>
                    <a href="/transaction" class="btn btn-danger ">Cancel</a>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Source</th>
                                    <th>Name</th>
                                    <th>ID No</th>
                                    <th>Client Type</th>
                                    <th>Watchlist</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>
                                            
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
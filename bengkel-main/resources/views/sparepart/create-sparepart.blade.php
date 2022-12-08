@extends('template.layout')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Create Sparepart</h1>

        <div class="card shadow mb-4">
            <div class="card-header" py-3>
                <h6 class="m-0 font-weight-bold text-primary">Add Sparepart</h6>
            </div>
            <div class="card-body">
                <form action="/sparepart" method="POST">
                    @csrf

                    {{-- region sparepart number --}}
                    <div class="mb-3">
                        <label for="spare_parts_id" class="form-label">Sparepart Number</label>
                        <input type="text" class="@error('spare_parts_id') is-invalid @enderror form-control"
                            id="spare_parts_id" name="spare_parts_id" value="{{ old('spare_parts_id') }}">

                        @error('spare_parts_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- region nama sparepart --}}
                    <div class="mb-3">
                        <label for="spare_parts_name" class="form-label">Nama Sparepart</label>
                        <input type="text" class="@error('spare_parts_name') is-invalid @enderror form-control"
                            id="spare_parts_name" name="spare_parts_name" value="{{ old('spare_parts_name') }}">

                        @error('spare_parts_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- region base price --}}
                    <div class="mb-3">
                        <label for="base_price" class="form-label">Base Price</label>
                        <input type="text" class="@error('base_price') is-invalid @enderror form-control"
                            id="base_price" name="base_price" value="{{ old('base_price') }}">

                        @error('base_price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- region selling price --}}
                    <div class="mb-3">
                        <label for="selling_price" class="form-label">Selling Price</label>
                        <input type="text" class="@error('selling_price') is-invalid @enderror form-control"
                            id="selling_price" name="selling_price" value="{{ old('selling_price') }}">

                        @error('selling_price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- region unit --}}
                    <div class="mb-3">
                        <label for="unit" class="form-label">Unit</label>
                        <input type="text" class="@error('unit') is-invalid @enderror form-control"
                            id="unit" name="unit" value="{{ old('unit') }}">

                        @error('unit')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- region stock --}}
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="text" class="@error('stock') is-invalid @enderror form-control"
                            id="stock" name="stock" value="{{ old('stock') }}">

                        @error('stock')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- region point --}}
                    <div class="mb-3">
                        <label for="point" class="form-label">Point</label>
                        <input type="text" class="@error('point') is-invalid @enderror form-control"
                            id="point" name="point" value="{{ old('point') }}">

                        @error('point')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- region supplier --}}
                    <div class="mb-3">
                        <label for="supplier_id" class="form-label">Supplier</label>
                        <select name="supplier_id" class="form-control form-select" id="supplier_id">
                            @foreach ($supplier as $item)
                                @if (old('supplier_id') == $item -> id)
                                    <option value="{{ $item->id }}" selected>{{ $item->company_name }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->company_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Sparepart</button>
                    <a href="/sparepart" class="btn btn-danger ">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
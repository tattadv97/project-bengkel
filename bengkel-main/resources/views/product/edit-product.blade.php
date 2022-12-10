@extends('template.layout')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Product</h1>

        <div class="card shadow mb-4">
            <div class="card-header" py-3>
                <h6 class="m-0 font-weight-bold text-primary">Edit Product</h6>
            </div>
            <div class="card-body">
                <form action="/product/{{ $product->id }}" method="POST">
                    @method('put')
                    @csrf

                    {{-- region sparepart number --}}
                    <div class="mb-3">
                        <label for="product_code" class="form-label">Product Number</label>
                        <input type="text" class="@error('product_code') is-invalid @enderror form-control"
                            id="product_code" name="product_code" value="{{ old('product_code', $product->product_code) }}">

                        @error('product_code')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- region nama sparepart --}}
                    <div class="mb-3">
                        <label for="product_name" class="form-label">Nama Product</label>
                        <input type="text" class="@error('product_name') is-invalid @enderror form-control"
                            id="product_name" name="product_name" value="{{ old('product_name', $product->product_name) }}">

                        @error('product_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- region base price --}}
                    <div class="mb-3">
                        <label for="base_price" class="form-label">Base Price</label>
                        <input type="text" class="@error('base_price') is-invalid @enderror form-control"
                            id="base_price" name="base_price" value="{{ old('base_price', $product->base_price) }}">

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
                            id="selling_price" name="selling_price" value="{{ old('selling_price', $product->selling_price) }}">

                        @error('selling_price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- region QTY --}}
                    <div class="mb-3">
                        <label for="unit" class="form-label">Unit</label>
                        <input type="text" class="@error('unit') is-invalid @enderror form-control"
                            id="unit" name="unit" value="{{ old('unit', $product->unit) }}">

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
                            id="stock" name="stock" value="{{ old('stock', $product->stock) }}">

                        @error('stock')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- region point --}}
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <input type="text" class="@error('category') is-invalid @enderror form-control"
                            id="category" name="category" value="{{ old('category', $product->category) }}">

                        @error('category')
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
                                @if (old('supplier_id', $product->supplier_id) == $item -> id)
                                    <option value="{{ $item->id }}" selected>{{ $item->company_name }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->company_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Edit Product</button>
                    <a href="/sparepart" class="btn btn-danger ">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
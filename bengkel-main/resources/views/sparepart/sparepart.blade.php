@extends('template.layout')

@section('content')
    
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Sparepart Tables</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Sparepart</h6>
        </div>
        <div class="card-body">
            <a href="/sparepart/create" class="btn btn-primary mb-3">Add Sparepart</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kode Sparepart</th>
                            <th>Nama Sparepart</th>
                            <th>Base Price</th>
                            <th>Selling Price</th>
                            <th>Stock</th>
                            <th>Point</th>
                            <th>Supplier</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($spareparts as $item)
                            <tr>
                                <td>{{ $item -> spare_parts_id }}</td>
                                <td>{{ $item -> spare_parts_name }}</td>
                                <td>{{ $item -> base_price}}</td>
                                <td>{{ $item -> selling_price }}</td>
                                <td>{{ $item -> stock }}</td>
                                <td>{{ $item -> point }}</td>
                                <td>{{ $item -> supplier -> company_name }}</td>
                                <td>
                                    <a href="/sparepart/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                                    <form action="/sparepart/{{ $item->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger" onclick="return confirm('Are You Sure ?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
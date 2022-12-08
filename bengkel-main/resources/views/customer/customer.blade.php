@extends('template.layout')

@section('content')
    
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">customer Tables</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data customer</h6>
        </div>
        <div class="card-body">
            <a href="/customer/create" class="btn btn-primary mb-3">Add customer</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Plat Nomor</th>
                            <th>Jenis Kendaraan</th>
                            <th>Kontak</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customer as $item)
                            <tr>
                                <td>{{ $item -> nama }}</td>
                                <td>{{ $item -> plat_nomor }}</td>
                                <td>{{ $item -> jenis_kendaraan }}</td>
                                <td>{{ $item -> kontak }}</td>
                                <td>
                                    <a href="/customer/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                                    <form action="/customer/{{ $item->id }}" method="POST" class="d-inline">
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
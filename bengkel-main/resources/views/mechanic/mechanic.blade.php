@extends('template.layout')

@section('content')
    
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Mechanic Tables</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Mechanic</h6>
        </div>
        <div class="card-body">
            <a href="/mechanic/create" class="btn btn-primary mb-3">Add Mechanic</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mechanic as $item)
                            <tr>
                                <td>{{ $item -> nama }}</td>
                                <td>{{ $item -> status }}</td>
                                <td>
                                    <a href="/mechanic/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                                    <form action="/mechanic/{{ $item->id }}" method="POST" class="d-inline">
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
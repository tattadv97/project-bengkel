@extends('template.layout')

@section('content')
    
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Purchase Tables</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Purchase Data</h6>
        </div>
        <div class="card-body">
            <a href="/purchase/create" class="btn btn-primary mb-3">Add Purchase</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Invoice Number</th>
                            <th>Supplier</th>
                            <th>Total Price</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="#" class="btn btn-warning">Detail</a>
                                    <form action="#" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger" onclick="return confirm('Are You Sure ?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
@extends('template.layout')

@section('content')
<form id="generateTrx" action="{{ route('transaction.store') }}" method="post">
    @csrf()
</form>
    
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Transaction Tables</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Transaction Data</h6>
        </div>
        <div class="card-body">
            <a href="javascript:;" onclick="document.getElementById('generateTrx').submit();" class="btn btn-primary mb-3">Transaction</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Transaction Number</th>
                            <th>Customer</th>
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
                                    <a href="#" class="btn btn-success">Detail</a>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
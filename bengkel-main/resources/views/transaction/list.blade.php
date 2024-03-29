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
                            <th>Kendaraan</th>
                            <th>Plat Number</th>
                            <th>Mechanic</th>
                            <th>Total Price</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaction as $item)
                            <tr>
                                <td>{{ $item->invoice }}</td>
                                <td>{{ $item -> customer }}</td>
                                <td>{{ $item -> kendaraan }}</td>
                                <td>{{ $item -> no_plat }}</td>
                                <td>{{ $item->mechanic->nama }}</td>
                                <td>Rp. {{ $item->totalPrice }}</td>
                                <td>
                                    <a href="{{ route('transaction.show', ['transaction' => $item->invoice]) }}" class="btn btn-success fa fa-copy" target="_blank"></a>
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
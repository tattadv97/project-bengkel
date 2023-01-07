@extends('template.layout')

@section('content')
<form id="generatePO" action="{{ route('purchase.store') }}" method="POST">
    @csrf()
</form>
    
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Purchase Tables</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Purchase Data</h6>
        </div>
        <div class="card-body">
            <a href="javascript:;" onclick="document.getElementById('generatePO').submit();" class="btn btn-primary mb-3">Purchase</a>
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
                        @foreach ($purchase as $item)
                            <tr>
                                <td>{{ $item->invoice }}</td>
                                <td>{{ $item->Supplier->supplier_id }}</td>
                                <td>Rp. {{ $item->totalPrice }}</td>
                                <td>
                                    <a href="{{ route('purchase.show', ['purchase' => $item->invoice]) }}" class="btn btn-success fa fa-copy" target="_blank"></a>
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
@extends('template.layout')

@section('content')
    
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Transaction Tables</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Transaction</h6>
        </div>
        <div class="card-body">
            <a href="/transaction/create" class="btn btn-primary mb-3">Add Transaction</a>
            <div class="table-responsive">
                
            </div>
        </div>
    </div>

</div>

@endsection
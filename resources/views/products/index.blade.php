@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Manage Products</div>
                <div class="card-body">
                    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add New Product</a>
                    <a href="{{ route('products.export.excel') }}" class="btn btn-success mb-3">Export to Excel</a>
                    <a href="{{ route('products.export.pdf') }}" class="btn btn-danger mb-3">Export to PDF</a>
                    <table class="table" id="products-table">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(function() {
    $('#products-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route("products.data") !!}',
        columns: [
            { data: 'photo', name: 'photo', orderable: false, searchable: false },
            { data: 'name', name: 'name' },
            { data: 'category.name', name: 'category.name' },
            { data: 'price', name: 'price' },
            { data: 'stock', name: 'stock' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>
@endpush
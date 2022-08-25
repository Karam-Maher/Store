@extends('dashboards.layouts.master')

@section('title', 'Products')


@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Products</li>
@endsection

@section('content')

<x-alert type="success" />
<x-alert type="danger" />

<form action="{{ URL::current() }}" method="get" class="d-flex justify-between mb-4">
    <x-form.input name="name" placeholder="Name" class="mx-2" :value="request('name')" />
    <select name="status" class="form-control mx-2">
        <option value="">All</option>
        <option value="active" @selected(request('status')=='active' )>Active</option>
        <option value="inactive" @selected(request('status')=='inctive' )>Inactive</option>
    </select>
    <button class="btn btn-dark">Filter</button>
</form>

<table class="table">
    <th>
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Images</th>
            <th>Categoy</th>
            <th>Store</th>
            <th>Status</th>
            <th>Price</th>
            <th>Compare_price</th>
            <th>Created At</th>
            <th colspan="2">Action</th>
        </thead>
    </th>
    <tbody>


        @forelse ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td> <img src=" {{ asset('storage/' . $product->image) }}" alt="" height="60px"></td>
            <td>{{ $product->categoy_id}}</td>
            <td>{{ $product->store_id }}</td>
            <td>{{ $product->status }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->compare_price }}</td>
            <td>{{ $product->created_at }}</td>
            <td>
                <a href="{{ route('dashboard.products.edit', $product->id) }}" class="btn btn-sm btn-outline-success">Edit</a>
            </td>
            <td>
                <form action="{{ route('dashboard.products.destroy', $product->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="9">No product defined..</td>
        </tr>
        @endforelse


    </tbody>
</table>

{{ $products->withQueryString()->appends(['search' => 1])->links() }}
@endsection

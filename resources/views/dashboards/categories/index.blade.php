@extends('dashboards.layouts.master')

@section('title', 'Categories')


@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Categories</li>
@endsection

@section('content')
@if (session()->has('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif
@if (session()->has('info'))
<div class="alert alert-info">
    {{session('info')}}
</div>
@endif
@if (session()->has('danger'))
<div class="alert alert-danger">
    {{session('danger')}}
</div>
@endif
<table class="table">
    <th>
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Images</th>
            <th>Created At</th>
            <th>Update At</th>
            <th colspan="2">Action</th>
        </thead>
    </th>
    <tbody>
        {{-- @if ($categories->count()) --}}


        @forelse ($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td> <img src=" {{ asset('storage/' . $category->image)}}" alt="" height="60px"></td>
            <td>{{ $category->created_at }}</td>
            <td>{{ $category->updated_at }}</td>
            <td>
                <a href="{{ route('dashboard.categories.edit', $category->id) }}" class="btn btn-sm btn-outline-success">Edit</a>
            </td>
            <td>
                <form action="{{ route('dashboard.categories.destroy', $category->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7">No Categories defined..</td>
        </tr>
        @endforelse


    </tbody>
</table>
@endsection

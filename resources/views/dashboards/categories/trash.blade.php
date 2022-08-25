@extends('dashboards.layouts.master')

@section('title', 'Trashed Categories')


@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Categories</li>
    <li class="breadcrumb-item active">Trash</li>
@endsection

@section('content')

    <x-alert type="success" />
    <x-alert type="danger" />

    <form action="{{ URL::current() }}" method="get" class="d-flex justify-between mb-4">
        <x-form.input name="name" placeholder="Name" class="mx-2" :value="request('name')" />
        <select name="status" class="form-control mx-2">
            <option value="">All</option>
            <option value="active" @selected(request('status') == 'active')>Active</option>
            <option value="inactive" @selected(request('status') == 'inctive')>Inactive</option>
        </select>
        <button class="btn btn-dark">Filter</button>
    </form>

    <table class="table">
        <th>
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Images</th>
                <th>Status</th>
                <th>Deleted At</th>
                <th colspan="2">Action</th>
            </thead>
        </th>
        <tbody>


            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td> <img src=" {{ asset('storage/' . $category->image) }}" alt="" height="60px"></td>
                    <td>{{ $category->status }}</td>
                    <td>{{ $category->deleted_at }}</td>

                    <td>
                    <form action="{{ route('dashboard.categories.restore', $category->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-sm btn-outline-info">Restore</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('dashboard.categories.force-delete', $category->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No Categories defined..</td>
                </tr>
            @endforelse


        </tbody>
    </table>

    {{ $categories->withQueryString()->appends(['search' => 1])->links() }}
@endsection

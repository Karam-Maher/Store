@extends('dashboards.layouts.master')

@section('title', 'Create Category')

@section('breadcrumb')
    @parent
        <li class="breadcrumb-item active">Categories</li>

    <li class="breadcrumb-item active">Create Category</li>
@endsection

@section('content')

    <form action="{{ route('dashboard.categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('dashboards.categories._form',[
            'button_label' => 'Add'
            ])
    </form>

@endsection


@extends('dashboards.layouts.master')



@section('title', 'Edit Category')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Categories</li>

<li class="breadcrumb-item active">Edit Category</li>
@endsection

@section('content')

<form action="{{ route('dashboard.categories.update',$category->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    @include('dashboards.categories._form',[
        'button_label' => 'Update'
        ])
</form>

@endsection

@extends('layouts.admin', ['activePage' => 'products', 'title' => 'New Product'])

@section('content')
<div class="row mb-4">
    <div class="col-md-4">
        <h1 class="h3 mb-0 text-gray-800">New Product</h1>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">Add New Product</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        @if (count($errors))
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> Error validating data.<br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success"><strong>Success!</strong> {{ session('success') }}</div>
                        @endif
                        <form method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="category_id" class="col-md-3 col-form-label text-md-right">Category <sup style="color:#F00;">*</sup></label>
                                <div class="col-md-8">
                                    <select class="form-control" name="category_id" id="category_id" required>
                                        <option value="" selected>- - - Select Category - - -</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-md-3 col-form-label text-md-right">Title <sup style="color:#F00;">*</sup></label>
                                <div class="col-md-8">
                                    <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="part_number" class="col-md-3 col-form-label text-md-right">Part Number <sup style="color:#F00;">*</sup></label>
                                <div class="col-md-8">
                                    <input id="part_number" type="text" class="form-control" name="part_number" value="{{ old('part_number') }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-3 col-form-label text-md-right">Description <sup style="color:#F00;">*</sup></label>
                                <div class="col-md-8">
                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control" required>{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-md-3 col-form-label text-md-right">Cover Image <sup style="color:#F00;">*</sup></label>
                                <div class="col-md-8">
                                    <input id="image" type="file" class="form-control" name="image" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price" class="col-md-3 col-form-label text-md-right">Price <sup style="color:#F00;">*</sup></label>
                                <div class="col-md-8">
                                    <input id="price" type="number" class="form-control" name="price" value="{{ old('price') }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="quantity" class="col-md-3 col-form-label text-md-right">Quantity <sup style="color:#F00;">*</sup></label>
                                <div class="col-md-8">
                                    <input id="quantity" type="number" class="form-control" name="quantity" value="{{ old('quantity') }}" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-3">
                                    <button type="submit" class="btn btn-info col">
                                        &nbsp; <i class="fas fa-file-alt"></i> {{ __('Save') }} &nbsp;
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

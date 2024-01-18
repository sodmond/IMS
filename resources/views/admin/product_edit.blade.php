@extends('layouts.admin', ['activePage' => 'products', 'title' => 'Edit Product'])

@section('content')
<div class="row mb-4">
    <div class="col-md-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Product</h1>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col">
                        <h6 class="m-0 font-weight-bold text-dark">Edit Product Details</h6>
                    </div>
                    <div class="col text-right">
                        <a class="btn btn-dark btn-sm" href="{{ route('admin.product', ['id' => $product->id]) }}">
                            <i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                </div>
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
                                <label for="category_id" class="col-md-3 col-form-label text-md-right">Category</label>
                                <div class="col-md-8">
                                    <select class="form-control" name="category_id" id="category_id" required>
                                        <option value="">- - - Select Category - - -</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}" {{ ($cat->id ==  $product->category_id) ? 'selected' : '' }}>{{ $cat->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-md-3 col-form-label text-md-right">Title</label>
                                <div class="col-md-8">
                                    <input id="title" type="text" class="form-control" name="title" value="{{ $product->title ?? old('title') }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="part_number" class="col-md-3 col-form-label text-md-right">Part Number</label>
                                <div class="col-md-8">
                                    <input id="part_number" type="text" class="form-control" name="part_number" value="{{ $product->part_number ?? old('part_number') }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-3 col-form-label text-md-right">Description</label>
                                <div class="col-md-8">
                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control" required>{{ $product->description ?? old('description') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price" class="col-md-3 col-form-label text-md-right">Price</label>
                                <div class="col-md-8">
                                    <input id="price" type="number" class="form-control" name="price" value="{{ $product->price ?? old('price') }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="quantity" class="col-md-3 col-form-label text-md-right">Quantity</label>
                                <div class="col-md-8">
                                    <input id="quantity" type="number" class="form-control" name="quantity" value="{{ $product->quantity ?? old('quantity') }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-md-3 col-form-label text-md-right">Cover Image <small>(Optional)</small></label>
                                <div class="col-md-8">
                                    <input id="image" type="file" class="form-control" name="image">
                                    <a href="{{ asset('storage/'.$product->image) }}" target="_blank">
                                        <img class="img-fluid img-thumbnail mt-2" src="{{ asset('storage/'.$product->image) }}" alt="" style="max-width:50%;">
                                    </a>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-3">
                                    <button type="submit" class="btn btn-info col">
                                        &nbsp; <i class="fas fa-file-alt"></i> {{ __('Update') }} &nbsp;
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

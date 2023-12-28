@extends('layouts.admin')

@section('title') 
    New Property
@endsection

@section('content')
<div class="row mb-4">
    <div class="col-md-4">
        <h1 class="h3 mb-0 text-gray-800">New Property</h1>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">Add New Property</h6>
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
                        @if (session('suc_msg'))
                            <div class="alert alert-success"><strong>Success!</strong> {{ session('suc_msg') }}</div>
                        @endif
                        @if (session('err_msg'))
                            <div class="alert alert-danger"><strong>Oops!</strong> {{ session('err_msg') }}</div>
                        @endif
                        <form method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-3 col-form-label text-md-right">Title</label>
                            <div class="col-md-8">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="location" class="col-md-3 col-form-label text-md-right">Location</label>
                            <div class="col-md-8">
                                <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}" required autocomplete="location">
                                @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-3 col-form-label text-md-right">Description</label>
                            <div class="col-md-8">
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-3 col-form-label text-md-right">Cover Image</label>
                            <div class="col-md-8">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" required>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-3 col-form-label text-md-right">Price</label>
                            <div class="col-md-8">
                                <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required>
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="units" class="col-md-3 col-form-label text-md-right">Units</label>
                            <div class="col-md-8">
                                <input id="units" type="number" class="form-control @error('units') is-invalid @enderror" name="units" value="{{ old('units') }}" required>
                                @error('units')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-3">
                                <button type="submit" class="btn btn-info">
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
@endsection

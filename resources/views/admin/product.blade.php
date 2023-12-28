@extends('layouts.admin')

@section('title') 
    Property - {{ $property->title }}
@endsection

@section('content')
<div class="row mb-4">
    <div class="col-md-4">
        <h1 class="h3 mb-0 text-gray-800">Property</h1>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10 mb-4">
        <div class="card shadow mb-4">
            <div class="card-body">
                <img class="img-fluid" src='{{ asset("storage/$property->image") }}' alt="{{ $property->title }}">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $property->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Title</th>
                                        <td>{{ $property->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Location</th>
                                        <td>{{ $property->location }}</td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>{{ $property->description }}</td>
                                    </tr>
                                    <tr>
                                        <th>Price</th>
                                        <td>₦{{ number_format($property->price) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Units</th>
                                        <td>{{ $property->units }}</td>
                                    </tr>
                                    <tr>
                                        <th>Sold Units</th>
                                        <td>{{ $sold->unitsum }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @if(Auth::user()->role != 'user')
                        <div class="row">
                            <div class="col-md">
                                <a href='{{ url("/properties/edit/$property->id") }}' class="btn btn-primary btn-sm"><i class="fas fa-edit fa-sm"></i> Edit</a>
                            </div>
                            <div class="col-md text-right">
                                <a href='{{ url("/properties/delete/$property->id") }}' class="btn btn-danger btn-sm"><i class="fas fa-trash fa-sm"></i> Trash</a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

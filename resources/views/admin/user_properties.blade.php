@extends('layouts.admin')

@section('title') 
    Properties
@endsection

@section('content')
<div class="row mb-4">
    <div class="col-md-4">
        <h1 class="h3 mb-0 text-gray-800">Properties</h1>
    </div>
    <div class="col-md-4">&nbsp;</div>
    <div class="col-md-4 text-right">
        &nbsp;
    </div>
</div>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">List of All Properties</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Title</th>
                                        <th>Location</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Total Units</th>
                                        <th>...</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($properties as $property)
                                        <tr>
                                            <td><img class="img-fluid" src='{{ asset("storage/$property->image") }}'></td>
                                            <td>{{ $property->title }}</td>
                                            <td>{{ $property->location }}</td>
                                            <td>{{ $property->description }}</td>
                                            <td>₦{{ number_format($property->price) }}</td>
                                            <td>{{ $property->units }}</td>
                                            <td>
                                                <a class="btn btn-info btn-sm" href='{{ url("/user/property/$property->id") }}'>
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row justify-content-center">{{ $properties->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

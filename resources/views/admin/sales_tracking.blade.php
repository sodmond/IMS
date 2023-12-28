@extends('layouts.admin')

@section('title') 
    Sales Tracking
@endsection

@section('content')
<style>
    .select2 .selection .select2-selection{
        height: 38px; padding: 5px 10px;
        line-height: 35px; border-color: #ccc;
        font-size: 15px;
    }
</style>

<div class="row mb-4">
    <div class="col-md-4">
        <h1 class="h3 mb-0 text-gray-800">Sales Tracking</h1>
    </div>
    <div class="col-md-4">&nbsp;</div>
</div>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">Record Sales</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!--<input type="hidden" id="getRealtorsURL" value="{{ url('/get-realtors') }}">-->
                        @if (session('suc_msg'))
                            <div class="alert alert-success"><strong>Success!</strong> {{ session('suc_msg') }}</div>
                        @endif
                        @if (session('err_msg'))
                            <div class="alert alert-danger"><strong>Oops!</strong> {{ session('err_msg') }}</div>
                        @endif
                        <form class="form-row" method="POST">
                            @csrf
                            <div class="col-md-4">
                                <label for="customer_id">Realtor ID:</label><br>
                                <input type="text" class="form-control @error('realtor_id') is-invalid @enderror" name="realtor_id" id="realtor_id" value="{{ old('realtor_id') }}" required>
                                @error('realtor_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="pwd">Property:</label><br>
                                <select class="custom-select @error('property') is-invalid @enderror" name="property" id="property" required>
                                    <option value="" selected>Search Property</option>
                                    @foreach ($properties as $property)
                                        <option value="{{ $property->id }}">{{ $property->title }}</option>
                                    @endforeach
                                </select>
                                @error('property')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <label for="units">Units</label><br>
                                <input type="number" class="form-control @error('units') is-invalid @enderror" name="units" id="units" value="{{ old('units') }}" required>
                                @error('units')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <label for="">&nbsp;</label><br>
                                <input type="submit" class="btn btn-info" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">Most Recent Sales</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Consultant</th>
                                        <th>Title</th>
                                        <th>Units</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sales as $sale)
                                        <tr>
                                            <td>{{ $sale->fullname }}</td>
                                            <td>{{ $sale->title }}</td>
                                            <td>{{ $sale->units }}</td>
                                            <td>{{ $sale->created_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$("#property").select2( {
	placeholder: "Search Property",
	allowClear: true
});
$("#realtor").select2({
    placeholder: "Search Property",
    ajax: {
        url : $('#getRealtorsURL').val(),
        datatype : JSON,
        processResults : function(data) {
            return {
                results : data.items
            };
        }
    }
});
</script>
@endsection

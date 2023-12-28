@extends('layouts.admin')

@section('title') 
    Registered Admin
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="col-md-8">
        <h1 class="h3 mb-0 text-gray-800">Registered Admin</h1>
    </div>
    <div class="col-md-4" style="text-align: right;">
        @if(Auth::user()->role == 'superuser')
        <a href="{{ url('/register') }}">
            <button class="btn btn-info btn-sm">
                <i class="fas fa-user fa-sm"></i> Register New Admin
            </button>
        </a>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-lg-5 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">My Details</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td><strong>ID</strong></td>
                                <td>{{ Auth::user()->id }}</td>
                            </tr>
                            <tr>
                                <td><strong>Name</strong></td>
                                <td>{{ Auth::user()->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Email</strong></td>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>
                            <tr>
                                <td><strong>Role</strong></td>
                                <td>{{ ucwords(Auth::user()->role) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Created At</strong></td>
                                <td>{{ Auth::user()->created_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-7 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">List of All Admin</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>...</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allAdmin as $admin)
                            <tr>
                                <td>{{ $admin->id }}</td>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->role }}</td>
                                <td>
                                    @if($admin->id == 1 || Auth::user()->role == 'editor')
                                    <button class="btn btn-secondary btn-sm" disabled>
                                        <i class="fas fa-trash fa-sm"></i>
                                    </button>
                                    @else
                                    <input type="hidden" id="delAdminLink{{$admin->id}}" value='{{url("/delete_admin/$admin->id")}}'/>
                                    <button class="btn btn-danger btn-sm" onclick='delAdmin("{{$admin->id}}")'>
                                        <i class="fas fa-trash fa-sm"></i>
                                    </button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function delAdmin(id){
        var x = confirm("Do you want to proceed?");
        if (x == true) {
            var url = document.getElementById('delAdminLink'+id).value;
            //alert(url);
            window.location = url;
        }
    }
</script>
@endsection

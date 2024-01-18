@extends('layouts.admin', ['title' => 'Settings', 'activePage' => 'settings'])

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="col-md-4 mb-2">
        <h1 class="h3 mb-0 text-gray-800">Settings</h1>
    </div>
    <div class="col-12 col-md-8 text-md-right">
        {{--<a class="btn btn-danger btn-sm mt-2" href='{{ route("admin.settings.cats", ["pet_id" => "all"]) }}'>
            <i class="fa fa-tasks"></i> Categories
        </a>
        <a class="btn btn-danger btn-sm mt-2" href='{{ route("admin.settings.tags", ["cat_id" => "all"]) }}'>
            <i class="fa fa-tag"></i> Product Tags
        </a>--}}
        <a class="btn btn-info btn-sm mt-2" href='{{ route("admin.profile") }}'>
            <i class="fa fa-user"></i> My Profile
        </a>
    </div>
</div>

<div class="row">
    <div class="col">
        @if (session('success'))
            <div class="alert alert-success" role="alert"><strong>Success!</strong> {{ session('success') }}</div>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-dark">Add Product Categories</h6>
                    </div>
                    <div class="col-md-6 text-right">
                        <a class="btn btn-info btn-sm" href="">View All</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.settings.newproductcat') }}" method="post">
                    @csrf
                    <fieldset class="row">
                        <div class="col-md-4 mb-4">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" required>
                        </div>
                        <div class="col-md-5">
                            <label for="description">Description <small>(Optional)</small></label>
                            <textarea class="form-control" name="description" id="description"></textarea>
                        </div>
                        <div class="col-md-3">
                            <label for=""></label><br>
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">List of Registered Admin</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col mb-4">
                                @if (in_array(Auth::user()->role, [1,2]))
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.settings.register') }}">
                                        <i class="fa fa-plus"></i> Add New</a>
                                @endif
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Date Created</th>
                                        <th>Last Updated</th>
                                        <th>...</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $rowNum = 1; $x = new \App\Models\Admin; ?>
                                    @foreach ($admins as $admin)
                                        <tr>
                                            <td>{{ $rowNum++ }}</td>
                                            <td id="{{'adminName'.$admin->id}}">{{ ucwords($admin->firstname .' '. $admin->lastname) }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td>{{ $x->getRoleTitle($admin->role) }}</td>
                                            <td>@if ($admin->status == 1)
                                                    <a class="bg-success text-white px-2 py-1 small rounded-3" href="{{ route('admin.suspend', ['id' => $admin->id]) }}">Active</a>
                                                @else
                                                    <a class="bg-warning text-white px-2 py-1 small rounded-3" href="{{ route('admin.suspend', ['id' => $admin->id]) }}">Suspended</a>
                                                @endif
                                            </td>
                                            <td>{{ $admin->created_at }}</td>
                                            <td>{{ $admin->updated_at }}</td>
                                            <td>@if (in_array(Auth::user()->role, [1,2]) && ($admin->id != 1) && (Auth::id() != $admin->id))
                                                <input type="hidden" id="{{'deleteAdminUrl'.$admin->id}}" value="{{ route('admin.delete', ['id' => $admin->id]) }}">
                                                <button class="btn btn-danger btn-sm" id="{{'deleteAdminBtn-'.$admin->id}}" {{ ((Auth::id() != 1) && in_array($admin->role, [1,2])) ? 'disabled' : '' }}>
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            @endif</td>
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
@endsection

@push('custom-scripts')
    <script>
        $('button[id^="deleteAdminBtn"]').click(function() {
            var getBtnId = $(this).attr('id');
            var adminId = getBtnId.split("-")[1];
            var name = $("#adminName"+adminId).text();
            //alert(url);
            var x = confirm('Do you want to delete this Admin ('+name+')? This process cannot be reversed');
            if (x == true) {
                var url = $('#deleteAdminUrl'+adminId).val();
                window.location.href = url;
                //alert(url);
            }
        });
    </script>
@endpush
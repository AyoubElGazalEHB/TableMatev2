<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <style>
        .role-badge {
            display: inline-block;
            padding: 0.25rem 0.5rem;
            margin: 0.125rem;
            font-size: 0.75rem;
            font-weight: 600;
            border-radius: 0.375rem;
        }
        .role-admin { background-color: #dc3545; color: white; }
        .role-moderator { background-color: #fd7e14; color: white; }
        .role-user { background-color: #6c757d; color: white; }
    </style>
</head>
<body id="page-top">
    <div id="wrapper">
        @include('admin.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('admin.header')
                
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Role Management</h1>
                    </div>

                    @if(session('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">User Roles Overview</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Email</th>
                                            <th>Current Roles</th>
                                            <th>Assign Role</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(\App\Models\User::with('roles')->get() as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @forelse($user->roles as $role)
                                                    <span class="role-badge role-{{ strtolower($role->name) }}">
                                                        {{ $role->name }}
                                                    </span>
                                                @empty
                                                    <span class="text-muted">No roles assigned</span>
                                                @endforelse
                                            </td>
                                            <td>
                                                <form action="{{ url('/assign-role/' . $user->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <div class="input-group input-group-sm">
                                                        <select name="role_id" class="form-control form-control-sm">
                                                            @foreach($roles as $role)
                                                                @if(!$user->roles->contains($role->id))
                                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        <div class="input-group-append">
                                                            <button type="submit" class="btn btn-primary btn-sm">Assign</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                @foreach($user->roles as $role)
                                                    <form action="{{ url('/remove-role/' . $user->id . '/' . $role->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" 
                                                                onclick="return confirm('Remove {{ $role->name }} role from {{ $user->name }}?')">
                                                            Remove {{ $role->name }}
                                                        </button>
                                                    </form>
                                                @endforeach
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @foreach($roles as $role)
                        <div class="col-lg-4 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                {{ $role->name }} Role
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ $role->users->count() }} Users
                                            </div>
                                            <div class="text-xs text-gray-600 mt-1">
                                                {{ $role->description }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Ayoub El Gazal 2025</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('admin.script')
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Manage FAQ Items">
    <meta name="author" content="Admin">

    <title>FAQ Items</title>

    <!-- Custom styles -->
    @include('admin.css')
</head>

<body id="page-top">
    <div id="wrapper">
        @include('admin.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('admin.header')

                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">FAQ Items Management</h1>

                    <a href="{{ url('add_it') }}" class="btn btn-success mb-4">Add New Item</a>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>User</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td>{{ $item->category ? $item->category->title : 'Uncategorized' }}</td>
                                    <td>{{ $item->question }}</td>
                                    <td>{{ $item->answer }}</td>
                                    <td>
                                        @if ($item->user)
                                            <a href="{{ route('user.profile', $item->user->id) }}">
                                                <img src="{{ $item->user->profile_photo_url }}" alt="{{ $item->user->name }}" class="img-thumbnail" width="50">
                                                {{ $item->user->name }}
                                            </a>
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('edititem', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ url('delete_item', $item->id) }}" class="btn btn-danger btn-sm"
                                           onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
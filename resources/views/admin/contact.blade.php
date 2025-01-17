<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Contact Forms</title>
    @include('admin.css')
</head>

<body id="page-top">
    <div id="wrapper">
        @include('admin.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('admin.header')

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        {{ session()->get('message') }}
                    </div>
                @endif

                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        {{ session()->get('error') }}
                    </div>
                @endif

                <div class="container mt-5 mb-5">
                    <h1>Contact Forms</h1>

                    <table class="table table-bordered mt-4">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Sended On</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $contacts)
                                <tr>
                                    <td>{{ $contacts->name }}</td>
                                    <td>{{ $contacts->email }}</td>
                                    <td>{{ $contacts->message }}</td>
                                    <td>{{ $contacts->created_at }}</td>
                                    <td>
                                        <!-- Respond Form -->
                                        <form action="{{ url('respond_contact', $contacts->id) }}" method="POST" class="mb-2">
                                            @csrf
                                            <textarea name="response" class="form-control mb-2" rows="3" placeholder="Write your response here" required></textarea>
                                            <button type="submit" class="btn btn-primary btn-sm">Send Response</button>
                                        </form>

                                        <!-- Delete Button -->
                                        <a href="{{ url('delete_forms', $contacts->id) }}">
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </a>
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
                        <span>Copyright &copy; Zakintosh 2023</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @include('admin.script')
</body>

</html>
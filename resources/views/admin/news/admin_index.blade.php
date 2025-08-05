<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>News Management</title>

    <!-- Custom fonts for this template-->
@include('admin.css')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

   <!-- Sidebar -->
@include('admin.sidebar')
    <!-- Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

@include('admin.header')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">News Management</h1>

                    <a href="{{ route('admin.news.create') }}" class="btn btn-success mb-4">
                        <i class="fas fa-plus"></i> Add News
                    </a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Publication Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($news as $newsItem)
                                <tr>
                                    <td>{{ $newsItem->title }}</td>
                                    <td>{{ $newsItem->publication_date }}</td>
                                    <td>
                                        <a href="{{ route('admin.news.edit', $newsItem->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('admin.news.destroy', $newsItem->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Ayoub El Gazal 2025</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
 @include('admin.script')

</body>

</html>
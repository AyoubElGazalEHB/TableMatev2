<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FAQ Category</title>

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
                    <h1 class="h3 mb-4 text-gray-800">FAQ Category</h1>

                        <a href="{{url('add_cat')}}">
                        <button class="btn btn-success">Add Category</button>
                        </a>       


 <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Title</th>
                </tr>
            </thead>
            <tbody>

            @foreach($data as $datas)
                <tr>
                    <td>{{$datas->title}}</td>
                    <td>
                        <a href="{{url('editcategory',$datas->id)}}">
                        <button class="btn btn-success">Edit</button>
                        </a>       

                    </td>      

                    <td>
                        <a href="{{url('delete_category',$datas->id)}}">
                        <button class="btn btn-danger">Delete</button>
                        </a> 
                    </td>    

                 </tr>
                @endforeach

            </tbody>
        </table>

                </div>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Zakintosh 2023</span>
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
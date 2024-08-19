<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Tables</title>

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

                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        {{session()->get('message')}}
                    </div>
                    @endif

                    <h1>Add Tables:</h1>

                    <form action="{{url('upload_table')}}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div style="padding:10px">
                            <label for="">Table Number</label>
                            <input type="number" name="number" placeholder="ex. 123" required="">
                        </div>

                        <div style="padding:10px">
                            <label for="">Table Image</label>
                            <input type="file" name="file" required="">
                        </div>

                        <div style="padding:10px">
                            <label for="">Description</label>
                            <textarea name="description" id="description" cols="50" required=""></textarea>
                        </div>

                        <div style="padding:10px">
                            <label for="">Seating Area</label>
                            <select name="seatingArea" required="">
                                <option value="Indoor">Indoor</option>
                                <option value="Outdoor">Outdoor</option>
                                <option value="VIP">VIP</option>
                            </select>
                        </div>

                        <div style="padding:10px">
                            <label for="">Seats</label>
                            <input type="number" name="persons" required="">
                        </div>

                        <div style="padding:10px">
                            <input type="submit" style="color:black;" class="btn btn-primary" required="">
                        </div>

                    </form>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Ayoub El Gazal 2024</span>
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

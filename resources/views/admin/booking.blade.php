<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Reservations</title>

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

                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{session()->get('message')}}
                </div>
                @endif

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="container mt-5 mb-5">
                        <h1>To be Scheduled:</h1>

                        <table class="table table-bordered mt-4">
                            <thead>
                                <tr>
                                    <th>Table Number</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Reservation Date</th>
                                    <th>Reservation Time</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($data as $datas)
                                <tr>
                                    <td>{{$datas->tableNumber}}</td>
                                    <td>{{$datas->name}}</td>
                                    <td>{{$datas->phone}}</td>
                                    <td>{{$datas->email}}</td>
                                    <td>{{$datas->reservation_date}}</td>
                                    <td>{{$datas->reservation_time}}</td>
                                    <td>{{$datas->status}}</td>
                                    <td>
                                        <a href="{{url('denied_booking',$datas->id)}}">
                                            <button class="btn btn-danger">Denied</button>
                                        </a>
                                    </td>

                                    <td>
                                        <a href="{{url('approved_booking',$datas->id)}}">
                                            <button class="btn btn-success">Approved</button>
                                        </a>
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

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

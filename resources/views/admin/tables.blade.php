<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Table Managment</title>

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
<button type="button" class="close" data-dismiss="alert">
x
</button>

{{session()->get('message')}}
</div>

@endif

                <!-- Begin Page Content -->
                <div class="container-fluid">


    <div class="container mt-5 mb-5">
        <h1>Table management:</h1>

        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Table Number</th>
                    <th>image</th>
                    <th>descritption</th>
                    <th>classTable</th>
                    <th>price</th>
                    <th>persons</th>
                </tr>
            </thead>
            <tbody>

            @foreach($data as $tables)
                <tr>
                    <td>{{$tables->tableNumber}}</td>
                    <td><img height="200px" src="tableimage/{{$tables->image}}" alt="Table {{$tables->tableNumber}} image"></td>
                    <td>{{$tables->description}}</td>
                    <td>{{$tables->classTable}}</td>
                    <td>{{$tables->price}}</td>
                    <td>{{$tables->persons}}</td>
                    <td>
                        <a href="{{url('edittable',$tables->id)}}">
                        <button class="btn btn-success">Edit</button>
                        </a>     
                    </td>      

                    <td>
                        <a href="{{url('delete_table',$tables->id)}}">
                        <button class="btn btn-danger">Delete</button>
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
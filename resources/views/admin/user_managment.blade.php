<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Rights</title>

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
        <h1>User Rights:</h1>

        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Avatar</th>
                    <th>Username</th>
                    <th>Birthday</th>
                    <th>About</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>

            @foreach($data as $users)
                <tr>
                    <td><img height="200px" src="./storage/{{$users->image}}" alt="Avatar of {{$users->name}}"></td>
                    <td>{{$users->name}}</td>
                    <td>{{$users->birthday}}</td>
                    <td>{{$users->aboutMe}}</td>
                    <td>{{$users->email}}</td>
                    <td>
                        @if($users->typeUser == 1)
                            Admin
                        @else
                            User
                        @endif
                    </td>                    
                    <td>
                        <a href="{{url('promote_user',$users->id)}}">
                        <button class="btn btn-success">Promote</button>
                        </a>     
                    </td>      

                    <td>
                        <a href="{{url('discard_user',$users->id)}}">
                        <button class="btn btn-danger">Discard</button>
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
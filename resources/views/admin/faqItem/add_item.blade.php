<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Items</title>

    <!-- Custom fonts for this template-->
<base href="/public">
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
<button type="button" class="close" data-dismiss="alert">
x
</button>

{{session()->get('message')}}
</div>

@endif

<h1>Add Items:</h1>

<form action="{{url('add_item')}}" method="POST" enctype="multipart/form-data">

@csrf

            <div style="padding:10px">
                <label for="">Category</label>
                <select name="category_id" required="">

                @foreach($categories as $category)
              
 <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach

                </select>
            </div>


            <div style="padding:10px">
                <label for="">Question</label>
                <input type="text" name="question" required="">
            </div>

            <div style="padding:10px">
                <label for="">Answer</label>
                <input type="text" name="answer" required="">
            </div>



             <div style="padding:10px">
            <input type="submit" style="color:black;" class="btn btn-primary" required="">           
            </div>


</form>

                </div>

            </div>

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
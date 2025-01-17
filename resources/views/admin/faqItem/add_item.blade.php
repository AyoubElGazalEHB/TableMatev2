<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Add FAQ Item">
    <meta name="author" content="Admin">
    <title>Add FAQ Item</title>
    <base href="/public">
    @include('admin.css')
</head>
<body id="page-top">
    <div id="wrapper">
        @include('admin.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('admin.header')
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Add New FAQ Item</h1>
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ url('add_item') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id" class="form-control" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" name="question" id="question" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="answer">Answer</label>
                            <textarea name="answer" id="answer" class="form-control" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Item</button>
                        <a href="{{ url('faqItem_management') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>&copy; TableMate {{ date('Y') }}</span>
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
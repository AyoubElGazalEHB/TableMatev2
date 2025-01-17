<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add News - Admin</title>
    @include('admin.css')
</head>
<body>
    <div class="container mt-5">
        @include('admin.header')
        <h1>Add News</h1>
        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" rows="6" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="publication_date">Publication Date</label>
                <input type="date" name="publication_date" id="publication_date" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage News - Admin</title>
    @include('admin.css')
</head>
<body>
    <div class="container mt-5">
        @include('admin.header')
        <h1>Manage News</h1>
        <a href="{{ route('admin.news.create') }}" class="btn btn-success mb-4">Add News</a>
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
</body>
</html>
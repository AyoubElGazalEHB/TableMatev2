<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $newsItem->title }} - TableMate</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>{{ $newsItem->title }}</h1>
        <img src="{{ asset('storage/' . $newsItem->image_path) }}" class="img-fluid" alt="{{ $newsItem->title }}">
        <p class="mt-4">{{ $newsItem->content }}</p>
        <p class="text-muted">Published on {{ $newsItem->publication_date }}</p>

        <hr>
        <h3>Comments</h3>
        @foreach($newsItem->comments as $comment)
            <div class="mb-3">
                <strong>{{ $comment->name }}</strong>
                <p>{{ $comment->comment }}</p>
                <hr>
            </div>
        @endforeach

        <h4>Add a Comment</h4>
        <form action="{{ route('news.comment', $newsItem->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="comment">Comment</label>
                <textarea name="comment" id="comment" rows="4" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>
</body>
</html>

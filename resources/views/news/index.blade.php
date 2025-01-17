<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News - TableMate</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Latest News</h1>
        <div class="row">
            @foreach($news as $newsItem)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $newsItem->image_path) }}" class="card-img-top" alt="{{ $newsItem->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $newsItem->title }}</h5>
                            <p class="card-text">{{ Str::limit($newsItem->content, 100) }}</p>
                            <a href="{{ route('news.show', $newsItem->id) }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $news->links() }}
    </div>
</body>
</html>
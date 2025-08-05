<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ Str::limit($newsItem->content, 160) }}">
    <title>{{ $newsItem->title }} - TableMate</title>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/global-header.css">
    <link rel="stylesheet" href="../../assets/css/global-footer.css">
    <link rel="stylesheet" href="../../assets/css/index.css">
    <link rel="shortcut icon" href="../../assets/img/favicon.webp" type="image/x-icon">

    <style>
        body {
            font-family: 'Source Sans Pro', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        .article-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            color: #f44336;
            text-decoration: none;
            font-weight: 600;
            margin-bottom: 30px;
            transition: color 0.3s ease;
        }

        .back-link:hover {
            color: #d32f2f;
            text-decoration: none;
        }

        .back-link::before {
            content: "←";
            margin-right: 8px;
            font-size: 1.2rem;
        }

        .article-header {
            background: white;
            border-radius: 12px;
            padding: 40px;
            margin-bottom: 30px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }

        .article-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .article-meta {
            display: flex;
            align-items: center;
            color: #666;
            font-size: 0.95rem;
            margin-bottom: 30px;
        }

        .article-date {
            color: #f44336;
            font-weight: 600;
        }

        .article-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 30px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }

        .article-content {
            background: white;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .article-text {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #444;
        }

        .comments-section {
            background: white;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }

        .comments-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 30px;
            color: #333;
        }

        .comment {
            border-bottom: 1px solid #eee;
            padding: 20px 0;
        }

        .comment:last-child {
            border-bottom: none;
        }

        .comment-author {
            font-weight: 600;
            color: #f44336;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .comment-author a {
            color: #f44336;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .comment-author a:hover {
            text-decoration: underline;
        }

        .comment-author-photo {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #f44336;
        }

        .comment-text {
            color: #555;
            line-height: 1.6;
        }

        .no-comments {
            text-align: center;
            color: #666;
            font-style: italic;
        }

        @media (max-width: 768px) {
            .article-title {
                font-size: 2rem;
            }

            .article-header,
            .article-content,
            .comments-section {
                padding: 25px;
            }

            .article-image {
                height: 250px;
            }
        }
    </style>
</head>
<body>
    @include('user.header')

    <div class="article-container">
        <a href="{{ route('news.index') }}" class="back-link">Back to News</a>

        <article class="article-header">
            <h1 class="article-title">{{ $newsItem->title }}</h1>
            <div class="article-meta">
                <span class="article-date">{{ \Carbon\Carbon::parse($newsItem->publication_date)->format('F d, Y') }}</span>
            </div>
        </article>

        <img src="{{ asset('storage/' . $newsItem->image_path) }}" alt="{{ $newsItem->title }}" class="article-image">

        <div class="article-content">
            <div class="article-text">
                {!! nl2br(e($newsItem->content)) !!}
            </div>
        </div>

        <div class="comments-section">
            <h2 class="comments-title">Comments ({{ $newsItem->comments->count() }})</h2>
            @forelse($newsItem->comments as $comment)
                <div class="comment">
                    <div class="comment-author">
                        @if($comment->user)
                            <a href="{{ route('user.profile', $comment->user->id) }}">
                                <img src="{{ $comment->user->profile_photo_url }}" alt="{{ $comment->user->name }}" class="comment-author-photo">
                                {{ $comment->user->name }}
                            </a>
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($comment->name) }}&color=f44336&background=f5f5f5" alt="{{ $comment->name }}" class="comment-author-photo">
                            {{ $comment->name }}
                        @endif
                    </div>
                    <div class="comment-text">{{ $comment->comment }}</div>
                </div>
            @empty
                <div class="no-comments">
                    <p>No comments yet. Be the first to share your thoughts!</p>
                </div>
            @endforelse
        </div>
    </div>

    <footer class="footer">
        <div class="footer-container">
            <nav class="footer-nav">
                <div class="footer-description">
                    <h3 class="footer-description-title">TableMate</h3>
                    <p>Your go-to platform for easy and quick table reservations.</p>
                </div>
                <div class="footer-contact-us">
                    <h3 class="footer-description-title">Contact Us</h3>
                    <p class="footer-description-detail">
                        <img src="../../assets/img/map-pin.svg" class="footer-description-icon" alt="TableMate location">
                        <span>123, Gourmet Street, Foodville</span></p>
                    <p class="footer-description-detail">
                        <img src="../../assets/img/phone.svg" class="footer-description-icon" alt="TableMate phone number">
                        <span>+1 234 567 890</span></p>
                    <p class="footer-description-detail">
                        <img src="../../assets/img/mail.svg" class="footer-description-icon" alt="TableMate email">
                        <span>support@tablemate.com</span> </p>
                </div>
                <div class="footer-follow-us">
                    <h3 class="footer-description-title">Follow Us</h3>
                    <ul class="footer-follow-us-lists">
                        <li class="follow-us-list">
                            <a href="">
                                <img src="../../assets/img/facebook.svg" alt="TableMate Facebook page">
                            </a>
                        </li>
                        <li class="follow-us-list">
                            <a href="">
                                <img src="../../assets/img/twitter.svg" alt="TableMate Twitter page">
                            </a>
                        </li>
                        <li class="follow-us-list">
                            <a href="">
                                <img src="../../assets/img/instagram.svg" alt="TableMate Instagram page">
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </footer>
</body>
</html>
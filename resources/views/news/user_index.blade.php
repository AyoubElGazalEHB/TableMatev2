<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Latest news and updates from TableMate - Your Gateway to a Perfect Dining Experience.">
    <title>Latest News - TableMate</title>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/global-header.css">
    <link rel="stylesheet" href="../assets/css/global-footer.css">
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="shortcut icon" href="../assets/img/favicon.webp" type="image/x-icon">

    <style>
        body {
            font-family: 'Source Sans Pro', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .news-hero {
            background: linear-gradient(135deg, #f44336 0%, #d32f2f 100%);
            color: white;
            padding: 80px 0;
            text-align: center;
        }

        .news-hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .news-hero p {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        .news-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 60px 20px;
        }

        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .news-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.15);
        }

        .news-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .news-card-content {
            padding: 25px;
        }

        .news-card h3 {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: #333;
            line-height: 1.3;
        }

        .news-card p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .news-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .news-date {
            color: #f44336;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .read-more-btn {
            background: #f44336;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            transition: background 0.3s ease;
            display: inline-block;
        }

        .read-more-btn:hover {
            background: #d32f2f;
            color: white;
            text-decoration: none;
        }

        .no-news {
            text-align: center;
            padding: 60px 20px;
            color: #666;
        }

        .no-news h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    @include('user.header')

    <div class="news-hero">
        <h1>Latest News</h1>
        <p>Stay updated with the latest happenings at TableMate</p>
    </div>

    <div class="news-container">
        @if($news->count() > 0)
            <div class="news-grid">
                @foreach($news as $newsItem)
                    <article class="news-card">
                        <img src="{{ asset('storage/' . $newsItem->image_path) }}" alt="{{ $newsItem->title }}">
                        <div class="news-card-content">
                            <div class="news-meta">
                                <span class="news-date">{{ \Carbon\Carbon::parse($newsItem->publication_date)->format('M d, Y') }}</span>
                            </div>
                            <h3>{{ $newsItem->title }}</h3>
                            <p>{{ Str::limit($newsItem->content, 120) }}</p>
                            <a href="{{ route('news.show', $newsItem->id) }}" class="read-more-btn">Read More</a>
                        </div>
                    </article>
                @endforeach
            </div>

            <div style="margin-top: 40px; text-align: center;">
                {{ $news->links() }}
            </div>
        @else
            <div class="no-news">
                <h3>No News Available</h3>
                <p>Check back later for the latest updates and announcements.</p>
            </div>
        @endif
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
                        <img src="../assets/img/map-pin.svg" class="footer-description-icon" alt="TableMate location">
                        <span>123, Gourmet Street, Foodville</span></p>
                    <p class="footer-description-detail">
                        <img src="../assets/img/phone.svg" class="footer-description-icon" alt="TableMate phone number">
                        <span>+1 234 567 890</span></p>
                    <p class="footer-description-detail">
                        <img src="../assets/img/mail.svg" class="footer-description-icon" alt="TableMate email">
                        <span>support@tablemate.com</span> </p>
                </div>
                <div class="footer-follow-us">
                    <h3 class="footer-description-title">Follow Us</h3>
                    <ul class="footer-follow-us-lists">
                        <li class="follow-us-list">
                            <a href="">
                                <img src="../assets/img/facebook.svg" alt="TableMate Facebook page">
                            </a>
                        </li>
                        <li class="follow-us-list">
                            <a href="">
                                <img src="../assets/img/twitter.svg" alt="TableMate Twitter page">
                            </a>
                        </li>
                        <li class="follow-us-list">
                            <a href="">
                                <img src="../assets/img/instagram.svg" alt="TableMate Instagram page">
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </footer>
</body>
</html>
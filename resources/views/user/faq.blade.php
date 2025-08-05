<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Frequently Asked Questions - TableMate helps you discover the perfect dining experience.">
    <title>Frequently Asked Questions - TableMate</title>
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

        .faq-hero {
            background: linear-gradient(135deg, #f44336 0%, #d32f2f 100%);
            color: white;
            padding: 80px 0;
            text-align: center;
        }

        .faq-hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .faq-hero p {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        .faq-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 60px 20px;
        }

        .success-message {
            background: #4caf50;
            color: white;
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            position: relative;
        }

        .success-message .close {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: white;
            font-size: 1.2rem;
            cursor: pointer;
        }

        .faq-category {
            background: white;
            border-radius: 12px;
            margin-bottom: 30px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .category-header {
            background: #f44336;
            color: white;
            padding: 25px 30px;
            font-size: 1.4rem;
            font-weight: 700;
        }

        .faq-items {
            padding: 0;
        }

        .faq-item {
            border-bottom: 1px solid #eee;
            padding: 25px 30px;
            transition: background-color 0.3s ease;
        }

        .faq-item:last-child {
            border-bottom: none;
        }

        .faq-item:hover {
            background-color: #f9f9f9;
        }

        .faq-question {
            font-size: 1.1rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 12px;
            line-height: 1.4;
        }

        .faq-answer {
            color: #666;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .faq-author {
            font-size: 0.9rem;
            color: #999;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .faq-author a {
            color: #f44336;
            text-decoration: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .faq-author a:hover {
            text-decoration: underline;
        }

        .faq-author-photo {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            object-fit: cover;
            border: 1px solid #ddd;
        }

        .no-faqs {
            padding: 40px 30px;
            text-align: center;
            color: #666;
            font-style: italic;
        }

        .submit-question {
            background: white;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            margin-top: 40px;
        }

        .submit-question h2 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: #333;
        }

        .submit-question p {
            color: #666;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: #333;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
            box-sizing: border-box;
        }

        .form-control:focus {
            outline: none;
            border-color: #f44336;
        }

        .submit-btn {
            background: #f44336;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .submit-btn:hover {
            background: #d32f2f;
        }

        @media (max-width: 768px) {
            .faq-hero h1 {
                font-size: 2.2rem;
            }

            .faq-container {
                padding: 40px 15px;
            }

            .category-header,
            .faq-item,
            .submit-question {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    @include('user.header')

    <div class="faq-hero">
        <h1>Frequently Asked Questions</h1>
        <p>Find answers to common questions about TableMate</p>
    </div>

    <div class="faq-container">
        @if(session()->has('message'))
            <div class="success-message">
                {{ session()->get('message') }}
                <button type="button" class="close" onclick="this.parentElement.style.display='none'">×</button>
            </div>
        @endif

        @foreach($categories as $category)
            <div class="faq-category">
                <div class="category-header">
                    {{ $category->title }}
                </div>
                <div class="faq-items">
                    @forelse($category->faqItems as $item)
                        <div class="faq-item">
                            <div class="faq-question">{{ $item->question }}</div>
                            @if($item->answer)
                                <div class="faq-answer">{{ $item->answer }}</div>
                            @endif
                            @if($item->user)
                                <div class="faq-author">
                                    Asked by:
                                    <a href="{{ route('user.profile', $item->user->id) }}">
                                        <img src="{{ $item->user->profile_photo_url }}" alt="{{ $item->user->name }}" class="faq-author-photo">
                                        {{ $item->user->name }}
                                    </a>
                                </div>
                            @endif
                        </div>
                    @empty
                        <div class="no-faqs">
                            No FAQs available for this category yet.
                        </div>
                    @endforelse
                </div>
            </div>
        @endforeach

        <div class="submit-question">
            <h2>Have a Question?</h2>
            <p>Can't find what you're looking for? Submit your question and our team will get back to you.</p>

            <form action="{{ route('faq-items.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="faq_category_id">Category</label>
                    <select name="faq_category_id" id="faq_category_id" class="form-control" required>
                        <option value="">Select a category...</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="question">Your Question</label>
                    <input type="text" name="question" id="question" class="form-control"
                           placeholder="Type your question here..." required>
                </div>
                <button type="submit" class="submit-btn">Submit Question</button>
            </form>
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
    <script src="{{ asset('js/validation.js') }}"></script>
</body>
</html>
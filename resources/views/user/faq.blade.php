<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="TableMate Helps You Discover the Perfect Dining Experience.">
    <title>Frequently Asked Questions - TableMate</title>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/global-header.css">
    <link rel="stylesheet" href="../assets/css/global-footer.css">
    <link rel="stylesheet" href="../assets/css/index.css">
</head>
<body>
    @include('user.header')

    @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="container mt-5">
        <h2>Frequently Asked Questions</h2>
        @foreach($categories as $category)
            <div class="faq-category">
                <h3>{{ $category->title }}</h3>
                <ul>
                    @forelse($category->faqItems as $item)
                        <li>
                            <strong>{{ $item->question }}</strong>
                            <p>{{ $item->answer }}</p>
                            @if($item->user)
                                <p>
                                    <small>Asked by: 
                                        <a href="{{ route('user.profile', $item->user->id) }}">
                                            {{ $item->user->name }}
                                        </a>
                                    </small>
                                </p>
                            @endif
                        </li>
                    @empty
                        <li>No FAQs available for this category.</li>
                    @endforelse
                </ul>
            </div>
        @endforeach
    </div>

    <div class="container mt-4">
        <h2>Submit Your Question</h2>
        <form action="{{ route('faq-items.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="faq_category_id">Category</label>
                <select name="faq_category_id" id="faq_category_id" class="form-control" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="question">Your Question</label>
                <input type="text" name="question" id="question" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>

    <footer class="footer mt-auto">
        <div class="footer-container">
            <nav class="footer-nav">
                <div class="footer-description">
                    <h3 class="footer-description-title">TableMate</h3>
                    <p>Connecting You to Exceptional Dining Experiences</p>
                </div>
                <div class="footer-contact-us">
                    <h3 class="footer-description-title">Contact Us</h3>
                    <p>
                        <img src="../assets/img/map-pin.svg" class="footer-description-icon" alt="Location">
                        <span>123, Gourmet Street, Foodville</span>
                    </p>
                    <p>
                        <img src="../assets/img/phone.svg" class="footer-description-icon" alt="Phone">
                        <span>+1 234 567 890</span>
                    </p>
                    <p>
                        <img src="../assets/img/mail.svg" class="footer-description-icon" alt="Email">
                        <span>support@tablemate.com</span>
                    </p>
                </div>
                <div class="footer-follow-us">
                    <h3 class="footer-description-title">Follow Us</h3>
                    <ul class="footer-follow-us-lists">
                        <li><a href=""><img src="../assets/img/facebook.svg" alt="Facebook"></a></li>
                        <li><a href=""><img src="../assets/img/twitter.svg" alt="Twitter"></a></li>
                        <li><a href=""><img src="../assets/img/instagram.svg" alt="Instagram"></a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </footer>
</body>
</html>
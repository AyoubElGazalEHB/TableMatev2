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
    <link rel="stylesheet" href="../assets/css/accesibility.css">
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="shortcut icon" href="../assets/img/favicon.webp" type="image/x-icon">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="display: flex !important;  flex-direction: column !important; min-height: 100vh !important;" class="scroll-bar">
    <div id="loader">
        <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
            <path fill="#f44336" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                <animateTransform 
                    attributeName="transform" 
                    attributeType="XML" 
                    type="rotate"
                    dur="1s" 
                    from="0 50 50"
                    to="360 50 50" 
                    repeatCount="indefinite" />
            </path>
        </svg>
    </div>

    @include('user.header')

@if(session()->has('message'))

<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert">
x
</button>

{{session()->get('message')}}
</div>

@endif

<div class="container mt-5">
    <h2 style="padding-bottom: 30px">Frequently Asked Questions</h2>
    <div class="accordion" id="faqAccordion">
        @foreach($categories as $category)
        <div class="accordion-item">
            <button class="accordion-button" id="accordion-button-{{ $category->id }}" data-toggle="collapse"
                data-target="#collapse{{ $category->id }}" aria-expanded="false">
                <span class="accordion-title">{{ $category->title }}</span>
                <i class="fas fa-chevron-down"></i>
            </button>
            <div class="accordion-content collapse" id="collapse{{ $category->id }}">
                @foreach($category->faqItems as $item)
                <div class="accordion-item">
                    <button class="accordion-button" id="accordion-button-item-{{ $item->id }}" data-toggle="collapse"
                        data-target="#collapse-item-{{ $item->id }}" aria-expanded="false">
                        <span class="accordion-title">{{ $item->question }}</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content collapse" id="collapse-item-{{ $item->id }}">
                        <p>{{ $item->answer }}</p>
                    </div>
                </div>
                @endforeach
                @if($category->faqItems->isEmpty())
                <p class="list-group-item text-muted">No FAQs available for this category.</p>
                @endif
            </div>
        </div>
        @endforeach
    </div>
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
                <p class="footer-description-detail">
                    <img src="../assets/img/map-pin.svg" class="footer-description-icon" alt="TableMate location">
                    <span>123, Gourmet Street, Foodville</span></p>
                <p class="footer-description-detail">
                    <img src="../assets/img/phone.svg" class="footer-description-icon" alt="TableMate phone number">
                    <span>+1 234 567 890</span></p>
                <p class="footer-description-detail">
                    <img src="../assets/img/mail.svg" class="footer-description-icon" alt="TableMate email">
                    <span>support@tablemate.com</span></p>
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

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const accordionButtons = document.querySelectorAll(".accordion-button");

        accordionButtons.forEach(button => {
            button.addEventListener("click", function () {
                const content = this.nextElementSibling;

                this.classList.toggle("collapsed");
                const isCollapsed = this.classList.contains("collapsed");

                if (isCollapsed) {
                    content.style.maxHeight = null; // Allow the content to shrink
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                }
            });
        });
    });
</script>

<script defer async>
    (() => {
        const loader = document.getElementById('loader');
        const scrollBar = document.getElementsByClassName('scroll-bar')[0];
        window.addEventListener('load', () => {
            loader.classList.add('none');
            scrollBar.classList.remove('scroll-bar')
        });
    })();
</script>
<script defer async src="../assets/js/toggleHamburger.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="TableMate: Your Gateway to a Perfect Dining Experience.">
   <title>TableMate - Book Your Table Now</title>
   <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="./assets/css/global-header.css">
   <link rel="stylesheet" href="./assets/css/global-footer.css">
   <link rel="stylesheet" href="./assets/css/accesibility.css">
   <link rel="stylesheet" href="./assets/css/index.css">
   <link rel="shortcut icon" href="./assets/img/favicon.webp" type="image/x-icon">

   <style>
       body {
           font-family: 'Source Sans Pro', sans-serif;
           background-color: #fff;
           color: #333;
       }
       .jumbotron-container {
           display: flex;
           justify-content: space-between;
           padding: 50px;
           background-color: #f44336;
           color: #fff;
       }
       .jumbotron-header {
           font-size: 2.5rem;
           line-height: 1.5;
       }
       .footer {
           background-color: #d32f2f;
           color: #fff;
           padding: 20px;
           text-align: center;
       }
       .footer-description-title {
           font-weight: 700;
       }
       .footer-description-detail, .footer-follow-us-lists {
           display: flex;
           align-items: center;
       }
       .footer-description-icon {
           margin-right: 10px;
       }
       .follow-us-list a {
           color: #fff;
           margin-right: 15px;
       }
       .none {
           display: none;
       }
   </style>

</head>
<body class="scroll-bar">
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

   <div class="jumbotron-container">
       <div class="jumbotron-left">
           <h2 class="jumbotron-header">Book Your Perfect Table <br> for a Memorable Dining <br> Experience.</h2>
           <p>Reserve your spot at the best restaurants <br>
               with just a few clicks.</p>
       </div>
       <div class="jumbotron-right">
           <!-- Additional content like an image or reservation form can go here -->
       </div>
   </div>

   @include('user.section')

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
                       <img src="./assets/img/map-pin.svg" class="footer-description-icon" alt="TableMate location">
                       <span>123, Gourmet Street, Foodville</span></p>
                   <p class="footer-description-detail">
                       <img src="./assets/img/phone.svg" class="footer-description-icon" alt="TableMate phone number"> 
                       <span>+1 234 567 890</span></p>
                   <p class="footer-description-detail">
                       <img src="./assets/img/mail.svg" class="footer-description-icon" alt="TableMate email">
                       <span>support@tablemate.com</span> </p>
               </div>
               <div class="footer-follow-us">
                   <h3 class="footer-description-title">Follow Us</h3>
                   <ul class="footer-follow-us-lists">
                       <li class="follow-us-list">
                           <a href="">
                               <img src="./assets/img/facebook.svg" alt="TableMate Facebook page">
                           </a>
                       </li>
                       <li class="follow-us-list">
                           <a href="">
                               <img src="./assets/img/twitter.svg" alt="TableMate Twitter page">
                           </a>
                       </li>
                       <li class="follow-us-list">
                           <a href="">
                               <img src="./assets/img/instagram.svg" alt="TableMate Instagram page">
                           </a>
                       </li>
                   </ul>
               </div>
           </nav>
       </div>
   </footer>
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
   <script  defer async src="assets/js/toggleHamburger.js"></script>
</body>
</html>

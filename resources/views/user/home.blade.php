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
           align-items: center;
           padding: 80px 50px;
           background: linear-gradient(135deg, rgba(244, 67, 54, 0.9) 0%, rgba(211, 47, 47, 0.9) 100%),
                       url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') center/cover;
           color: #fff;
           min-height: 600px;
           position: relative;
       }

       .jumbotron-container::before {
           content: '';
           position: absolute;
           top: 0;
           left: 0;
           right: 0;
           bottom: 0;
           background: rgba(0, 0, 0, 0.3);
           z-index: 1;
       }

       .jumbotron-left,
       .jumbotron-right {
           position: relative;
           z-index: 2;
       }
       .jumbotron-left {
           flex: 1;
           max-width: 600px;
       }
       .jumbotron-header {
           font-size: 3.2rem;
           line-height: 1.2;
           font-weight: 700;
           margin-bottom: 20px;
       }
       .jumbotron-text {
           font-size: 1.3rem;
           line-height: 1.6;
           opacity: 0.9;
           margin-bottom: 30px;
       }
       .jumbotron-right {
           flex: 1;
           display: flex;
           justify-content: center;
           align-items: center;
       }
       .hero-stats {
           display: grid;
           grid-template-columns: repeat(2, 1fr);
           gap: 30px;
           background: rgba(255,255,255,0.15);
           padding: 40px;
           border-radius: 12px;
           backdrop-filter: blur(15px);
           border: 1px solid rgba(255,255,255,0.2);
           box-shadow: 0 8px 32px rgba(0,0,0,0.1);
       }
       .stat-item {
           text-align: center;
       }
       .stat-number {
           font-size: 2.5rem;
           font-weight: 700;
           display: block;
           margin-bottom: 5px;
       }
       .stat-label {
           font-size: 0.9rem;
           opacity: 0.8;
       }
       @media (max-width: 768px) {
           .jumbotron-container {
               flex-direction: column;
               padding: 60px 20px;
               text-align: center;
               min-height: 500px;
           }
           .jumbotron-header {
               font-size: 2.5rem;
           }
           .jumbotron-text {
               font-size: 1.1rem;
           }
           .hero-stats {
               margin-top: 40px;
               padding: 30px;
               grid-template-columns: 1fr 1fr;
               gap: 20px;
           }
           .stat-number {
               font-size: 2rem;
           }
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
           <h1 class="jumbotron-header">Book Your Perfect Table for a Memorable Dining Experience</h1>
           <p class="jumbotron-text">Reserve your spot at the best restaurants with just a few clicks. Discover exceptional dining experiences and create unforgettable memories.</p>
       </div>
       <div class="jumbotron-right">
           <div class="hero-stats">
               <div class="stat-item">
                   <span class="stat-number">10K+</span>
                   <span class="stat-label">Reservations</span>
               </div>
               <div class="stat-item">
                   <span class="stat-number">150+</span>
                   <span class="stat-label">Restaurants</span>
               </div>
               <div class="stat-item">
                   <span class="stat-number">5K+</span>
                   <span class="stat-label">Happy Customers</span>
               </div>
               <div class="stat-item">
                   <span class="stat-number">4.9★</span>
                   <span class="stat-label">Average Rating</span>
               </div>
           </div>
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

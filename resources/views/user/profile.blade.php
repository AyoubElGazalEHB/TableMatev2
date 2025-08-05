<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $user->name }}'s profile on TableMate - Your Gateway to a Perfect Dining Experience.">
    <title>{{ $user->name }}'s Profile - TableMate</title>
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
        }

        .profile-hero {
            background: linear-gradient(135deg, #f44336 0%, #d32f2f 100%);
            color: white;
            padding: 60px 0;
            text-align: center;
        }

        .profile-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 60px 20px;
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

        .profile-card {
            background: white;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            text-align: center;
        }

        .profile-photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin: 0 auto 25px;
            border: 4px solid #f44336;
            object-fit: cover;
        }

        .profile-name {
            font-size: 2rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
        }

        .profile-email {
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 30px;
        }

        .profile-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .profile-detail {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            text-align: left;
        }

        .detail-label {
            font-weight: 600;
            color: #f44336;
            font-size: 0.9rem;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .detail-value {
            color: #333;
            font-size: 1.1rem;
            line-height: 1.4;
        }

        .no-data {
            color: #999;
            font-style: italic;
        }

        .member-since {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            color: #666;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .profile-container {
                padding: 40px 15px;
            }

            .profile-card {
                padding: 25px;
            }

            .profile-name {
                font-size: 1.6rem;
            }

            .profile-details {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    @include('user.header')

    <div class="profile-hero">
        <h1>User Profile</h1>
        <p>Get to know our TableMate community member</p>
    </div>

    <div class="profile-container">
        <a href="javascript:history.back()" class="back-link">Back</a>

        <div class="profile-card">
            <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="profile-photo">

            <h1 class="profile-name">{{ $user->name }}</h1>
            <p class="profile-email">{{ $user->email }}</p>

            <div class="profile-details">
                <div class="profile-detail">
                    <div class="detail-label">About Me</div>
                    <div class="detail-value">
                        {{ $user->aboutMe ?? 'This user hasn\'t shared anything about themselves yet.' }}
                    </div>
                </div>

                <div class="profile-detail">
                    <div class="detail-label">Birthday</div>
                    <div class="detail-value">
                        @if($user->birthday)
                            {{ \Carbon\Carbon::parse($user->birthday)->format('F d, Y') }}
                        @else
                            <span class="no-data">Not specified</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="member-since">
                Member since {{ \Carbon\Carbon::parse($user->created_at)->format('F Y') }}
            </div>
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
# TableMate - Your Gateway to a Perfect Dining Experience

TableMate is a Laravel-based web application that simplifies table reservations for users and provides robust administrative features for restaurant managers. Built with Laravel 11.45.1, this project offers a modern, secure, and user-friendly platform for restaurant management.

## Features

### User Features
- Browse and reserve tables at restaurants
- View detailed table information including seating capacity and availability
- Create and manage personal profiles with photos
- Add comments on news articles and interact with other users
- Access FAQ section and submit questions
- Contact restaurant administrators through contact forms
- Responsive and mobile-friendly interface

### Admin Features
- Manage users and assign roles (Admin, Moderator, User)
- Add, edit, and delete table information
- Approve or deny table reservations
- Manage news articles with images and publication dates
- Handle FAQ categories and items
- Respond to contact form inquiries via email
- Complete user management with role assignment

## Getting Started

To set up this project on your local machine, follow these steps:

### Prerequisites
- PHP >= 8.3
- Composer
- Laravel 11
- Node.js
- MySQL

### Installation

1. Clone the repository:
```bash
git clone https://github.com/AyoubElGazalEHB/TableMatev2.git
```

2. Navigate to the project directory:
```bash
cd TableMatev2
```

3. Install PHP dependencies:
```bash
composer install
```

4. Install Node.js dependencies:
```bash
npm install
```

5. Copy .env.example to .env and configure your database settings:
```bash
cp .env.example .env
```

6. Generate the application key:
```bash
php artisan key:generate
```

7. Run migrations and seed the database:
```bash
php artisan migrate:fresh --seed
```

8. Start the development server:
```bash
php artisan serve
```
    

## Seeded Data

The project includes the following seeded data:

### Admin Account:
- Email: admin@ehb.be
- Password: Password!321

### Test User Account:
- Email: user@user.be
- Password: password

## Direct Links

- [Laravel Documentation](https://laravel.com/docs)
- [Jetstream Documentation](https://jetstream.laravel.com/)
- [GitHub Repository](https://github.com/AyoubElGazalEHB/TableMatev2)



## Acknowledgments
**Instructor’s Approval:** This project builds upon my previous year’s work, with explicit permission from my instructor to improve and submit it again for this academic year.

**Inspiration and Resources:**
- Laravel
- YouTube Tutorials
- ChatGPT

## About the Developer
This project was developed by Ayoub El Gazal as part of the Backend Web Development course. The feedback and insights gained during the previous year were instrumental in creating this improved version.
# TableMate - Your Gateway to a Perfect Dining Experience

TableMate is a Laravel-based web application that simplifies table reservations for users and provides robust administrative features for restaurant managers. This project builds upon a previous version, enhanced with new features and improvements.

## Features

### User Features
- Browse and reserve tables at top-rated restaurants.
- View detailed information about tables, including seating capacity and price.
- Add comments on news articles and view comments from other users.
- Accessible, responsive, and mobile-friendly interface.

### Admin Features
- Manage users and their roles.
- Add, edit, and delete table information.
- Approve or deny reservations.
- Manage news articles and FAQ sections.

## Getting Started

To set up this project on your local machine, follow these steps:

### Prerequisites
- PHP >= 8.2
- Composer
- Laravel 10
- Node.js
- MySQL

### Installation

1. Clone the repository:
  
    git clone https://github.com/AyoubElGazalEHB/TableMatev2.git


2. Navigate to the project directory:
    
    cd TableMatev2
    

3. Install PHP dependencies:
    
    composer install
    

4. Install Node.js dependencies:
   
    npm install
    

5. Copy .env.example to .env and configure your database settings:
    
    cp .env.example .env


6. Generate the application key:
    
    php artisan key:generate
    

7. Run migrations and seed the database:
    
    php artisan migrate:fresh --seed
    

8. Start the development server:
    
    php artisan serve
    

## Seeded Data

The project includes the following seeded data:

**Admin Account:**
- Email: admin@ehb.be
- Password: Password!321

**Test User Account:**
- Email: user@user.be
- Password: password

## Direct Links
- [Laravel Documentation](https://laravel.com/docs)
- [Jetstream Documentation](https://jetstream.laravel.com/)
- [Frontend Template (User)](https://github.com/AyoubElGazalEHB/TableMatev2)
- [Frontend Template (Admin)](https://github.com/AyoubElGazalEHB/TableMatev2)
- [GitHub Repository](https://github.com/AyoubElGazalEHB/TableMatev2)

## Acknowledgments
**Instructor’s Approval:** This project builds upon my previous year’s work, with explicit permission from my instructor to improve and submit it again for this academic year.

**Inspiration and Resources:**
- Laravel
- YouTube Tutorials
- ChatGPT

## About the Developer
This project was developed by Ayoub El Gazal as part of the Backend Web Development course. The feedback and insights gained during the previous year were instrumental in creating this improved version.


# 🍽️ TableMate - Professional Restaurant Reservation System

[![Laravel](https://img.shields.io/badge/Laravel-11.x-red.svg)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.3+-blue.svg)](https://php.net)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

TableMate is a comprehensive, modern restaurant reservation system built with **Laravel 11**. This professional-grade application provides seamless table booking experiences for customers and powerful management tools for restaurant administrators.

## ✨ Key Features

### 🔐 **Authentication & User Management**
- **Multi-role system**: Admin, Moderator, and User roles with many-to-many relationships
- **Secure authentication**: Laravel Fortify with Jetstream integration
- **Admin user creation**: Admins can manually create users and assign roles
- **Profile management**: Public user profiles with photo uploads
- **Password reset**: Secure password recovery system

### 📅 **Reservation System**
- **Real-time table booking**: Interactive table selection and reservation
- **Reservation management**: Admin approval/denial system
- **User reservation history**: Track past and upcoming reservations
- **Table management**: Complete CRUD operations for restaurant tables

### 📰 **Content Management**
- **News system**: Admin-managed news articles with publication dates
- **FAQ management**: Categorized frequently asked questions
- **Contact system**: Contact form with email notifications to admins
- **Admin responses**: Admins can respond to contact inquiries

### 🛡️ **Security & Validation**
- **Client-side validation**: Real-time JavaScript form validation
- **Server-side validation**: Professional FormRequest classes
- **XSS protection**: Laravel Blade escaping and input sanitization
- **CSRF protection**: All forms protected against cross-site request forgery
- **Rate limiting**: Contact form spam protection

## 🚀 Getting Started

### 📋 Prerequisites

Before you begin, ensure you have the following installed on your system:

- **PHP >= 8.3** (Required for Laravel 11)
- **Composer** (Latest version)
- **Node.js & NPM** (For asset compilation)
- **MySQL 8.0+** or **MariaDB 10.3+**
- **Git** (For version control)

### 💻 System Requirements

- **Laravel 11.x** (Automatically installed via Composer)
- **Memory**: Minimum 512MB RAM
- **Storage**: At least 1GB free space
- **Web Server**: Apache/Nginx (for production)

### ⚡ Quick Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/AyoubElGazalEHB/TableMatev2.git
   cd TableMatev2
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database configuration**

   Edit your `.env` file with your database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=tablemate
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Database setup**
   ```bash
   # Create the database first, then run:
   php artisan migrate:fresh --seed
   ```

6. **Start the application**
   ```bash
   php artisan serve
   ```

   Your application will be available at: `http://localhost:8000`
    

## 🔑 Default Accounts

The application comes with pre-configured accounts for testing:

### 👨‍💼 **Admin Account**
- **Email**: `admin@ehb.be`
- **Password**: `Password!321`
- **Permissions**: Full system access, user management, content management

### 👤 **Test User Account**
- **Email**: `user@user.be`
- **Password**: `password`
- **Permissions**: Basic user access, reservations, profile management

### 🎭 **Available Roles**
- **Admin**: Complete system control
- **Moderator**: Content management and user moderation
- **User**: Standard customer access

## 🏗️ Technical Architecture

### **Framework & Technologies**
- **Backend**: Laravel 11.x with PHP 8.3+
- **Frontend**: Blade templates with Bootstrap 4
- **Authentication**: Laravel Fortify + Jetstream
- **Database**: MySQL with Eloquent ORM
- **Validation**: Server-side FormRequests + Client-side JavaScript
- **Security**: CSRF protection, XSS prevention, Rate limiting

### **Database Relationships**
- **One-to-Many**: User → Reservations, User → FAQ Items, News → Comments
- **Many-to-Many**: User ↔ Roles (Admin, Moderator, User)
- **Polymorphic**: Contact system with admin responses

### **Key Features Implemented**
✅ **Authentication System** (Login, Register, Password Reset)
✅ **Role-based Access Control** (Admin, Moderator, User)
✅ **Table Reservation System** (CRUD operations)
✅ **News Management** (Admin content management)
✅ **FAQ System** (Categorized Q&A)
✅ **Contact System** (Email notifications)
✅ **User Profiles** (Public profiles with photos)
✅ **Form Validation** (Client + Server side)
✅ **Security Features** (XSS, CSRF, Rate limiting)

## 🛠️ Development Commands

```bash
# Database operations
php artisan migrate:fresh --seed    # Reset database with fresh data
php artisan migrate                  # Run pending migrations
php artisan db:seed                  # Seed database with test data

# Cache management
php artisan config:cache            # Cache configuration
php artisan route:cache             # Cache routes
php artisan view:cache              # Cache views
php artisan cache:clear             # Clear application cache

# Development tools
php artisan tinker                  # Interactive shell
php artisan route:list              # List all routes
php artisan make:controller Name    # Create new controller
php artisan make:model Name -m      # Create model with migration
```

## Acknowledgments
**Instructor’s Approval:** This project builds upon my previous year’s work, with explicit permission from my instructor to improve and submit it again for this academic year.

**Inspiration and Resources:**
- Laravel
- YouTube Tutorials
- ChatGPT

## About the Developer
This project was developed by Ayoub El Gazal as part of the Backend Web Development course. The feedback and insights gained during the previous year were instrumental in creating this improved version.

## 🚨 Troubleshooting

### Common Issues

**Database Connection Error**
```bash
# Ensure MySQL is running and credentials are correct
php artisan config:clear
php artisan cache:clear
```

**Permission Errors**
```bash
# Fix storage permissions (Linux/Mac)
chmod -R 775 storage bootstrap/cache
```

**Email Not Working**
```bash
# Check .env mail configuration
# For testing, use Mailtrap or MailHog
# Ensure MAIL_FROM_ADDRESS is set
```

**Assets Not Loading**
```bash
# Compile assets
npm run dev
# Or for production
npm run build
```

## 📚 Resources & Documentation

### **Official Documentation**
- [Laravel 11 Documentation](https://laravel.com/docs/11.x)
- [Laravel Fortify](https://laravel.com/docs/11.x/fortify)
- [Laravel Jetstream](https://jetstream.laravel.com/)
- [Eloquent ORM](https://laravel.com/docs/11.x/eloquent)

### **Learning Resources**
- [Laravel Bootcamp](https://bootcamp.laravel.com/)
- [Laracasts](https://laracasts.com/)
- [Laravel News](https://laravel-news.com/)

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

**📧 Contact**: For questions about this project, please contact through the application's contact form or GitHub issues.

**🔗 Repository**: [https://github.com/AyoubElGazalEHB/TableMatev2](https://github.com/AyoubElGazalEHB/TableMatev2)


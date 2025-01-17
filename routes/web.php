<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\FAQCategoryController;
use App\Http\Controllers\FAQItemController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TableManagingController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\UserNewsController;
use App\Http\Controllers\AdminNewsController;

/* Public Routes */
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'redirect']);
Route::view('/about', 'user.about')->name('about');

/* User Profile */
Route::get('/user/profile/{id}', [UserController::class, 'profile'])->name('user.profile');

/* Authenticated Dashboard */
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

/* Table Management */
Route::get('/add_table_view', [TableController::class, 'addview']);
Route::post('/upload_table', [TableController::class, 'upload']);

/* Table Updating (Admin Panel) */
Route::get('/tables', [TableManagingController::class, 'tables']);
Route::get('/edittable/{id}', [TableManagingController::class, 'edittable']);
Route::get('/delete_table/{id}', [TableManagingController::class, 'delete_table']);
Route::post('/changing_table/{id}', [TableManagingController::class, 'changing_table']);

/* Admin Rights (Admin Panel) */
Route::get('/users_rights', [AdminController::class, 'users_rights']);
Route::get('/promote_user/{id}', [AdminController::class, 'promote_user']);
Route::get('/discard_user/{id}', [AdminController::class, 'discard_user']);

/* Table Reservation (User Panel) */
Route::get('/detail/{id}', [BookController::class, 'showDetail']);
Route::post('/reservation', [BookController::class, 'reservation']);

/* Booking Requests (Admin Panel) */
Route::get('/booking', [ReservationController::class, 'booking']);
Route::get('/approved_booking/{id}', [ReservationController::class, 'approved_booking']);
Route::get('/denied_booking/{id}', [ReservationController::class, 'denied_booking']);

/* My Reservation (User Panel) */
Route::get('/myreservation', [ReservationController::class, 'myreservation']);
Route::get('/cancel_book/{id}', [ReservationController::class, 'cancel_book']);

/* Contact Form */
Route::get('/contact', [ContactController::class, 'contact']);
Route::post('/add_contactform', [ContactController::class, 'add_contactform']);

/* Contact Management (Admin Panel) */
Route::get('/contact_forms', [ContactController::class, 'contact_forms']);
Route::get('/delete_forms/{id}', [ContactController::class, 'delete_forms']);
Route::post('/respond_contact/{id}', [ContactController::class, 'respond']);

/* FAQ (User Panel) */
Route::get('/faq', [FAQItemController::class, 'display'])->name('faq.display');
Route::post('/faq/store', [FAQItemController::class, 'store'])->name('faq-items.store');

/* FAQ Management (Admin Panel) */
Route::get('/faqItem_managment', [FAQItemController::class, 'faqItem_management']);
Route::get('/add_it', [FAQItemController::class, 'add_it']);
Route::post('/add_item', [FAQItemController::class, 'add_item']);
Route::get('/edititem/{id}', [FAQItemController::class, 'edit_item']);
Route::get('/delete_item/{id}', [FAQItemController::class, 'delete_item']);
Route::post('/changing_item/{id}', [FAQItemController::class, 'update_item']);

/* FAQ Categories (Admin Panel) */
Route::get('/faq_managment', [FAQCategoryController::class, 'faq_managment']);
Route::get('/add_cat', [FAQCategoryController::class, 'add_cat']);
Route::post('/add_category', [FAQCategoryController::class, 'add_category']);
Route::get('/editcategory/{id}', [FAQCategoryController::class, 'editcategory']);
Route::get('/delete_category/{id}', [FAQCategoryController::class, 'delete_category']);
Route::post('/changing_category/{id}', [FAQCategoryController::class, 'changing_category']);

/* User Routes for News */
Route::get('/news', [UserNewsController::class, 'index'])->name('news.index');
Route::get('/news/{id}', [UserNewsController::class, 'show'])->name('news.show');

/* Admin Routes for News Management */
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/news', [AdminNewsController::class, 'index'])->name('admin.news.index');
    Route::get('/admin/news/create', [AdminNewsController::class, 'create'])->name('admin.news.create');
    Route::post('/admin/news', [AdminNewsController::class, 'store'])->name('admin.news.store');
    Route::get('/admin/news/{id}/edit', [AdminNewsController::class, 'edit'])->name('admin.news.edit');
    Route::post('/admin/news/{id}', [AdminNewsController::class, 'update'])->name('admin.news.update');
    Route::delete('/admin/news/{id}', [AdminNewsController::class, 'destroy'])->name('admin.news.destroy');
});


/* Send Test Email */
Route::get('/send-test-email', function () {
    Mail::raw('This is a test email from Laravel!', function ($message) {
        $message->to('recipient@example.com')
                ->subject('Test Email from Laravel');
    });

    return 'Test email sent!';
});
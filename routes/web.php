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
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'redirect']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



/*Add Tables */
Route::get('/add_table_view', [TableController::class, 'addview']);
Route::post('/upload_table', [TableController::class, 'upload']);



/*Table Updating (Admin panel) */
Route::get('/tables', [TableManagingController::class, 'tables']);
Route::get('/edittable/{id}', [TableManagingController::class, 'edittable']);
Route::get('/delete_table/{id}', [TableManagingController::class, 'delete_table']);
Route::post('/changing_table/{id}', [TableManagingController::class, 'changing_table']);



/*Admin Rights (Admin panel) */
Route::get('/users_rights', [AdminController::class, 'users_rights']);
Route::get('/promote_user/{id}', [AdminController::class, 'promote_user']);
Route::get('/discard_user/{id}', [AdminController::class, 'discard_user']);


/*Table reservation (User panel) */
Route::get('/detail/{id}', [BookController::class, 'showDetail']);
Route::post('/reservation', [BookController::class, 'reservation']);


/*Booking Reques (Admin panel) */
Route::get('/booking', [ReservationController::class, 'booking']);
Route::get('/approved_booking/{id}', [ReservationController::class, 'approved_booking']);
Route::get('/denied_booking/{id}', [ReservationController::class, 'denied_booking']);



/*My reservation (User panel) */
Route::get('/myreservation', [ReservationController::class, 'myreservation']);
Route::get('/cancel_book/{id}', [ReservationController::class, 'cancel_book']);


/*Contact form  */
Route::get('/contact', [ContactController::class, 'contact']);
Route::post('/add_contactform', [ContactController::class, 'add_contactform']);



/*Contact managment (Admin panel)*/
Route::get('/contact_forms', [ContactController::class, 'contact_forms']);
Route::get('/delte_froms/{id}', [ContactController::class, 'delte_froms']);


/*FAQ (User panel) */
// Route for displaying FAQ items
Route::get('/faq', [FAQItemController::class, 'display'])->name('faq.display');
// Route for displaying FAQ categories
Route::get('/faq/categories', [FAQCategoryController::class, 'index'])->name('faq.categories.index');



/*About us (User panel) */
Route::get('/about', [HomeController::class, 'about']);


/*FAQ Categories (Admin panel) */
Route::get('/faq_managment', [FAQCategoryController::class, 'faq_managment']);
Route::get('/add_cat', [FAQCategoryController::class, 'add_cat']);
Route::post('/add_category', [FAQCategoryController::class, 'add_category']);
Route::get('/editcategory/{id}', [FAQCategoryController::class, 'editcategory']);
Route::get('/delete_category/{id}', [FAQCategoryController::class, 'delete_category']);
Route::post('/changing_category/{id}', [FAQCategoryController::class, 'changing_category']);


/*FAQ Items (Admin panel) */
Route::get('/faqItem_managment', [FAQItemController::class, 'faqItem_managment']);
Route::get('/add_it', [FAQItemController::class, 'add_it']);
Route::post('/add_item', [FAQItemController::class, 'add_item']);
Route::get('/edititem/{id}', [FAQItemController::class, 'edititem']);
Route::get('/delete_item/{id}', [FAQItemController::class, 'delete_item']);
Route::post('/changing_item/{id}', [FAQItemController::class, 'changing_item']);


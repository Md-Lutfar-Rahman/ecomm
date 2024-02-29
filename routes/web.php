<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\sliderController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
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

Route::get('/', function () {
    return view('frontend.home');
});

// Home page content load Routes

Route::get('/', [sliderController::class, 'index'])->name('slider.index');


// Add to Cart Routs 
Route::post('/cart/add/{product}', [ProductController::class, 'addToCart'])->name('cart.add');

Route::get('/card', [CartController::class, 'showCard'])->name('card');
Route::get('/checkout',[CartController::class,'checkout'])->name('checkout');
Route::post('/placeOrder',[CartController::class,'placeOrder'])->name('place.order');

Route::get('/placeorder', [CartController::class, 'Ordercomplete'])->name('placeorder');



// Authentication Routs
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Protected Routes
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    // Admin Dashboard Route
    Route::get('/admin/home', [AdminController::class,'home'])->name('admin.home');
    Route::get('/admin/products', [AdminController::class,'adminProducts'])->name('admin.products');

    // For Product Creation route : 
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    
    // For Order Handle
    Route::get('/admin/orders', [AdminController::class,'adminOrders'])->name('admin.orders');
    // Edit order route
    Route::get('admin/orders/{order}/edit', [AdminController::class, 'adminEdit'])->name('admin.orders.edit');

    // Update order route
    Route::put('admin/orders/{order}', [AdminController::class, 'adminUpdate'])->name('admin.orders.update');

    // Delete order route
    Route::delete('admin/orders/{order}', [AdminController::class, 'adminDestroy'])->name('admin.orders.delete');


    // For Course Route 
    
    // for course home page load
    Route::get('admin/course',[CourseController::class,'courses'])->name('admin.course');
    
    // for course create 
    Route::get('/admin/course/create', [CourseController::class, 'create'])->name('admin.course.create');
    Route::post('/admin/course', [CourseController::class, 'store'])->name('admin.course.store');




    // for Lessosns Create admin.lessons
    Route::get('admin/lesson',[LessonController::class,'index'])->name('admin.lesson');
    Route::get('admin/lesson/create',[LessonController::class,'create'])->name('admin.lesson.create');
    Route::post('admin/lesson/',[LessonController::class,'store'])->name('admin.lesson.store');
});
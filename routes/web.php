<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\BookCategoryController;
use App\Http\Controllers\BookLocationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ApplicationController;

Route::controller(AuthController::class)->prefix('auth')->name('auth.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/logout', 'logout')->name('logout');
    Route::post('/login', 'login')->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::controller(DashboardController::class)->name('dashboard.')->group(function () {
        Route::get('/', 'index')->name('index');
    });
    
    Route::controller(AuthorController::class)->prefix('author')->name('author.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/new', 'new')->name('new');
        Route::get('/{id}', 'edit')->name('edit');
        Route::post('/', 'store')->name('store');
        Route::put('/', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });
    
    Route::controller(PublisherController::class)->prefix('publisher')->name('publisher.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/new', 'new')->name('new');
        Route::get('/{id}', 'edit')->name('edit');
        Route::post('/', 'store')->name('store');
        Route::put('/', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });
    
    Route::controller(BookCategoryController::class)->prefix('book-category')->name('book_category.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/new', 'new')->name('new');
        Route::get('/{id}', 'edit')->name('edit');
        Route::post('/', 'store')->name('store');
        Route::put('/', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });
    
    Route::controller(BookLocationController::class)->prefix('book-location')->name('book_location.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/new', 'new')->name('new');
        Route::get('/{id}', 'edit')->name('edit');
        Route::post('/', 'store')->name('store');
        Route::put('/', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });
    
    Route::controller(UserController::class)->prefix('user')->name('user.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/new', 'new')->name('new');
        Route::get('/{id}', 'edit')->name('edit');
        Route::post('/', 'store')->name('store');
        Route::put('/', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });
    
    Route::controller(BookController::class)->prefix('book')->name('book.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/new', 'new')->name('new');
        Route::get('/report', 'report')->name('report');
        Route::get('/{id}', 'edit')->name('edit');
        Route::get('/detail/{id}', 'detail')->name('detail');
        Route::post('/', 'store')->name('store');
        Route::post('/update', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });
    
    Route::controller(MemberController::class)->prefix('member')->name('member.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/print-member-card/{id}', 'memberCard')->name('print_member_card');
        Route::get('/print-free-card/{id}', 'freeCard')->name('print_free_card');
        Route::get('/new', 'new')->name('new');
        Route::get('/{id}', 'edit')->name('edit');
        Route::post('/', 'store')->name('store');
        Route::put('/', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });

    Route::controller(EmployeeController::class)->prefix('employee')->name('employee.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/new', 'new')->name('new');
        Route::get('/{id}', 'edit')->name('edit');
        Route::post('/', 'store')->name('store');
        Route::put('/', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });

    Route::controller(RoomController::class)->prefix('room')->name('room.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/new', 'new')->name('new');
        Route::get('/{id}', 'edit')->name('edit');
        Route::post('/', 'store')->name('store');
        Route::put('/', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });

    Route::controller(ApplicationController::class)->prefix('application')->name('application.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/new', 'new')->name('new');
        Route::get('/detail/{id}', 'detail')->name('detail');
        Route::get('/return/{id}', 'return')->name('return');
        Route::get('/booking/{id}', 'booking')->name('booking');
        Route::get('/return-booking/{id}', 'returnBooking')->name('return_booking');
        Route::post('/', 'store')->name('store');
        Route::post('/return', 'returnStore')->name('return_store');
        Route::post('/return-borrow', 'printBorrowPeriod')->name('borrow_period');
        Route::post('/return-period', 'printReturnPeriod')->name('return_period');
    });
});

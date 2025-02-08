<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\BookCategoryController;
use App\Http\Controllers\BookLocationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;

Route::get('/', function () {
    return view('layouts.master');
});

Route::controller(AuthorController::class)->prefix('author')->name('author.')->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::controller(PublisherController::class)->prefix('publisher')->name('publisher.')->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::controller(BookCategoryController::class)->prefix('book-category')->name('book_category.')->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::controller(BookLocationController::class)->prefix('book-location')->name('book_location.')->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::controller(UserController::class)->prefix('user')->name('user.')->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::controller(BookController::class)->prefix('book')->name('book.')->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::controller(MemberController::class)->prefix('member')->name('member.')->group(function () {
    Route::get('/', 'index')->name('index');
});

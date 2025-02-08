<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookLocationController extends Controller
{
    public function index()
    {
        return view('pages.book_location.index');
    }
}

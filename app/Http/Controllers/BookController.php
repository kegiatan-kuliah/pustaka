<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Book;
use App\Models\BookCategory;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\BookLocation;
use App\DataTables\BooksDataTable;

class BookController extends Controller
{
    private $table;

    public function __construct(Book $table) {
        $this->table = $table;
    }

    public function index(BooksDataTable $dataTable)
    {
        return $dataTable->render('pages.book.index');
    }

    public function new()
    {
        $categories = BookCategory::pluck('name', 'id');
        $authors = Author::pluck('name', 'id');
        $publishers = Publisher::pluck('name', 'id');
        $locations = BookLocation::pluck('name', 'id');
        return view('pages.book.new')->with([
            'categories' => $categories,
            'authors' => $authors,
            'publishers' => $publishers,
            'locations' => $locations
        ]);
    }

    public function detail($id)
    {
        $data = $this->table->findOrFail($id);
        return view('pages.book.detail')->with([
            'data' => $data
        ]);
    }

    public function edit($id)
    {
        $data = $this->table->findOrFail($id);
        $categories = BookCategory::pluck('name', 'id');
        $authors = Author::pluck('name', 'id');
        $publishers = Publisher::pluck('name', 'id');
        $locations = BookLocation::pluck('name', 'id');
        return view('pages.book.edit')->with([
            'data' => $data,
            'categories' => $categories,
            'authors' => $authors,
            'publishers' => $publishers,
            'locations' => $locations
        ]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3',
            'condition' => 'required|min:3',
            'quantity' => 'required',
            'price' => 'required',
            'total_pages' => 'required',
            'synopsis' => 'required',
            'cover' => 'required',
            'book_category_id' => 'required',
            'author_id' => 'required',
            'publisher_id' => 'required',
            'book_location_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator);
        }

        $path = $request->file('cover')->store('books','public');

        $store = $this->table->create([
            'title' => $request->title,
            'condition' => $request->condition,
            'quantity' => $request->quantity,
            'borrow_quantity' => 0,
            'price' => $request->price,
            'total_pages' => $request->total_pages,
            'synopsis' => $request->synopsis,
            'book_category_id' => $request->book_category_id,
            'author_id' => $request->author_id,
            'publisher_id' => $request->publisher_id,
            'book_location_id' => $request->book_location_id,
            'cover' => $path
        ]);

        return redirect()->route('book.index')->with('success', 'Data saved successfully');
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3',
            'condition' => 'required|min:3',
            'quantity' => 'required',
            'price' => 'required',
            'total_pages' => 'required',
            'synopsis' => 'required',
            'book_category_id' => 'required',
            'author_id' => 'required',
            'publisher_id' => 'required',
            'book_location_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator);
        }

        $book = $this->table->findOrFail($request->id);

        if($request->hasFile('cover')) {
            $path = $request->file('cover')->store('books','public');
        } else {
            $path = $book->cover;
        }

        $store = $this->table->where('id', $request->id)->update([
            'title' => $request->title,
            'condition' => $request->condition,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'total_pages' => $request->total_pages,
            'synopsis' => $request->synopsis,
            'book_category_id' => $request->book_category_id,
            'author_id' => $request->author_id,
            'publisher_id' => $request->publisher_id,
            'book_location_id' => $request->book_location_id,
            'cover' => $path
        ]);

        return redirect()->route('book.index')->with('success', 'Data updated successfully');
    }

    public function destroy($id) {
        $data = $this->table->findOrFail($id);

        $destroy = $data->delete();

        return redirect()->route('book.index')->with('success', 'Data deleted successfully');
    }
}

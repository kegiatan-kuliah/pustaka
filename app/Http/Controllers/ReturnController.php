<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookTransaction;
use App\Models\Book;
use App\Models\Member;
use Validator;
use App\DataTables\ReturnsDataTable;

class ReturnController extends Controller
{
    private $table;

    public function __construct(BookTransaction $table) {
        $this->table = $table;
    }

    public function index(ReturnsDataTable $dataTable)
    {
        return $dataTable->render('pages.return.index');
    }

    public function new()
    {
        $books = Book::pluck('title','id');
        $members = Member::pluck('name', 'id');
        return view('pages.return.new')->with([
            'books' => $books,
            'members' => $members
        ]);
    }

    public function edit($id)
    {
        $data = $this->table->findOrFail($id);
        $books = Book::pluck('title','id');
        $members = Member::pluck('name', 'id');
        return view('pages.return.edit')->with([
            'data' => $data,
            'books' => $books,
            'members' => $members
        ]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'condition' => 'required',
            'description' => 'required',
            'member_id' => 'required',
            'book_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator);
        }

        $data = $request->all();
        $data['status'] = 'return';

        $store = $this->table->create($data);

        $book = Book::findOrFail($request->book_id);

        Book::where('id', $request->book_id)->update([
            'borrow_quantity' => $book->borrow_quantity - 1,
            'quantity' => $book->quantity + 1,
        ]);

        return redirect()->route('return.index')->with('success', 'Data saved successfully');
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'condition' => 'required',
            'description' => 'required',
            'member_id' => 'required',
            'book_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator);
        }

        $store = $this->table->where('id', $request->id)->update([
            'date' => $request->date,
            'condition' => $request->condition,
            'description' => $request->description,
            'status' => 'return',
            'member_id' => $request->member_id,
            'book_id' => $request->book_id,
        ]);

        return redirect()->route('return.index')->with('success', 'Data updated successfully');
    }
}

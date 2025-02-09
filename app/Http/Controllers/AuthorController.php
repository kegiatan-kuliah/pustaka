<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use Validator;
use App\DataTables\AuthorsDataTable;

class AuthorController extends Controller
{

    private $table;

    public function __construct(Author $table) {
        $this->table = $table;
    }

    public function index(AuthorsDataTable $dataTable)
    {
        return $dataTable->render('pages.author.index');
    }

    public function new()
    {
        return view('pages.author.new');
    }

    public function edit($id)
    {
        $data = $this->table->findOrFail($id);
        return view('pages.author.edit')->with([
            'data' => $data
        ]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:authors,name',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator);
        }

        $store = $this->table->create($request->all());

        return redirect()->route('author.index')->with('success', 'Data saved successfully');
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:authors,name,'.$request->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator);
        }

        $store = $this->table->where('id', $request->id)->update([
            'name' => $request->name
        ]);

        return redirect()->route('author.index')->with('success', 'Data updated successfully');
    }

    public function destroy($id) {
        $data = $this->table->findOrFail($id);

        $destroy = $data->delete();

        return redirect()->route('author.index')->with('success', 'Data deleted successfully');
    }
}

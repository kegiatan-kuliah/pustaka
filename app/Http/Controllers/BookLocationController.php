<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookLocation;
use Validator;
use App\DataTables\BookLocationsDataTable;


class BookLocationController extends Controller
{
    private $table;

    public function __construct(BookLocation $table) {
        $this->table = $table;
    }

    public function index(BookLocationsDataTable $dataTable)
    {
        return $dataTable->render('pages.book_location.index');
    }

    public function new()
    {
        return view('pages.book_location.new');
    }

    public function edit($id)
    {
        $data = $this->table->findOrFail($id);
        return view('pages.book_location.edit')->with([
            'data' => $data
        ]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'code' => 'required|min:3|unique:book_categories,code',
            'name' => 'required|min:3|unique:book_categories,name',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator);
        }

        $store = $this->table->create($request->all());

        return redirect()->route('book_location.index')->with('success', 'Data saved successfully');
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'code' => 'required|min:3|unique:book_categories,code,'.$request->id,
            'name' => 'required|min:3|unique:book_categories,name,'.$request->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator);
        }

        $store = $this->table->where('id', $request->id)->update([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect()->route('book_location.index')->with('success', 'Data updated successfully');
    }

    public function destroy($id) {
        $data = $this->table->findOrFail($id);

        $destroy = $data->delete();

        return redirect()->route('book_location.index')->with('success', 'Data deleted successfully');
    }
}

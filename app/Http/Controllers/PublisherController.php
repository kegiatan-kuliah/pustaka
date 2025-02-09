<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publisher;
use Validator;
use App\DataTables\PublishersDataTable;

class PublisherController extends Controller
{
    private $table;

    public function __construct(Publisher $table) {
        $this->table = $table;
    }

    public function index(PublishersDataTable $dataTable)
    {
        return $dataTable->render('pages.publisher.index');
    }

    public function new()
    {
        return view('pages.publisher.new');
    }

    public function edit($id)
    {
        $data = $this->table->findOrFail($id);
        return view('pages.publisher.edit')->with([
            'data' => $data
        ]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:publishers,name',
            'address' => 'required|min:3'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator);
        }

        $store = $this->table->create($request->all());

        return redirect()->route('publisher.index')->with('success', 'Data saved successfully');
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:publishers,name,'.$request->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator);
        }

        $store = $this->table->where('id', $request->id)->update([
            'name' => $request->name,
            'address' => $request->address,
        ]);

        return redirect()->route('publisher.index')->with('success', 'Data updated successfully');
    }

    public function destroy($id) {
        $data = $this->table->findOrFail($id);

        $destroy = $data->delete();

        return redirect()->route('publisher.index')->with('success', 'Data deleted successfully');
    }
}

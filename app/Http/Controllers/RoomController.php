<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Validator;
use App\DataTables\RoomsDataTable;

class RoomController extends Controller
{
    private $table;

    public function __construct(Room $table) {
        $this->table = $table;
    }

    public function index(RoomsDataTable $dataTable)
    {
        return $dataTable->render('pages.room.index');
    }

    public function new()
    {
        return view('pages.room.new');
    }

    public function edit($id)
    {
        $data = $this->table->findOrFail($id);
        return view('pages.room.edit')->with([
            'data' => $data
        ]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:rooms,name',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator);
        }

        $store = $this->table->create($request->all());

        return redirect()->route('room.index')->with('success', 'Data saved successfully');
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:rooms,name,'.$request->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator);
        }

        $store = $this->table->where('id', $request->id)->update([
            'name' => $request->name,
        ]);

        return redirect()->route('room.index')->with('success', 'Data updated successfully');
    }

    public function destroy($id) {
        $data = $this->table->findOrFail($id);

        $destroy = $data->delete();

        return redirect()->route('room.index')->with('success', 'Data deleted successfully');
    }
}

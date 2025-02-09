<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use App\DataTables\UsersDataTable;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    private $table;

    public function __construct(User $table) {
        $this->table = $table;
    }

    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('pages.user.index');
    }

    public function new()
    {
        return view('pages.user.new');
    }

    public function edit($id)
    {
        $data = $this->table->findOrFail($id);
        return view('pages.user.edit')->with([
            'data' => $data
        ]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => [
                'required',
                'min:3',
                Rule::unique('users', 'email')->where(function ($query) use ($request) {
                    return $query->where('role', 'teacher');
                }),
            ],
            'name' => 'required|min:3',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator);
        }

        $store = $this->table->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt(123456789),
            'role' => 'teacher',
            'is_active' => true
        ]);

        return redirect()->route('user.index')->with('success', 'Data saved successfully');
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => [
                'required',
                'min:3',
                Rule::unique('users', 'email')->where(function ($query) use ($request) {
                    return $query->where('role', 'teacher');
                })->ignore($request->id),
            ],
            'name' => 'required|min:3',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator);
        }

        $store = $this->table->where('id', $request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'teacher'
        ]);

        return redirect()->route('user.index')->with('success', 'Data updated successfully');
    }

    public function destroy($id) {
        $data = $this->table->findOrFail($id);

        $destroy = $data->delete();

        return redirect()->route('user.index')->with('success', 'Data deleted successfully');
    }
}

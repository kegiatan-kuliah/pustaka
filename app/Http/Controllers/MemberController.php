<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\User;
use Validator;
use App\DataTables\MembersDataTable;
use Illuminate\Validation\Rule;

class MemberController extends Controller
{
    private $table;

    public function __construct(Member $table, User $userTable) {
        $this->table = $table;
        $this->userTable = $userTable;
    }

    public function index(MembersDataTable $dataTable)
    {
        return $dataTable->render('pages.member.index');
    }

    public function new()
    {
        return view('pages.member.new');
    }

    public function edit($id)
    {
        $data = $this->table->findOrFail($id);
        return view('pages.member.edit')->with([
            'data' => $data
        ]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => [
                'required',
                'min:3',
                Rule::unique('users', 'email')->where(function ($query) use ($request) {
                    return $query->where('role', 'member');
                }),
            ],
            'identity_no' => 'required|min:3|unique:members,identity_no',
            'member_no' => 'required|min:3|unique:members,member_no',
            'name' => 'required|min:3',
            'gender' => 'required',
            'phone_no' => 'required',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator);
        }

        $user = $this->userTable->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt(123456789),
            'role' => 'member',
            'is_active' => true
        ]);

        $store = $this->table->create([
            'name' => $request->name,
            'email' => $request->email,
            'member_no' => $request->member_no,
            'identity_no' => $request->identity_no,
            'gender' => $request->gender,
            'phone_no' => $request->phone_no,
            'address' => $request->address,
            'user_id' => $user->id
        ]);

        return redirect()->route('member.index')->with('success', 'Data saved successfully');
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => [
                'required',
                'min:3',
                Rule::unique('users', 'email')->where(function ($query) use ($request) {
                    return $query->where('role', 'member');
                })->ignore($request->id),
            ],
            'identity_no' => 'required|min:3|unique:members,identity_no,'.$request->id,
            'member_no' => 'required|min:3|unique:members,member_no,'.$request->id,
            'name' => 'required|min:3',
            'gender' => 'required',
            'phone_no' => 'required',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator);
        }

        $member = $this->table->findOrFail($request->id);

        $this->userTable->where('id', $member->user_id)->update([
            'email' => $request->email,
        ]);

        $store = $this->table->where('id', $request->id)->update([
            'name' => $request->name,
            'member_no' => $request->member_no,
            'identity_no' => $request->identity_no,
            'gender' => $request->gender,
            'phone_no' => $request->phone_no,
            'address' => $request->address
        ]);

        return redirect()->route('member.index')->with('success', 'Data updated successfully');
    }

    public function destroy($id) {
        $member = $this->table->findOrFail($id);
        $data = $this->table->findOrFail($id);

        $this->userTable->where('id', $member->user_id)->delete();

        $destroy = $data->delete();

        return redirect()->route('member.index')->with('success', 'Data deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\User;
use App\Models\Room;
use Validator;
use App\DataTables\MembersDataTable;
use Illuminate\Validation\Rule;
use Barryvdh\DomPDF\Facade\Pdf;

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
        $rooms = Room::pluck('name','id');
        return view('pages.member.new')->with([
            'rooms' => $rooms
        ]);
    }

    public function edit($id)
    {
        $data = $this->table->findOrFail($id);
        $rooms = Room::pluck('name','id');
        return view('pages.member.edit')->with([
            'data' => $data,
            'rooms' => $rooms
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
            'name' => 'required|min:3',
            'gender' => 'required',
            'room_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator);
        }

        $path = $request->file('photo')->store('members','public');

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
            'member_no' => Member::generateMemberNo(),
            'identity_no' => $request->identity_no,
            'gender' => $request->gender,
            'photo' => $path,
            'user_id' => $user->id,
            'room_id' => $request->room_id,
        ]);

        return redirect()->route('member.index')->with('success', 'Data saved successfully');
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => [
                'required',
                'min:3'
            ],
            'identity_no' => 'required|min:3|unique:members,identity_no,'.$request->id,
            'name' => 'required|min:3',
            'gender' => 'required',
            'room_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator);
        }

        $member = $this->table->findOrFail($request->id);

        if($request->hasFile('photo')) {
            $path = $request->file('photo')->store('members','public');
        } else {
            $path = $member->photo;
        }

        $this->userTable->where('id', $member->user_id)->update([
            'email' => $request->email,
        ]);

        $store = $this->table->where('id', $request->id)->update([
            'name' => $request->name,
            'photo' => $path,
            'identity_no' => $request->identity_no,
            'gender' => $request->gender,
            'room_id' => $request->room_id,
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

    public function memberCard($id)
    {
        $data = $this->table->findOrFail($id);
        $pdf = Pdf::loadView('pdf.member_card', ['data' => $data])->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    public function freeCard($id)
    {
        $data = $this->table->findOrFail($id);
        $pdf = Pdf::loadView('pdf.free_card', ['data' => $data])->setPaper('a4', 'potrait');
        return $pdf->stream();
    }
}

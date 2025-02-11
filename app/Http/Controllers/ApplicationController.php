<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\ApplicationsDataTable;
use App\Models\Application;
use App\Models\ApplicationItem;
use App\Models\Member;
use App\Models\Book;
use Carbon\Carbon;
use Validator;
use Barryvdh\DomPDF\Facade\Pdf;

class ApplicationController extends Controller
{
    private $table;

    public function __construct(Application $table) {
        $this->table = $table;
    }

    public function index(ApplicationsDataTable $dataTable)
    {
        return $dataTable->render('pages.application.index');
    }

    public function new()
    {
        $members = Member::pluck('name', 'id');
        $books = Book::get();

        return view('pages.application.new')
            ->with([
                'members' => $members,
                'books' => $books
            ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'member_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator);
        }

        $application = Application::create([
            'application_no' => $this->table->generateApplicationNo(),
            'date' => Carbon::now()->format('Y-m-d'),
            'total_quantity' => 0,
            'total_return_quantity' => 0,
            'member_id' => $request->member_id
        ]);
        if($request->has('items') && count($request->items) > 0) {
            $total = 0;
            foreach($request->items as $item) {
                if(!isset($item['qty'])) {
                    return redirect()->back()->with('danger','Pastikan anda mengisi jumlah pada buku yang dipilih');
                }
                $total += $item['qty'];
                $book = Book::find($item['id']);

                if($book->end_quantity <= $item['qty']){
                    return redirect()->back()->with('danger','Buku '.$book->title.' tidak cukup');
                }

                $book->borrow_quantity = $item['qty'];
                $book->end_quantity = $book->quantity - $item['qty'];
                

                ApplicationItem::create([
                    'title' => $book->title,
                    'quantity' => $item['qty'],
                    'application_id' => $application->id
                ]);

                $book->save();
            }

            $application->total_quantity = $total;
            $application->save();

            return redirect()->route('application.index')->with('success', 'Data saved successfully');
        }

        return redirect()->back()->with('danger','Mohon memilih barang minimal 1 barang');
        
    }

    public function detail($id)
    {
        $data = $this->table->findOrFail($id);
        return view('pages.application.detail')->with([
            'data' => $data
        ]);
    }

}

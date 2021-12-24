<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;

class TransactionController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');

        $dateNow = date('Y-m-d');
        $late_dates = Transaction::select('id', 'date_end', 'status')
            ->where('date_end', '<', $dateNow)
            ->where('status', '=', '0')
            ->get();
        if ($late_dates) {
            foreach ($late_dates as $late_date) {
                Transaction::where('id', $late_date->id)->update(['status' => 2]);
            }
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $loan_dates = Transaction::select('date_start')->distinct()->get();

        return view('admin.loan.index', compact('loan_dates'));
    }

    public function api(Request $request)
    {
        if ($request->loan_status) {
            if ($request->loan_status == 'in_progress') {
                $loan_status = 0;
                $loan_compare = '=';
            } else if ($request->loan_status == 'finished') {
                $loan_status = 1;
                $loan_compare = '=';
            } else if ($request->loan_status == 'late') {
                $loan_status = 2;
                $loan_compare = '=';
            } else {
                $loan_status = 0;
                $loan_compare = '>=';
            }
        } else {
            $loan_status = 0;
            $loan_compare = '>=';
        }

        if ($request->loan_date) {
            if ($request->loan_date == 'all') {
                $loan_date = 0;
                $loan_compare_date = '>=';
            } else {
                $loan_date = $request->loan_date;
                $loan_compare_date = '=';
            }
        } else {
            $loan_date = 0;
            $loan_compare_date = '>=';
        }

        $transactions = Transaction::select('transactions.id', 'transactions.date_start', 'transactions.date_end', 'members.name', DB::raw('COUNT(transaction_details.transaction_id) as total_transaction'), DB::raw('SUM(books.price) as total_prices'), 'transactions.status')
            ->join('members', 'members.id', 'transactions.member_id')
            ->join('transaction_details', 'transaction_details.transaction_id', 'transactions.id')
            ->join('books', 'books.id', 'transaction_details.book_id')
            ->groupBy('transactions.id', 'transactions.date_start', 'transactions.date_end', 'members.name', 'transaction_details.transaction_id', 'transactions.status')
            ->where('transactions.status', $loan_compare, $loan_status)
            ->where('transactions.date_start', $loan_compare_date, $loan_date)
            ->get();

        foreach ($transactions as $key => $transaction) {
            $transaction->long = different_date($transaction['date_start'], $transaction['date_end']);
            $transaction->total_price = "Rp. " . number_format($transaction->total_prices, 0, ",", ".") . ".-";
            $transaction->convert_date_start = convert_date($transaction['date_start']);
            $transaction->convert_date_end = convert_date($transaction['date_end']);
        }

        $datatables = datatables()->of($transactions)->addIndexColumn();

        return $datatables->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = Member::all();
        $books = Book::Select('*')
            ->where('qty', '>', 0)
            ->get();

        return view('admin.loan.create', compact('members', 'books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required',
            'books' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
        ]);

        $data = [
            'member_id' => $request->member_id,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'status' => 0
        ];

        $transaction = Transaction::create($data);

        return redirect()->route('loan_details.store', ['book_id' => $request->books, 'transaction_id' => $transaction->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show($transaction)
    {
        $transactions = Transaction::with('transaction_details', 'transaction_details.book', 'member')->where('transactions.id', $transaction)->first();

        $books = [];
        foreach ($transactions->transaction_details as $transaction) {
            array_push($books, $transaction->book->title);
        }

        return view('admin.loan.detail', compact('transactions', 'books'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit($transaction)
    {
        $members = Member::all();
        $books = Book::all();

        $transactions = Transaction::with('transaction_details', 'transaction_details.book', 'member')->where('transactions.id', $transaction)->first();

        $booksNow = [];
        foreach ($transactions->transaction_details as $transaction) {
            array_push($booksNow, $transaction->book->title);
        }

        return view('admin.loan.edit', compact('members', 'books', 'transactions', 'booksNow'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $status_transaction = Transaction::find($id);

        if ($status_transaction->status == 0 && $request->status == 'returned') {
            $status = 1;
        } else if ($status_transaction->status == 1 && $request->status == 'returned') {
            $status = 1;
        } else if ($status_transaction->status == 0 && $request->status == 'not_returned') {
            $status = 0;
        } else if ($status_transaction->status == 1 && $request->status == 'not_returned') {
            $status = 0;
        } else if ($status_transaction->status == 2 && $request->status == 'not_returned') {
            $status = 2;
        } else if ($status_transaction->status == 2 && $request->status == 'returned') {
            $status = 1;
        }

        $request->validate([
            'member_id' => 'required',
            'books' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
        ]);

        $data = [
            'member_id' => $request->member_id,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'status' => $status
        ];

        Transaction::where('id', $id)->update($data);

        return redirect()->route('loan_details.update', ['book_id' => $request->books, 'transaction_id' => $id, 'status' => $status, 'old_status' => $status_transaction->status]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::find($id);
        $book_id = TransactionDetail::where('transaction_id', $id)->get();
        if ($book_id) {
            foreach ($book_id as $book) {
                Book::select('*')
                    ->where('id', $book->book_id)
                    ->increment('qty', 1);
                $transaction->delete();
            }
        } else {
            $transaction->delete();
        }

        return redirect('loans');
    }
}

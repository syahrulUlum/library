<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Catalog;
use App\Models\Member;
use App\Models\Publisher;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // // data1
        // $data1 = Member::select('*')
        //     ->rightJoin('users', 'users.member_id', 'members.id')
        //     ->get();

        // // data2
        // $data2 = Member::select('*')
        //     ->leftJoin('users', 'users.member_id', 'members.id')
        //     ->where('users.id', NULL)
        //     ->get();

        // //data 3
        // $data3 = Member::select('members.id', 'members.name')
        //     ->leftJoin('transactions', 'transactions.member_id', 'members.id')
        //     ->where('transactions.id', NULL)
        //     ->get();

        // //data 4
        // $data4 = Member::select('members.id', 'members.name', 'members.phone_number')
        //     ->rightJoin('transactions', 'transactions.member_id', 'members.id')
        //     ->get();

        // // data5
        // $data5 = Member::select('members.id', 'members.name', 'members.phone_number')
        //     ->rightJoin('transactions', 'transactions.member_id', 'members.id')
        //     ->groupBy('members.id', 'members.name', 'members.phone_number')
        //     ->havingRaw('COUNT(*) > ?', [1])
        //     ->get();

        // //data6
        // $data6 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
        //     ->rightJoin('transactions', 'transactions.member_id', 'members.id')
        //     ->get();

        // //data7
        // $data7 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
        //     ->rightJoin('transactions', 'transactions.member_id', 'members.id')
        //     ->whereMonth('date_end', 6)
        //     ->get();

        // //data8
        // $data8 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
        //     ->rightJoin('transactions', 'transactions.member_id', 'members.id')
        //     ->whereMonth('date_end', 5)
        //     ->get();

        // //data9
        // $data9 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
        //     ->rightJoin('transactions', 'transactions.member_id', 'members.id')
        //     ->whereMonth('date_end', 6)
        //     ->get();

        // //data10
        // $data10 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
        //     ->rightJoin('transactions', 'transactions.member_id', 'members.id')
        //     ->where('members.address', 'LIKE', '%bandung%')
        //     ->get();

        // //data11
        // $data11 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
        //     ->rightJoin('transactions', 'transactions.member_id', 'members.id')
        //     ->where('members.address', 'LIKE', '%bandung%')
        //     ->where('members.gender', '=', 'F')
        //     ->get();

        // //data12
        // $data12 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', 'transaction_details.qty')
        //     ->rightJoin('transactions', 'transactions.member_id', 'members.id')
        //     ->rightJoin('transaction_details', 'transaction_details.transaction_id', 'transactions.id')
        //     ->rightJoin('books', 'books.id', 'transaction_details.book_id')
        //     ->groupBy('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', 'transaction_details.qty')
        //     ->havingRaw('SUM(transaction_details.qty) > ?', [1])
        //     ->get();

        // //data13
        // $data13 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', Member::raw(('transaction_details.qty * books.price as total_price')))
        //     ->rightJoin('transactions', 'transactions.member_id', 'members.id')
        //     ->rightJoin('transaction_details', 'transaction_details.transaction_id', 'transactions.id')
        //     ->leftJoin('books', 'books.id', 'transaction_details.book_id')
        //     ->get();

        // //data14
        // $data14 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', 'transaction_details.qty', 'books.title as book_title', 'authors.name as author_name', 'publishers.name as publisher_name', 'catalogs.name as catalog_name')
        //     ->rightJoin('transactions', 'transactions.member_id', 'members.id')
        //     ->rightJoin('transaction_details', 'transaction_details.transaction_id', 'transactions.id')
        //     ->leftJoin('books', 'books.id', 'transaction_details.book_id')
        //     ->leftJoin('publishers', 'publishers.id', 'books.publisher_id')
        //     ->leftJoin('authors', 'authors.id', 'books.author_id')
        //     ->leftJoin('catalogs', 'catalogs.id', 'books.catalog_id')
        //     ->get();

        // //data15
        // $data15 = Catalog::select('catalogs.*', 'books.title as book_title')
        //     ->rightJoin('books', 'books.catalog_id', 'catalogs.id')
        //     ->get();

        // //data16
        // $data16 = Book::select('books.*', 'publishers.name as publisher_name')
        //     ->leftJoin('publishers', 'publishers.id', 'books.publisher_id')
        //     ->get();

        // //data17
        // $data17 = Author::select('*')
        //     ->where('authors.id', '=', 5)
        //     ->get();

        // //data18
        // $data18 = Book::select('*')
        //     ->where('price', '>', 10000)
        //     ->get();

        // //data19
        // $data19 = Book::select('*')
        //     ->where('publisher_id', '=', 1)
        //     ->where('qty', '>', 10)
        //     ->get();

        // //data20
        // $data20 = Member::select('*')
        //     ->whereMonth('created_at', 6)
        //     ->get();

        // return $data20;


        $total_books = Book::count();
        $total_members = Member::count();
        $total_publishers = Publisher::count();
        $total_authors = Author::count();

        $data_donut = Book::select(Book::raw("COUNT(publisher_id) as total"))
            ->groupBy('publisher_id')
            ->orderBy('publisher_id', 'ASC')
            ->pluck('total');

        $label_donut = Publisher::orderBy('publishers.id', 'asc')
            ->join('books', 'books.publisher_id', 'publishers.id')
            ->groupBy('publishers.name')
            ->pluck('publishers.name');

        $label_bar = ['Loans', 'Return'];
        $data_bar = [];

        foreach ($label_bar as $key => $value) {
            $data_bar[$key]['label'] = $label_bar[$key];
            $data_bar[$key]['backgroundColor'] = $key == 1 ? 'rgba(60,141,188,0.9)' : 'rgba(210,214,222,1)';
            $data_month = [];

            foreach (range(1, 12) as $month) {
                if ($key == 0) {
                    $data_month[] = Transaction::select(Transaction::raw("COUNT(*) as total"))
                        ->whereMonth('date_start', $month)->first()->total;
                } else {
                    $data_month[] = Transaction::select(Transaction::raw("COUNT(*) as total"))
                        ->whereMonth('date_end', $month)->first()->total;
                }
            }

            $data_bar[$key]['data'] = $data_month;
        }

        return view('home', compact('total_books', 'total_members', 'total_publishers', 'total_authors', 'data_donut', 'label_donut', 'data_bar'));
    }
}

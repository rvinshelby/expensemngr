<?php

namespace App\Http\Controllers;

use App\Expense;
use App\ExpenseCategory;
use Illuminate\Http\Request;

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
        $expenses = Expense::all();
        $cats = ExpenseCategory::all();
        return view('home', compact('expenses', 'cats'));
    }

    public function getStats()
    {
        $expenses = Expense::all();
        $cats = ExpenseCategory::all();

        

    }
}

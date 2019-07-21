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
        $cats = ExpenseCategory::all();
        return view('dashboard.index', compact('cats'));
    }

    public function getStats()
    {
        $labels = array();
        $data = array();
        $cats = ExpenseCategory::all();
        foreach($cats as $cat) {
            $labels[] = $cat->display_name;
            $data[] = $cat->expenses->sum('amount');
        }
        
        return response()
                    ->json([
                        'labels'    =>  $labels,
                        'data'      =>  $data,
                    ]);

    }
}

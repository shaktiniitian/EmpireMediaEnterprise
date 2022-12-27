<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        return view('home');
    }
    public function categories()
    {
        return view('admin.admin',[
            'title' => 'Categories',
            'cname' => 'categories-table',
            'forms' => ['admin.category-form'],
            'data' => []
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryModel;
use App\ProductsModel;


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
        $categories = CategoryModel::all();
        $products = ProductsModel::all();

        // dd($data);
        return view('home',compact('categories','products'));
    }
}

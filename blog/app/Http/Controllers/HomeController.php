<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
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
    public function show($category)
    {
        $id  = category::where('name', $category)->first()->id; 
        $cat=\App\Category::find($id); 
        return view('usershow',['cat'=>$cat]);
    }
    public function cart()
    {
        
        $cat=\App\Category::find(1); 
        return view('cart',['cat'=>$cat]);
    }
}

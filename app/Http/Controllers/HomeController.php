<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\User;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
       $users = User::get();
       $products = Product::all();
       $wishlist = Wishlist::get();
       return redirect("/");
    }
    public function wishlist(Request $request)
    {

    }




}

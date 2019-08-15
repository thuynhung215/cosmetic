<?php

namespace App\Http\Controllers;

use App\Enum\Paginate;
use App\Models\Category;
use App\Models\Product;
use App\User;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MyController extends Controller
{
    //product details
    public function detail()
    {
        return view('pages.detailsProducts');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function signup()
    {
        return view('auth.register');
    }


    public function index()
    {
        $categories = Category::get();


        //Phan trang
        $products = Product::paginate(Paginate::HOME_PRODUCT);

        if (Auth::user() != null) {
            $wishlists = Wishlist::where('user_id', Auth::user()->id)->pluck('pro_id')->toArray();

            return view('pages.home', compact('categories', 'products', 'wishlists'));
        } else {
            return view('pages.home', compact('categories', 'products'));
        }

    }

    public function cate($id)
    {
        $categories = Category::get();
        if (Auth::user() != null) {
            $wishlists = Wishlist::where('user_id', Auth::user()->id)->pluck('pro_id')->toArray();
            if ($id == 0) {
                $products = Product::paginate(Paginate::HOME_PRODUCT);
            } else {
                $products = Product::where('category_id', '=', $id)->paginate(Paginate::HOME_PRODUCT);
            }
            return view('pages.home', compact('categories', 'products', 'wishlists'));

        } else {
            if ($id == 0) {
                $products = Product::paginate(Paginate::HOME_PRODUCT);
            } else {
                $products = Product::where('category_id', '=', $id)->paginate(Paginate::HOME_PRODUCT);
            }
            return view('pages.home', compact('categories', 'products','id'));
        }

    }


}


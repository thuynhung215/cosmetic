<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
       // $wishlists = Wishlist::where('user_id', Auth::user()->id)->get();
        $wishlists = DB::table('wishlist')
            ->join('users', 'users.id', '=', 'wishlist.user_id')
            ->join('products','products.id', '=', 'wishlist.pro_id')
            ->select('products.name as pname','products.price as pprice', 'products.img as pimg','wishlist.user_id as user_id', 'wishlist.pro_id as pro_id' )
            ->get();
        return view('pages.wishlist', compact('wishlists'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addWishlist(Request $request)
    {
        if ($request->user_id == Auth::user()->id) {
            if ($request->color == "red") {
                Wishlist::where('user_id', $request->user_id)->where('pro_id', $request->pro_id)->delete();
            } elseif ($request->color == "white") {
                Wishlist::create([
                    'user_id' => $request->user_id,
                    'pro_id' => $request->pro_id,
                ]);
            }
        }
    }
}

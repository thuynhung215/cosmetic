<?php

namespace App\Http\Controllers;

use App\Enum\Paginate;
use App\Models\Category;
use App\Models\Product;
use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::join('categories', 'categories.id', '=', 'products.category_id')->select('products.*', 'categories.id as cid','categories.name as cname')->paginate(Paginate::MANAGER_PRODUCT);
        return view('products.showProduct', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file;
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('images'),$file_name);

        }

        $product = new Product([
            'name' => $request->get('name'),
            'category_id' => $request->get('category_id'),
            'price' => $request->get('price'),
            'description' => $request->get('description'),
            'img' => $file_name,
        ]);
        $product->save();
        return redirect('/products')->with('success', 'Product saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find( $id );

        return view( 'products.detailProduct' )
            ->with( 'product', $product );
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('products.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name=  $request->get('name');
        $product->category_id=  $request->get('category_id');
        $product->price=  $request->get('price');
        $product->description=  $request->get('description');
        $product->img=  $request->get('img');
        $product->save();
        return redirect('/products')->with('success', 'Category updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/products')->with('success', 'product deleted!');
    }

}

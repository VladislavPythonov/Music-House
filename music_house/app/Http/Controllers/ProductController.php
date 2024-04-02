<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function _construct()
        {
            $this->middleware('admin')->except(['index', 'show', 'filter']);
        }

    public function index()
    {
        $products = Product::where('qty','>',0)->get();
        $categories = Category::all();
        return view('products.index', ['products'=>$products, 'categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', ['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $img = $request->img;
        $imgName = $img->getClientOriginalName();
        $img->move(public_path() . '/img', $imgName);
        $img_path = 'img/'.$imgName;

        $product = Product::create([
            'title' => $request->title,
            'model' => $request->model,
            'country' => $request->country,
            'price' => $request->price,
            'year' => $request->year,
            'img_path' => '/' . $img_path,
            'qty' => $request->qty,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product = Product::find($product->id);
        return view('products.show', ['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $product = Product::find($product->id);
        $categories = Category::all();
        return view ('products.edit', ['product'=>$product, 'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $img = $request->img;

        if (is_null($img)) {
            $product = Product::find($product->id);
            $img_path = $product->img_path;
        } else {
            $imgName = $img->getClientOriginalName();
            $img->move(public_path() . '/img', $imgName);
            $img_path = 'img/'.$imgName;
        }

        $product = Product::find($product->id);
        $product->title = $request->title;
        $product->model = $request->model;
        $product->country = $request->country;
        $product->price = $request->price;
        $product->year = $request->year;
        $product->img_path = $img_path;
        $product->qty = $request->qty;
        $product->category_id = $request->category_id;

        $product->save();

        return redirect()->route('products.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product = Product::find($product->id);
        $product->delete();
        return redirect()->route('products.index');
    }


        public function filter(Request $request)
        {
            if($request->filter == 'all') {
                $products = Product::where('qty', '>', 0)->orderBy($request->sort)->get();
            } else {
                $products = Product::where('qty', '>', 0)->where('category_id', $request->filter)->orderBy($request->sort)->get();
            }
            $categories = Category::all();
            return view('products.index', ['categories'=>$categories, 'products'=>$products]);
        }
}

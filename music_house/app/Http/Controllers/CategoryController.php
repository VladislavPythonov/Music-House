<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = Category::create([
            'title' => $request->title,
        ]);
        return redirect()->route('categories.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Category $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {

        $category = Category::find($category->id);
        return view ('categories.edit', ['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->title = $request->title;

        $category->save();

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $product = Category::find($category->id);
        $product->delete();
        return redirect()->route('categories.index');
    }


            // public function filter(Request $request)
            // {
            //     if ($request->filter == 'all') {
            //         $categories = Category::all();
            //     } else {
            //         $categories = Category::where('id', $request->filter)->get();
            //     }

            //     return view('categories.index', ['categories' => $categories]);
            // }

}

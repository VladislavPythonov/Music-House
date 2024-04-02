<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $products = DB::table('products')
                ->latest('id')
                ->take(5)
                ->get();

            return view('index', ['products'=>$products]);

    }

}

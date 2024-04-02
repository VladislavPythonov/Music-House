<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function index() {
        $order = Auth::user()->orders()->firstWhere('status', 'В корзине');
        return view('cart', ['products' => $order->products]);
    }


    public function store($product_id) {
        $order = Auth::user()->orders()->firstWhere('status', 'В корзине');
        $product = $order->products()->find($product_id);


        if ($product) {
            $qty = $product->pivot->qty + 1;
            $order->products()->updateExistingPivot($product_id, ['qty'=>$qty]);
        } else {
            $order->products()->attach($product_id, ['qty'=>1]);
        }


        return redirect()->back()->with(['info'=>'Вы добавили товар в корзину']);
    }


    public function change(Request $request, $product_id) {
        $order = Auth::user()->orders()->firstWhere('status', 'В корзине');
        $order->products()->updateExistingPivot($product_id, ['qty'=>$request->qty]);


        return redirect()->route('cart.index');
    }


    public function destroy($id) {
        $order = Auth::user()->orders()->firstWhere('status', 'В корзине');
        $order->products()->detach($id);
        return redirect()->route('cart.index')->with(['info'=>'Товар был удален из корзины']);
    }
}

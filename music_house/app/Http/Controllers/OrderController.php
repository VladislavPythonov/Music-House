<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->is_admin) {
            $orders = Order::whereNot('status', 'В корзине')->get();
        } else {
            $orders = Order::whereNot('status', 'В корзине')->where('user_id', Auth::user()->id)->get();
        }
        return view('orders.index', ['orders'=>$orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Hash::check($request->password, Auth::user()->password))
        {
            $order = Auth::user()->orders()->firstWhere('status', 'В корзине');
            $order->status = 'Новый';
            $order->save();
            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->status = 'В корзине';
            $order->save();
            return redirect('/orders')->with('info', 'Заказ отправлен');
            } else {
            return redirect()->back()->with('info', 'Пароль неверный');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $order = Order::find($order->id);
        if ($order->status == 'Новый'){
            $order->status = 'Подтверждённый';
        } elseif ($order->status == 'Подтверждённый'){
            $order->status = 'Выполненный';
        }
        $order->save();
        return redirect()->route('orders.index', ['info' => 'Статус обновлён']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order = Order::find($order->id);
        $order->delete();
        return redirect()->route('orders.index', ['info' => 'Удален']);
    }
}


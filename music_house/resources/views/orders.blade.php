@extends('layout')
@section('content')


<h1>Мои заказы</h1>
@foreach ($orders as $order)
    <div class="order">
        <h3>Заказ № {{ $order->id }}</h3>
        <p>Статус: {{ $order->status }}</p>
        <ul>
            @foreach ($order->products as $product)
                <li>{{ $product->name }}</li>
            @endforeach
        </ul>
    </div>
@endforeach

@endsection

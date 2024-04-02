@extends('layout')
@section('content')

<h1>Панель администратора</h1>

<ul>
    <li><a class="btn btn-primary" href="{{ route('products.index') }}">Каталог</a></li>
    <li><a class="btn btn-primary" href="{{ route('categories.index') }}">Категории</a></li>
    <li><a class="btn btn-primary" href="{{ route('orders.index') }}">Заказы</a></li>
</ul>


@endsection

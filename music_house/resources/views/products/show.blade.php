@extends('layout')
@section('content')
    <main class="container text-center w-50">
        <h1 class="text-center mt-4">{{ $product->title }}</h1>

        <img src="{{asset ($product->img_path) }}" alt="..." style="height: 350px; border-radius: 20px">

        <p>Категория: {{ $product->category_id }}</p>
        <p>Описание: {{ $product->description }}</p>
        <p>Цена: {{ $product->price }} руб.</p>
        <p>Год выпуска: {{ $product->year }}</p>
        <p>Модель: {{ $product->model }}</p>
        <p>Страна: {{ $product->country }}</p>
        <p>Количество: {{ $product->qty }}</p>
    </main>
@endsection

@extends('layout')
@section('content')

<form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data" class="container mt-4">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="title" class="form-label">Название товара</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $product->title }}" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Описание</label>
        <input type="text" class="form-control" id="description" name="description" value="{{ $product->description }}" required>
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Цена товара</label>
        <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
    </div>

    <div class="mb-3">
        <label for="model" class="form-label">Модель</label>
        <input type="text" class="form-control" id="model" name="model" value="{{ $product->model }}" required>
    </div>

    <div class="mb-3">
        <label for="year" class="form-label">Год выпуска</label>
        <input type="text" class="form-control" id="year" name="year" value="{{ $product->year }}" required>
    </div>

    <div class="mb-3">
        <label for="country" class="form-label">Страна</label>
        <input type="text" class="form-control" id="country" name="country" value="{{ $product->country }}" required>
    </div>

    <div class="mb-3">
        <label for="qty" class="form-label">Количество</label>
        <input type="text" class="form-control" id="qty" name="qty" value="{{ $product->qty }}" required>
    </div>

    <div class="mb-3">
        <label for="category_id" class="form-label">Категория</label>
        <select name="category_id" id="category_id" class="form-select">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="img" class="form-label">Изображение</label>
        <input type="file" class="form-control" id="img" name="img" value="{{ $product->img }}">
    </div>

    <button type="submit" class="btn btn-primary">Обновить товар</button>
</form>

@endsection

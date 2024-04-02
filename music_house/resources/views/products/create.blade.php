@extends('layout')
@section('content')

<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" class="container mt-4">
    @csrf

    <div class="mb-3">
        <label for="title" class="form-label">Название товара</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Описание</label>
        <input type="text" class="form-control" id="description" name="description" required>
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Цена товара</label>
        <input type="text" class="form-control" id="price" name="price" required>
    </div>

    <div class="mb-3">
        <label for="model" class="form-label">Модель</label>
        <input type="text" class="form-control" id="model" name="model" required>
    </div>

    <div class="mb-3">
        <label for="year" class="form-label">Год выпуска</label>
        <input type="text" class="form-control" id="year" name="year" required>
    </div>

    <div class="mb-3">
        <label for="country" class="form-label">Страна</label>
        <input type="text" class="form-control" id="country" name="country" required>
    </div>

    <div class="mb-3">
        <label for="qty" class="form-label">Количество</label>
        <input type="text" class="form-control" id="qty" name="qty" required>
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
        <input type="file" class="form-control" id="img" name="img" required>
    </div>

    <button type="submit" class="btn btn-primary">Добавить новый товар</button>
</form>



@endsection




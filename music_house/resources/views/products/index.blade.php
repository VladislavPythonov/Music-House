@extends('layout')
@section('content')

<main class="container">
    <h1 class="text-center mt-4">Каталог товаров</h1>

    <form action="{{ route('products.filter') }}" method="POST" class="d-flex flex-wrap align-items-center mt-4">
        @csrf
        <div class="mb-3 me-md-4">
            <label for="filter" class="form-label m-0">Категория:</label>
            <select name="filter" id="filter" class="form-select" aria-label="Default select example">
                <option value="all">Все</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="sort" class="form-label m-0">Сортировка:</label>
            <select name="sort" id="sort" class="form-select">
                <option value="country">По стране (А->Я)</option>
                <option value="title">По наименованию (А->Я)</option>
                <option value="price">Сначала дешевые</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary ms-md-4">Применить</button>
    </form>

    @auth
        <a href="{{ route('categories.create') }}" class="btn btn-primary mt-3">Добавить новую категорию</a>
    @endauth

    <a href="{{ route('products.create') }}" class="btn btn-primary mt-3">Добавить новый товар</a>

    <div class="row mt-4">
        @foreach ($products as $product)
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="{{asset ($product->img_path) }}" class="card-img-top" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->title }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text">Цена: {{ $product->price }} руб.</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-primary">Подробнее</a>

                        @auth
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-primary">Изменить</a>
                        @endauth
                    </div>
                        @if (Auth::check() && !Auth::user()->is_admin || Auth::check() && Auth::user()->is_admin)
                        <p>
                        <a href="{{route('cart.store', ['product_id'=>$product->id])}}" class="btn btn-primary mt-3 mb-3">В корзину</a>
                        </p>
                        @endif
                    <div class="card-footer">
                        <form action="{{ route('products.destroy', $product) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</main>
@endsection







@extends('layout')
@section('content')
    <main class="container-xxl">
        <h1 class="text-center mt-4 mb-3">Корзина</h1>


        @foreach ($products as $product)
            <div class="d-flex align-items-center mb-4 justify-content-center">
                <div class="col-md-4">
                    <img src="{{ asset($product->img_path) }}" class="img-fluid" alt="img" style="border-radius: 20px">
                </div>
                <div class="col-md-8 ms-5" style="width: 200px">
                    <div class="card" style="border-radius: 20px">
                        <div class="card-body">
                            <p class="card-text">{{ $product->pivot->qty * $product->price }}</p>


                            <form action="{{ route('cart.change', ['product_id' => $product->id]) }}" method="POST">
                                @csrf
                                <input type="number" name="qty" value="{{ $product->pivot->qty }}" min="0"
                                    max="{{ $product->qty }}" class="form-control mb-2">
                                <button type="submit" class="btn btn-danger">Изменить</button>
                            </form>


                            <form method="POST" action="{{ route('cart.destroy', ['id' => $product->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mt-2">Удалить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


        <form action="{{ route('orders.store') }}" class="w-50 mt-3" style="margin: auto" method="POST">
            @csrf
            <div class="d-flex">
                <input type="password" class="form-control me-2" id="password" name="password" placeholder="Пароль"
                    required>
                <div style="text-align: center">
                    <button type="submit" class="btn btn-primary">Оформить заказ</button>
                </div>
            </div>
        </form>
    </main>
@endsection

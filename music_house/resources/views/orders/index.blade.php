@extends('layout')
@section('content')
<main>
    <div class="container-xxl py-5 mb-5">
    <div class="row d-flex justify-content-center align-items-center">
    <div class="col-10">
        <h3 class="mb-5">Ваши заказы</h3>
        @foreach ($orders as $order)
    @if (Auth::check() && Auth::user()->is_admin)
        <h5>Пользователь: {{$order->user->name}} {{$order->user->surname}} {{$order->user->patronimyc}}</h5>
    @endif
    <div class="card rounded-5 mb-2">
        <div class="card-body p-4">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-md-2 col-lg-2 col-xl-2">
                    <h5>Заказ №: {{$order->id}}<h5>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <h5>Товары в заказе:</h5>
                    @foreach ($order->products as $product)
                        <div class="row mb-2">
                            <div class="col-md-6 col-lg-6 col-xl-6">
                                <p>{{$product->title}}</p>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-6">
                                <p>Количество: {{$product->pivot->qty}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                    <h5>Дата заказа: {{$order->created_at}}</h5>
                    <h5>Статус заказа: {{$order->status}}</h5>
                    @if (Auth::check() && Auth::user()->is_admin)
                        @if ($order->status == 'Новый')
                            <form enctype="multipart/form-data" action="{{route('orders.update', $order->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-primary">Подтвердить</button>
                            </form>
                        @endif
                        @if ($order->status == 'Подтверждённый')
                            <form enctype="multipart/form-data" action="{{route('orders.update', $order->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-primary">Выполнить</button>
                            </form>
                        @endif
                    @endif
                </div>
            </div>
            @if ($order->status == 'Новый')
        <form action="{{route('orders.destroy', $order->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger float-end">Удалить</button>
        </form>
        @endif
        </div>
    </div>
@endforeach

    </div>
    </div>
    </div>
</main>
@endsection

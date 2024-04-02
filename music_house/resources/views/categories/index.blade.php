@extends('layout')
@section('content')
    <main class="container text-center">
        <h1 class="text-center mt-4">Категории</h1>


        <a href="{{ route('categories.create') }}" class = "btn btn-primary mt-3">Добавить новую категорию</a>


        <div class="mt-5 w-50 mx-auto">
            <ul class="list-group">
                @foreach ($categories as $category)
                    <div class="d-flex align-items-center justify-content-evenly">
                        <li class="list-group-item w-50" value="{{ $category->id }}">{{ $category->title }}</li>
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary">Изменить</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </div>
                @endforeach
            </ul>
        </div>
    </main>
@endsection



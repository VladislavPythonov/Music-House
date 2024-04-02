@extends('layout')
@section('content')

<main class="container">
    <h1 class="text-center mt-4">Создание новой категории</h1>

    <form method="POST" action="{{ route('categories.store') }}" class="mt-3">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Название категории</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <button type="submit" class="btn btn-primary">Добавить новую категорию</button>
    </form>

</main>

@endsection


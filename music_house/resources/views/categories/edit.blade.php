@extends('layout')
@section('content')
    <main class="container">
        <h1 class="text-center mt-4">Редактирование категории</h1>


        <form class="w-50 mt-3" style="margin: auto" method = "POST" action = "{{ route('categories.update', $category) }}">
            @csrf
            @method('PUT')


            <div class="mb-3">
                <label for="title" class="form-label">Название</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $category->title }}"
                    required>
            </div>


            <div style="text-align: center;"><button type="submit" class="btn btn-primary">Применить изменения</button>
            </div>
        </form>


    </main>
@endsection

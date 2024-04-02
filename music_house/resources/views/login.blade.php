@extends('layout')
@section('content')

<form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="login">
        <div class="login-screen">
            <div class="app-title">
                <h1>Вход</h1>
            </div>
            <div class="login-form">
                <div class="control-group">
                    <label class="login-field-icon fui-user" for="login">Логин:</label>
                    <input type="text" class="login-field" id="login" name="login" value="{{ old('login') }}" required>
                </div>

                <div class="control-group">
                    <label class="login-field-icon fui-lock" for="password">Пароль:</label>
                    <input type="password" class="login-field" id="password" name="password" required>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <button type="submit" class="btn btn-primary">Войти</button>
            </div>
        </div>
    </div>
</form>

@endsection

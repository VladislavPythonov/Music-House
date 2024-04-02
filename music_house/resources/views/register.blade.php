@extends('layout')
@section('content')

<form action="{{ route('register') }}" method="POST">
    @csrf
    <div class="login">
        <div class="login-screen">
            <div class="app-title">
                <h1>Регистрация</h1>
            </div>
            <div class="login-form">
                <div class="control-group">
                    <label class="login-field-icon fui-user" for="surname">Фамилия:</label>
                    <input type="text" class="login-field" id="surname" name="surname" value="{{ old('surname') }}" required>
                </div>

                <div class="control-group">
                    <label class="login-field-icon fui-user" for="name">Имя:</label>
                    <input type="text" class="login-field" id="name" name="name" value="{{ old('name') }}" required>
                </div>

                <div class="control-group">
                    <label class="login-field-icon fui-user" for="patronymic">Отчество:</label>
                    <input type="text" class="login-field" id="patronymic" name="patronymic" value="{{ old('patronymic') }}" required>
                </div>

                <div class="control-group">
                    <label class="login-field-icon fui-user" for="login">Логин:</label>
                    <input type="text" class="login-field" id="login" name="login" value="{{ old('login') }}" required>
                </div>

                <div class="control-group">
                    <label class="login-field-icon fui-mail" for="email">Почта:</label>
                    <input type="email" class="login-field" id="email" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="control-group">
                    <label class="login-field-icon fui-lock" for="password">Пароль:</label>
                    <input type="password" class="login-field" id="password" name="password" required>
                </div>

                <div class="control-group">
                    <label class="login-field-icon fui-lock" for="password_confirmation">Подтверждение пароля:</label>
                    <input type="password" class="login-field" id="password_confirmation" name="password_confirmation" required>
                </div>

                <div class="control-group">
                    <label class="login-field-icon fui-checkbox-checked" for="conf">Я согласен с правилами регистрации:</label>
                    <input type="checkbox" id="conf" name="conf" required>
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

                <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
            </div>
        </div>
    </div>
</form>

@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('CSS/style.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/bootstrap.min.css')}}">
    <title>Document</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="logo">
            <img src="{{asset('img/лого.png')}}" alt="logo" width="120" height="120">
        </div>

        <div class="container-fluid">

            <a class="navbar-brand" href="{{route('index')}}">О нас</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @guest
                        <a class="navbar-brand" href="{{route('regForm')}}">Регистрация</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>

                        <a class="navbar-brand" href="{{route('login')}}">Вход</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    @endguest

                        <a class="navbar-brand" href="{{route('products.index')}}">Каталог</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>


                          <a class="navbar-brand" href="{{route('contacts')}}">Контакты</a>
                          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                              <span class="navbar-toggler-icon"></span>
                          </button>

                    </ul>
                    <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Поиск</button>
                    </form>

                    @auth
                        <a class="btn btn-primary text-decoration-none text-light me-2" aria-current="page"
                            href="{{ route('cart.index') }}">Корзина
                        </a>

                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Выход</button>
                        </form>
                    @endauth






                </div>
            </div>
    </nav>

  @yield('content')


    @if (Session::has('info'))
        <div class="alert alert-warning">
                {{session('info')}}
        </div>
    @endif
    @if (isset($info))
        <div class="alert alert-warning">
            {{$info}}
        </div>
    @endif


     <footer class="footer">
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
          © 2023 :
          <a class="text-reset fw-bold" href="https://mdbootstrap.com/">Music House</a>
        </div>
    </footer>


  <script src="{{asset('JS/code.jquery.com_jquery-3.7.1.min.js')}}"></script>
  <script src="{{asset('JS/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js')}}"></script>
  <script src="{{asset('JS/amm.js')}}"></script>
  <script src="{{asset('public/JS/new.js')}}"></script>


</body>
</html>

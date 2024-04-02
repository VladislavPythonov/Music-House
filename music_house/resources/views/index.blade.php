@extends('layout')
@section('content')
<main class="container">
            <div class="container flex">
                    <div class="text1">
                            <h1>
                                Music House
                            </h1>
                    </div>

                    <div>
                        <p class="text2">
                            Добро пожаловать в "Music House" - место, где музыка становится домом! Наш сайт предлагает вам уникальную возможность окунуться в захватывающий мир звуков и мелодий. Яркий, вдохновляющий и исключительно интерактивный, наш сайт предназначен для всех, кто разделяет нашу страсть к музыке.
                        </p>
                    </div>

                    <div>
                        <p class="text3">
                            С нашим широким ассортиментом продукции и услуг, вы сможете найти все, что нужно для полноценного музыкального опыта. Независимо от того, являетесь ли вы начинающим музыкантом, профессионалом или просто любителем музыки, "Music House" предлагает вам инструменты, знания и вдохновение, чтобы помочь вам выразить свое творчество и достичь новых высот.
                        </p>
                    </div>

                    <div>
                        <p class="text4">
                            Присоединяйтесь к нашему сообществу музыкантов, экспертов и поклонников музыки. Откройте новые возможности, расширьте свои горизонты и откройте двери в волшебный мир музыки вместе с "Music House"!
                        </p>
                    </div>
            </div>

                <div class="container">
                        <div id="carouselExampleCaptions" class="carousel slide w-50 mx-auto" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    @foreach ($products as $key => $product)
                                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $key }}" class="{{ $key === 0 ? 'active' : '' }}" aria-label="Slide {{ $key + 1 }}"></button>
                                     @endforeach
                                </div>

                            <div class="carousel-inner mt-3" style="border-radius: 20px;">
                                @foreach ($products as $key => $product)
                                    <div class="carousel-item {{ $key === 0 ? ' active' : '' }}">
                                        <img src="{{ $product->img_path }}" class="d-block w-100" style="height: 500px" alt="...">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h3 style="color: #ffffff">{{ $product->title }}</h3>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                </div>
</main>
@endsection

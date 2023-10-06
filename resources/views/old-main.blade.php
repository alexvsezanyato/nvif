@extends("layouts.main")

@push("css")
<link href="/css/skeleton/products.css" rel="stylesheet">
<link href="/css/white-theme/products.css" rel="stylesheet">

<link href="/css/skeleton/main.css" rel="stylesheet">
<link href="/css/white-theme/main.css" rel="stylesheet">

<link href="/css/skeleton/plain-request-form.css" rel="stylesheet">
<link href="/css/white-theme/plain-request-form.css" rel="stylesheet">

<link href="/css/white-theme/main.css" rel="stylesheet">

<link href="/css/skeleton/landing.css" rel="stylesheet">
<link href="/css/white-theme/landing.css" rel="stylesheet">
@endpush

@push("js")
<script src="/js/products.js"></script>
@endpush

@section("main-slider")
<div class="slider-1 slider">
    <div class="slider-item-wrapper slider-item-background" style="background-image:url('/images/coal-2.webp')">
        <div class="dimming">
            <div class="slider-item">
                <div class="slider-description">
                    <h1 class="header-text">Уголь в новосибирске</h1>
                    <span style="font-size: 24px">От 1 тонны и выше</span>
                </div>

                <div class="request">
                    <!--<h2 class="form-title">Оставьте завявку и мы перезвоним</h2>-->

                    <div class="row">
                        <form action="/form/request" method="POST" class="request-form form">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                            <div class="input-list">
                                <input type="text" name="name" placeholder="Имя">
                                <input type="text" name="phone" placeholder="Телефон">
                                <input type="text" name="email" placeholder="Эл. почта">

                                <div data-display-none class="response">Ваша заявка принята</div>
                            </div>

                            <div class="submit-wrapper">
                                <x-button type="submit">Отправить</x-button>
                            </div>
                        </form>

                        <!--<div class="schedule">
                            <div>Пн.-Пт.</div>
                            <div>8:00-20:00</div>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section("content")
<div class="products">
    @each("partials/product", $products, "product")
</div>
@endsection("content")

@extends("layouts.main")

@section("main-slider")
<div class="slider-1 slider">
    <div class="slider-item-wrapper" style="background-image:url('/images/coal-2.webp')">
        <div class="slider-item">
            <div class="slider-description">
                <h1>Уголь в новосибирске</h1>
                <span style="font-size: 24px">От 1 тонны и выше</span>
            </div>
        </div>
    </div>
</div>
@endsection

@section("content")
<form action="/form/request" method="POST" class="request-form form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

    <h2 class="form-title">Оставьте завявку и мы перезвоним</h2>

    <div class="input-list">
        <input type="text" name="name" placeholder="Имя">
        <input type="text" name="phone" placeholder="Телефон">
        <input type="text" name="email" placeholder="Эл. почта">

        <div data-display-none class="response">Ваша заявка принята</div>
    </div>

    <button type="submit">Отправить</button>
    <button data-display-none type="submit">Отправить</button>
</form>
@endsection("content")

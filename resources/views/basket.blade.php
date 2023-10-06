@extends("layouts.main")

@push("css")
<link href="/css/skeleton/products.css" rel="stylesheet">
<link href="/css/white-theme/products.css" rel="stylesheet">
<link href="/css/skeleton/ordering.css" rel="stylesheet">
@endpush

@push("js")
<script src="/js/basket.js"></script>
<script src="/js/products.js"></script>
@endpush

@section("content")
<form action="/basket/checkout" method="POST" class="form order-form">
    @csrf

    @if ($products)
        <div id="basket" class="products">
        @foreach ($products as $product)
            @include("partials/product")
        @endforeach
        </div>
    @else
        <div class="no-product">
            <div class="icon">
                <i class="fa-solid fa-basket-shopping"></i>
                <span class="count">0</span>
            </div>

            <div class="text">В корзине нет товаров</div>
        </div>
    @endif

    @if ($products)
    @include("partials/ordering")
    @endif
</form>
@endsection("content")

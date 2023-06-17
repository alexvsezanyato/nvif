@extends("layouts.main")

@push("css")
<link href="/css/skeleton/products.css" rel="stylesheet">
<link href="/css/white-theme/products.css" rel="stylesheet">
@endpush

@push("js")
<script src="/js/basket.js"></script>
<script src="/js/products.js"></script>
@endpush

@section("content")
<div id="basket" class="products">
@if ($products)
@each("partials/product", $products, "product")
@else
<div class="no-product">
    <div class="icon"><i class="fa-solid fa-basket-shopping"></i></div>
    <div class="text">В корзине нет товаров</div>
</div>
@endif
</div>

@if ($products)
@include("partials/ordering")
@endif
@endsection("content")

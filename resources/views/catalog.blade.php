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
<script src="/js/form-handler.js"></script>
@endpush

@section("content")

@if ($products)
<h2>Каталог</h2>

<div class="categories" style="margin-bottom: 5px">
    @foreach ($submenu['categories'] as $category)
    <li class="item" style="background: url('/images/product/wood-1.webp')"><div class="background-filter"><a class="link" href="/catalog/{{ $category['link'] }}">{{ $category['name'] }}</a></div></li>
    @endforeach
</div>

<div class="products">
    @each("partials/product", $products, "product")
</div>
@endif

@endsection("content")


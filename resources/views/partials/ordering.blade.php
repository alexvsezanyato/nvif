@push("css")
<link href="/css/skeleton/ordering.css" rel="stylesheet">
<link href="/css/white-theme/ordering.css" rel="stylesheet">
@endpush

<form action="/form/request" method="POST" class="order-form form">
    @csrf

    <div class="input-list" style="width:100%">
        <div class="item">
            <span class="name">Имя</span>
            <input class="value" type="text" name="name" placeholder="Имя">
        </div>

        <div class="item">
            <span class="name">Контактный номер</span>
            <input class="value" type="text" name="phone" placeholder="Контакный номер">
        </div>

        <div class="item">
            <span class="name">Эл. почта</span>
            <input class="value" type="text" name="email" placeholder="Эл. почта">
        </div>
    </div>
</form>

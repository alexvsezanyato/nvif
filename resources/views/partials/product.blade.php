<div class="product-container">
    <div class="product">
        <div class="bordered">
            <div class="top">
                <div class="image"><img src="/images/{{ $product["image"] }}"></div>
            </div>

            <div class="middle">
                <div class="title">{{ $product["name"] }}</div>
                <div class="price"><span class="label">Цена:</span> <span class="value">8 800</span> <span class="currency">руб.</span></div>
            </div>


            <div class="bottom">
                <div class="count">
                    <div data-option-type="-" class="option minus">-</div>
                    <input class="value" name="count" value="1" size="1" disabled>
                    <div data-option-type="+" class="option plus">+</div>
                </div>


                <div class="cart-wrapper">
                    <div class="cart in {{ $product->isInCart()? '' : 'hidden' }}" data-id="{{ $product["id"] }}">В корзине</div>
                    <div class="cart not-in {{ $product->isInCart()? 'hidden' : '' }}" data-id="{{ $product["id"] }}">В корзину</div>
                </div>
            </div>
        </div>
    </div>
</div>

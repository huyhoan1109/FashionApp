<a class="mini-cart-icon" href="{{ route('cart') }}">
    <img src="{{ asset('assets/imgs/theme/icons/icon-cart.svg') }}">
    <span class="pro-count blue">{{ @count($cart_data) }}</span>
</a>
<div class="cart-dropdown-wrap cart-dropdown-hm2">
    <ul>
        @foreach($cart_data as $cart)
        <li>
            <div class="shopping-cart-img">
                <a href="{{ route('item') }}"><img alt="Surfside Media" src="{{ $cart->image }}"></a>
            </div>
            <div class="shopping-cart-title">
                <h4><a href="{{ route('item') }}">Daisy Casual Bag</a></h4>
                <h4><span>{{ $cart->quantity }} × </span> {{ $cart->price }}</h4>
            </div>
            <div class="shopping-cart-delete">
                <i class="fi-rs-cross-small" click="{{ route('cart.remove') }}" method="POST"></i>
            </div>
        </li>
        @endforeach
    </ul> 
    <div class="shopping-cart-footer">
        <div class="shopping-cart-total">
            <h4>Total<span>${{ $total }}</span></h4>
        </div>
        <div class="shopping-cart-button">
            <a href="{{ route('cart') }}" class="outline">View cart</a>
            <a href="{{ route('checkout') }}">Checkout</a>
        </div>
    </div>
</div>

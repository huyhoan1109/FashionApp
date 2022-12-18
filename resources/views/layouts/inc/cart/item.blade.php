<div class="shopping-cart-img">
    <a href="{{ route('item') }}"><img alt="Surfside Media" src="assets/imgs/shop/thumbnail-3.jpg"></a>
</div>
<div class="shopping-cart-title">
    <h4><a href="{{ route('item') }}">Daisy Casual Bag</a></h4>
    <h4><span>1 × </span>$800.00</h4>
</div>
<div class="shopping-cart-delete">
    <i class="fi-rs-cross-small" click="{{ route('cart.remove') }}" method="POST"></i>
</div>
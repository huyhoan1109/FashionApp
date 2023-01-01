@php
    use App\Models\Item;
@endphp
<div class="header-action-icon-2">
    <a class="mini-cart-icon" href="{{ route('cart') }}">
        <img src="{{ asset('assets/imgs/theme/icons/icon-cart.svg') }}">
        <span class="pro-count blue">{{ @count($cart) }}</span>
    </a>
    <div class="cart-dropdown-wrap cart-dropdown-hm2">
        <ul>
            @foreach($cart as $item)
            @php
                $info = Item::find($item->item_id)
            @endphp
            <li>
                <div class="shopping-cart-img">
                    <a href="{{ url('/item-detail/'.$info->id) }}"><img src="{{ $info->image }}"></a>
                </div>
                <div class="shopping-cart-title">
                    <h4><a href="{{ url('/item-detail/'.$info->id) }}"> {{ $info->name }}</a></h4>
                    <h4><span>{{ $item->quantity }} x</span> {{ number_format($info->discount_price, 2) }}</h4>
                </div>
                <div class="shopping-cart-delete">
                   <a href="" wire:click.prevent="removeItem({{$item->id}})"> <i class="fi-rs-cross-small"></i></a>
                </div>
            </li>
            @endforeach
        </ul> 
        <div class="shopping-cart-footer">
            <div class="shopping-cart-total">
                <h4>Total
                    <span> 
                        @php
                            $total = 0;
                            foreach($cart as $item){
                                $info = Item::find($item->item_id);
                                $total += $info->discount_price * $item->quantity;
                            }
                        @endphp
                        ${{ number_format($total, 2) }}
                    </span>
                </h4>
            </div>
            <div class="shopping-cart-button">
                <a href="{{ route('cart') }}" class="outline">View cart</a>
                <a href="{{ route('checkout') }}">Checkout</a>
            </div>
        </div>
    </div>
</div>
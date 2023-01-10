@php 
    use App\Models\Item;
    $total = 0;
@endphp
<section class="mt-50 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table shopping-summery text-center clean">
                        <thead>
                            <tr class="main-heading">
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $item)
                                @php 
                                    $info = Item::find($item->item_id); 
                                @endphp
                                <tr>
                                    <td class="image product-thumbnail"><img src="{{$info->image}}" alt="#"></td>
                                    <td class="product-des product-name">
                                        <h5 class="product-name"><a href="{{ url('/item-detail/'.$item->item_id) }}">{{ $info->name }}</a></h5>
                                        </p>
                                    </td>
                                    <td class="price" data-title="Price"><span>{{ $info->discount_price }} </span></td>
                                    <td class="text-center" data-title="Stock">
                                        <div class="detail-qty border radius m-auto">
                                            <a href="" wire:click.prevent="raiseItem({{ $item->id }})" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                            <span class="qty-val">{{ $item->quantity }}</span>
                                            <a href="" wire:click.prevent="reduceItem({{ $item->id }})" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                        </div>
                                    </td>
                                    @php 
                                        $subtotal = $item->quantity * $info->discount_price; 
                                        $total += $subtotal;
                                    @endphp
                                    <td class="text-right" data-title="Cart">
                                        <span>{{ $subtotal }} </span>
                                    </td>
                                    <td class="action" data-title="Remove"><a href="" wire:click.prevent="removeItem({{$item->id}})" class="text-muted"><i class="fi-rs-trash"></i></a></td>
                                </tr>
                            @endforeach
                            @if(@count($cart) != 0)
                                <tr>
                                    <td colspan="6" class="text-end">
                                        <a href="" wire:click.prevent="removeCart()" class="text-muted"><i class="fi-rs-cross-small"></i>Clear Cart</a>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="cart-action text-end">
                    <a href="{{route('shop')}}"class="btn"><i class="fi-rs-shopping-bag mr-10"></i>Continue Shopping</a>
                    <a href="{{route('checkout')}}" class="btn"><i class="fi-rs-box-alt mr-10"></i>Checkout</a>
                </div>
            </div>
        </div>
    </div>
</section>
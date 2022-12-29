@php 
    use App\Models\Item;
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
                                            <a href="" wire:click="raiseItem({{ $item->id }})" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                            <span class="qty-val">{{ $item->quantity }}</span>
                                            <a href="" wire:click="reduceItem({{ $item->id }})" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                        </div>
                                    </td>
                                    <td class="text-right" data-title="Cart">
                                        <span>{{ $item->quantity * $info->discount_price }} </span>
                                    </td>
                                    <td class="action" data-title="Remove"><a href="" wire:click.prevent="removeItem({{$item->id}})" class="text-muted"><i class="fi-rs-trash"></i></a></td>
                                </tr>
                            @endforeach
                            @if(@count($cart) != 0)
                                <tr>
                                    <td colspan="6" class="text-end">
                                        <a href="#" class="text-muted"> <i class="fi-rs-cross-small"></i>Clear Cart</a>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="cart-action text-end">
                    <a class="btn mr-10 mb-sm-15"><i class="fi-rs-shuffle mr-10"></i>Update Cart</a>
                    <a href="{{route('shop')}}"class="btn"><i class="fi-rs-shopping-bag mr-10"></i>Continue Shopping</a>
                </div>
                <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                <div class="row mb-50">
                    <div class="col-lg-6 col-md-12">
                        <div class="mb-30 mt-50">
                            <div class="heading_s1 mb-3">
                                <h4>Apply Coupon</h4>
                            </div>
                            <div class="total-amount">
                                <div class="left">
                                    <div class="coupon">
                                        <form action="#" target="_blank">
                                            <div class="form-row row justify-content-center">
                                                <div class="form-group col-lg-6">
                                                    <input class="font-medium" name="Coupon" placeholder="Enter Your Coupon">
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <button class="btn  btn-sm"><i class="fi-rs-label mr-10"></i>Apply</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="border p-md-4 p-30 border-radius cart-totals">
                            <div class="heading_s1 mb-3">
                                <h4>Cart Totals</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td class="cart_total_label">Total</td>
                                            <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">${{ 0 }}</span></strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <a href="checkout.html" class="btn "> <i class="fi-rs-box-alt mr-10"></i> Proceed To CheckOut</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
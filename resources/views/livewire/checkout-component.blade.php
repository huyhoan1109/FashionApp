<section class="mt-50 mb-50">
    <div class="container">
        <form wire:submit.prevent="createOrder(Object.fromEntries(new FormData($event.target)))" method="post"> 
        <div class="row">
            <div class="col-md-6">
                <div class="mb-25">
                    <h4>Billing Details</h4>
                </div>
                @if($user->type != 2)
                    <div class="form-group">
                        <input type="text" required="" name="firstname" value="{{$user->firstname}}" placeholder="First name *">
                    </div>
                    <div class="form-group">
                        <input type="text" required="" name="lastname" required="" value="{{$user->lastname}}" placeholder="Last name *">
                    </div>
                    <div class="form-group">
                        <input type="text" required="" name="billing_address" value="{{$user->address}}" placeholder="Billing address *">
                    </div>
                    <div class="form-group">
                        <input type="text" required="" name="phone" type="text" value="{{$user->phone}}" placeholder="Phone *">
                    </div>
                @else
                    <div class="form-group">
                        <input type="text" name="firstname" required="" placeholder="First name *">
                    </div>
                    <div class="form-group">
                        <input type="text" name="lastname" required="" placeholder="Last name *">
                    </div>
                    <div class="form-group">
                        <input type="text" name="billing_address" required="" placeholder="Billing address *">
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" required="" placeholder="Phone *">
                    </div>
                @endif
                <div class="mb-20">
                    <h5>Additional information</h5>
                </div>
                <div class="form-group mb-30">
                    <textarea rows="5" name="extra_note" placeholder="Order notes"></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="order_review">
                    <div class="mb-20">
                        <h4>Your Orders</h4>
                    </div>
                    <div class="table-responsive order_table text-center">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="2">Product</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    use App\Models\Item;
                                @endphp
                                @foreach($cart as $item)
                                @php
                                    $info = Item::find($item->item_id);
                                    $subtotal = $item->quantity * $info->discount_price;
                                @endphp
                                <tr>
                                    <td class="image product-thumbnail"><img src="{{ $info->image }}"></td>
                                    <td>
                                        <i class="ti-check-box font-small text-muted mr-10"></i>
                                        <h5><a href="{{url('/item-detail/'.$info->id)}}">{{$info->name}}</a></h5> <span class="product-qty">x {{$item->quantity}}</span>
                                    </td>
                                    <td>${{number_format($subtotal, 2)}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <th>Price</th>
                                    <td class="product-subtotal" colspan="2">${{number_format($price, 2)}}</td>
                                </tr>
                                @if($user->type != 2)
                                <tr>
                                    <th>Shipping + Coupon</th>
                                    <td colspan="2"><em>Free Shipping + ({{number_format($coupon->discount * 100, 2)}}% discount)</em></td>
                                </tr>
                                @endif
                                <tr>
                                    <th>Total</th>
                                    <td colspan="2" class="product-subtotal"><span class="font-xl text-brand fw-900" >${{number_format($total, 2)}}</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                    <div class="payment_method">
                        <div class="mb-25">
                            <h5>Payment</h5>
                        </div>
                        <div class="payment_option">
                            <div class="custome-radio">
                                <input class="form-check-input" required="" type="radio" name="payment_option" id="pay1" value="pay1" checked>
                                <label class="form-check-label" for="pay1" data-bs-toggle="collapse" data-target="#cashOnDelivery" aria-controls="cashOnDelivery">Cash On Delivery</label>                                        
                            </div>
                            <div class="custome-radio">
                                <input class="form-check-input" required="" type="radio" name="payment_option" id="pay2" value="pay2">
                                <label class="form-check-label" for="pay2" data-bs-toggle="collapse" data-target="#cardPayment" aria-controls="cardPayment">Card Payment</label>                                        
                            </div>
                            <div class="custome-radio">
                                <input class="form-check-input" required="" type="radio" name="payment_option" id="pay3" value="pay3">
                                <label class="form-check-label" for="pay3" data-bs-toggle="collapse" data-target="#paypal" aria-controls="paypal">Paypal</label>                                        
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-fill-out btn-block mt-30">Place Order</a>
                </div>
            </div>
            </form>
        </div>
    </div>
</section>
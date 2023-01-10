<div class="row product-grid-4">
    @foreach($items as $item)
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6 row mt-4">
    <div class ="product-cart-wrap mb-30">
        @livewire('item-component', [
            'item_id' => $item->id
        ])
    </div>
    </div>
    @endforeach
</div>
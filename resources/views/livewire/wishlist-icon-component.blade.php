<div class="header-action-icon-2">
    <a href="{{ route('wishlist') }}">
        <img src="{{ asset('assets/imgs/theme/icons/icon-heart.svg') }}">
        <span class="pro-count blue">{{ @count($items) }}</span> 
    </a>
</div>
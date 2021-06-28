<li class="wishlist ">
    <a href="{{ route('product.wishlist') }}" id="wishlist-total" class="top-link-wishlist" title="{{ Cart::instance('wishlist')->count() }}">
        @if (Cart::instance('wishlist')->count() > 0)
            <span>Wish List ({{ Cart::instance('wishlist')->count() }})</span>
        @else
            <span>Wish List</span>
        @endif
    </a>
</li>
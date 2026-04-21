@php
    $primary   = $product->primaryImage();
    $hover     = $product->hoverImage();
    $colors    = $product->colorImages();
    $sizes     = $product->sizes;
@endphp

<div class="card-product grid fl-item">
    <div class="card-product-wrapper">
        <a href="{{ $product->slug ? route('product.show', $product->slug) : '#' }}" class="product-img">
            @if($primary)
                <img class="lazyload img-product"
                    data-src="{{ $primary->url }}"
                    src="{{ $primary->url }}"
                    alt="{{ $product->name }}">
            @endif
            @if($hover)
                <img class="lazyload img-hover"
                    data-src="{{ $hover->url }}"
                    src="{{ $hover->url }}"
                    alt="{{ $product->name }}">
            @endif
        </a>

        <div class="list-product-btn">
            <a href="#quick_add" data-bs-toggle="modal"
               data-quick-add-url="{{ route('product.quick-view', $product->slug) }}"
               class="box-icon bg_white quick-add tf-btn-loading">
                <span class="icon icon-bag"></span>
                <span class="tooltip">{{ __('site.quick-add') }}</span>
            </a>
            @auth('customer')
            @php $inWishlist = auth('customer')->user()->wishlists()->where('product_id', $product->id)->exists(); @endphp
            <button class="box-icon bg_white wishlist-toggle-btn btn-icon-action {{ $inWishlist ? 'active' : '' }}"
                    data-product-id="{{ $product->id }}"
                    data-toggle-url="{{ route('wishlist.toggle') }}">
                <span class="icon icon-heart"></span>
                <span class="tooltip">{{ $inWishlist ? __('site.remove-from-wishlist') : __('site.add-to-wishlist') }}</span>
                <span class="icon icon-delete"></span>
            </button>
            @else
            <a href="#login" data-bs-toggle="modal" class="box-icon bg_white wishlist btn-icon-action">
                <span class="icon icon-heart"></span>
                <span class="tooltip">{{ __('site.add-to-wishlist') }}</span>
                <span class="icon icon-delete"></span>
            </a>
            @endauth
            <a href="#quick_view" data-bs-toggle="modal"
               data-quick-view-url="{{ route('product.quick-view', $product->slug) }}"
               class="box-icon bg_white quickview tf-btn-loading">
                <span class="icon icon-view"></span>
                <span class="tooltip">{{ __('site.quick-view') }}</span>
            </a>
        </div>

        @if($sizes->count())
        <div class="size-list">
            @foreach($sizes as $size)
                <span>{{ $size->name }}</span>
            @endforeach
        </div>
        @endif
    </div>

    <div class="card-product-info">
        <a href="{{ $product->slug ? route('product.show', $product->slug) : '#' }}" class="title link">{{ $product->name }}</a>
        @if($product->sale_price)
            <span class="price">
                <span class="old-price">{{ number_format($product->price, 2) }} EGP</span>
                {{ number_format($product->sale_price, 2) }} EGP
            </span>
        @else
            <span class="price">{{ number_format($product->price, 2) }} EGP</span>
        @endif

        @if($colors->count())
        <ul class="list-color-product">
            @foreach($colors as $i => $img)
            <li class="list-color-item color-swatch {{ $i === 0 ? 'active' : '' }}">
                <span class="tooltip">{{ $img->color_name }}</span>
                <span class="swatch-value" style="background-color: {{ $img->color_hex }};"></span>
                <img class="lazyload"
                    data-src="{{ $img->url }}"
                    src="{{ $img->url }}"
                    alt="{{ $img->color_name }}">
            </li>
            @endforeach
        </ul>
        @endif
    </div>
</div>

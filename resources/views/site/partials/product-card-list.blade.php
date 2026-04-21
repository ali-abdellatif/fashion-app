@php
    $primary = $product->primaryImage();
    $hover   = $product->hoverImage();
    $colors  = $product->colorImages();
    $sizes   = $product->sizes;
@endphp

<div class="card-product list-layout">
    <div class="card-product-wrapper">
        <a href="{{ $product->slug ? route('product.show', $product->slug) : '#' }}" class="product-img">
            @if($primary)
                <img class="lazyload img-product" src="{{ $primary->url }}" data-src="{{ $primary->url }}" alt="{{ $product->name }}">
            @endif
            @if($hover)
                <img class="lazyload img-hover" src="{{ $hover->url }}" data-src="{{ $hover->url }}" alt="{{ $product->name }}">
            @endif
        </a>
    </div>
    <div class="card-product-info">
        <a href="{{ $product->slug ? route('product.show', $product->slug) : '#' }}" class="title link">{{ $product->name }}</a>
        @if($product->sale_price)
            <span class="price current-price">
                <span class="old-price">{{ number_format($product->price, 2) }} EGP</span>
                {{ number_format($product->sale_price, 2) }} EGP
            </span>
        @else
            <span class="price current-price">{{ number_format($product->price, 2) }} EGP</span>
        @endif
        @if($product->description)
            <p class="description">{{ \Illuminate\Support\Str::limit(strip_tags($product->description), 120) }}</p>
        @endif
        @if($colors->count())
        <ul class="list-color-product">
            @foreach($colors as $i => $img)
            <li class="list-color-item color-swatch {{ $i === 0 ? 'active' : '' }}">
                <span class="tooltip">{{ $img->color_name }}</span>
                <span class="swatch-value" style="background-color:{{ $img->color_hex }}"></span>
                <img class="lazyload" src="{{ $img->url }}" data-src="{{ $img->url }}" alt="{{ $img->color_name }}">
            </li>
            @endforeach
        </ul>
        @endif
        @if($sizes->count())
        <div class="size-list">
            @foreach($sizes as $size)
                <span class="size-item">{{ $size->name }}</span>
            @endforeach
        </div>
        @endif
        <div class="list-product-btn">
            <a href="#quick_view" data-bs-toggle="modal"
               data-quick-view-url="{{ route('product.quick-view', $product->slug) }}"
               class="box-icon quickview style-3 hover-tooltip tf-btn-loading">
                <span class="icon icon-view"></span>
                <span class="tooltip">{{ __('Quick View') }}</span>
            </a>
        </div>
    </div>
</div>

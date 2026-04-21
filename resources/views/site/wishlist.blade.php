@extends('app')
@section('title', __('site.wishlist'))
@section('content')

<!-- page-title -->
<div class="tf-page-title">
    <div class="container-full">
        <div class="heading text-center">{{ __('site.wishlist') }}</div>
    </div>
</div>
<!-- /page-title -->

<section class="flat-spacing-2">
    <div class="container">

        @if($items->isEmpty())
            <div class="text-center py-5">
                <i class="icon icon-heart" style="font-size:64px; opacity:.3"></i>
                <h5 class="mt-3">{{ __('site.wishlist-empty') }}</h5>
                <a href="{{ route('shop') }}" class="tf-btn btn-fill animate-hover-btn radius-3 mt-3">
                    {{ __('site.explore-products') }}
                </a>
            </div>
        @else
            <div class="tf-grid-layout wrapper-shop tf-col-4 sm-col-2" id="wishlist-grid">
                @foreach($items as $item)
                    @php $product = $item->product; @endphp
                    <div class="card-product grid wishlist-card" data-wishlist-id="{{ $item->id }}" data-product-id="{{ $product->id }}">
                        <div class="card-product-wrapper">
                            <a href="{{ route('product.show', $product->slug) }}" class="product-img">
                                <img class="lazyload img-product"
                                     src="{{ $product->primaryImage()?->url }}"
                                     alt="{{ $product->name }}">
                                @if($product->hoverImage())
                                <img class="lazyload img-hover"
                                     src="{{ $product->hoverImage()->url }}"
                                     alt="{{ $product->name }}">
                                @endif
                            </a>

                            {{-- Remove from wishlist --}}
                            <div class="list-product-btn type-wishlist">
                                <button class="box-icon bg_white wishlist-remove-btn"
                                        data-wishlist-id="{{ $item->id }}"
                                        data-url="{{ route('wishlist.remove', $item->id) }}"
                                        title="{{ __('Remove from Wishlist') }}">
                                    <span class="icon icon-delete"></span>
                                    <span class="tooltip">{{ __('Remove') }}</span>
                                </button>
                            </div>

                            {{-- Quick actions --}}
                            <div class="list-product-btn">
                                <a href="#quick_add"
                                   data-bs-toggle="modal"
                                   data-quick-add-url="{{ route('product.quick-view', $product->slug) }}"
                                   class="box-icon bg_white quick-add tf-btn-loading">
                                    <span class="icon icon-bag"></span>
                                    <span class="tooltip">{{ __('Quick Add') }}</span>
                                </a>
                                <a href="#quick_view"
                                   data-bs-toggle="modal"
                                   data-quick-view-url="{{ route('product.quick-view', $product->slug) }}"
                                   class="box-icon bg_white quickview tf-btn-loading">
                                    <span class="icon icon-view"></span>
                                    <span class="tooltip">{{ __('Quick View') }}</span>
                                </a>
                            </div>

                            @if($product->sizes->isNotEmpty())
                            <div class="size-list">
                                @foreach($product->sizes->take(4) as $size)
                                    <span>{{ $size->name }}</span>
                                @endforeach
                            </div>
                            @endif
                        </div>

                        <div class="card-product-info">
                            <a href="{{ route('product.show', $product->slug) }}" class="title link">{{ $product->name }}</a>
                            @if($product->sale_price)
                                <span class="price">
                                    <span class="old-price">{{ number_format($product->price, 2) }} EGP</span>
                                    {{ number_format($product->sale_price, 2) }} EGP
                                </span>
                            @else
                                <span class="price">{{ number_format($product->price, 2) }} EGP</span>
                            @endif

                            @if($product->colorImages()->isNotEmpty())
                            <ul class="list-color-product">
                                @foreach($product->colorImages() as $i => $img)
                                <li class="list-color-item color-swatch {{ $i === 0 ? 'active' : '' }}">
                                    <span class="tooltip">{{ $img->color_name }}</span>
                                    <span class="swatch-value" style="background-color:{{ $img->color_hex }}"></span>
                                    <img class="lazyload" src="{{ $img->url }}" alt="{{ $img->color_name }}">
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</section>

@push('scripts')
<script>
(function () {
    var csrf = '{{ csrf_token() }}';

    document.addEventListener('click', function (e) {
        var btn = e.target.closest('.wishlist-remove-btn');
        if (!btn) return;
        e.preventDefault();

        var url  = btn.dataset.url;
        var card = document.querySelector('.wishlist-card[data-wishlist-id="' + btn.dataset.wishlistId + '"]');

        fetch(url, {
            method: 'DELETE',
            headers: { 'X-CSRF-TOKEN': csrf }
        })
        .then(r => r.json())
        .then(function (data) {
            if (data.success && card) {
                card.style.transition = 'opacity .3s';
                card.style.opacity = '0';
                setTimeout(function () {
                    card.remove();
                    // Show empty state if no cards left
                    if (!document.querySelector('.wishlist-card')) {
                        location.reload();
                    }
                }, 300);
            }
        });
    });
})();
</script>
@endpush

@endsection

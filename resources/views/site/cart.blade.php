@extends('app')
@section('title', __('site.shopping-cart'))
@section('content')

<!-- page-title -->
        <div class="tf-page-title">
            <div class="container-full">
                <div class="heading text-center">{{ __('site.shopping-cart') }}</div>
            </div>
        </div>
        <!-- /page-title -->

        <div class="tf-breadcrumb" style="padding-top: 80px;">
    <div class="container">
        <div class="tf-breadcrumb-wrap d-flex justify-content-between flex-wrap align-items-center">
            <div class="tf-breadcrumb-list">
                <a href="{{ route('home') }}" class="text">{{ __('site.home') }}</a>
                <i class="icon icon-arrow-right"></i>
                <span class="text">{{ __('site.shopping-cart') }}</span>
            </div>
        </div>
    </div>
</div>

<section class="flat-spacing-4 pt_0">
    <div class="container">
        @if($cart->items->isEmpty())
            <div class="text-center py-5">
                <i class="icon icon-bag fs-48 mb-3 d-block" style="font-size:64px;"></i>
                <h5 class="mb-3">{{ __('site.shopping-cart-empty') }}</h5>
                <a href="{{ route('home') }}" class="tf-btn btn-fill animate-hover-btn radius-3">
                    {{ __('site.continue-shopping') }}
                </a>
            </div>
        @else
        <div class="row" id="cart-wrapper">
            {{-- Items --}}
            <div class="col-xl-8 col-lg-7">
                <div class="tf-cart-item-message mb-3">
                    <i class="icon icon-lightning me-2"></i>
                    {{ __('site.you-have') }} <span class="fw-6 cart-total-qty">{{ $cart->totalQuantity() }}</span> {{ __('site.item(s)-in-your-cart') }}
                </div>

                <table class="tf-table-page-cart" id="cart-items-list">
                    <thead>
                        <tr>
                            <th>{{ __('site.product') }}</th>
                            <th>{{ __('site.price') }}</th>
                            <th>{{ __('site.quantity') }}</th>
                            <th>{{ __('site.total') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($cart->items as $item)
                    @php $product = $item->product; @endphp
                    <tr class="tf-cart-item" data-item-id="{{ $item->id }}">
                        {{-- Product --}}
                        <td>
                            <div class="tf-cart-item_product">
                                <a href="{{ route('product.show', $product->slug) }}" class="img-box">
                                    <img src="{{ $item->color?->url ?? $product->primaryImage()?->url }}"
                                         alt="{{ $product->name }}"
                                         style="width:80px; height:110px; object-fit:cover;">
                                </a>
                                <div class="cart-info">
                                    <a href="{{ route('product.show', $product->slug) }}" class="cart-title link fw-6">{{ $product->name }}</a>
                                    @if($item->color || $item->size)
                                    <span class="cart-meta-variant">
                                        @if($item->color){{ $item->color->color_name }}@endif
                                        @if($item->color && $item->size) / @endif
                                        @if($item->size){{ $item->size->name }}@endif
                                    </span>
                                    @endif
                                    <a class="remove-cart cart-remove-btn" href="#"
                                       data-item="{{ $item->id }}"
                                       data-url="{{ route('cart.remove', $item->id) }}">
                                        {{ __('site.remove') }}
                                    </a>
                                </div>
                            </div>
                        </td>

                        {{-- Unit price --}}
                        <td>
                            <div class="cart-price">
                                {{ number_format($item->unitPrice(), 2) }} EGP
                            </div>
                        </td>

                        {{-- Quantity --}}
                        <td>
                            <div class="cart-quantity">
                                <div class="wg-quantity">
                                    <span class="btn-quantity cart-qty-minus"
                                          data-item="{{ $item->id }}"
                                          data-url="{{ route('cart.update', $item->id) }}">-</span>
                                    <input type="text" class="cart-qty-input" value="{{ $item->quantity }}" min="1"
                                           data-item="{{ $item->id }}"
                                           data-url="{{ route('cart.update', $item->id) }}">
                                    <span class="btn-quantity cart-qty-plus"
                                          data-item="{{ $item->id }}"
                                          data-url="{{ route('cart.update', $item->id) }}">+</span>
                                </div>
                            </div>
                        </td>

                        {{-- Line total --}}
                        <td>
                            <div class="cart-total item-line-total">
                                {{ number_format($item->lineTotal(), 2) }} EGP
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-between align-items-center mt-4 flex-wrap gap-3">
                    <a href="{{ route('home') }}" class="tf-btn btn-outline radius-3 link">
                        <i class="icon me-2"></i> {{ __('site.continue-shopping') }}
                    </a>
                    <button class="tf-btn btn-outline radius-3" id="cart-clear-btn"
                            data-url="{{ route('cart.clear') }}">
                        {{ __('site.clear-cart') }}
                    </button>
                </div>
            </div>

            {{-- Summary --}}
            <div class="col-xl-4 col-lg-5 mt-5 mt-lg-0">
                <div class="tf-cart-totals-discounts p-4" style="border:1px solid #eee; border-radius:8px;">
                    <h6 class="mb-4">{{ __('site.order-summary') }}</h6>

                    <div class="d-flex justify-content-between mb-2">
                        <span>{{ __('site.subtotal') }}</span>
                        <span class="fw-6 cart-subtotal">{{ number_format($cart->subtotal(), 2) }} EGP</span>
                    </div>

                    @php
                        $defaultAddr = auth('customer')->user()->defaultAddress();
                        $shippingPrice = $defaultAddr?->governorate?->shipping_price ?? 0;
                    @endphp
                    @if($defaultAddr?->governorate)
                    <div class="d-flex justify-content-between mb-2">
                        <span>{{ __('site.shipping') }} ({{ $defaultAddr->governorate->name }})</span>
                        <span class="fw-6">{{ number_format($shippingPrice, 2) }} EGP</span>
                    </div>
                    @endif

                    <div class="tf-mini-cart-line my-3"></div>

                    <div class="d-flex justify-content-between mb-4">
                        <span class="fw-6 fs-16">{{ __('site.total') }}</span>
                        <span class="fw-6 fs-16 cart-grand-total" data-shipping="{{ $shippingPrice }}">
                            {{ number_format($cart->subtotal() + $shippingPrice, 2) }} EGP
                        </span>
                    </div>

                    <a href="#" class="tf-btn btn-fill animate-hover-btn radius-3 w-100 justify-content-center">
                        <span>{{ __('site.proceed-to-checkout') }}</span>
                    </a>

                    <div class="mt-4">
                        <label class="fs-14 fw-6 mb-2 d-block">{{ __('site.order-note') }}</label>
                        <textarea class="tf-field-input tf-input w-100" rows="3"
                            id="cart-note"
                            placeholder="{{ __('site.add-order-note') }}">{{ $cart->note }}</textarea>
                        <button class="tf-btn btn-outline radius-3 w-100 mt-2 justify-content-center" id="save-note-btn">
                            {{ __('site.save-note') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection

@push('scripts')
<script>
(function () {
    var csrf = '{{ csrf_token() }}';

    var grandTotalEl = document.querySelector('.cart-grand-total');
    var shipping     = grandTotalEl ? parseFloat(grandTotalEl.dataset.shipping) : 0;

    function updateBadge(count) {
        document.querySelectorAll('.cart-count-badge').forEach(function (el) {
            el.textContent = count;
            el.style.display = count > 0 ? '' : 'none';
        });
    }

    function fmt(num) {
        return parseFloat(num).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' EGP';
    }

    function updateTotals(subtotal) {
        subtotal = parseFloat(subtotal);
        document.querySelector('.cart-subtotal').textContent = fmt(subtotal);
        if (grandTotalEl) grandTotalEl.textContent           = fmt(subtotal + shipping);
    }

    function changeQty(itemId, url, delta) {
        var wrap = document.querySelector('[data-item-id="' + itemId + '"]');
        var input = wrap.querySelector('.cart-qty-input');
        var newQty = Math.max(1, parseInt(input.value) + delta);
        input.value = newQty;
        sendUpdate(itemId, url, newQty, wrap);
    }

    function sendUpdate(itemId, url, qty, wrap) {
        fetch(url, {
            method: 'PATCH',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrf },
            body: JSON.stringify({ quantity: qty })
        })
        .then(r => r.json())
        .then(function (data) {
            wrap.querySelector('.item-line-total').textContent = fmt(data.line_total);
            updateTotals(data.subtotal);
            document.querySelector('.cart-total-qty').textContent = data.count;
            updateBadge(data.count);
        });
    }

    document.addEventListener('click', function (e) {
        var minus = e.target.closest('.cart-qty-minus');
        if (minus) { e.preventDefault(); changeQty(minus.dataset.item, minus.dataset.url, -1); }

        var plus = e.target.closest('.cart-qty-plus');
        if (plus) { e.preventDefault(); changeQty(plus.dataset.item, plus.dataset.url, 1); }

        var rem = e.target.closest('.cart-remove-btn');
        if (rem) {
            e.preventDefault();
            fetch(rem.dataset.url, { method: 'DELETE', headers: { 'X-CSRF-TOKEN': csrf } })
            .then(r => r.json())
            .then(function (data) {
                document.querySelector('[data-item-id="' + rem.dataset.item + '"]')?.remove();
                updateTotals(data.subtotal);
                document.querySelector('.cart-total-qty').textContent = data.count;
                updateBadge(data.count);
                if (data.count === 0) location.reload();
            });
        }

        var clearBtn = e.target.closest('#cart-clear-btn');
        if (clearBtn) {
            e.preventDefault();
            if (!confirm('{{ __("Clear all items from cart?") }}')) return;
            fetch(clearBtn.dataset.url, { method: 'DELETE', headers: { 'X-CSRF-TOKEN': csrf } })
            .then(() => location.reload());
        }

        var noteBtn = e.target.closest('#save-note-btn');
        if (noteBtn) {
            e.preventDefault();
            var note = document.getElementById('cart-note').value;
            fetch('{{ route("cart.index") }}', {
                method: 'PATCH',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrf },
                body: JSON.stringify({ note: note })
            });
        }
    });

    document.querySelectorAll('.cart-qty-input').forEach(function (input) {
        input.addEventListener('change', function () {
            var qty = Math.max(1, parseInt(input.value) || 1);
            input.value = qty;
            var wrap = document.querySelector('[data-item-id="' + input.dataset.item + '"]');
            sendUpdate(input.dataset.item, input.dataset.url, qty, wrap);
        });
    });
})();
</script>
@endpush

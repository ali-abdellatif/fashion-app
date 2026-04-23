@extends('app')
@section('title', __('site.checkout'))
@section('content')

    <!-- page-title -->
    <div class="tf-page-title">
        <div class="container-full">
            <div class="heading text-center">{{ __('site.checkout') }}</div>
        </div>
    </div>
    <!-- /page-title -->
     
<div class="tf-breadcrumb" style="padding-top: 80px;">
    <div class="container">
        <div class="tf-breadcrumb-wrap d-flex justify-content-between flex-wrap align-items-center">
            <div class="tf-breadcrumb-list">
                <a href="{{ route('home') }}" class="text">{{ __('site.home') }}</a>
                <i class="icon icon-arrow-right"></i>
                <a href="{{ route('cart.index') }}" class="text">{{ __('site.shopping-cart') }}</a>
                <i class="icon icon-arrow-right"></i>
                <span class="text">{{ __('site.checkout') }}</span>
            </div>
        </div>
    </div>
</div>

<section class="flat-spacing-11">
    <div class="container">
        <form action="{{ route('checkout.place') }}" method="POST">
        @csrf
        <div class="tf-page-cart-wrap layout-2">

            {{-- ── Left: Billing / Delivery ─────────────────────────────── --}}
            <div class="tf-page-cart-item">

                {{-- Customer info (read-only) --}}
                <h5 class="fw-5 mb_20">{{ __('site.customer-info') }}</h5>
                <div class="box grid-2 mb_20">
                    <fieldset class="fieldset">
                        <label>{{ __('site.full-name') }}</label>
                        <input type="text" value="{{ $customer->name }}" disabled class="tf-field-input tf-input">
                    </fieldset>
                    <fieldset class="fieldset">
                        <label>{{ __('site.phone') }}</label>
                        <input type="text" value="{{ $customer->phone }}" disabled class="tf-field-input tf-input">
                    </fieldset>
                </div>
                <fieldset class="box fieldset mb_30">
                    <label>{{ __('site.email') }}</label>
                    <input type="email" value="{{ $customer->email }}" disabled class="tf-field-input tf-input">
                </fieldset>

                {{-- Saved addresses --}}
                @if($customer->addresses->count())
                <h5 class="fw-5 mb_20">{{ __('site.saved-addresses') }}</h5>
                <div class="mb_20">
                    @foreach($customer->addresses as $addr)
                    <div class="fieldset-radio mb_10">
                        <input type="radio" name="use_address" id="addr-{{ $addr->id }}"
                               class="tf-check addr-radio" value="{{ $addr->id }}"
                               data-governorate="{{ $addr->governorate_id }}"
                               data-city="{{ $addr->city }}"
                               data-district="{{ $addr->district }}"
                               data-street="{{ $addr->street }}"
                               data-building="{{ $addr->building }}"
                               data-floor="{{ $addr->floor }}"
                               data-apartment="{{ $addr->apartment }}"
                               data-postal="{{ $addr->postal_code }}"
                               data-notes="{{ $addr->notes }}"
                               {{ ($defaultAddr && $defaultAddr->id === $addr->id) ? 'checked' : '' }}>
                        <label for="addr-{{ $addr->id }}">
                            <span class="fw-6">{{ $addr->label ?? $addr->governorate?->name }}</span>
                            — {{ $addr->city }}{{ $addr->street ? ', ' . $addr->street : '' }}
                            @if($addr->governorate)
                            <span class="text-muted fs-13">({{ __('site.shipping') }}: {{ number_format($addr->governorate->shipping_price, 2) }} EGP)</span>
                            @endif
                        </label>
                    </div>
                    @endforeach
                    <div class="fieldset-radio mb_10">
                        <input type="radio" name="use_address" id="addr-new" class="tf-check addr-radio" value="">
                        <label for="addr-new">{{ __('site.use-different-address') }}</label>
                    </div>
                </div>
                @endif

                {{-- Delivery address fields --}}
                <h5 class="fw-5 mb_20">{{ __('site.delivery-address') }}</h5>
                <div class="box fieldset mb_15">
                    <label>{{ __('site.governorate') }} <span class="text-danger">*</span></label>
                    <div class="select-custom">
                        <select name="governorate_id" id="checkout-gov" class="tf-select w-100" required>
                            <option value="">— {{ __('site.select-governorate') }} —</option>
                            @foreach($governorates as $gov)
                            <option value="{{ $gov->id }}"
                                    data-shipping="{{ $gov->shipping_price }}"
                                    {{ ($defaultAddr?->governorate_id == $gov->id) ? 'selected' : '' }}>
                                {{ $gov->name }} — {{ number_format($gov->shipping_price, 2) }} EGP
                            </option>
                            @endforeach
                        </select>
                    </div>
                    @error('governorate_id')<p class="text-danger fs-13 mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="box grid-2 mb_15">
                    <fieldset class="fieldset">
                        <label>{{ __('site.city') }} <span class="text-danger">*</span></label>
                        <input type="text" name="city" id="co-city" required
                               value="{{ old('city', $defaultAddr?->city) }}"
                               class="tf-field-input tf-input @error('city') is-invalid @enderror">
                        @error('city')<p class="text-danger fs-13 mt-1">{{ $message }}</p>@enderror
                    </fieldset>
                    <fieldset class="fieldset">
                        <label>{{ __('site.district') }}</label>
                        <input type="text" name="district" id="co-district"
                               value="{{ old('district', $defaultAddr?->district) }}"
                               class="tf-field-input tf-input">
                    </fieldset>
                </div>

                <fieldset class="box fieldset mb_15">
                    <label>{{ __('site.street') }}</label>
                    <input type="text" name="street" id="co-street"
                           value="{{ old('street', $defaultAddr?->street) }}"
                           class="tf-field-input tf-input">
                </fieldset>

                <div class="box grid-2 mb_15">
                    <fieldset class="fieldset">
                        <label>{{ __('site.building') }}</label>
                        <input type="text" name="building" id="co-building"
                               value="{{ old('building', $defaultAddr?->building) }}"
                               class="tf-field-input tf-input">
                    </fieldset>
                    <fieldset class="fieldset">
                        <label>{{ __('site.floor') }}</label>
                        <input type="text" name="floor" id="co-floor"
                               value="{{ old('floor', $defaultAddr?->floor) }}"
                               class="tf-field-input tf-input">
                    </fieldset>
                </div>

                <div class="box grid-2 mb_15">
                    <fieldset class="fieldset">
                        <label>{{ __('site.apartment') }}</label>
                        <input type="text" name="apartment" id="co-apartment"
                               value="{{ old('apartment', $defaultAddr?->apartment) }}"
                               class="tf-field-input tf-input">
                    </fieldset>
                    <fieldset class="fieldset">
                        <label>{{ __('site.postal-code') }}</label>
                        <input type="text" name="postal_code" id="co-postal"
                               value="{{ old('postal_code', $defaultAddr?->postal_code) }}"
                               class="tf-field-input tf-input">
                    </fieldset>
                </div>

                <fieldset class="box fieldset mb_15">
                    <label>{{ __('site.address-notes') }}</label>
                    <textarea name="address_notes" id="co-addr-notes" rows="2"
                              class="tf-field-input tf-input">{{ old('address_notes', $defaultAddr?->notes) }}</textarea>
                </fieldset>

                <fieldset class="box fieldset">
                    <label>{{ __('site.order-note') }}</label>
                    <textarea name="notes" rows="3" class="tf-field-input tf-input"
                              placeholder="{{ __('site.add-order-note') }}">{{ old('notes') }}</textarea>
                </fieldset>
            </div>

            {{-- ── Right: Order summary + place order ──────────────────── --}}
            <div class="tf-page-cart-footer">
                <div class="tf-cart-footer-inner">
                    <h5 class="fw-5 mb_20">{{ __('site.your-order') }}</h5>

                    <div class="widget-wrap-checkout">
                    <ul class="wrap-checkout-product">
                        @foreach($cart->items as $item)
                        <li class="checkout-product-item">
                            <figure class="img-product">
                                <img src="{{ $item->color?->url ?? $item->product->primaryImage()?->url }}"
                                     alt="{{ $item->product->name }}">
                                <span class="quantity">{{ $item->quantity }}</span>
                            </figure>
                            <div class="content">
                                <div class="info">
                                    <p class="name">{{ $item->product->name }}</p>
                                    @if($item->color || $item->size)
                                    <span class="variant">
                                        @if($item->color){{ $item->color->color_name }}@endif
                                        @if($item->color && $item->size) / @endif
                                        @if($item->size){{ $item->size->name }}@endif
                                    </span>
                                    @endif
                                </div>
                                <span class="price">{{ number_format($item->lineTotal(), 2) }} EGP</span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    </div>

                    <div class="tf-mini-cart-line my-3"></div>

                    <div class="d-flex justify-content-between mb-2">
                        <span>{{ __('site.subtotal') }}</span>
                        <span class="fw-6">{{ number_format($cart->subtotal(), 2) }} EGP</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>{{ __('site.shipping') }}</span>
                        <span class="fw-6 co-shipping-display">
                            {{ $shipping > 0 ? number_format($shipping, 2) . ' EGP' : __('site.select-governorate') }}
                        </span>
                    </div>

                    <div class="tf-mini-cart-line my-3"></div>

                    <div class="d-flex justify-content-between mb_20">
                        <h6 class="fw-5">{{ __('site.total') }}</h6>
                        <h6 class="fw-5 co-total-display"
                            data-subtotal="{{ $cart->subtotal() }}">
                            {{ $shipping > 0 ? number_format($cart->subtotal() + $shipping, 2) . ' EGP' : '—' }}
                        </h6>
                    </div>

                    {{-- Payment: COD only --}}
                    <div class="wd-check-payment mb_20">
                        <div class="fieldset-radio">
                            <input type="radio" name="payment_method" id="pay-cod"
                                   class="tf-check" value="cod" checked>
                            <label for="pay-cod">
                                <i class="icon icon-truck me-2"></i>
                                {{ __('site.cash-on-delivery') }}
                            </label>
                        </div>
                    </div>

                    @if($errors->any())
                    <div class="alert alert-danger mb_20 fs-14">
                        <ul class="mb-0 ps-3">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <button type="submit"
                            class="tf-btn radius-3 btn-fill btn-icon animate-hover-btn justify-content-center w-100">
                        {{ __('site.place-order') }}
                    </button>
                </div>
            </div>

        </div>
        </form>
    </div>
</section>

@endsection

@push('scripts')
<script>
(function () {
    var subtotal  = parseFloat(document.querySelector('.co-total-display').dataset.subtotal);
    var govSelect = document.getElementById('checkout-gov');

    function fmt(n) {
        return parseFloat(n).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' EGP';
    }

    function updateShipping() {
        var opt      = govSelect.options[govSelect.selectedIndex];
        var shipping = opt && opt.dataset.shipping ? parseFloat(opt.dataset.shipping) : null;
        var shippingEl = document.querySelector('.co-shipping-display');
        var totalEl    = document.querySelector('.co-total-display');
        if (shipping !== null && !isNaN(shipping)) {
            shippingEl.textContent = fmt(shipping);
            totalEl.textContent    = fmt(subtotal + shipping);
        } else {
            shippingEl.textContent = '{{ __("site.select-governorate") }}';
            totalEl.textContent    = '—';
        }
    }

    govSelect.addEventListener('change', updateShipping);

    // Fill fields when a saved address radio is selected
    document.querySelectorAll('.addr-radio').forEach(function (radio) {
        radio.addEventListener('change', function () {
            if (!this.value) return; // "use different address" — leave fields as-is

            var d = this.dataset;
            document.getElementById('checkout-gov').value = d.governorate || '';
            document.getElementById('co-city').value      = d.city || '';
            document.getElementById('co-district').value  = d.district || '';
            document.getElementById('co-street').value    = d.street || '';
            document.getElementById('co-building').value  = d.building || '';
            document.getElementById('co-floor').value     = d.floor || '';
            document.getElementById('co-apartment').value = d.apartment || '';
            document.getElementById('co-postal').value    = d.postal || '';
            document.getElementById('co-addr-notes').value= d.notes || '';

            // Trigger governorate change to update shipping display
            govSelect.dispatchEvent(new Event('change'));
        });
    });
})();
</script>
@endpush

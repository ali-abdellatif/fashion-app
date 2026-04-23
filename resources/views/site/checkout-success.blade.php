@extends('app')
@section('title', __('site.order-confirmed'))
@section('content')

<div class="tf-breadcrumb" style="padding-top: 80px;">
    <div class="container">
        <div class="tf-breadcrumb-wrap d-flex justify-content-between flex-wrap align-items-center">
            <div class="tf-breadcrumb-list">
                <a href="{{ route('home') }}" class="text">{{ __('site.home') }}</a>
                <i class="icon icon-arrow-right"></i>
                <span class="text">{{ __('site.order-confirmed') }}</span>
            </div>
        </div>
    </div>
</div>

<section class="flat-spacing-11">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                {{-- Success header --}}
                <div class="text-center mb_40">
                    <div class="mb_20">
                        <i class="icon icon-check-circle" style="font-size: 64px; color: #28a745;"></i>
                    </div>
                    <h3 class="fw-6 mb_10">{{ __('site.order-confirmed') }}</h3>
                    <p class="text-muted">{{ __('site.thank-you-message') }}</p>
                </div>

                {{-- Order meta --}}
                <div class="tf-cart-footer-inner mb_30" style="border: 1px solid #e8e8e8; border-radius: 8px; padding: 24px;">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="fw-6">{{ __('site.order-number') }}</span>
                        <span>#{{ $order->id }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="fw-6">{{ __('site.order-date') }}</span>
                        <span>{{ $order->created_at->format('d M Y, H:i') }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="fw-6">{{ __('site.payment') ?? 'Payment' }}</span>
                        <span>{{ __('site.cash-on-delivery') }}</span>
                    </div>
                </div>

                {{-- Delivery address --}}
                <div class="mb_30" style="border: 1px solid #e8e8e8; border-radius: 8px; padding: 24px;">
                    <h6 class="fw-6 mb_15">{{ __('site.delivery-to') }}</h6>
                    <p class="mb-1 fw-6">{{ $order->recipient_name }}</p>
                    <p class="mb-1">{{ $order->recipient_phone }}</p>
                    <p class="mb-1">
                        {{ $order->governorate?->name }}
                        @if($order->city), {{ $order->city }}@endif
                        @if($order->district), {{ $order->district }}@endif
                        @if($order->street), {{ $order->street }}@endif
                        @if($order->building), {{ __('site.building') }} {{ $order->building }}@endif
                        @if($order->floor), {{ __('site.floor') }} {{ $order->floor }}@endif
                        @if($order->apartment), {{ __('site.apartment') }} {{ $order->apartment }}@endif
                    </p>
                    @if($order->address_notes)
                    <p class="text-muted fs-13 mb-0">{{ $order->address_notes }}</p>
                    @endif
                </div>

                {{-- Items --}}
                <div class="mb_30" style="border: 1px solid #e8e8e8; border-radius: 8px; padding: 24px;">
                    <h6 class="fw-6 mb_15">{{ __('site.items-ordered') }}</h6>
                    <ul class="wrap-checkout-product">
                        @foreach($order->items as $item)
                        <li class="checkout-product-item">
                            <div class="content w-100">
                                <div class="info">
                                    <p class="name fw-6">{{ $item->product_name }}</p>
                                    @if($item->color_name || $item->size_name)
                                    <span class="variant text-muted fs-13">
                                        @if($item->color_name){{ $item->color_name }}@endif
                                        @if($item->color_name && $item->size_name) / @endif
                                        @if($item->size_name){{ $item->size_name }}@endif
                                    </span>
                                    @endif
                                    <span class="text-muted fs-13 d-block">
                                        {{ number_format($item->unit_price, 2) }} EGP × {{ $item->quantity }}
                                    </span>
                                </div>
                                <span class="price fw-6">{{ number_format($item->line_total, 2) }} EGP</span>
                            </div>
                        </li>
                        @endforeach
                    </ul>

                    <div class="tf-mini-cart-line my-3"></div>

                    <div class="d-flex justify-content-between mb-2">
                        <span>{{ __('site.subtotal') }}</span>
                        <span class="fw-6">{{ number_format($order->subtotal, 2) }} EGP</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>{{ __('site.shipping') }}</span>
                        <span class="fw-6">{{ number_format($order->shipping, 2) }} EGP</span>
                    </div>

                    <div class="tf-mini-cart-line my-3"></div>

                    <div class="d-flex justify-content-between">
                        <h6 class="fw-6">{{ __('site.total') }}</h6>
                        <h6 class="fw-6">{{ number_format($order->total, 2) }} EGP</h6>
                    </div>
                </div>

                {{-- CTA --}}
                <div class="text-center">
                    <a href="{{ route('shop') }}"
                       class="tf-btn btn-fill animate-hover-btn radius-3 px-5">
                        {{ __('site.continue-shopping') }}
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection

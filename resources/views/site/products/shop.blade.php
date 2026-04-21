@extends('app')
@section('title', __('site.shop'))
@section('content')

<!-- page-title -->
<div class="tf-page-title">
    <div class="container-full">
        <div class="row">
            <div class="col-12">
                <div class="heading text-center">{{ __('site.shop') }}</div>
                <p class="text-center text-2 text_black-2 mt_5">
                    {{ __('site.shop-description') }}
                </p>
            </div>
        </div>
    </div>
</div>
<!-- /page-title -->

@php
    $currentSort     = request('sort', '');
    $currentCategory = request('category', '');
    $currentSizes    = (array) request('size', []);
    $currentColors   = (array) request('color', []);
    $currentMinPrice = request('min_price', $priceMin);
    $currentMaxPrice = request('max_price', $priceMax);

    $sortLabels = [
        ''               => __('Featured'),
        'price-low-high' => __('Price, low to high'),
        'price-high-low' => __('Price, high to low'),
        'a-z'            => __('Alphabetically, A-Z'),
        'z-a'            => __('Alphabetically, Z-A'),
    ];
    $currentSortLabel = $sortLabels[$currentSort] ?? __('Featured');

    $colorBgMap = [
        'beige'  => 'bg_beige',  'black'  => 'bg_dark',    'blue'   => 'bg_blue-2',
        'brown'  => 'bg_brown',  'cream'  => 'bg_cream',   'grey'   => 'bg_grey',
        'green'  => 'bg_green',  'orange' => 'bg_orange',  'pink'   => 'bg_pink',
        'purple' => 'bg_purple', 'red'    => 'bg_red',     'white'  => 'bg_white',
        'yellow' => 'bg_yellow',
    ];
@endphp

<section class="flat-spacing-1">
    <div class="container">

        {{-- Top control bar --}}
        <div class="tf-shop-control grid-3 align-items-center">
            <div class="tf-control-filter">
                <a href="#filterShop" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                   class="tf-btn-filter filterShop">
                    <span class="icon icon-filter"></span>
                    <span class="text fw-4 d-none d-md-inline">{{ __('site.filter') }}</span>
                </a>
            </div>

            <ul class="tf-control-layout d-flex justify-content-center">
                <li class="tf-view-layout-switch sw-layout-list list-layout" data-value-layout="list">
                    <div class="item"><span class="icon icon-list"></span></div>
                </li>
                <li class="tf-view-layout-switch sw-layout-3 active" data-value-layout="tf-col-3">
                    <div class="item"><span class="icon icon-grid-3"></span></div>
                </li>
            </ul>

            <div class="tf-control-sorting d-flex justify-content-end">
                <div class="tf-dropdown-sort" data-bs-toggle="dropdown">
                    <div class="btn-select">
                        <span class="text-sort-value">{{ $currentSortLabel }}</span>
                        <span class="icon icon-arrow-down"></span>
                    </div>
                    <div class="dropdown-menu">
                        @foreach($sortLabels as $value => $label)
                        <div class="select-item {{ $currentSort === $value ? 'active' : '' }}"
                             data-sort-href="{{ request()->fullUrlWithQuery(['sort' => $value ?: null, 'page' => null]) }}">
                            <span class="text-value-item">{{ $label }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="tf-row-flex">

            {{-- Sidebar --}}
            <div class="tf-shop-sidebar sidebar-filter canvas-filter left">
                <div class="canvas-wrapper">
                    <div class="canvas-header d-flex d-xl-none">
                        <div class="filter-icon">
                            <span class="icon icon-filter"></span>
                            <span>{{ __('site.filter') }}</span>
                        </div>
                        <span class="icon-close icon-close-popup close-filter"></span>
                    </div>
                    <div class="canvas-body">

                        {{-- Categories --}}
                        <div class="widget-facet wd-categories">
                            <div class="facet-title" data-bs-target="#shop-categories"
                                 data-bs-toggle="collapse" aria-expanded="true" aria-controls="shop-categories">
                                <span>{{ __('site.categories') }}</span>
                                <span class="icon icon-arrow-up"></span>
                            </div>
                            <div id="shop-categories" class="collapse show">
                                <ul class="list-categoris current-scrollbar mb_36">
                                    <li class="cate-item {{ $currentCategory === '' ? 'current' : '' }}">
                                        <a href="{{ request()->fullUrlWithQuery(['category' => null, 'page' => null]) }}">
                                            <span>{{ __('site.all') }}</span>
                                            <span class="count">({{ $categoryCounts->sum() }})</span>
                                        </a>
                                    </li>
                                    @foreach($categories as $cat)
                                    <li class="cate-item {{ $currentCategory === $cat->slug ? 'current' : '' }}">
                                        <a href="{{ request()->fullUrlWithQuery(['category' => $cat->slug, 'page' => null]) }}">
                                            <span>{{ $cat->name }}</span>
                                            <span class="count">({{ $categoryCounts->get($cat->id, 0) }})</span>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <form action="{{ route('shop') }}" method="GET" id="facet-filter-form" class="facet-filter-form">
                            @if($currentCategory)
                                <input type="hidden" name="category" value="{{ $currentCategory }}">
                            @endif
                            @if($currentSort)
                                <input type="hidden" name="sort" value="{{ $currentSort }}">
                            @endif

                            {{-- Price --}}
                            <div class="widget-facet wrap-price">
                                <div class="facet-title" data-bs-target="#shop-price"
                                     data-bs-toggle="collapse" aria-expanded="true" aria-controls="shop-price">
                                    <span>{{ __('site.price') }}</span>
                                    <span class="icon icon-arrow-up"></span>
                                </div>
                                <div id="shop-price" class="collapse show">
                                    <div class="widget-price filter-price">
                                        <div class="price-val-range" id="price-value-range"
                                             data-min="{{ $priceMin }}" data-max="{{ $priceMax }}"></div>
                                        <div class="box-title-price">
                                            <span class="title-price">{{ __('site.price') }} :</span>
                                            <div class="caption-price">
                                                <div class="price-val" id="price-min-value" data-currency="EGP ">{{ (int)$currentMinPrice }}</div>
                                                <span>-</span>
                                                <div class="price-val" id="price-max-value" data-currency="EGP ">{{ (int)$currentMaxPrice }}</div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="min_price" id="input-min-price" value="{{ $currentMinPrice }}">
                                        <input type="hidden" name="max_price" id="input-max-price" value="{{ $currentMaxPrice }}">
                                    </div>
                                </div>
                            </div>

                            {{-- Colors --}}
                            {{--
                            @if($allColors->isNotEmpty())
                            <div class="widget-facet">
                                <div class="facet-title" data-bs-target="#shop-color"
                                     data-bs-toggle="collapse" aria-expanded="true" aria-controls="shop-color">
                                    <span>{{ __('site.color') }}</span>
                                    <span class="icon icon-arrow-up"></span>
                                </div>
                                <div id="shop-color" class="collapse show">
                                    <ul class="tf-filter-group filter-color current-scrollbar mb_36">
                                        @foreach($allColors as $color)
                                        @php
                                            $colorId = 'color-' . \Illuminate\Support\Str::slug($color->color_name);
                                            $bgClass = $colorBgMap[strtolower($color->color_name)] ?? '';
                                        @endphp
                                        <li class="list-item d-flex gap-12 align-items-center">
                                            <input type="checkbox" name="color[]"
                                                   class="tf-check-color {{ $bgClass }}"
                                                   id="{{ $colorId }}"
                                                   value="{{ $color->color_name }}"
                                                   @if(!$bgClass) style="background-color:{{ $color->color_hex }}" @endif
                                                   {{ in_array($color->color_name, $currentColors) ? 'checked' : '' }}
                                                   onchange="this.form.submit()">
                                            <label for="{{ $colorId }}" class="label">
                                                <span>{{ $color->color_name }}</span>
                                            </label>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif
                            --}}

                            {{-- Sizes --}}
                            @if($allSizes->isNotEmpty())
                            <div class="widget-facet">
                                <div class="facet-title" data-bs-target="#shop-size"
                                     data-bs-toggle="collapse" aria-expanded="true" aria-controls="shop-size">
                                    <span>{{ __('site.size') }}</span>
                                    <span class="icon icon-arrow-up"></span>
                                </div>
                                <div id="shop-size" class="collapse show">
                                    <ul class="tf-filter-group current-scrollbar">
                                        @foreach($allSizes as $size)
                                        <li class="list-item d-flex gap-12 align-items-center">
                                            <input type="checkbox" name="size[]"
                                                   class="tf-check tf-check-size"
                                                   value="{{ $size }}"
                                                   id="size-{{ \Illuminate\Support\Str::slug($size) }}"
                                                   {{ in_array($size, $currentSizes) ? 'checked' : '' }}
                                                   onchange="this.form.submit()">
                                            <label for="size-{{ \Illuminate\Support\Str::slug($size) }}" class="label">
                                                <span>{{ $size }}</span>
                                            </label>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif

                        </form>

                        {{-- Gallery --}}
                        @if($galleryImages->isNotEmpty())
                        <div class="widget-facet" style="margin-top:30px">
                            <div class="facet-title" data-bs-target="#shop-gallery"
                                 data-bs-toggle="collapse" aria-expanded="true" aria-controls="shop-gallery">
                                <span>{{ __('site.gallery') }}</span>
                                <span class="icon icon-arrow-up"></span>
                            </div>
                            <div id="shop-gallery" class="collapse show">
                                <div class="tf-grid-layout tf-col-3 gap-2">
                                    @foreach($galleryImages as $img)
                                    <div>
                                        <img src="{{ $img->url }}" alt="{{ $img->alt ?? '' }}"
                                             class="w-100"
                                             style="aspect-ratio:1;object-fit:cover;border-radius:4px;">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
            {{-- /Sidebar --}}


            {{-- Products area --}}
            <div class="tf-shop-content wrapper-control-shop">

                <div class="meta-filter-shop mb_15">
                    <span id="product-count-grid" class="count-text">
                        {{ $products->total() }} {{ __('site.products') }}
                    </span>
                    <span id="product-count-list" class="count-text" style="display:none">
                        {{ $products->total() }} {{ __('site.products') }}
                    </span>

                    @php
                        $hasFilters = $currentCategory
                            || !empty(array_filter($currentSizes))
                            || !empty(array_filter($currentColors))
                            || request('min_price')
                            || request('max_price');
                    @endphp
                    @if($hasFilters)
                    <div id="applied-filters" class="d-flex flex-wrap gap-1 mt-1">
                        @if($currentCategory)
                            @php $activeCat = $categories->firstWhere('slug', $currentCategory); @endphp
                            @if($activeCat)
                            <a href="{{ request()->fullUrlWithQuery(['category' => null, 'page' => null]) }}"
                               class="badge bg-dark text-white text-decoration-none">
                                {{ $activeCat->name }} &times;
                            </a>
                            @endif
                        @endif
                        @foreach(array_filter($currentSizes) as $activeSize)
                            @php $remaining = array_values(array_diff($currentSizes, [$activeSize])); @endphp
                            <a href="{{ request()->fullUrlWithQuery(['size' => $remaining ?: null, 'page' => null]) }}"
                               class="badge bg-dark text-white text-decoration-none">
                                {{ $activeSize }} &times;
                            </a>
                        @endforeach
                        @foreach(array_filter($currentColors) as $activeColor)
                            @php $remaining = array_values(array_diff($currentColors, [$activeColor])); @endphp
                            <a href="{{ request()->fullUrlWithQuery(['color' => $remaining ?: null, 'page' => null]) }}"
                               class="badge bg-dark text-white text-decoration-none">
                                {{ $activeColor }} &times;
                            </a>
                        @endforeach
                        @if(request('min_price') || request('max_price'))
                        <a href="{{ request()->fullUrlWithQuery(['min_price' => null, 'max_price' => null, 'page' => null]) }}"
                           class="badge bg-dark text-white text-decoration-none">
                            {{ $currentMinPrice }} - {{ $currentMaxPrice }} EGP &times;
                        </a>
                        @endif
                        <a href="{{ route('shop') }}" class="badge bg-danger text-white text-decoration-none">
                            {{ __('Clear All') }}
                        </a>
                    </div>
                    @endif
                </div>

                @if($products->isEmpty())
                    <div class="text-center py-5">
                        <i class="icon icon-bag" style="font-size:64px;opacity:.3"></i>
                        <h5 class="mt-3">{{ __('No products found') }}</h5>
                        <a href="{{ route('shop') }}" class="tf-btn btn-fill animate-hover-btn radius-3 mt-3">
                            {{ __('Clear Filters') }}
                        </a>
                    </div>
                @else

                    <div class="tf-list-layout wrapper-shop" id="listLayout" style="display:none">
                        @foreach($products as $product)
                            @include('site.partials.product-card-list', ['product' => $product])
                        @endforeach
                    </div>

                    <div class="tf-grid-layout wrapper-shop tf-col-3 sm-col-3" id="gridLayout">
                        @foreach($products as $product)
                            @include('site.partials.product-card', ['product' => $product])
                        @endforeach
                    </div>

                    @if($products->hasPages())
                    <ul class="wg-pagination tf-pagination-list justify-content-center mt_40">
                        @if($products->onFirstPage())
                            <li class="disabled">
                                <span class="pagination-link"><span class="icon icon-arrow-left"></span></span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $products->previousPageUrl() }}" class="pagination-link animate-hover-btn">
                                    <span class="icon icon-arrow-left"></span>
                                </a>
                            </li>
                        @endif

                        @foreach($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                        <li class="{{ $page == $products->currentPage() ? 'active' : '' }}">
                            <a href="{{ $url }}" class="pagination-link {{ $page != $products->currentPage() ? 'animate-hover-btn' : '' }}">
                                {{ $page }}
                            </a>
                        </li>
                        @endforeach

                        @if($products->hasMorePages())
                            <li>
                                <a href="{{ $products->nextPageUrl() }}" class="pagination-link animate-hover-btn">
                                    <span class="icon icon-arrow-right"></span>
                                </a>
                            </li>
                        @else
                            <li class="disabled">
                                <span class="pagination-link"><span class="icon icon-arrow-right"></span></span>
                            </li>
                        @endif
                    </ul>
                    @endif

                @endif

            </div>
            {{-- /Products area --}}

        </div>
    </div>
</section>

<div class="btn-sidebar-mobile start-0 filterShop">
    <button class="type-hover">
        <i class="icon-open"></i>
        <span class="fw-5">{{ __('site.filter') }}</span>
    </button>
</div>
<div class="overlay-filter" id="overlay-filter"></div>

@push('scripts')
<script>
(function () {
    // Sort dropdown
    document.querySelectorAll('.tf-dropdown-sort .select-item[data-sort-href]').forEach(function (el) {
        el.addEventListener('click', function () {
            window.location.href = el.dataset.sortHref;
        });
    });

    // Layout switcher
    var listLayout = document.getElementById('listLayout');
    var gridLayout = document.getElementById('gridLayout');
    var countGrid  = document.getElementById('product-count-grid');
    var countList  = document.getElementById('product-count-list');

    document.querySelectorAll('.tf-view-layout-switch').forEach(function (btn) {
        btn.addEventListener('click', function () {
            document.querySelectorAll('.tf-view-layout-switch').forEach(function (b) { b.classList.remove('active'); });
            btn.classList.add('active');

            var isList = btn.dataset.valueLayout === 'list';
            listLayout.style.display = isList ? '' : 'none';
            gridLayout.style.display = isList ? 'none' : '';
            countGrid.style.display  = isList ? 'none' : '';
            countList.style.display  = isList ? '' : 'none';

            if (!isList) {
                gridLayout.classList.remove('tf-col-2', 'tf-col-3', 'tf-col-4');
                gridLayout.classList.add(btn.dataset.valueLayout);
            }
        });
    });

    // Price range slider
    var rangeEl  = document.getElementById('price-value-range');
    var minLabel = document.getElementById('price-min-value');
    var maxLabel = document.getElementById('price-max-value');
    var inputMin = document.getElementById('input-min-price');
    var inputMax = document.getElementById('input-max-price');

    if (rangeEl && typeof noUiSlider !== 'undefined') {
        var min = parseInt(rangeEl.dataset.min) || 0;
        var max = parseInt(rangeEl.dataset.max) || 9999;

        noUiSlider.create(rangeEl, {
            start  : [{{ (int)$currentMinPrice }}, {{ (int)$currentMaxPrice }}],
            connect: true,
            range  : { min: min, max: max },
            step   : 1,
        });

        rangeEl.noUiSlider.on('update', function (values) {
            var lo = Math.round(values[0]);
            var hi = Math.round(values[1]);
            minLabel.textContent = lo;
            maxLabel.textContent = hi;
            inputMin.value = lo;
            inputMax.value = hi;
        });

        rangeEl.noUiSlider.on('change', function () {
            document.getElementById('facet-filter-form').submit();
        });
    }
})();
</script>
@endpush

@endsection

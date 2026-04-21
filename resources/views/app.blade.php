<!DOCTYPE html>

<html>
<head>
@include('site.layouts.head')
</head>

<body class="preload-wrapper popup-loader {{ app()->getLocale() == 'ar' ? 'rtl' : '' }}">

    <!-- preload -->
    <div class="preload preload-container">
        <div class="preload-logo">
            <div class="spinner"></div>
        </div>
    </div>
    <!-- /preload -->
    <div id="wrapper">
        <!-- Top Bar -->
        @include('site.layouts.top-bar')
        <!-- /Top Bar -->
        <!-- Header -->
        @include('site.layouts.header')
        <!-- /Header -->
        @yield('content')
        <!-- Footer -->
        @include('site.layouts.footer')
        <!-- /Footer -->

    </div>



    <!-- gotop -->
    <button id="goTop">
        <span class="border-progress"></span>
        <span class="icon icon-arrow-up"></span>
    </button>
    <!-- /gotop -->

    <!-- toolbar-bottom -->
    <div class="tf-toolbar-bottom type-1150">
        <div class="toolbar-item">
            <a href="#toolbarShopmb" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft">
                <div class="toolbar-icon">
                    <i class="icon-shop"></i>
                </div>
                <div class="toolbar-label">{{__('site.shop')}}</div>
            </a>
        </div>

        <div class="toolbar-item">
            <a href="#canvasSearch" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft">
                <div class="toolbar-icon">
                    <i class="icon-search"></i>
                </div>
                <div class="toolbar-label">Search</div>
            </a>
        </div>
        <div class="toolbar-item">
            <a href="#login" data-bs-toggle="modal">
                <div class="toolbar-icon">
                    <i class="icon-account"></i>
                </div>
                <div class="toolbar-label">Account</div>
            </a>
        </div>
        <div class="toolbar-item">
            <a href="{{route('wishlist.index')}}">
                <div class="toolbar-icon">
                    <i class="icon-heart"></i>
                    <div class="toolbar-count">0</div>
                </div>
                <div class="toolbar-label">{{ __('site.wishlist') }}</div>
            </a>
        </div>
        <div class="toolbar-item">
            <a href="#shoppingCart" data-bs-toggle="modal">
                <div class="toolbar-icon">
                    <i class="icon-bag"></i>
                    <div class="toolbar-count">1</div>
                </div>
                <div class="toolbar-label">{{ __('site.cart') }}</div>
            </a>
        </div>
    </div>
    <!-- /toolbar-bottom -->

    <!-- modalDemo -->
    <!-- <div class="modal fade modalDemo" id="modalDemo">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="header">
                    <h5 class="demo-title">Ultimate HTML Theme</h5>
                    <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                </div>
                <div class="mega-menu">
                    <div class="row-demo">
                        <div class="demo-item">
                            <a href="index.html">
                                <div class="demo-image position-relative">
                                    <img class="lazyload" data-src="images/demo/home-01.jpg"
                                        src="images/demo/home-01.jpg" alt="home-01">
                                    <div class="demo-label">
                                        <span class="demo-new">New</span>
                                        <span>Trend</span>
                                    </div>
                                </div>
                                <span class="demo-name">Home Fashion 01</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-multi-brand.html">
                                <div class="demo-image position-relative">
                                    <img class="lazyload" data-src="images/demo/home-multi-brand.jpg"
                                        src="images/demo/home-multi-brand.jpg" alt="home-multi-brand">
                                    <div class="demo-label">
                                        <span class="demo-new">New</span>
                                        <span class="demo-hot">Hot</span>
                                    </div>
                                </div>
                                <span class="demo-name">Home Multi Brand</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-02.html">
                                <div class="demo-image position-relative">
                                    <img class="lazyload" data-src="images/demo/home-02.jpg"
                                        src="images/demo/home-02.jpg" alt="home-02">
                                    <div class="demo-label">
                                        <span class="demo-hot">Hot</span>
                                    </div>
                                </div>
                                <span class="demo-name">Home Fashion 02</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-03.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-03.jpg"
                                        src="images/demo/home-03.jpg" alt="home-03">
                                </div>
                                <span class="demo-name">Home Fashion 03</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-04.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-04.jpg"
                                        src="images/demo/home-04.jpg" alt="home-04">
                                </div>
                                <span class="demo-name">Home Fashion 04</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-05.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-05.jpg"
                                        src="images/demo/home-05.jpg" alt="home-05">
                                </div>
                                <span class="demo-name">Home Fashion 05</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-06.html">
                                <div class="demo-image position-relative">
                                    <img class="lazyload" data-src="images/demo/home-06.jpg"
                                        src="images/demo/home-06.jpg" alt="home-06">
                                </div>
                                <span class="demo-name">Home Fashion 06</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-drinkwear.html">
                                <div class="demo-image position-relative">
                                    <img class="lazyload" data-src="images/demo/home-drinkwear.png"
                                        src="images/demo/home-drinkwear.png" alt="home-drinkwear">
                                    <div class="demo-label">
                                        <span class="demo-new">New</span>
                                    </div>
                                </div>
                                <span class="demo-name">Home Drinkwear</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-supplement.html">
                                <div class="demo-image position-relative">
                                    <img class="lazyload" data-src="images/demo/home-supplement.png"
                                        src="images/demo/home-supplement.png" alt="home-supplement">
                                    <div class="demo-label">
                                        <span class="demo-new">New</span>
                                    </div>
                                </div>
                                <span class="demo-name">Home Supplement</span>
                            </a>
                        </div>

                        <div class="demo-item">
                            <a href="home-personalized-pod.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-personalized-pod.jpg"
                                        src="images/demo/home-personalized-pod.jpg" alt="home-personalized-pod">
                                </div>
                                <span class="demo-name">Home Personalized Pod</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-pickleball.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-pickleball.png"
                                        src="images/demo/home-pickleball.png" alt="home-pickleball">
                                </div>
                                <span class="demo-name">Home Pickleball</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-ceramic.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-ceramic.png"
                                        src="images/demo/home-ceramic.png" alt="home-ceramic">
                                </div>
                                <span class="demo-name">Home Ceramic</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-food.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-food.png"
                                        src="images/demo/home-food.png" alt="home-food">
                                </div>
                                <span class="demo-name">Home Food</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-camp-and-hike.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-camp-and-hike.png"
                                        src="images/demo/home-camp-and-hike.png" alt="home-camp-and-hike">
                                </div>
                                <span class="demo-name">Home Camp And Hike</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-07.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-07.jpg"
                                        src="images/demo/home-07.jpg" alt="home-07">
                                </div>
                                <span class="demo-name">Home Fashion 07</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-08.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-08.jpg"
                                        src="images/demo/home-08.jpg" alt="home-08">
                                </div>
                                <span class="demo-name">Home Fashion 08</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-skincare.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-skincare.jpg"
                                        src="images/demo/home-skincare.jpg" alt="home-skincare">
                                </div>
                                <span class="demo-name">Home Skincare</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-headphone.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-headphone.jpg"
                                        src="images/demo/home-headphone.jpg" alt="home-headphone">
                                </div>
                                <span class="demo-name">Home Headphone</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-giftcard.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-giftcard.jpg"
                                        src="images/demo/home-giftcard.jpg" alt="home-gift-card">
                                </div>
                                <span class="demo-name">Home Gift Card</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-furniture.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-furniture.jpg"
                                        src="images/demo/home-furniture.jpg" alt="home-furniture">
                                </div>
                                <span class="demo-name">Home Furniture</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-furniture-02.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-furniture2.jpg"
                                        src="images/demo/home-furniture2.jpg" alt="home-furniture-2">
                                </div>
                                <span class="demo-name">Home Furniture 2</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-skateboard.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-skateboard.jpg"
                                        src="images/demo/home-skateboard.jpg" alt="home-skateboard">
                                </div>
                                <span class="demo-name">Home Skateboard</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-stroller.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-stroller.jpg"
                                        src="images/demo/home-stroller.jpg" alt="home-stroller">
                                </div>
                                <span class="demo-name">Home Stroller</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-decor.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-decor.jpg"
                                        src="images/demo/home-decor.jpg" alt="home-decor">
                                </div>
                                <span class="demo-name">Home Decor</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-electronic.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-electronic.jpg"
                                        src="images/demo/home-electronic.jpg" alt="home-electronic">
                                </div>
                                <span class="demo-name">Home Electronic</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-setup-gear.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-setup-gear.jpg"
                                        src="images/demo/home-setup-gear.jpg" alt="home-setup-gear">
                                </div>
                                <span class="demo-name">Home Setup Gear</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-dog-accessories.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-dog-accessories.jpg"
                                        src="images/demo/home-dog-accessories.jpg" alt="home-dog-accessories">
                                </div>
                                <span class="demo-name">Home Dog Accessories</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-kitchen-wear.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-kitchen.jpg"
                                        src="images/demo/home-kitchen.jpg" alt="home-kitchen-wear">
                                </div>
                                <span class="demo-name">Home Kitchen Wear</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-phonecase.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-phonecase.jpg"
                                        src="images/demo/home-phonecase.jpg" alt="home-phonecase">
                                </div>
                                <span class="demo-name">Home Phonecase</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-paddle-boards.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home_paddle_board.jpg"
                                        src="images/demo/home_paddle_board.jpg" alt="home-paddle_board">
                                </div>
                                <span class="demo-name">Home Paddle Boards</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-glasses.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-glasses.jpg"
                                        src="images/demo/home-glasses.jpg" alt="home-glasses">
                                </div>
                                <span class="demo-name">Home Glasses</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-pod-store.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-pod-store.jpg"
                                        src="images/demo/home-pod-store.jpg" alt="home-pod-store">
                                </div>
                                <span class="demo-name">Home POD Store</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-activewear.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-activewear.jpg"
                                        src="images/demo/home-activewear.jpg" alt="home-activewear">
                                </div>
                                <span class="demo-name">Activewear</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-handbag.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-handbag.jpg"
                                        src="images/demo/home-handbag.jpg" alt="home-handbag">
                                </div>
                                <span class="demo-name">Home Handbag</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-tee.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-tee.jpg"
                                        src="images/demo/home-tee.jpg" alt="home-tee">
                                </div>
                                <span class="demo-name">Home Tee</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-sock.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-socks.jpg"
                                        src="images/demo/home-socks.jpg" alt="home-sock">
                                </div>
                                <span class="demo-name">Home Sock</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-jewerly.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-jewelry.jpg"
                                        src="images/demo/home-jewelry.jpg" alt="home-jewelry">
                                </div>
                                <span class="demo-name">Home Jewelry</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-sneaker.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-sneaker.jpg"
                                        src="images/demo/home-sneaker.jpg" alt="home-sneaker">
                                </div>
                                <span class="demo-name">Home Sneaker</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-accessories.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-accessories.jpg"
                                        src="images/demo/home-accessories.jpg" alt="home-accessories">
                                </div>
                                <span class="demo-name">Home Accessories</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-grocery.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-gocery.jpg"
                                        src="images/demo/home-gocery.jpg" alt="home-grocery">
                                </div>
                                <span class="demo-name">Home Grocery</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-baby.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-baby.jpg"
                                        src="images/demo/home-baby.jpg" alt="home-baby">
                                </div>
                                <span class="demo-name">Home Baby</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-cosmetic.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-cosmetic.png"
                                        src="images/demo/home-cosmetic.png" alt="home-cosmetic">
                                </div>
                                <span class="demo-name">Home Cosmetic</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-plant.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-plant.png"
                                        src="images/demo/home-plant.png" alt="home-plant">
                                </div>
                                <span class="demo-name">Home Plant</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-swimwear.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-swimwear.png"
                                        src="images/demo/home-swimwear.png" alt="home-swimwear">
                                </div>
                                <span class="demo-name">Home Swimwear</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-electric-bike.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-electric-bike.png"
                                        src="images/demo/home-electric-bike.png" alt="home-electric-bike">
                                </div>
                                <span class="demo-name">Home Electric Bike</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-footwear.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-footwear.jpg"
                                        src="images/demo/home-footwear.jpg" alt="home-footwear">
                                </div>
                                <span class="demo-name">Home Footwear</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-book-store.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-bookstore.png"
                                        src="images/demo/home-bookstore.png" alt="home-bookstore">
                                </div>
                                <span class="demo-name">Home Bookstore</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-gaming-accessories.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-gaming-accessories.png"
                                        src="images/demo/home-gaming-accessories.png" alt="home-gaming-accessories">
                                </div>
                                <span class="demo-name">Home Gaming Accessories</span>
                            </a>
                        </div>
                        <div class="demo-item">
                            <a href="home-parallax.html">
                                <div class="demo-image">
                                    <img class="lazyload" data-src="images/demo/home-skincare.jpg"
                                        src="images/demo/home-skincare.jpg" alt="home-skincare">
                                </div>
                                <span class="demo-name">Home Parallax</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> -->
    <!-- /modalDemo -->

    <!-- mobile menu -->
    <div class="offcanvas offcanvas-start canvas-mb" id="mobileMenu">
        <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
        <div class="mb-canvas-content">
            <div class="mb-body">
                <ul class="nav-ul-mb" id="wrapper-menu-navigation">
                    <li class="nav-mb-item">
                        <a href="{{route('home')}}" class="collapsed mb-menu-link current" data-bs-toggle="collapse"
                            aria-expanded="true">
                            <span>{{ __('site.home') }}</span>
                        </a>
                    </li>
                    <li class="nav-mb-item">
                        <a href="{{ route('shop') }}" class="collapsed mb-menu-link current" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="dropdown-menu-two">
                            <span>{{ __('site.shop') }}</span>
                        </a>
                    </li>
                    <!-- <li class="nav-mb-item">
                        <a href="#dropdown-menu-three" class="collapsed mb-menu-link current" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="dropdown-menu-three">
                            <span>Products</span>
                            <span class="btn-open-sub"></span>
                        </a>
                        <div id="dropdown-menu-three" class="collapse">
                            <ul class="sub-nav-menu" id="sub-menu-navigation1">
                                <li>
                                    <a href="#sub-product-one" class="sub-nav-link collapsed" data-bs-toggle="collapse"
                                        aria-expanded="true" aria-controls="sub-product-one">
                                        <span>Product layouts</span>
                                        <span class="btn-open-sub"></span>
                                    </a>
                                    <div id="sub-product-one" class="collapse">
                                        <ul class="sub-nav-menu sub-menu-level-2">
                                            <li><a href="product-detail.html" class="sub-nav-link">Product default</a>
                                            </li>
                                            <li><a href="product-grid-1.html" class="sub-nav-link">Product grid 1</a>
                                            </li>
                                            <li><a href="product-grid-2.html" class="sub-nav-link">Product grid 2</a>
                                            </li>
                                            <li><a href="product-stacked.html" class="sub-nav-link">Product stacked</a>
                                            </li>
                                            <li><a href="product-right-thumbnails.html" class="sub-nav-link">Product
                                                    right thumbnails</a></li>
                                            <li><a href="product-bottom-thumbnails.html" class="sub-nav-link">Product
                                                    bottom thumbnails</a></li>
                                            <li><a href="product-drawer-sidebar.html" class="sub-nav-link">Product
                                                    drawer sidebar</a></li>
                                            <li><a href="product-description-accordion.html"
                                                    class="sub-nav-link">Product description accordion</a></li>
                                            <li><a href="product-description-list.html" class="sub-nav-link">Product
                                                    description list</a></li>
                                            <li><a href="product-description-vertical.html" class="sub-nav-link">Product
                                                    description vertical</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="#sub-product-two" class="sub-nav-link collapsed" data-bs-toggle="collapse"
                                        aria-expanded="true" aria-controls="sub-product-two">
                                        <span>Product details</span>
                                        <span class="btn-open-sub"></span>
                                    </a>
                                    <div id="sub-product-two" class="collapse">
                                        <ul class="sub-nav-menu sub-menu-level-2">
                                            <li><a href="product-inner-zoom.html" class="sub-nav-link">Product inner
                                                    zoom</a></li>
                                            <li><a href="product-zoom-magnifier.html" class="sub-nav-link">Product zoom
                                                    magnifier</a></li>
                                            <li><a href="product-no-zoom.html" class="sub-nav-link">Product no zoom</a>
                                            </li>
                                            <li><a href="product-photoswipe-popup.html" class="sub-nav-link">Product
                                                    photoswipe popup</a></li>
                                            <li><a href="product-zoom-popup.html" class="sub-nav-link">Product external
                                                    zoom and photoswipe popup</a></li>
                                            <li><a href="product-video.html" class="sub-nav-link">Product video</a></li>
                                            <li><a href="product-3d.html" class="sub-nav-link">Product 3D, AR models</a>
                                            </li>
                                            <li><a href="product-options-customizer.html" class="sub-nav-link">Product
                                                    options & customizer</a></li>
                                            <li><a href="product-advanced-types.html" class="sub-nav-link">Advanced
                                                    product types</a></li>
                                            <li><a href="product-giftcard.html" class="sub-nav-link">Recipient
                                                    information form for gift card products</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="#sub-product-three" class="sub-nav-link collapsed"
                                        data-bs-toggle="collapse" aria-expanded="true"
                                        aria-controls="sub-product-three">
                                        <span>Product swatchs</span>
                                        <span class="btn-open-sub"></span>
                                    </a>
                                    <div id="sub-product-three" class="collapse">
                                        <ul class="sub-nav-menu sub-menu-level-2">
                                            <li><a href="product-color-swatch.html" class="sub-nav-link">Product color
                                                    swatch</a></li>
                                            <li><a href="product-rectangle.html" class="sub-nav-link">Product
                                                    rectangle</a></li>
                                            <li><a href="product-rectangle-color.html" class="sub-nav-link">Product
                                                    rectangle color</a></li>
                                            <li><a href="product-swatch-image.html" class="sub-nav-link">Product swatch
                                                    image</a></li>
                                            <li><a href="product-swatch-image-rounded.html" class="sub-nav-link">Product
                                                    swatch image rounded</a></li>
                                            <li><a href="product-swatch-dropdown.html" class="sub-nav-link">Product
                                                    swatch dropdown</a></li>
                                            <li><a href="product-swatch-dropdown-color.html"
                                                    class="sub-nav-link">Product swatch dropdown color</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="#sub-product-four" class="sub-nav-link collapsed" data-bs-toggle="collapse"
                                        aria-expanded="true" aria-controls="sub-product-four">
                                        <span>Product features</span>
                                        <span class="btn-open-sub"></span>
                                    </a>
                                    <div id="sub-product-four" class="collapse">
                                        <ul class="sub-nav-menu sub-menu-level-2">
                                            <li><a href="product-frequently-bought-together.html"
                                                    class="sub-nav-link">Frequently bought together</a></li>
                                            <li><a href="product-frequently-bought-together-2.html"
                                                    class="sub-nav-link">Frequently bought together 2</a></li>
                                            <li><a href="product-upsell-features.html" class="sub-nav-link">Product
                                                    upsell features</a></li>
                                            <li><a href="product-pre-orders.html" class="sub-nav-link">Product
                                                    pre-orders</a></li>
                                            <li><a href="product-notification.html" class="sub-nav-link">Back in stock
                                                    notification</a></li>
                                            <li><a href="product-pickup.html" class="sub-nav-link">Product pickup</a>
                                            </li>
                                            <li><a href="product-images-grouped.html" class="sub-nav-link">Variant
                                                    images grouped</a></li>
                                            <li><a href="product-complimentary.html" class="sub-nav-link">Complimentary
                                                    products</a></li>
                                            <li><a href="product-quick-order-list.html"
                                                    class="sub-nav-link line-clamp">Quick order list<div
                                                        class="demo-label"><span class="demo-new">New</span></div></a>
                                            </li>
                                            <li><a href="product-detail-volume-discount.html"
                                                    class="sub-nav-link line-clamp">Volume Discount<div
                                                        class="demo-label"><span class="demo-new">New</span></div></a>
                                            </li>
                                            <li><a href="product-detail-volume-discount-grid.html"
                                                    class="sub-nav-link line-clamp">Volume Discount Grid<div
                                                        class="demo-label"><span class="demo-new">New</span></div></a>
                                            </li>
                                            <li><a href="product-detail-buyx-gety.html"
                                                    class="sub-nav-link line-clamp">Buy X Get Y<div class="demo-label">
                                                        <span class="demo-new">New</span>
                                                    </div></a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-mb-item">
                        <a href="#dropdown-menu-four" class="collapsed mb-menu-link current" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="dropdown-menu-four">
                            <span>Pages</span>
                            <span class="btn-open-sub"></span>
                        </a>
                        <div id="dropdown-menu-four" class="collapse">
                            <ul class="sub-nav-menu" id="sub-menu-navigation2">
                                <li><a href="about-us.html" class="sub-nav-link">About us</a></li>
                                <li><a href="brands.html" class="sub-nav-link line-clamp">Brands<div class="demo-label">
                                            <span class="demo-new">New</span>
                                        </div></a></li>
                                <li><a href="brands-v2.html" class="sub-nav-link">Brands V2</a></li>
                                <li><a href="contact-1.html" class="sub-nav-link">Contact 1</a></li>
                                <li><a href="contact-2.html" class="sub-nav-link">Contact 2</a></li>
                                <li><a href="faq-1.html" class="sub-nav-link">FAQ 01</a></li>
                                <li><a href="faq-2.html" class="sub-nav-link">FAQ 02</a></li>
                                <li><a href="our-store.html" class="sub-nav-link">Our store</a></li>
                                <li><a href="store-locations.html" class="sub-nav-link">Store locator</a></li>
                                <li><a href="timeline.html" class="sub-nav-link line-clamp">Timeline<div
                                            class="demo-label"><span class="demo-new">New</span></div></a></li>
                                <li><a href="view-cart.html" class="sub-nav-link line-clamp">View cart</a></li>
                                <li><a href="checkout.html" class="sub-nav-link line-clamp">Check out</a></li>
                                <li><a href="payment-confirmation.html" class="sub-nav-link line-clamp">Payment
                                        Confirmation</a></li>
                                <li><a href="payment-failure.html" class="sub-nav-link line-clamp">Payment Failure</a>
                                </li>
                                <li><a href="#sub-account" class="sub-nav-link collapsed" data-bs-toggle="collapse"
                                        aria-expanded="true" aria-controls="sub-account">
                                        <span>My Account</span>
                                        <span class="btn-open-sub"></span>
                                    </a>
                                    <div id="sub-account" class="collapse">
                                        <ul class="sub-nav-menu sub-menu-level-2">
                                            <li><a href="my-account.html" class="sub-nav-link">My account</a></li>
                                            <li><a href="my-account-orders.html" class="sub-nav-link">My order</a></li>
                                            <li><a href="my-account-orders-details.html" class="sub-nav-link">My order
                                                    details</a></li>
                                            <li><a href="my-account-address.html" class="sub-nav-link">My address</a>
                                            </li>
                                            <li><a href="my-account-edit.html" class="sub-nav-link">My account
                                                    details</a></li>
                                            <li><a href="my-account-wishlist.html" class="sub-nav-link">My wishlist</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a href="invoice.html" class="sub-nav-link line-clamp">Invoice</a></li>
                                <li><a href="404.html" class="sub-nav-link line-clamp">404</a></li>
                                <li><a href="icons.html" class="sub-nav-link line-clamp">Icons</a></li>
                            </ul>
                        </div>

                    </li>
                    <li class="nav-mb-item">
                        <a href="#dropdown-menu-five" class="collapsed mb-menu-link current" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="dropdown-menu-five">
                            <span>Blog</span>
                            <span class="btn-open-sub"></span>
                        </a>
                        <div id="dropdown-menu-five" class="collapse">
                            <ul class="sub-nav-menu">
                                <li><a href="blog-grid.html" class="sub-nav-link">Grid layout</a></li>
                                <li><a href="blog-sidebar-left.html" class="sub-nav-link">Left sidebar</a></li>
                                <li><a href="blog-sidebar-right.html" class="sub-nav-link">Right sidebar</a></li>
                                <li><a href="blog-list.html" class="sub-nav-link">Blog list</a></li>
                                <li><a href="blog-detail.html" class="sub-nav-link">Single Post</a></li>
                            </ul>
                        </div>

                    </li> -->
                </ul>
                <div class="mb-other-content">
                    <div class="d-flex group-icon">
                        <a href="" class="site-nav-icon"><i class="icon icon-heart"></i>Wishlist</a>
                        <a href="#canvasSearch" class="site-nav-icon" data-bs-toggle="offcanvas" aria-controls="canvasSearch"><i class="icon icon-search"></i>Search</a>
                    </div>
                    <div class="mb-notice">
                        <a href="contact-1.html" class="text-need">Need help ?</a>
                    </div>
                    <ul class="mb-info">
                        <li>{{ $settings->address }}</li>
                        <li><a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a></li>
                        <li><a href="tel:{{ $settings->phone_primary }}">{{ $settings->phone_primary }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="mb-bottom">
                <li class="nav-account">
                                @auth('customer')
                                    <div class="dropdown">
                                        <a href="#" class="nav-icon-item" data-bs-toggle="dropdown">
                                            <i class="icon icon-account"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><span class="dropdown-item-text fw-6">{{ auth('customer')->user()->name }}</span></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <form method="POST" action="{{ route('customer.logout') }}">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item">
                                                        <i class="icon icon-logout me-2"></i> {{ __('site.logout') }}
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                @else
                                    <a href="#login" data-bs-toggle="modal" class="nav-icon-item">
                                        <i class="icon icon-account"></i>
                                    </a>
                                @endauth
                            </li>
                <div class="bottom-bar-language">
                     <div class="tf-languages">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                @if(app()->getLocale() == $localeCode)
                                    @continue
                                @endif
                                <a class="cart-icon" rel="alternate" hreflang="{{ $localeCode }}"
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode) }}">
                                    {{ $properties['native'] }}
                                </a>
                            @endforeach
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /mobile menu -->



    <!-- canvasSearch -->
    <div class="offcanvas offcanvas-end canvas-search" id="canvasSearch">
        <div class="canvas-wrapper">
            <header class="tf-search-head">
                <div class="title fw-5">
                    Search our site
                    <div class="close">
                        <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
                    </div>
                </div>
                <div class="tf-search-sticky">
                    <form class="tf-mini-search-frm">
                        <fieldset class="text">
                            <input type="text" placeholder="Search" class="" name="text" tabindex="0" value=""
                                aria-required="true" required="">
                        </fieldset>
                        <button class="" type="submit"><i class="icon-search"></i></button>
                    </form>
                </div>
            </header>
            <div class="canvas-body p-0">
                <div class="tf-search-content">
                    <div class="tf-cart-hide-has-results">
                        <div class="tf-col-quicklink">
                            <div class="tf-search-content-title fw-5">Quick link</div>
                            <ul class="tf-quicklink-list">
                                <li class="tf-quicklink-item">
                                    <a href="shop-default.html" class="">Fashion</a>
                                </li>
                                <li class="tf-quicklink-item">
                                    <a href="shop-default.html" class="">Men</a>
                                </li>
                                <li class="tf-quicklink-item">
                                    <a href="shop-default.html" class="">Women</a>
                                </li>
                                <li class="tf-quicklink-item">
                                    <a href="shop-default.html" class="">Accessories</a>
                                </li>
                            </ul>
                        </div>
                        <!-- <div class="tf-col-content">
                            <div class="tf-search-content-title fw-5">Need some inspiration?</div>
                            <div class="tf-search-hidden-inner">
                                <div class="tf-loop-item">
                                    <div class="image">
                                        <a href="product-detail.html">
                                            <img src="images/products/white-3.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <a href="product-detail.html">Cotton jersey top</a>
                                        <div class="tf-product-info-price">
                                            <div class="compare-at-price">$10.00</div>
                                            <div class="price-on-sale fw-6">$8.00</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-loop-item">
                                    <div class="image">
                                        <a href="product-detail.html">
                                            <img src="images/products/white-2.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <a href="product-detail.html">Mini crossbody bag</a>
                                        <div class="tf-product-info-price">
                                            <div class="price fw-6">$18.00</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-loop-item">
                                    <div class="image">
                                        <a href="product-detail.html">
                                            <img src="images/products/white-1.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <a href="product-detail.html">Oversized Printed T-shirt</a>
                                        <div class="tf-product-info-price">
                                            <div class="price fw-6">$18.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /canvasSearch -->

    <!-- toolbarShopmb -->
    <div class="offcanvas offcanvas-start canvas-mb toolbar-shop-mobile" id="toolbarShopmb">
        <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
        <div class="mb-canvas-content">
            <div class="mb-body">
                <ul class="nav-ul-mb" id="wrapper-menu-navigation">
                    @foreach($categories as $category)
                    <li class="nav-mb-item">
                        <a href="{{ route('shop', $category->slug) }}" class="tf-category-link mb-menu-link">
                            <div class="image">
                                <img src="{{ Storage::disk('public')->url($category->image) }}" alt="">
                            </div>
                            <span>{{$category->name}}</span>
                        </a>
                    </li>
                    @endforeach

                </ul>
            </div>
            <div class="mb-bottom">
                <a href="{{ route('shop') }}}" class="tf-btn fw-5 btn-line">{{__('site.view-all-collection')}}<i
                        class="icon icon-arrow1-top-left"></i></a>
            </div>
        </div>
    </div>
    <!-- /toolbarShopmb -->

    <!-- modal login -->

    <!-- modal login -->
    <div class="modal modalCentered fade form-sign-in modal-part-content" id="login">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="header">
                    <div class="demo-title">{{ __('site.login') }}</div>
                    <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                </div>
                <div class="tf-login-form">
                    @if($errors->has('customer_login'))
                        <div class="alert alert-danger mb-3">{{ $errors->first('customer_login') }}</div>
                    @endif
                    @if(session('customer_success'))
                        <div class="alert alert-success mb-3">{{ session('customer_success') }}</div>
                    @endif
                    <form method="POST" action="{{ route('customer.login') }}">
                        @csrf
                        <div class="tf-field style-1">
                            <input class="tf-field-input tf-input" placeholder=" " type="text"
                                name="login" id="login-field" value="{{ old('login') }}" required>
                            <label class="tf-field-label" for="login-field">{{ __('site.user-or-phone') }} *</label>
                        </div>
                        <div class="tf-field style-1">
                            <input class="tf-field-input tf-input" placeholder=" " type="password"
                                name="password" id="login-password" required>
                            <label class="tf-field-label" for="login-password">{{ __('site.password') }} *</label>
                        </div>
                        <div class="bottom">
                            <div class="w-100">
                                <button type="submit"
                                    class="tf-btn btn-fill animate-hover-btn radius-3 w-100 justify-content-center">
                                    <span>{{ __('site.login') }}</span>
                                </button>
                            </div>
                            <div class="w-100">
                                <a href="#register" data-bs-toggle="modal" class="btn-link fw-6 w-100 link">
                                    {{ __('site.new-customer-create-your-account') }}
                                    <i class="icon icon-arrow1-top-left"></i>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- modal register -->
    <div class="modal modalCentered fade form-sign-in modal-part-content" id="register">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="header">
                    <div class="demo-title">{{ __('site.register') }}</div>
                    <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                </div>
                <div class="tf-login-form">
                    @if($errors->hasAny(['name','username','email','phone','password','governorate_id','street']))
                        <div class="alert alert-danger mb-3">
                            <ul class="mb-0 ps-3">
                                @foreach(['name','username','email','phone','password','governorate_id','street'] as $f)
                                    @error($f)<li>{{ $message }}</li>@enderror
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('customer.register') }}">
                        @csrf
                        <div class="tf-field style-1">
                            <input class="tf-field-input tf-input" placeholder=" " type="text"
                                name="name" id="reg-name" value="{{ old('name') }}" required>
                            <label class="tf-field-label" for="reg-name">{{ __('site.full-name') }} *</label>
                        </div>
                        <div class="tf-field style-1">
                            <input class="tf-field-input tf-input" placeholder=" " type="text"
                                name="username" id="reg-username" value="{{ old('username') }}" required>
                            <label class="tf-field-label" for="reg-username">{{ __('site.username') }} *</label>
                        </div>
                        <div class="tf-field style-1">
                            <input class="tf-field-input tf-input" placeholder=" " type="email"
                                name="email" id="reg-email" value="{{ old('email') }}" required>
                            <label class="tf-field-label" for="reg-email">{{ __('site.email') }} *</label>
                        </div>
                        <div class="tf-field style-1">
                            <input class="tf-field-input tf-input" placeholder=" " type="tel"
                                name="phone" id="reg-phone" value="{{ old('phone') }}" required>
                            <label class="tf-field-label" for="reg-phone">{{ __('site.phone') }} *</label>
                        </div>
                        <div class="tf-field style-1">
                            <input class="tf-field-input tf-input" placeholder=" " type="password"
                                name="password" id="reg-password" required>
                            <label class="tf-field-label" for="reg-password">{{ __('site.password') }} *</label>
                        </div>
                        <div class="tf-field style-1">
                            <input class="tf-field-input tf-input" placeholder=" " type="password"
                                name="password_confirmation" id="reg-password-confirm" required>
                            <label class="tf-field-label" for="reg-password-confirm">{{ __('site.password-confirmation') }} *</label>
                        </div>

                        {{-- Address --}}
                        <div class="fs-14 fw-6 mt-3 mb-2">{{ __('site.address') }}</div>
                        <div class="mb-3">
                            <label class="fs-14 fw-5 mb-1 d-block" for="reg-governorate">{{ __('site.governorate') }} *</label>
                            <select name="governorate_id" id="reg-governorate" required style="width:100%">
                                <option value=""></option>
                                @foreach(\App\Models\Governorate::where('is_active', true)->get() as $gov)
                                    <option value="{{ $gov->id }}" {{ old('governorate_id') == $gov->id ? 'selected' : '' }}>
                                        {{ $gov->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="tf-field style-1">
                            <input class="tf-field-input tf-input" placeholder=" " type="text"
                                name="city" id="reg-city" value="{{ old('city') }}">
                            <label class="tf-field-label" for="reg-city">{{ __('site.city') }}</label>
                        </div>
                        <div class="tf-field style-1">
                            <input class="tf-field-input tf-input" placeholder=" " type="text"
                                name="street" id="reg-street" value="{{ old('street') }}" required>
                            <label class="tf-field-label" for="reg-street">{{ __('site.street') }} *</label>
                        </div>
                        <div class="tf-field style-1">
                            <input class="tf-field-input tf-input" placeholder=" " type="text"
                                name="building" id="reg-building" value="{{ old('building') }}">
                            <label class="tf-field-label" for="reg-building">{{ __('site.building') }}</label>
                        </div>
                        <div class="tf-field style-1">
                            <input class="tf-field-input tf-input" placeholder=" " type="text"
                                name="apartment" id="reg-apartment" value="{{ old('apartment') }}">
                            <label class="tf-field-label" for="reg-apartment">{{ __('site.apartment') }}</label>
                        </div>

                        <div class="bottom">
                            <div class="w-100">
                                <button type="submit"
                                    class="tf-btn btn-fill animate-hover-btn radius-3 w-100 justify-content-center">
                                    <span>{{ __('site.register') }}</span>
                                </button>
                            </div>
                            <div class="w-100">
                                <a href="#login" data-bs-toggle="modal" class="btn-link fw-6 w-100 link">
                                    {{ __('site.already-have-account') }}
                                    <i class="icon icon-arrow1-top-left"></i>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /modal login/register -->

    <!-- shoppingCart -->
    <div class="modal fullRight fade modal-shopping-cart" id="shoppingCart">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="header">
                    <div class="title fw-5">{{ __('site.shopping-cart') }} <span class="cart-count-badge badge bg-dark ms-1" style="{{ auth('customer')->check() ? '' : 'display:none' }}">0</span></div>
                    <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                </div>
                <div class="wrap" id="mini-cart-wrap">
                    <div id="mini-cart-content">
                        <div class="text-center py-5"><div class="spinner-border" role="status"></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /shoppingCart -->


    <!-- modal quick_add -->
    <div class="modal fade modalDemo popup-quickadd" id="quick_add">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="header">
                    <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                </div>
                <div class="wrap" id="quick-add-body">
                    <div class="text-center py-5"><div class="spinner-border" role="status"></div></div>
                </div>
            </div>
        </div>
    </div>
    <!-- /modal quick_add -->

    <!-- modal quick_view -->
    <div class="modal fade modalDemo popup-quickview" id="quick_view">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="header">
                    <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                </div>
                <div class="wrap" id="quick-view-body">
                    <div class="text-center py-5"><div class="spinner-border" role="status"></div></div>
                </div>
            </div>
        </div>
    </div>
    <!-- /modal quick_view -->


    <!-- modal find_size -->
    <div class="modal fade modalDemo tf-product-modal popup-findsize" id="find_size">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="header">
                    <div class="demo-title">Size chart</div>
                    <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                </div>
                <div class="tf-rte">
                    <div class="tf-table-res-df">
                        <h6>Size guide</h6>
                        <table class="tf-sizeguide-table">
                            <thead>
                                <tr>
                                    <th>Size</th>
                                    <th>US</th>
                                    <th>Bust</th>
                                    <th>Waist</th>
                                    <th>Low Hip</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>XS</td>
                                    <td>2</td>
                                    <td>32</td>
                                    <td>24 - 25</td>
                                    <td>33 - 34</td>
                                </tr>
                                <tr>
                                    <td>S</td>
                                    <td>4</td>
                                    <td>34 - 35</td>
                                    <td>26 - 27</td>
                                    <td>35 - 26</td>
                                </tr>
                                <tr>
                                    <td>M</td>
                                    <td>6</td>
                                    <td>36 - 37</td>
                                    <td>28 - 29</td>
                                    <td>38 - 40</td>
                                </tr>
                                <tr>
                                    <td>L</td>
                                    <td>8</td>
                                    <td>38 - 29</td>
                                    <td>30 - 31</td>
                                    <td>42 - 44</td>
                                </tr>
                                <tr>
                                    <td>XL</td>
                                    <td>10</td>
                                    <td>40 - 41</td>
                                    <td>32 - 33</td>
                                    <td>45 - 47</td>
                                </tr>
                                <tr>
                                    <td>XXL</td>
                                    <td>12</td>
                                    <td>42 - 43</td>
                                    <td>34 - 35</td>
                                    <td>48 - 50</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tf-page-size-chart-content">
                        <div>
                            <h6>Measuring Tips</h6>
                            <div class="title">Bust</div>
                            <p>Measure around the fullest part of your bust.</p>
                            <div class="title">Waist</div>
                            <p>Measure around the narrowest part of your torso.</p>
                            <div class="title">Low Hip</div>
                            <p class="mb-0">With your feet together measure around the fullest part of your hips/rear.
                            </p>
                        </div>
                        <div>
                            <!-- <img class="sizechart lazyload" data-src="images/shop/products/size_chart2.jpg"
                                src="images/shop/products/size_chart2.jpg" alt=""> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /modal find_size -->

    <!-- auto popup  -->
    <div class="modal modalCentered fade auto-popup modal-newleter">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-top">
                    <!-- <img class="lazyload" data-src="images/item/banner-newleter.jpg" src="images/item/banner-newleter.jpg" alt="home-01"> -->
                    <span class="icon icon-close btn-hide-popup" data-bs-dismiss="modal"></span>
                </div>
                <div class="modal-bottom">
                    <h4 class="text-center">Don’t mis out</h4>
                    <h6 class="text-center">Be the first one to get the new product at early bird prices.</h6>
                    <div class="sib-form">
                        <div id="sib-form-container" class="sib-form-container">
                            <div id="error-message" class="sib-form-message-panel">
                                <div class="sib-form-message-panel__text sib-form-message-panel__text--center">
                                    <span class="sib-form-message-panel__inner-text">
                                        Your subscription could not be saved. Please try again.
                                    </span>
                                </div>
                            </div>
                            <div id="success-message" class="sib-form-message-panel">
                                <div class="sib-form-message-panel__text sib-form-message-panel__text--center">
                                    <span class="sib-form-message-panel__inner-text">
                                        Your subscription has been successful.
                                    </span>
                                </div>
                            </div>
                            <div id="sib-container" class="sib-container--large sib-container--vertical">
                                <form id="sib-form" method="POST" class="form-newsletter"
                                    action=""
                                    data-type="subscription">
                                    <div>
                                        <div class="sib-form-block">
                                            <p></p>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="sib-form-block">
                                            <div class="sib-text-form-block">
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="sib-input sib-form-block">
                                            <div class="form__entry entry_block">
                                                <div class="form__label-row ">
                                                    <label class="entry__label" for="EMAIL">
                                                    </label>
                                                    <div class="entry__field">
                                                        <input class="input " type="text" id="EMAIL" name="EMAIL" autocomplete="off"
                                                            placeholder="Email *" data-required="true" required />
                                                    </div>
                                                </div>
                                                <label class="entry__error entry__error--primary"></label>
                                                <label class="entry__specification">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="sib-optin sib-form-block">
                                            <div class="form__entry entry_mcq">
                                                <div class="form__label-row ">
                                                    <div class="entry__choice">
                                                        <label>
                                                            <input type="checkbox" class="input_replaced" value="1" id="OPT_IN"
                                                                name="OPT_IN" />
                                                            <span class="checkbox checkbox_tick_positive"></span>
                                                            <span>
                                                                <p></p>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <label class="entry__error entry__error--primary">
                                                </label>
                                                <label class="entry__specification">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="sib-form-block">
                                            <button
                                                class="sib-form-block__button sib-form-block__button-with-loader tf-btn btn-fill radius-3 animate-hover-btn w-100 justify-content-center"
                                                form="sib-form" type="submit">
                                                <svg class="icon clickable__icon progress-indicator__icon sib-hide-loader-icon"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M460.116 373.846l-20.823-12.022c-5.541-3.199-7.54-10.159-4.663-15.874 30.137-59.886 28.343-131.652-5.386-189.946-33.641-58.394-94.896-95.833-161.827-99.676C261.028 55.961 256 50.751 256 44.352V20.309c0-6.904 5.808-12.337 12.703-11.982 83.556 4.306 160.163 50.864 202.11 123.677 42.063 72.696 44.079 162.316 6.031 236.832-3.14 6.148-10.75 8.461-16.728 5.01z" />
                                                </svg>
                                                Keep me updated
                                            </button>
                                        </div>
                                    </div>
                                    <input type="text" name="email_address_check" value="" class="input--hidden">
                                    <input type="hidden" name="locale" value="en">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="#" data-bs-dismiss="modal" class="tf-btn btn-line fw-6 btn-hide-popup">Not interested</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /auto popup  -->


@include('site.layouts.scripts')

    @auth('customer')
    <script>
    (function () {
        var miniCartUrl = '{{ route("cart.mini") }}';
        var cartPageUrl = '{{ route("cart.index") }}';
        var csrf = '{{ csrf_token() }}';

        function renderMiniCart(data) {
            var el = document.getElementById('mini-cart-content');
            if (!el) return;

            // update all badges
            document.querySelectorAll('.cart-count-badge').forEach(function (b) {
                b.textContent = data.count;
                b.style.display = data.count > 0 ? '' : 'none';
            });

            if (data.items.length === 0) {
                el.innerHTML = '<div class="text-center py-5">'
                    + '<i class="icon icon-bag" style="font-size:48px"></i>'
                    + '<p class="mt-3">{{ __("Your cart is empty") }}</p>'
                    + '</div>';
                return;
            }

            var itemsHtml = data.items.map(function (item) {
                var variant = [item.color, item.size].filter(Boolean).join(' / ');
                return '<div class="tf-mini-cart-item" data-item-id="' + item.id + '">'
                    + '<div class="tf-mini-cart-image"><a href="' + item.url + '"><img src="' + item.image + '" alt="' + item.name + '"></a></div>'
                    + '<div class="tf-mini-cart-info">'
                    + '<a class="title link" href="' + item.url + '">' + item.name + '</a>'
                    + (variant ? '<div class="meta-variant">' + variant + '</div>' : '')
                    + '<div class="price fw-6">' + item.total + ' EGP</div>'
                    + '<div class="tf-mini-cart-btns">'
                    + '<div class="wg-quantity small">'
                    + '<span class="btn-quantity minus-btn mc-minus" data-item="' + item.id + '">-</span>'
                    + '<input type="text" value="' + item.quantity + '" class="mc-qty" data-item="' + item.id + '" data-price="' + item.price + '">'
                    + '<span class="btn-quantity plus-btn mc-plus" data-item="' + item.id + '">+</span>'
                    + '</div>'
                    + '<div class="tf-mini-cart-remove mc-remove" data-item="' + item.id + '" style="cursor:pointer">{{ __("Remove") }}</div>'
                    + '</div>'
                    + '</div>'
                    + '</div>';
            }).join('');

            el.innerHTML = '<div class="tf-mini-cart-wrap">'
                + '<div class="tf-mini-cart-main"><div class="tf-mini-cart-sroll">'
                + '<div class="tf-mini-cart-items">' + itemsHtml + '</div>'
                + '</div></div>'
                + '<div class="tf-mini-cart-bottom">'
                + '<div class="tf-mini-cart-bottom-wrap">'
                + '<div class="tf-cart-totals-discounts">'
                + '<div class="tf-cart-total">{{ __("Subtotal") }}</div>'
                + '<div class="tf-totals-total-value fw-6 mc-subtotal">' + data.subtotal + ' EGP</div>'
                + '</div>'
                + '<div class="tf-mini-cart-line mt-2 mb-2"></div>'
                + '<div class="tf-mini-cart-view-checkout">'
                + '<a href="' + cartPageUrl + '" class="tf-btn btn-outline radius-3 link w-100 justify-content-center">{{ __("View Cart") }}</a>'
                + '</div>'
                + '</div>'
                + '</div>'
                + '</div>';

            bindMiniCartEvents();
        }

        function loadMiniCart() {
            fetch(miniCartUrl).then(r => r.json()).then(renderMiniCart);
        }

        function updateItem(itemId, qty) {
            fetch('/{{ app()->getLocale() }}/cart/item/' + itemId, {
                method: 'PATCH',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrf },
                body: JSON.stringify({ quantity: qty })
            }).then(() => loadMiniCart());
        }

        function removeItem(itemId) {
            fetch('/{{ app()->getLocale() }}/cart/item/' + itemId, {
                method: 'DELETE',
                headers: { 'X-CSRF-TOKEN': csrf }
            }).then(() => loadMiniCart());
        }

        function bindMiniCartEvents() {
            document.querySelectorAll('.mc-minus').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    var inp = document.querySelector('.mc-qty[data-item="' + btn.dataset.item + '"]');
                    var qty = Math.max(1, parseInt(inp.value) - 1);
                    inp.value = qty;
                    updateItem(btn.dataset.item, qty);
                });
            });
            document.querySelectorAll('.mc-plus').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    var inp = document.querySelector('.mc-qty[data-item="' + btn.dataset.item + '"]');
                    var qty = parseInt(inp.value) + 1;
                    inp.value = qty;
                    updateItem(btn.dataset.item, qty);
                });
            });
            document.querySelectorAll('.mc-remove').forEach(function (btn) {
                btn.addEventListener('click', function () { removeItem(btn.dataset.item); });
            });
        }

        // Load when modal opens
        document.getElementById('shoppingCart').addEventListener('show.bs.modal', loadMiniCart);

        // Global add-to-cart function used by product pages
        window.addToCart = function (productId, imageId, sizeId, qty, btn) {
            fetch('/{{ app()->getLocale() }}/cart/add', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrf },
                body: JSON.stringify({ product_id: productId, product_image_id: imageId, product_size_id: sizeId, quantity: qty || 1 })
            })
            .then(r => r.json())
            .then(function (data) {
                document.querySelectorAll('.cart-count-badge').forEach(function (b) {
                    b.textContent = data.count;
                    b.style.display = 'inline';
                });
                if (btn) { btn.textContent = '{{ __("Added!") }}'; setTimeout(function () { btn.textContent = '{{ __("Add to cart") }}'; }, 1500); }
            })
            .catch(function () {
                window.location.href = '/{{ app()->getLocale() }}/login';
            });
        };
    })();
    </script>

    {{-- Wishlist toggle --}}
    <script>
    (function () {
        var wishlistCsrf = '{{ csrf_token() }}';
        document.addEventListener('click', function (e) {
            var btn = e.target.closest('.wishlist-toggle-btn');
            if (!btn) return;
            e.preventDefault();

            var url       = btn.dataset.toggleUrl;
            var productId = btn.dataset.productId;

            fetch(url, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': wishlistCsrf },
                body: JSON.stringify({ product_id: productId })
            })
            .then(r => r.json())
            .then(function (data) {
                btn.classList.toggle('active', data.in_wishlist);
                var tooltip = btn.querySelector('.tooltip');
                if (tooltip) {
                    tooltip.textContent = data.in_wishlist
                        ? '{{ __("Remove from Wishlist") }}'
                        : '{{ __("Add to Wishlist") }}';
                }
                // update wishlist count badge in header if exists
                document.querySelectorAll('.wishlist-count-badge').forEach(function (b) {
                    b.textContent = data.count;
                    b.style.display = data.count > 0 ? '' : 'none';
                });
            });
        });
    })();
    </script>
    @endauth


    <script>
    (function () {
        var qvSwiper = null;

        /* ---- shared helpers ---- */
        function buildVariantPicker(p, prefix) {
            var colorsHtml = '';
            if (p.colors && p.colors.length) {
                var colorInputs = p.colors.map(function (c, i) {
                    var key = prefix + '-color-' + i;
                    return '<input id="' + key + '" type="radio" name="' + prefix + '-color" ' + (i === 0 ? 'checked' : '') + ' data-img="' + c.url + '" data-id="' + (c.id || '') + '">'
                         + '<label class="hover-tooltip radius-60" for="' + key + '" data-value="' + c.color_name + '">'
                         + '<span class="btn-checkbox" style="background-color:' + c.color_hex + '"></span>'
                         + '<span class="tooltip">' + c.color_name + '</span>'
                         + '</label>';
                }).join('');
                colorsHtml = '<div class="variant-picker-item">'
                    + '<div class="variant-picker-label">{{ __("Color") }}: <span class="fw-6 variant-picker-label-value">' + p.colors[0].color_name + '</span></div>'
                    + '<div class="variant-picker-values">' + colorInputs + '</div>'
                    + '</div>';
            }

            var sizesHtml = '';
            if (p.sizes && p.sizes.length) {
                var sizeInputs = p.sizes.map(function (s, i) {
                    var key = prefix + '-size-' + i;
                    return '<input type="radio" name="' + prefix + '-size" id="' + key + '" ' + (i === 0 ? 'checked' : '') + ' data-id="' + (s.id || '') + '">'
                         + '<label class="style-text" for="' + key + '" data-value="' + s.name + '"><p>' + s.name + '</p></label>';
                }).join('');
                sizesHtml = '<div class="variant-picker-item">'
                    + '<div class="variant-picker-label">{{ __("Size") }}: <span class="fw-6 variant-picker-label-value">' + p.sizes[0].name + '</span></div>'
                    + '<div class="variant-picker-values">' + sizeInputs + '</div>'
                    + '</div>';
            }

            return colorsHtml + sizesHtml;
        }

        function quantityHtml() {
            return '<div class="tf-product-info-quantity mb_15">'
                + '<div class="quantity-title fw-6">{{ __("Quantity") }}</div>'
                + '<div class="wg-quantity">'
                + '<span class="btn-quantity minus-btn">-</span>'
                + '<input type="text" name="number" value="1" min="1">'
                + '<span class="btn-quantity plus-btn">+</span>'
                + '</div></div>';
        }

        function priceHtml(p) {
            return p.sale_price
                ? '<div class="price-on-sale">' + p.sale_price + ' EGP</div><div class="compare-at-price">' + p.price + ' EGP</div>'
                : '<div class="price">' + p.price + ' EGP</div>';
        }

        /* ---- bind variant label update & color image switch inside a container ---- */
        function bindVariantEvents(container) {
            /* update label text when radio changes */
            container.querySelectorAll('input[type="radio"]').forEach(function (input) {
                input.addEventListener('change', function () {
                    var label = container.querySelector('label[for="' + input.id + '"]');
                    if (!label) return;
                    var val = label.getAttribute('data-value');
                    /* find the nearest variant-picker-label sibling and update its value span */
                    var pickerItem = label.closest('.variant-picker-item');
                    if (pickerItem) {
                        var span = pickerItem.querySelector('.variant-picker-label-value');
                        if (span) span.textContent = val;
                    }
                    /* color image switch for quick-add thumb */
                    var imgSrc = input.getAttribute('data-img');
                    if (imgSrc) {
                        var thumb = container.querySelector('.qa-thumb');
                        if (thumb) thumb.src = imgSrc;
                    }
                });
            });

            /* quantity +/- */
            container.querySelectorAll('.plus-btn').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    var inp = btn.previousElementSibling;
                    inp.value = (parseInt(inp.value) || 1) + 1;
                });
            });
            container.querySelectorAll('.minus-btn').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    var inp = btn.nextElementSibling;
                    var v = (parseInt(inp.value) || 2) - 1;
                    inp.value = v < 1 ? 1 : v;
                });
            });
        }

        /* ---- quick-add ---- */
        var qaProductData = null; // holds the fetched product for the open modal

        function qaGetSelectedIds(body) {
            var colorEl = body.querySelector('input[name="qa-color"]:checked');
            var sizeEl  = body.querySelector('input[name="qa-size"]:checked');
            var qtyEl   = body.querySelector('.wg-quantity input');
            return {
                colorId: colorEl ? colorEl.getAttribute('data-id') : null,
                sizeId:  sizeEl  ? sizeEl.getAttribute('data-id')  : null,
                qty:     qtyEl   ? (parseInt(qtyEl.value) || 1)    : 1,
            };
        }

        function qaDoAdd(productId, colorId, sizeId, qty, triggerEl) {
            @auth('customer')
            window.addToCart(productId, colorId, sizeId, qty, triggerEl);
            @else
            var modal = bootstrap.Modal.getInstance(document.getElementById('quick_add'));
            if (modal) modal.hide();
            bootstrap.Modal.getOrCreateInstance(document.getElementById('login')).show();
            @endauth
        }

        document.addEventListener('click', function (e) {
            /* ── "Add to cart" button inside the open quick-add modal ── */
            var addBtn = e.target.closest('.qa-add-btn');
            if (addBtn && qaProductData) {
                e.preventDefault();
                var body  = document.getElementById('quick-add-body');
                var sel   = qaGetSelectedIds(body);
                qaDoAdd(qaProductData.id, sel.colorId, sel.sizeId, sel.qty, addBtn);
                bootstrap.Modal.getInstance(document.getElementById('quick_add'))?.hide();
                return;
            }

            /* ── "Add to cart" button inside the open quick-view modal ── */
            var qvBtn = e.target.closest('.qv-add-btn');
            if (qvBtn) {
                e.preventDefault();
                var qvBody = document.getElementById('quick-view-body');
                var wrap   = qvBody.querySelector('[data-product-id]');
                if (!wrap) return;
                var productId = wrap.getAttribute('data-product-id');
                var colorEl   = qvBody.querySelector('input[name="qv-color"]:checked');
                var sizeEl    = qvBody.querySelector('input[name="qv-size"]:checked');
                var qtyEl     = qvBody.querySelector('.wg-quantity input');
                var colorId   = colorEl ? colorEl.getAttribute('data-id') : null;
                var sizeId    = sizeEl  ? sizeEl.getAttribute('data-id')  : null;
                var qty       = qtyEl   ? (parseInt(qtyEl.value) || 1)    : 1;
                @auth('customer')
                window.addToCart(productId, colorId, sizeId, qty, qvBtn);
                @else
                bootstrap.Modal.getInstance(document.getElementById('quick_view'))?.hide();
                bootstrap.Modal.getOrCreateInstance(document.getElementById('login')).show();
                @endauth
                return;
            }

            /* ── quick-add icon on product card ── */
            var btn = e.target.closest('[data-quick-add-url]');
            if (!btn) return;

            var url  = btn.getAttribute('data-quick-add-url');
            var body = document.getElementById('quick-add-body');

            /* show spinner & open modal */
            body.innerHTML = '<div class="text-center py-5"><div class="spinner-border" role="status"></div></div>';
            bootstrap.Modal.getOrCreateInstance(document.getElementById('quick_add')).show();

            fetch(url).then(function (r) { return r.json(); }).then(function (p) {
                qaProductData = p;

                /* no variants → add directly & close modal */
                if (!p.colors.length && !p.sizes.length) {
                    qaDoAdd(p.id, null, null, 1, btn);
                    bootstrap.Modal.getInstance(document.getElementById('quick_add'))?.hide();
                    return;
                }

                var firstColorImg = p.colors.length ? p.colors[0].url : (p.images.length ? p.images[0].url : '');

                body.innerHTML = ''
                    + '<div class="tf-product-info-item">'
                    +   '<div class="image"><img class="qa-thumb" src="' + firstColorImg + '" alt="' + p.name + '"></div>'
                    +   '<div class="content">'
                    +     '<a href="' + p.url + '">' + p.name + '</a>'
                    +     '<div class="tf-product-info-price">' + priceHtml(p) + '</div>'
                    +   '</div>'
                    + '</div>'
                    + '<div class="tf-product-info-variant-picker mb_15">' + buildVariantPicker(p, 'qa') + '</div>'
                    + quantityHtml()
                    + '<div class="tf-product-info-buy-button">'
                    +   '<button type="button" class="qa-add-btn tf-btn btn-fill justify-content-center fw-6 fs-16 flex-grow-1 animate-hover-btn">'
                    +     '<span>{{ __("Add to cart") }}</span>'
                    +   '</button>'
                    + '</div>';

                bindVariantEvents(body);
            });
        });

        /* ---- quick-view ---- */
        document.addEventListener('click', function (e) {
            var btn = e.target.closest('[data-quick-view-url]');
            if (!btn) return;
            var url  = btn.getAttribute('data-quick-view-url');
            var body = document.getElementById('quick-view-body');
            body.innerHTML = '<div class="text-center py-5"><div class="spinner-border" role="status"></div></div>';
            if (qvSwiper) { try { qvSwiper.destroy(true, true); } catch(x){} qvSwiper = null; }

            fetch(url).then(function (r) { return r.json(); }).then(function (p) {
                var slides = p.images.map(function (img) {
                    return '<div class="swiper-slide"><div class="item"><img src="' + img.url + '" alt="' + p.name + '" style="width: 100%; height: 100%; object-fit: cover;"></div></div>';
                }).join('');

                body.innerHTML = ''
                    + '<div class="tf-product-media-wrap">'
                    +   '<div dir="ltr" class="swiper tf-single-slide" id="qv-swiper">'
                    +     '<div class="swiper-wrapper">' + slides + '</div>'
                    +     '<div class="swiper-button-next button-style-arrow single-slide-prev"></div>'
                    +     '<div class="swiper-button-prev button-style-arrow single-slide-next"></div>'
                    +   '</div>'
                    + '</div>'
                    + '<div class="tf-product-info-wrap position-relative" data-product-id="' + p.id + '">'
                    +   '<div class="tf-product-info-list">'
                    +     '<div class="tf-product-info-title"><h5><a class="link" href="' + p.url + '">' + p.name + '</a></h5></div>'
                    +     '<div class="tf-product-info-price">' + priceHtml(p) + '</div>'
                    +     '<div class="tf-product-info-variant-picker">' + buildVariantPicker(p, 'qv') + '</div>'
                    +     quantityHtml()
                    +     '<div class="tf-product-info-buy-button"><form>'
                    +       '<button type="button" class="tf-btn btn-fill justify-content-center fw-6 fs-16 flex-grow-1 animate-hover-btn qv-add-btn">{{ __("site.quick-add") }}</button>'
                    +     '</form></div>'
                    +     '<div><a href="' + p.url + '" class="tf-btn fw-6 btn-line">{{ __("site.view-full-details") }} <i class="icon icon-arrow1-top-left"></i></a></div>'
                    +   '</div>'
                    + '</div>';

                /* color selection switches gallery slide */
                body.querySelectorAll('input[name="qv-color"]').forEach(function (input, idx) {
                    input.addEventListener('change', function () {
                        if (qvSwiper) qvSwiper.slideTo(idx);
                    });
                });

                /* swiper syncs back to color radio */
                if (typeof Swiper !== 'undefined' && document.getElementById('qv-swiper')) {
                    qvSwiper = new Swiper('#qv-swiper', {
                        loop: false,
                        navigation: { nextEl: '.single-slide-prev', prevEl: '.single-slide-next' },
                        on: {
                            slideChange: function () {
                                var idx = this.activeIndex;
                                var radio = body.querySelector('input[name="qv-color"]:nth-of-type(' + (idx + 1) + ')');
                                /* simpler: find all color radios and check the matching one */
                                var radios = body.querySelectorAll('input[name="qv-color"]');
                                if (radios[idx]) {
                                    radios[idx].checked = true;
                                    radios[idx].dispatchEvent(new Event('change'));
                                }
                            }
                        }
                    });
                }

                bindVariantEvents(body);
            });
        });
    })();
    </script>



<script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
<script>
(function () {
    var el = document.getElementById('reg-governorate');
    if (!el) return;
    new TomSelect(el, {
        placeholder: '{{ __("site.governorate") }}...',
        searchField: ['text'],
        maxOptions: null,
        allowEmptyOption: true,
        render: {
            no_results: function () {
                return '<div class="no-results">{{ __("No results") }}</div>';
            }
        }
    });
})();
</script>
@stack('scripts')

@if(session('show_login') || $errors->has('customer_login'))
<script>
document.addEventListener('DOMContentLoaded', function () {
    bootstrap.Modal.getOrCreateInstance(document.getElementById('login')).show();
});
</script>
@endif

@if($errors->hasAny(['name','username','email','phone','password','governorate_id','street']))
<script>
document.addEventListener('DOMContentLoaded', function () {
    bootstrap.Modal.getOrCreateInstance(document.getElementById('register')).show();
});
</script>
@endif

</body>
</html>
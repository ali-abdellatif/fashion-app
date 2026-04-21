<footer id="footer" class="footer md-pb-70">
            <div class="footer-wrap">
                <div class="footer-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-3 col-md-6 col-12">
                                <div class="footer-infor">
                                    <div class="footer-logo">
                                        <a href="{{route('home')}}">
                                            <img src="{{ Storage::disk('public')->url($settings->logo) }}" alt="">
                                        </a>
                                    </div>
                                    <ul>
                                        <li>
                                            <p>{{ $settings->address }}</p>
                                        </li>
                                        <li>
                                            <p>Email: <a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a></p>
                                        </li>
                                        <li>
                                            <p>Phone: <a href="tel:{{ $settings->phone_primary }}">{{ $settings->phone_primary }}</a></p>
                                        </li>
                                    </ul>
                                    <a href="contact-1.html" class="tf-btn btn-line">Get direction<i
                                            class="icon icon-arrow1-top-left"></i></a>
                                    <ul class="tf-social-icon d-flex gap-10">
                                        <li><a href="{{$settings->facebook}}" class="box-icon w_28 round social-facebook bg_line"><i
                                                class="icon fs-12 icon-fb"></i></a></li>
                                        <li><a href="{{$settings->twitter}}" class="box-icon w_28 round social-twiter bg_line"><i
                                                class="icon fs-10 icon-Icon-x"></i></a></li>
                                        <li><a href="{{$settings->instagram}}" class="box-icon w_28 round social-instagram bg_line"><i
                                                class="icon fs-12 icon-instagram"></i></a></li>
                                        <li><a href="{{$settings->tiktok}}" class="box-icon w_28 round social-tiktok bg_line"><i
                                                class="icon fs-12 icon-tiktok"></i></a></li>
                                        <li><a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings->whatsapp) }}" target="_blank" class="box-icon w_28 round social-whatsapp bg_line"><i
                                                class="icon fs-12 icon-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-12 footer-col-block">
                                <div class="footer-heading footer-heading-desktop">
                                    <h6>Help</h6>
                                </div>
                                <div class="footer-heading footer-heading-moblie">
                                    <h6>Help</h6>
                                </div>
                                <ul class="footer-menu-list tf-collapse-content">
                                    <li>
                                        <a href="privacy-policy.html" class="footer-menu_item">Privacy Policy</a>
                                    </li>
                                    <li>
                                        <a href="delivery-return.html" class="footer-menu_item"> Returns + Exchanges
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shipping-delivery.html" class="footer-menu_item">Shipping</a>
                                    </li>
                                    <li>
                                        <a href="terms-conditions.html" class="footer-menu_item">Terms &amp;
                                            Conditions</a>
                                    </li>
                                    <li>
                                        <a href="faq-1.html" class="footer-menu_item">FAQ’s</a>
                                    </li>
                                    <li>
                                        <a href="compare.html" class="footer-menu_item">Compare</a>
                                    </li>
                                    <li>
                                        <a href="wishlist.html" class="footer-menu_item">My Wishlist</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xl-3 col-md-6 col-12 footer-col-block">
                                <div class="footer-heading footer-heading-desktop">
                                    <h6>About us</h6>
                                </div>
                                <div class="footer-heading footer-heading-moblie">
                                    <h6>About us</h6>
                                </div>
                                <ul class="footer-menu-list tf-collapse-content">
                                    <li>
                                        <a href="about-us.html" class="footer-menu_item">Our Story</a>
                                    </li>
                                    <li>
                                        <a href="our-store.html" class="footer-menu_item">Visit Our Store</a>
                                    </li>
                                    <li>
                                        <a href="contact-1.html" class="footer-menu_item">Contact Us</a>
                                    </li>
                                    <li>
                                        <a href="login.html" class="footer-menu_item">Account</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xl-3 col-md-6 col-12">
                                <div class="footer-newsletter footer-col-block">
                                    <div class="footer-heading footer-heading-desktop">
                                        <h6>Sign Up for Email</h6>
                                    </div>
                                    <div class="footer-heading footer-heading-moblie">
                                        <h6>Sign Up for Email</h6>
                                    </div>
                                    <div class="tf-collapse-content">
                                        <div class="footer-menu_item">Sign up to get first dibs on new arrivals, sales,
                                            exclusive content, events and more!</div>
                                        <form class="form-newsletter subscribe-form" id="" action="#" method="post"
                                            accept-charset="utf-8" data-mailchimp="true">
                                            <div class="subscribe-content">
                                                <fieldset class="email">
                                                    <input type="email" name="email-form" class="subscribe-email"
                                                        placeholder="Enter your email...." tabindex="0"
                                                        aria-required="true">
                                                </fieldset>
                                                <div class="button-submit">
                                                    <button id=""
                                                        class="subscribe-button tf-btn btn-sm radius-3 btn-fill btn-icon animate-hover-btn"
                                                        type="button">Subscribe<i
                                                            class="icon icon-arrow1-top-left"></i></button>
                                                </div>
                                            </div>
                                            <div class="subscribe-msg"></div>
                                        </form>
                                        <div class="tf-cur">
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
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div
                                    class="footer-bottom-wrap d-flex gap-20 flex-wrap justify-content-between align-items-center">
                                    <div class="footer-menu_item">© 2026 Ecomus Store. All Rights Reserved</div>
                                    <!-- <div class="tf-payment">
                                        <img src="images/payments/visa.png" alt="">
                                        <img src="images/payments/img-1.png" alt="">
                                        <img src="images/payments/img-2.png" alt="">
                                        <img src="images/payments/img-3.png" alt="">
                                        <img src="images/payments/img-4.png" alt="">
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
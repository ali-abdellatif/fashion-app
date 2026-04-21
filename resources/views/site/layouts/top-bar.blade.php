    <div class="tf-top-bar bg_white line">
            <div class="px_15 lg-px_40">
                <div class="tf-top-bar_wrap grid-3 gap-30 align-items-center">
                    <ul class="tf-top-bar_item tf-social-icon d-flex gap-10">
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
                    <div class="text-center overflow-hidden">
                        <div dir="ltr" class="swiper tf-sw-top_bar" data-preview="1" data-space="0" data-loop="true"
                            data-speed="1000" data-delay="2000">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <p class="top-bar-text fw-5">Spring Fashion Sale <a href="shop-default.html"
                                            title="all collection" class="tf-btn btn-line">Shop now<i
                                                class="icon icon-arrow1-top-left"></i></a></p>
                                </div>
                                <div class="swiper-slide">
                                    <p class="top-bar-text fw-5">Summer sale discount off 70%</p>
                                </div>
                                <div class="swiper-slide">
                                    <p class="top-bar-text fw-5">Time to refresh your wardrobe.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="top-bar-language tf-cur justify-content-end">
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
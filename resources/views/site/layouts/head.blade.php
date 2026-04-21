    <meta charset="utf-8">
    <title>Ecomus - @yield('title')</title>

    <meta name="author" content="ali gamal">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

   <!-- font -->
   <link rel="stylesheet" href="{{asset('site/fonts/fonts.css')}}">
   <link rel="stylesheet" href="{{asset('site/fonts/font-icons.css')}}">
   <link rel="stylesheet" href="{{asset('site/css/bootstrap.min.css')}}">
   <link rel="stylesheet" href="{{asset('site/css/swiper-bundle.min.css')}}">
   <link rel="stylesheet" href="{{asset('site/css/animate.css')}}">
   <link rel="stylesheet" href="{{asset('site/css/sib-styles.css')}}">
   

   <script>localStorage.setItem('dir', '{{ app()->getLocale() == "ar" ? "rtl" : "ltr" }}');</script>

   @if(app()->getLocale() == 'ar')
        <link rel="stylesheet"type="text/css" href="{{asset('site/css/styles_rtl.css?v=1.0')}}"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- <style>
            body.rtl, body.rtl *:not([class*="icon"]):not(i) {
                font-family: 'Cairo', sans-serif !important;
            }
        </style> -->
    @else
        <link rel="stylesheet"type="text/css" href="{{asset('site/css/styles.css?v=1.0')}}"/>

    @endif

   <!-- Tom Select -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.bootstrap5.min.css">
   <style>
       /* mini-cart height fix: .wrap(flex-col) > #mini-cart-content(flex:1) > .tf-mini-cart-wrap(flex:1,flex-col) */
       #mini-cart-content { flex: 1 1 auto; display: flex; flex-direction: column; overflow: hidden; }
       #mini-cart-content .tf-mini-cart-wrap { flex: 1 1 auto; }

       .ts-wrapper { width: 100% !important; }
       .ts-wrapper .ts-control {
           border: 1px solid #d9d9d9;
           border-radius: 4px;
           min-height: 44px;
           font-size: 14px;
           padding: 8px 12px;
           box-shadow: none;
       }
       .ts-wrapper.focus .ts-control { border-color: #111; box-shadow: none; }
       .ts-dropdown { border-color: #d9d9d9; border-radius: 4px; font-size: 14px; }
       .ts-dropdown .option.selected, .ts-dropdown .option:hover { background: #111; color: #fff; }
       body.rtl .ts-wrapper .ts-control { direction: rtl; text-align: right; }
       body.rtl .ts-dropdown { direction: rtl; text-align: right; }
   </style>

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{asset('site/img/favicon.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('site/img/favicon.png')}}">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Primary Meta Tags -->
    <title>@yield('title', 'Meglink Ventures Limited – Interior Fit-Out & Finishing Experts in Kenya')</title>
    <meta name="title" content="@yield('meta_title', 'Meglink Ventures Limited – Interior Fit-Out & Finishing Experts in Kenya')">
    <meta name="description" content="@yield('meta_description', 'Meglink Ventures specializes in bespoke interior solutions including kitchens, wardrobes, vanities, gypsum work, office partitioning, and more. Quality craftsmanship for homes and commercial spaces.')">
    <meta name="keywords" content="Meglink Ventures, interior fit-out Kenya, kitchen cabinets Nairobi, wardrobes Kenya, vanities, gypsum, office partitioning, wall finishes, floor finishes, custom cabinetry, title work, interior doors, interior designers Kenya">
    <meta name="author" content="Meglink Ventures Limited">
    <meta name="robots" content="index, follow">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://meglinkventures.co.ke/">
    <meta property="og:title" content="@yield('meta_title', 'Meglink Ventures Limited – Interior Fit-Out & Finishing Experts in Kenya')">
    <meta property="og:description" content="@yield('meta_description', 'Transform your spaces with Meglink Ventures. Experts in kitchens, wardrobes, vanities, gypsum work, floor and wall finishes, and more.')">
    <meta property="og:image" content="https://meglinkventures.co.ke/public/images/og-banner.jpg"> <!-- replace with actual image path -->

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://meglinkventures.co.ke/">
    <meta property="twitter:title" content="@yield('meta_title', 'Meglink Ventures Limited – Interior Fit-Out & Finishing Experts in Kenya')">
    <meta property="twitter:description" content="@yield('meta_description', 'Bespoke interior solutions across Kenya: kitchens, wardrobes, vanities, and more. Trusted quality from Meglink Ventures.')">
    <meta property="twitter:image" content="https://meglinkventures.co.ke/public/images/og-banner.jpg"> <!-- same image -->



    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('uploads/favicon.png')}}" type="image/x-icon">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('html/css/bootstrap.min.css')}}">
    <!-- Simplebar -->
    <link rel="stylesheet" href="{{asset('html/css/simplebar.min.css')}}">
    <!-- Rev-slider -->
    <link rel="stylesheet" href="{{asset('html/rev/css/rs6.css')}}">
    <link rel="stylesheet" href="{{asset('html/rev/fonts/font-awesome/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('html/rev/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}">
    <link rel="stylesheet" href="{{asset('html/rev/fonts/pe-icon-7-stroke/css/helper.css')}}">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{asset('html/css/owl.carousel.min.css')}}">
    <!-- Aimation -->
    <link rel="stylesheet" href="{{asset('html/css/animations.min.css')}}">
    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('html/fonts/font-awesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('html/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('html/fonts/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('html/fonts/flaticon/flaticon.css')}}">
    <!-- Magnefic Popup -->
    <link rel="stylesheet" href="{{asset('html/css/magnific-popup.min.css')}}">
    <!-- Style -->
    <link rel="stylesheet" href="{{asset('html/css/style.css')}}">
    <!-- Responsive -->
    <link rel="stylesheet" href="{{asset('html/css/responsive.css')}}">
</head>
<body>

    <!-- WhatsApp Floating Button -->
<a href="https://wa.me/254705211206" class="whatsapp-float" target="_blank" aria-label="Chat on WhatsApp">
    <i class="fab fa-whatsapp"></i>
</a>

    <!-- Loading -->
    {{-- <div id="pq-loading">
        <div id="pq-loading-center">
            <img src="{{asset('html/images/Logo/logo.png')}}" alt="Loading">
        </div>
    </div> --}}
    <!-- Loading -->

    <!-- Header -->
    @include('components.header-2')
    <!-- Header -->

    @yield('content')
    <!-- Footer -->
    @include('components.footer')
    <!-- Footer -->

    <!-- Mobile Bottom Navigation -->
    @include('components.mobile-bottom-nav')
    <!-- Mobile Bottom Navigation -->

    <!-- Back To Top -->
    <div id="back-to-top" class="active">
        <a class="top" id="top" href="#top">
            <i class="ion-ios-arrow-up"></i>
        </a>
    </div>
    <!-- Back To Top -->

    <!-- Jquery -->
    <script src="{{asset('html/js/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('html/js/bootstrap.min.js')}}"></script>
    <!-- Owl Carousel -->
    <script src="{{asset('html/js/owl.carousel.min.js')}}"></script>
    <!-- Progressbar -->
    <script src="{{asset('html/js/progressbar.js')}}"></script>
    <!-- Isotope -->
    <script src="{{asset('html/js/isotope.pkgd.min.js')}}"></script>
    <!-- Counter -->
    <script src="{{asset('html/js/jquery.countTo.min.js')}}"></script>
    <!-- Wow -->
    <script src="{{asset('html/js/wow.min.js')}}"></script>
    <!-- Magnefic Popup -->
    <script src="{{asset('html/js/jquery.magnific-popup.min.js')}}"></script>
    <!-- Revslider -->
    <script src="{{asset('html/rev/js/rbtools.min.js')}}"></script>
    <script src="{{asset('html/rev/js/rs6.min.js')}}"></script>
    <script src="{{asset('html/js/rev-custom.js')}}"></script>
    <!-- Custom Scrollbar -->
    <script src="{{asset('html/js/simplebar.min.js')}}"></script>
    <!-- Custom -->
    <script src="{{asset('html/js/custom.js')}}"></script>
</body>

</html>

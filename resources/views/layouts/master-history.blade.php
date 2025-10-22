<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meglink Ventures Limited</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('uploads/favicon.png')}}" type="image/x-icon">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('html/css/bootstrap.min.css')}}">
    <!-- Simplebar -->
    <link rel="stylesheet" href="{{asset('html/css/simplebar.min.css')}}">
    <!-- Aimation -->
    <link rel="stylesheet" href="{{asset('html/css/animations.min.css')}}">
    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('html/fonts/font-awesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('html/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('html/fonts/themify-icons/themify-icons.css')}}">
    <!-- Timeline -->
    <link rel="stylesheet" href="{{asset('html/css/cntl.min.css')}}">
    <!-- Style -->
    <link rel="stylesheet" href="{{asset('html/css/style.css')}}">
    <!-- Responsive -->
    <link rel="stylesheet" href="{{asset('html/css/responsive.css')}}">
</head>
<body>

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
    <!-- Isotope -->
    <script src="{{asset('html/js/isotope.pkgd.min.js')}}"></script>
    <!-- Counter -->
    <script src="{{asset('html/js/jquery.countTo.min.js')}}"></script>
    <!-- Timeline -->
    <script src="{{asset('html/js/jquery.cntl.min.js')}}"></script>
    <!-- Wow -->
    <script src="{{asset('html/js/wow.min.js')}}"></script>
    <!-- Magnefic Popup -->
    <script src="{{asset('html/js/jquery.magnific-popup.min.js')}}"></script>
    <!-- Simplebar -->
    <script src="{{asset('html/js/simplebar.min.js')}}"></script>
    <!-- Custom -->
    <script src="{{asset('html/js/custom.js')}}"></script>
</body>

</html>

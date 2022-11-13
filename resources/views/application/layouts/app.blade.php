<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <title>E-Touch</title>

    <!-- Bootstrap core CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('application/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('application/assets/css/templatemo-digimedia-v3.css') }}">
    <link rel="stylesheet" href="{{ asset('application/assets/css/animated.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Pre-header Starts -->
    <div class="pre-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-8 col-7">
                    <ul class="info">
                        <li><a href="#"><i class="fa fa-envelope"></i>digimedia@company.com</a></li>
                        <li><a href="#"><i class="fa fa-phone"></i>010-020-0340</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-sm-4 col-5">
                    <ul class="social-media">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-instgram"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-header End -->

    <div>

        @yield('conent')

    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright © 2022 Fadl.Labanie Co., Ltd. All Rights Reserved.
                </div>
            </div>
        </div>
    </footer>


   
    <script src="{{ asset('application/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('application/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('application/assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('application/assets/js/animation.js') }}"></script>
    <script src="{{ asset('application/assets/js/imagesloaded.js') }}"></script>
    <script src="{{ asset('application/assets/js/custom.js') }}"></script>
    @include('sweetalert::alert')

</body>

</html>

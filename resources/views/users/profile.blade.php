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
    <link href="{{ asset('application/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('application/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('application/assets/css/templatemo-digimedia-v3.css') }}">
    <link rel="stylesheet" href="{{ asset('application/assets/css/animated.css') }}">
    <link rel="stylesheet" href="{{ asset('application/assets/css/owl.css') }}">

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

    <div id="services" class="services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
                        <h6>Our Services</h6>
                        <h4>What Our Agency <em>Provides</em></h4>
                        <div class="line-dec"></div>
                    </div>
                </div>
                <div class="col-lg-12">
                    @if (session('message'))
                        {{ session('message') }}
                    @endif
                    <div class="naccs">

                        <div class="grid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="menu">
                                        <div class="first-thumb active">
                                            <div class="thumb">
                                                <span class="icon"><img
                                                        src="{{ asset('application/assets/images/service-icon-01.png') }}"
                                                        alt=""></span>
                                                ADULT
                                            </div>
                                        </div>
                                        <div>
                                            <div class="thumb">
                                                <span class="icon"><img
                                                        src="{{ asset('application/assets/images/service-icon-04.png') }}"
                                                        alt=""></span>
                                                CHILD
                                            </div>
                                        </div>
                                        <div class="last-thumb">
                                            <div class="thumb">
                                                <span class="icon"><img
                                                        src="{{ asset('application/assets/images/service-icon-01.png') }}"
                                                        alt=""></span>
                                                ANIMAL
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <ul class="nacc">
                                        <li class="active">
                                            @include('users.create.adult')
                                        </li>
                                        <li >
                                            @include('users.create.child')
                                        </li>
                                        <li >
                                            @include('users.create.animal')
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('application/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('application/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('application/assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('application/assets/js/animation.js') }}"></script>
    <script src="{{ asset('application/assets/js/imagesloaded.js') }}"></script>
    <script src="{{ asset('application/assets/js/custom.js') }}"></script>
    @include('sweetalert::alert')

</body>

</html>

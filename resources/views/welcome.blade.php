<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    {{ csrf_field() }}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <title>{{ config('app.name') }}</title>

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

    <!-- Pre-header Starts -->
    <div class="pre-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-8 col-7">
                    <ul class="info">
                        <li><a href="#"><i class="fa fa-envelope"></i>{{ config('app.email') }}</a></li>
                        <li><a href="#"><i class="fa fa-phone"></i>{{ config('app.mobile') }}</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-sm-4 col-5">
                    <ul class="social-media">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-instgram"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-header End -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="{{ route('home') }}" class="logo">
                            <img src="{{ asset('logo1.jpg') }}" width="30px" height="125px" alt="">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>
                            <li class="scroll-to-section"><a href="#services">Services</a></li>
                            <li class="scroll-to-section"><a href="#portfolio">Projects</a></li>
                            <li class="scroll-to-section"><a href="#contact">Contact</a></li>
                            <li class="scroll-to-section">
                                <div class="border-first-button"><a href="#contact">Free Quote</a></div>
                            </li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s"
                                data-wow-delay="1s">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h6><b>O</b> Sync</h6>
                                        <h2>NFC Business Cards</h2>
                                        <p>Near-field communication (NFC) business cards enable you to share your
                                            contact information with a single tap. NFC business cards have two
                                            components: a digital business card and an NFC tag.</p>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="border-first-button scroll-to-section">
                                            <a href="#contact">Free Quote</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                                <img src="{{ asset('home1-removebg-preview.png') }}" alt="">
                                ]
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="about" class="about section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="about-left-image  wow fadeInLeft" data-wow-duration="1s"
                                data-wow-delay="0.5s">
                                <img src="{{ asset('application/assets/images/about-dec-v3.png') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 align-self-center  wow fadeInRight" data-wow-duration="1s"
                            data-wow-delay="0.5s">
                            <div class="about-right-content">
                                <div class="section-heading">
                                    <h6>About Us</h6>
                                    <h4>Who is O <em>Sync</em></h4>
                                    <div class="line-dec"></div>
                                </div>
                                <p>The over-competitive nature of our world makes
                                    it increasingly difficult for people to stand out,
                                    which means many get left behind. Having realized
                                    these problems, we decided to develop a
                                    disruptive tool that gives you the edge
                                    in any situation. With one tap, you can
                                    share what really matters and build real
                                    relationships — while saving the planet.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                    <div class="naccs">
                        <div class="grid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="menu">
                                        <div class="first-thumb active">
                                            <div class="thumb">
                                                <span class="icon"><img
                                                        src="{{ asset('undraw_windy_day_x-63-l.svg') }}"
                                                        alt=""></span>
                                                Adult
                                            </div>
                                        </div>
                                        <div>
                                            <div class="thumb">
                                                <span class="icon"><img
                                                        src="{{ asset('undraw_true_friends_c-94-g (1).svg') }}"
                                                        alt=""></span>
                                                Children
                                            </div>
                                        </div>
                                        <div class="last-thumb">
                                            <div class="thumb">
                                                <span class="icon"><img
                                                        src="{{ asset('undraw_good_doggy_re_eet7.svg') }}"
                                                        alt=""></span>
                                                Pets
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <ul class="nacc">
                                        <li class="active">
                                            <div>
                                                <div class="thumb">
                                                    <div class="row">
                                                        <div class="col-lg-6 align-self-center">
                                                            <div class="left-text">
                                                                <h4>SEO Analysis &amp; Daily Reports</h4>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                    elit, sedr do eiusmod deis tempor incididunt ut
                                                                    labore et dolore kengan darwin doerski token.
                                                                    dover lipsum lorem and the others.</p>
                                                                <div class="ticks-list"><span><i
                                                                            class="fa fa-check"></i> Optimized
                                                                        Template</span> <span><i
                                                                            class="fa fa-check"></i> Data Info</span>
                                                                    <span><i class="fa fa-check"></i> SEO
                                                                        Analysis</span>
                                                                    <span><i class="fa fa-check"></i> Data Info</span>
                                                                    <span><i class="fa fa-check"></i> SEO
                                                                        Analysis</span> <span><i
                                                                            class="fa fa-check"></i> Optimized
                                                                        Template</span>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                    elit, sedr do eiusmod deis tempor incididunt.</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 align-self-center">
                                                            <div class="right-image">
                                                                <img src="{{ asset('application/assets/images/services-image.jpg') }}"
                                                                    alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <div class="thumb">
                                                    <div class="row">
                                                        <div class="col-lg-6 align-self-center">
                                                            <div class="left-text">
                                                                <h4>Healthy Food &amp; Life</h4>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                    elit, sedr do eiusmod deis tempor incididunt ut
                                                                    labore et dolore kengan darwin doerski token.
                                                                    dover lipsum lorem and the others.</p>
                                                                <div class="ticks-list"><span><i
                                                                            class="fa fa-check"></i> Optimized
                                                                        Template</span> <span><i
                                                                            class="fa fa-check"></i> Data Info</span>
                                                                    <span><i class="fa fa-check"></i> SEO
                                                                        Analysis</span>
                                                                    <span><i class="fa fa-check"></i> Data Info</span>
                                                                    <span><i class="fa fa-check"></i> SEO
                                                                        Analysis</span> <span><i
                                                                            class="fa fa-check"></i> Optimized
                                                                        Template</span>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                    elit, sedr do eiusmod deis tempor incididunt.</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 align-self-center">
                                                            <div class="right-image">
                                                                <img src="{{ asset('application/assets/images/services-image-02.jpg') }}"
                                                                    alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <div class="thumb">
                                                    <div class="row">
                                                        <div class="col-lg-6 align-self-center">
                                                            <div class="left-text">
                                                                <h4>Enjoy &amp; Travel</h4>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                    elit, sedr do eiusmod deis tempor incididunt ut
                                                                    labore et dolore kengan darwin doerski token.
                                                                    dover lipsum lorem and the others.</p>
                                                                <div class="ticks-list"><span><i
                                                                            class="fa fa-check"></i> Optimized
                                                                        Template</span> <span><i
                                                                            class="fa fa-check"></i> Data Info</span>
                                                                    <span><i class="fa fa-check"></i> SEO
                                                                        Analysis</span>
                                                                    <span><i class="fa fa-check"></i> Data Info</span>
                                                                    <span><i class="fa fa-check"></i> SEO
                                                                        Analysis</span> <span><i
                                                                            class="fa fa-check"></i> Optimized
                                                                        Template</span>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                    elit, sedr do eiusmod deis tempor incididunt.</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 align-self-center">
                                                            <div class="right-image">
                                                                <img src="{{ asset('application/assets/images/services-image.jpg') }}"
                                                                    alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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


    <div class="free-quote">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="section-heading  wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                        <h6>Get Your Free Quote</h6>
                        <h4>Grow With Us Now</h4>
                        <div class="line-dec"></div>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-2  wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                    <form id="search" action="{{ route('home.news') }}" method="POST">
                        @csrf
                        <div class="row">

                            <div class="col-lg-8 col-sm-8">
                                <fieldset>
                                    <input type="email" name="email" class="email" id="email"
                                        pattern="[^ @]*@[^ @]*" placeholder="Email Address..." autocomplete="on"
                                        required>
                                </fieldset>
                            </div>
                            <div class="col-lg-4 col-sm-4">
                                <fieldset>
                                    <button type="submit" class="main-button">Get Quote Now</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="portfolio" class="our-portfolio section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-heading wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                        <h6>Our Products</h6>
                        <h4>See Our Recent <em>Products</em></h4>
                        <div class="line-dec"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
            <div class="row">
                <div class="col-lg-12">
                    <div class="loop owl-carousel">
                        @foreach (App\Models\Product::get() as $product)
                            <div class="item">
                                <a href="#">
                                    <div class="portfolio-item">
                                        <div class="thumb">
                                            <img src="{{ asset($product->image) }}" alt="">
                                        </div>
                                        <div class="down-content">
                                            <h4>{{ $product->name }}</h4>
                                            <span>{{ $product->price }}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="contact" class="contact-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                        <h6>Contact Us</h6>
                        <h4>Get In Touch With Us <em>Now</em></h4>
                        <div class="line-dec"></div>
                    </div>
                </div>
                <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
                    <form id="contact" action="{{ route('home.contact') }}" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="contact-dec">
                                    <img src="{{ asset('application/assets/images/contact-dec-v3.png') }}"
                                        alt="">
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div id="map">
                                    <iframe
                                        src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                        width="100%" height="636px" frameborder="0" style="border:0"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="fill-form">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="info-post">
                                                <div class="icon">
                                                    <img src="{{ asset('application/assets/images/phone-icon.png') }}"
                                                        alt="">
                                                    <a href="#">010-020-0340</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="info-post">
                                                <div class="icon">
                                                    <img src="{{ asset('application/assets/images/email-icon.png') }}"
                                                        alt="">
                                                    <a href="#">our@email.com</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="info-post">
                                                <div class="icon">
                                                    <img src="{{ asset('application/assets/images/location-icon.png') }}"
                                                        alt="">
                                                    <a href="#">123 Rio de Janeiro</a>
                                                </div>
                                            </div>
                                        </div>
                                        @csrf
                                        <div class="col-lg-6">

                                            <fieldset>
                                                <input type="name" name="name" id="name"
                                                    placeholder="Name" autocomplete="on" required>
                                            </fieldset>
                                            <fieldset>
                                                <input type="text" name="phone" id="phone"
                                                    placeholder="Phone" autocomplete="on" required>
                                            </fieldset>
                                            <fieldset>
                                                <input type="text" name="email" id="email"
                                                    pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="">
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-6">
                                            <fieldset>
                                                <textarea name="message" type="text" class="form-control" id="message" placeholder="Message" required=""></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-12">
                                            <fieldset>
                                                <button type="submit" id="form-submit" class="main-button ">Send
                                                    Message Now</button>
                                            </fieldset>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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


    <!-- Scripts -->
    <script src="{{ asset('application/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('application/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('application/assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('application/assets/js/animation.js') }}"></script>
    <script src="{{ asset('application/assets/js/imagesloaded.js') }}"></script>
    <script src="{{ asset('application/assets/js/custom.js') }}"></script>

</body>

</html>

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
                    <form id="contact" action="{{ route('home.profile.update') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="contact-dec">
                                    <img src="{{ asset('application/assets/images/contact-dec-v3.png') }}"
                                        alt="">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="fill-form">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <input class="form-control" type="file" name="avatar" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-2 ">
                                                    <select name="prefix">
                                                        <option selected>Open this select menu</option>
                                                        <option value="mr">MR</option>
                                                        <option value="ms">MS</option>
                                                    </select>

                                                </div>
                                                <div class="col-lg-3">
                                                    <input type="text" field='first_name' name="first_name"
                                                        id="first_name" placeholder="first Name" required value="{{$user->profiles->first()->first_name}}" />
                                                </div>
                                                <div class="col-lg-2">
                                                    <input type="text" field='middle_name' name="middle_name"
                                                        id="middle_name" placeholder="middle_name" required value="{{$user->profiles->first()->middle_name}}" />
                                                </div>
                                                <div class="col-lg-3">
                                                    <input type="text" field='last_name' name="last_name"
                                                        id="last_name" placeholder="last_name" required value="{{$user->profiles->first()->last_name}}" />
                                                </div>
                                                <div class="col-lg-2">
                                                    <input type="text" field='nike_name' name="nike_name"
                                                        id="nike_name" placeholder="nike_name ex: JONE" required value="{{$user->profiles->first()->nike_name}}" />

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <input type="email" field='email' name="email"
                                                        id="email" placeholder="email" required value="{{$user->email}}" />
                                                </div>
                                                <div class="col-lg-3">
                                                    <input type="tel" field='mobile' name="mobile"
                                                        id="mobile" placeholder="First Mobile" required value="{{$user->mobile}}" />
                                                </div>
                                                
                                                <div class="col-lg-3">
                                                    <input type="tel" field='mobile' name="mobile"
                                                        id="mobile" placeholder="Secound Mobile" required value="{{$user->mobile}}" />
                                                </div>
                                                <div class="col-lg-3">
                                                    <input type="tel" field='phone' name="phone"
                                                        id="phone" placeholder="phone" required  value="{{$user->mobile}}"/>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <input type="date" field='birthday' name="birthday"
                                                        id="birthday" placeholder="birthday" required value="{{$user->profiles->first()->birthday}}" />
                                                </div>
                                                <div class="col-lg-3">
                                                    <select name="gender">
                                                        <option selected disabled>Open this select menu</option>
                                                        <option value="1">Male</option>
                                                        <option value="2">Female</option>
                                                    </select>       
                                                </div>
                                                 <div class="col-lg-3">
                                                    <input type="tel" field='home_phone' name="home_phone"
                                                    id="home_phone" placeholder="home_phone" value="{{$user->profiles->first()->home_phone}}" />      
                                                </div>
                                                
                                                
                                              
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <input type="text" field='role' name="role"
                                                        id="role" placeholder="role" required />
                                                </div>
                                                <div class="col-lg-3">
                                                    <input type="text" field='organization' name="organization"
                                                        id="organization" placeholder="organization" required value="{{$user->profiles->first()->organization}}" />

                                                </div>
                                                <div class="col-lg-3">
                                                    <input type="url" field='organization_url'
                                                        name="organization_url" id="organization_url"
                                                        placeholder="organization website" required value="{{$user->profiles->first()->organization_url}}"/>


                                                </div>
                                                <div class="col-lg-3">

                                                    <input type="text" field='organization_address'
                                                        name="organization_address" id="organization_address"
                                                        placeholder="organization_address" required value="{{$user->profiles->first()->organization_address}}"/>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <input type="text" field='work_mobile' name="work_mobile"
                                                        id="work_mobile" placeholder="work_mobile" required value="{{$user->profiles->first()->work_mobile}}"/>
                                                </div>
                                                <div class="col-lg-4">
                                                    <input type="text" field='work_phone' name="work_phone"
                                                        id="work_phone" placeholder="work_phone" required value="{{$user->profiles->first()->work_phone}}"/>

                                                </div>
                                                <div class="col-lg-4">
                                                    <input type="email" field='work_email' name="work_email"
                                                        id="work_email" placeholder="work_email" required value="{{$user->profiles->first()->work_email}}"/>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div id="group1" class="fvrduplicate">
                                                <div class="row entry">

                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <select name="links_name[]">
                                                                <option selected>Open this select menu</option>
                                                                <option value="1">One</option>
                                                                <option value="2">Two</option>
                                                                <option value="3">Three</option>
                                                            </select>

                                                        </div>
                                                        <div class="col-lg-4">
                                                            <input type="url" field='links_url[]'
                                                                name="links_url[]" id="links_url[]" placeholder="Url"
                                                                required />
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <button type="button"
                                                                class="btn btn-success btn-sm btn-add">
                                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                            </button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
    <script>
        $(function() {
            $(document).on('click', '.btn-add', function(e) {
                e.preventDefault();
                var controlForm = $(this).closest('.fvrduplicate'),
                    currentEntry = $(this).parents('.entry:first'),
                    newEntry = $(currentEntry.clone()).appendTo(controlForm);
                newEntry.find('input').val('');
                controlForm.find('.entry:not(:last) .btn-add')
                    .removeClass('btn-add').addClass('btn-remove')
                    .removeClass('btn-success').addClass('btn-danger')
                    .html('<i class="fa fa-minus" aria-hidden="true"></i>');
            }).on('click', '.btn-remove', function(e) {
                $(this).closest('.entry').remove();
                return false;
            });
        });
    </script>
    <script src="{{ asset('application/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('application/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('application/assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('application/assets/js/animation.js') }}"></script>
    <script src="{{ asset('application/assets/js/imagesloaded.js') }}"></script>
    <script src="{{ asset('application/assets/js/custom.js') }}"></script>

</body>

</html>

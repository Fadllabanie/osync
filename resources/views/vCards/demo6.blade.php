<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Child</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            /* color: #6F8BA4; */
            background-image: url({{ asset('childbg.jpg') }});
            background-repeat: no-repeat;
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .section {
            padding: 100px 0;
            position: relative;

        }

        .gray-bg {
            /* background-color: #f5f5f5; */
        }

        .fas {
            margin-right: 10px
        }

        img {
            max-width: 100%;
            /* box-shadow: 10px 10px 5px gray; */
            border: 2px solid #fff;
            -moz-box-shadow: 10px 10px 5px #ccc;
            -webkit-box-shadow: 10px 10px 5px #ccc;
            box-shadow: 10px 10px 5px #ccc;
            -moz-border-radius: 25px;
            -webkit-border-radius: 25px;
            border-radius: 25px;

        }

        img {
            vertical-align: middle;
            border-style: none;
        }

        /* About Me
---------------------*/
        .about-text h3 {
            font-size: 45px;
            font-weight: 700;
            margin: 0 0 6px;
        }

        @media (max-width: 767px) {
            .about-text h3 {
                font-size: 35px;
            }
        }

        .about-text h6 {
            font-weight: 600;
            margin-bottom: 15px;
        }

        @media (max-width: 767px) {
            .about-text h6 {
                font-size: 18px;
            }
        }

        .about-text p {
            font-size: 18px;
            max-width: 450px;
        }

        .about-text p mark {
            font-weight: 600;
            color: #20247b;
        }

        .about-list {
            padding-top: 10px;
        }

        .about-list .media {
            padding: 5px 0;
        }

        .about-list label {
            color: #20247b;
            font-weight: 600;
            width: 88px;
            margin: 0;
            position: relative;
        }

        /* .about-list label:after {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            right: 11px;
            width: 1px;
            height: 12px;
            background: #20247b;
            -moz-transform: rotate(15deg);
            -o-transform: rotate(15deg);
            -ms-transform: rotate(15deg);
            -webkit-transform: rotate(15deg);
            transform: rotate(15deg);
            margin: auto;
            opacity: 0.5;
        } */

        .about-list p {
            margin: 0;
            font-size: 20px;
        }

        .link {
            color: inherit;
            /* blue colors for links too */
            text-decoration: inherit;
            /* no underline */

        }

        @media (max-width: 991px) {
            .about-avatar {
                margin-top: 30px;
            }
        }

        .about-section .counter {
            padding: 22px 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
        }

        .about-section .counter .count-data {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .about-section .counter .count {
            font-weight: 700;
            color: #20247b;
            margin: 0 0 5px;
        }

        .about-section .counter p {
            font-weight: 600;
            margin: 0;
        }

        mark {
            background-image: linear-gradient(rgba(252, 83, 86, 0.6), rgba(252, 83, 86, 0.6));
            background-size: 100% 3px;
            background-repeat: no-repeat;
            background-position: 0 bottom;
            background-color: transparent;
            padding: 0;
            color: currentColor;
        }

        .theme-color {
            color: #fc5356;
        }

        .dark-color {
            color: #20247b;
        }
    </style>
</head>

<body>
    <section class="section about-section gray-bg" id="about">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-lg-6">
                    <div class="about-text go-to">
                        <h3 class="dark-color">{{ $profile->fullName() }}</h3>
                        <h6 class="theme-color lead">{{ $profile->nike_name }}</h6>
                        {{-- <p>I <mark>design and develop</mark> services for customers of all sizes, specializing in
                            creating stylish, modern websites, web services and online stores. My passion is to design
                            digital user experiences through the bold interface and meaningful interactions.</p> --}}
                        <div class="row about-list">
                            <div class="col-md-6">
                                <div class="media">
                                    <label>Birthday</label>
                                    <p><i class="fas fa-birthday-cake mr-2"></i>{{ $profile->birthday }}</p>
                                </div>
                                <div class="media">
                                    <label>Age</label>
                                    <p><i class="fas far fa-user-circle mr-2"></i>{{ $profile->age() }}</p>
                                </div>
                                <div class="media">
                                    <label>Phone</label>
                                    <p><i class="fas fa-phone-alt mr-2"></i><a
                                            class="link"href="tel:>{{ $profile->mobile }}">{{ $profile->mobile }}</a>
                                    </p>
                                </div>
                                <div class="media">
                                    <label>School</label>
                                    <p><i class="fas fa-school mr-2"></i><a
                                            class="link"href="http://maps.google.com/?q=1200 {{ $profile->school_address }}"
                                            target="_blank">{{ $profile->school_address }}</a></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="media">
                                    <label>Blood</label>
                                    <p><i class="fas fa-solid fa-droplet"></i>{{ $profile->blood_type }}</p>
                                </div>
                                <div class="media">
                                    <label>Phone</label>
                                    <p><i class="fas fa-phone-alt mr-2"></i><a
                                            class="link"href="tel:>{{ $profile->home_phone }}">{{ $profile->home_phone }}</a>
                                    </p>
                                </div>
                                <div class="media">
                                    <label>Mobile</label>
                                    <p><i class="fas fa-mobile-alt mr-2"></i><a
                                            class="link"href="tel:>{{ $profile->mobile }}">{{ $profile->mobile }}</a>
                                    </p>
                                </div>

                                <div class="media">
                                    <label>Home</label>
                                    <p><i class="fas fa-home mr-2"></i><a
                                            class="link"href="http://maps.google.com/?q=1200 {{ $profile->home_address }}"
                                            target="_blank">{{ $profile->home_address }}</a></p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-avatar">
                        {{-- <img src="{{ asset($profile->avatar) ?? 'https://bootdey.com/img/Content/avatar/avatar7.png' }}"
                            title="" alt=""> --}}
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" title="" alt="">
                    </div>
                </div>
            </div>
            {{-- <div class="counter">
                <div class="row">
                    <div class="col-6 col-lg-3">
                        <div class="count-data text-center">
                            <h6 class="count h2" data-to="500" data-speed="500">500</h6>
                            <p class="m-0px font-w-600">Happy Clients</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="count-data text-center">
                            <h6 class="count h2" data-to="150" data-speed="150">150</h6>
                            <p class="m-0px font-w-600">Project Completed</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="count-data text-center">
                            <h6 class="count h2" data-to="850" data-speed="850">850</h6>
                            <p class="m-0px font-w-600">Photo Capture</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="count-data text-center">
                            <h6 class="count h2" data-to="190" data-speed="190">190</h6>
                            <p class="m-0px font-w-600">Telephonic Talk</p>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
</body>

</html>

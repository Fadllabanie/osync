<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Card</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: "Ubuntu", sans-serif;
            box-sizing: border-box;
            text-decoration: none;
        }

        body {
            height: 100vh;
            background: #17181F;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .profile-card {
            width: 400px;
            text-align: center;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px #9ecaed;
        }


        .card-header {
            background: #2d2f40;
            padding: 60px 40px;
        }

        .pic {
            display: inline-block;
            padding: 8px;
            background: linear-gradient(130deg, #74b9ff, #e66767);
            margin: auto;
            border-radius: 50%;
            background-size: 200% 200%;
            animation: animated-gradient 2s linear infinite;
        }

        @keyframes animated-gradient {
            25% {
                background-position: left bottom;
            }

            50% {
                background-position: right bottom;
            }

            75% {
                background-position: right top;
            }

            100% {
                background-position: left top;
            }
        }

        .pic img {
            display: block;
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }

        .name {
            color: #EEEDF0;
            font-size: 28px;
            font-weight: 600;
            margin: 10px 0;
        }

        .desc {
            font-size: 18px;
            color: #ffbcd9;
        }

        .location {
            margin: 10px 0;
            color: #6C72CB;
        }

        .icons {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        .icons a {
            color: #f2f2f2;
            width: 56px;
            font-size: 22px;
            transition: .3s linear;
        }

        .icons a:hover {
            color: #6C72CB;
        }

        .contact-btn {
            display: inline-block;
            padding: 12px 50px;
            color: #ffbcd9;
            border: 2px solid #6C72CB;
            border-radius: 6px;
            margin-top: 16px;
            transition: .3s linear;
        }

        .contact-btn:hover {
            background: #6C72CB;
            color: #f2f2f2;
        }

        .card-footer {
            background: #EEEDF0;
            padding: 60px 10px;
        }

        .numbers {
            display: flex;
            align-items: center;
        }

        .item {
            flex: 1;
            text-transform: uppercase;
            font-size: 13px;
            color: #CB69C1;
            font-weight: 500;
        }

        .item span {
            display: block;
            color: #2c3a47;
            font-size: 30px;
        }

        .border {
            width: 2px;
            height: 30px;
            /*   background: #bbb; */
            background: linear-gradient(130deg, #74b9ff, #e66767);
        }

        .instagram-account {
            margin-top: 50px;
            font-size: 15px;
        }
    </style>
</head>

<body>
    <div class="profile-card">
        <div class="card-header">
            <div class="pic">
                <img src="{{ asset($profile->avatar) }}" alt="" />
            </div>
            <div class="name">{{ $profile->full_name }}</div>
            <div class="desc">{{ $profile->role }} </div>
            <div class="location"></i> {{ $profile->organization }}</div>
            <div class="location"><i class="fas fa-map-marker-alt"></i>
                {{ $profile->organization_address }}</div>
            <div class="location"><i class="fas fa-mailbox-alt"></i>{{ $profile->work_email }}</div>
            <div class="location"><i class="fas fa-phone-alt"></i> {{ $profile->work_mobile }}</div>
            <div class="location"><i class="fas fa-phone-alt"></i> {{ $profile->mobile }}</div>
            <div class="location"><i class="fas fa-phone-alt"></i> {{ $profile->phone }}</div>
            <div class="icons">
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
                <a href="#" class="fab fa-github"></a>
            </div>
            <a href="#" class="contact-btn">Contact Me</a>
        </div>
        <div class="card-footer">
            <div class="numbers">
                <div class="item">
                    <span>
                        {{ Carbon\Carbon::parse($profile->birthday)->age }}
                    </span>
                    birthday
                </div>
                <div class="border"></div>
                <div class="item">
                    <span>
                        @if ($profile->gender == 1)
                            Male
                        @else
                            Female
                        @endif
                    </span>
                    gender
                </div>
                {{-- <div class="border"></div> --}}
                {{-- <div class="item">
                    <span>198</span>
                    Followers
                </div> --}}
            </div>
            <div class="instagram-account">{{ $profile->nike_name }}</div>
        </div>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('dd.css') }}" rel="stylesheet">

</head>

<body>

    <div class="container">
            <div class="card color-card-2">
                <img src="{{asset($profile->avatar)}}"
                    alt="profile-pic" class="profile">
                <h1 class="title-2">{{$profile->full_name}}</h1>
                <p class="job-title"> {{$profile->full_name}}</p>
                <div class="desc top">
                    <p>Create usable interface and designs @GraphicSpark</p>
                </div>

                <hr class="hr-2">
                <div class="container">
                    <div class="content">
                        <div class="grid-2">
                            <button class="color-b circule"> <i class="fab fa-dribbble fa-2x"></i></button>
                            <h2 class="title-2">12.3k</h2>
                            <p class="followers">Followers</p>
                        </div>
                        <div class="grid-2">
                            <button class="color-c circule"><i class="fab fa-behance fa-2x"></i></button>
                            <h2 class="title-2">16k</h2>
                            <p class="followers">Followers</p>
                        </div>
                        <div class="grid-2">
                            <button class="color-d circule"><i class="fab fa-github-alt fa-2x"></i></button>
                            <h2 class="title-2">17.8k</h2>
                            <p class="followers">Followers</p>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400" rel="stylesheet">
</body>

</html>

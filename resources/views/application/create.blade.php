@extends('application.layouts.app')

@section('conent')
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
                                        @if ($card->category_id == 1)
                                            <div class="first-thumb active">
                                                <div class="thumb">
                                                    <span class="icon"><img
                                                            src="{{ asset('application/assets/images/service-icon-01.png') }}"
                                                            alt=""></span>
                                                    ADULT
                                                </div>
                                            </div>
                                        @elseif ($card->category_id == 2)
                                            <div>
                                                <div class="thumb active">
                                                    <span class="icon"><img
                                                            src="{{ asset('application/assets/images/service-icon-04.png') }}"
                                                            alt=""></span>
                                                    CHILD
                                                </div>
                                            </div>
                                        @elseif ($card->category_id == 3)
                                            <div class="last-thumb active">
                                                <div class="thumb">
                                                    <span class="icon"><img
                                                            src="{{ asset('application/assets/images/service-icon-01.png') }}"
                                                            alt=""></span>
                                                    ANIMAL
                                                </div>
                                            </div>
                                        @endif


                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <ul class="nacc">
                                        <li class="active">
                                            @if ($card->category_id == 1)
                                                @include('users.create.adult')
                                            @elseif ($card->category_id == 2)
                                                @include('users.create.child')
                                            @elseif ($card->category_id == 3)
                                                @include('users.create.animal')
                                            @endif
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
@endsection

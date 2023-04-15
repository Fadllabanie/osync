@extends('application.layouts.app')

@section('conent')
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
                <form id="contact" action="{{ route('client.check') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="contact-dec">
                                <img src="{{ asset('application/assets/images/contact-dec-v3.png') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="fill-form">
                                <div class="row">
                                    <div class="col-lg-4">
                                    </div>
                                    <div class="col-lg-4">
                                        <fieldset>
                                            <input type="hidden" name="token" id="token"
                                                value="{{ Request::segment(3) }}">
                                        </fieldset>
                                        <fieldset>
                                            <input type="text" name="code" id="code" placeholder="Your Code"
                                                required>

                                            @if ($errors->has('code'))
                                                <div class="text-danger">{{ $errors->first('code') }}</div>
                                            @endif
                                        </fieldset>
                                        <fieldset>
                                            <button type="submit" id="form-submit"
                                                class="main-button ">{{ __('Check Code') }}</button>
                                        </fieldset>

                                    </div>
                                    <div class="col-lg-4">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

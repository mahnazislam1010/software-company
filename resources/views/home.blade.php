@extends('layouts.frontend.app')
@section('title','Home')
@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/swiper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/slider.css')}}">
    <style type="text/css">
        .zoom {
            transition: transform .2s;
            margin: 0 auto;
        }
        .zoom:hover {
            -ms-transform: scale(1.1); /* IE 9 */
            -webkit-transform: scale(1.1); /* Safari 3-8 */
            transform: scale(1.1);
        }
    </style>
@endpush
@section('content')
    <div class="swiper-main-slider swiper-container">
        <div class="swiper-wrapper">
            @foreach($sliders as $slider)
                <div class="swiper-slide"
                     style=" min-height: 400px; background-image:url({{ asset('public/storage/slider/'.$slider->image) }});">
                    <div class="medium-overlay"></div>
                    <div class="container">
                        <div class="slider-content left-holder">
                            <h2 class="animated fadeInDown"> {{ $slider->title }} </h2>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-12">
                                    <p class="animated fadeInDown">{{ $slider->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="section-block">
        <div class="container">
            <div class="section-heading center-holder">
                <h3>What We Offer?</h3>
                <div class="section-heading-line"></div>
            </div>
            <div class="row mt-60">
                @foreach($modules as $module)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 zoom center-holder">

                        <img width="200" height="150" src="{{ asset('public/storage/module/'.$module->image) }}"
                             class="rounded-border shadow-primary mt-15-xs" alt="img">
                        <div>
                            <h5 style="color: #d21e2b; text-align: center;">{{ $module->name }}</h5>
                        </div>
{{--                        <br><br>--}}
                    </div>
                @endforeach
            </div>
        </div>
        <div class="center-holder">
        <br><a href="{{ route('module') }}" class="primary-button button-md mt-10">Learn More</a>
        </div>
    </div>
{{------------Partner Section Start---------------}}
    <div class="section-block">
        <div class="container">
            <div class="section-heading center-holder">
                <h3>Partner With Us</h3>
                <div class="section-heading-line"></div>
            </div>
                <div class="row mt-50">
                    @foreach($partners as $partner)
                        <div class="col-md-6 col-sm-6 col-12 container-fluid">
                            <div class="partner-box" style="height: 285px;">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-12">
                                        <div class="partner-img"><img
                                                src="{{ asset('public/storage/partner/'.$partner->image) }}"
                                                alt="partner">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-12">
                                        <div class="partner-text">
                                            <span>Majority Owner</span>
                                            <h4>{{$partner->name}}</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                                nostrud.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
{{------------Partner Section End---------------}}
@endsection
@push('js')
    <script src="{{asset('assets/frontend/js/swiper.min.js')}}"></script>
@endpush

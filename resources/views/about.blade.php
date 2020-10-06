@extends('layouts.frontend.app')
@section('title','About')
@push('css')

@endpush
@section('content')
    <div class="page-title-section" style="background-image: url({{asset('assets/frontend/img/bg/pagetitle.jpg')}});">
        <div class="container"><h1>About Us</h1>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
            </ul>
        </div>
    </div>
    <div class="section-block">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="pl-30-md">
                        <div class="section-heading"><h4>Who We Are</h4></div>
                        <div class="section-heading-line-left"></div>
                        <div class="text-content-big mt-20"><p>{!! isset($about->who_we_are)?$about->who_we_are:'' !!}</p></div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="section-block-grey">
        <div class="container">
            <div class="section-heading center-holder">
                <h3>Our Mission</h3>
                <div class="section-heading-line"></div>
                <p>{!! isset($about->our_mission)?$about->our_mission:'' !!}</p></div>

        </div>
    </div>
    <div class="section-block">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h3>Our Vision</h3>
                        <div class="section-heading-line-left"></div>
                    </div>
                    <div class="text-content-big"><p>{!! isset($about->our_vision)?$about->our_vision:'' !!}</p></div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-block-grey">
        <div class="container">
            <div class="section-heading center-holder">
                <h4>What We Do</h4>
                <div class="section-heading-line"></div>
            </div>
            <div class="row mt-50">
                {!! isset($about->what_we_do)?$about->what_we_do:'' !!}
            </div>
        </div>
    </div>
    <!------- client section------------->
    <div class="section-clients border-top">
        <div class="container">
            <div class="owl-carousel owl-theme clients" id="clients">
                @foreach($clients as $client)
                    <div class="item">
                        <img src="{{asset('public/storage/partner/'.$client->image)}}" alt="{{ $client->name }}" style="border-radius: 40%;">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!------- client section------------->

@endsection
@push('js')

@endpush

@extends('layouts.frontend.app')
@section('title','Service')
@push('css')
    <style type="text/css">

        .zoom {
            transition: transform .2s;
            margin: 0 auto;
        }

        .zoom:hover {
            -ms-transform: scale(1.1); /* IE 9 */
            -webkit-transform: scale(1.1); /* Safari 3-8 */
            transform: scale(1.1);
        }</style>
@endpush
@section('content')

    <div class="section-block">
        <div class="container">
            <div class="section-heading center-holder"><span>Our Modules</span>
                <h3>What We Offer?</h3>
                <div class="section-heading-line"></div>
            </div>

<div class="row mt-60">
    @foreach($modules as $module)
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 zoom center-holder">
        <a href="#" class="container">

        <img width="200" height="150" src="{{ asset('public/storage/module/'.$module->image) }}"
             class="rounded-border shadow-primary mt-15-xs" alt="img">
            <div><h5 style="color: #d21e2b; text-align: center;" >{{ $module->name }}</h5></div>

        </a>
    </div>
    @endforeach
</div>
</div>
    </div>


@endsection
@push('js')

@endpush

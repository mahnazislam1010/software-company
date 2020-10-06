@extends('layouts.frontend.app')

@section('title','Contact')
@push('css')

@endpush
@section('content')
    <div class="page-title-section" style="background-image: url({{asset('assets/frontend/img/bg/pagetitle.jpg')}});">
        <div class="container"><h1>Contact</h1>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </div>
    </div>
    <!-------- contact form start------------>
    <div class="section-block">
        <div class="container">
            <div id="map" class="col-md-12">
                {!!  isset($info->map)? $info->map:'' !!}
            </div>
            <br><br><br><br>
            <div class="row">
                <div class="col-md-7 col-sm-7 col-12">
                    <div class="section-heading mt-15"><h4>Let's Talk about Your Business</h4>
                        <div class="section-heading-line-left"></div>
                    </div>
                    <div class="contact-form-box mt-30">
                        <div id="show"></div>
                        <form class="contact-form" id="customer-contact-form" method="post" action="javascript:void(0);">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-12">
                                    <input type="text" id="name" name="name" placeholder="Name">
                                </div>
                                <div class="col-md-6 col-sm-6 col-12">
                                    <input type="email" id="email" name="email" placeholder="E-mail">
                                </div>
                                <div class="col-md-12">
                                    <textarea name="message" id="message" placeholder="Message"></textarea>
                                </div>
                                <div class="col-md-12 mb-30">
                                    <div class="center-holder">
                                        <button type="input">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-------- contact form end------------>
                <div class="col-md-5 col-sm-5 col-12">
                    <div class="contact-info-box">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="contact-info-section">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-2 col-4 center-holder"><i class="fa fa-phone"></i></div>
                                        <div class="col-md-10 col-sm-10 col-8"><h4>Call Us</h4>
                                            <p>{{isset($info->phone)?$info->phone:'' }}</p></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="contact-info-section">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-2 col-4 center-holder"><i
                                                class="fa fa-envelope-open"></i></div>
                                        <div class="col-md-10 col-sm-10 col-8"><h4>Message</h4>
                                            <p>{{ isset($info->email)?$info->email:'' }}</p></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="contact-info-section">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-2 col-4 center-holder"><i class="fa fa-globe"></i></div>
                                        <div class="col-md-10 col-sm-10 col-8"><h4>Our Location</h4>
                                            <p>{{ isset($info->location)?$info->location:'' }}</p></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="contact-info-section">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-2 col-4 center-holder"><i class="fa fa-clock-o"></i>
                                        </div>
                                        <div class="col-md-10 col-sm-10 col-8"><h4>Working Hours</h4>
                                            <p>Mon-Sat 09:00 - 19:00</p>
                                            <p>Sun 10:00 - 13:00</p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function () {
           $("#customer-contact-form").submit(function () {
              if($("#name").val() ==='' || $("#email").val() === '' || $("#message").val() === ''){
                  $message = "Field must not be empty";
                    $("#show").html($message);
              }else{
                  $.post("<?php echo url(route('contact.store'))?>",$("#customer-contact-form").serialize(),function (data) {
                      $("#show").html(data);
                      $("#name").val('');
                      $("#email").val('');
                      $("#message").val('');
                  });
              }
              return false;
           });
        });
    </script>
@endpush

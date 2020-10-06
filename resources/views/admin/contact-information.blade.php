@extends('layouts.backend.app')

@section('title','Contact-information')

@push('css')

@endpush
@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            CONTACT INFORMATION
                        </h2>

                    </div>
                    <div class="body">
                        <form action="{{route('admin.contact-information.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <label for="email_address">Phone number</label>
                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">phone</i>
                                            </span>
                                <div class="form-line">
                                    <input type="text" name="phone" value="{{ isset($info->phone)?$info->phone:'' }}" class="form-control mobile-phone-number" placeholder="Ex: +880xxxxxxxxxx">
                                </div>
                            </div>
                            <label for="email_address">Email Address</label>
                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                <div class="form-line">
                                    <input type="text" name="email" value="{{ isset($info->email)?$info->email:'' }}" class="form-control email" placeholder="Ex: example@example.com">
                                </div>
                            </div>
                            <label for="email_address">Location</label>
                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">location_city</i>
                                            </span>
                                <div class="form-line">
                                    <input type="text" name="location" value="{{ isset($info->location)?$info->location:'' }}" class="form-control mobile-phone-number">
                                </div>
                            </div>
                            <label for="email_address">Maps</label>
                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">near_me</i>
                                            </span>
                                <div class="form-line">
                                    <input type="text" name="map" value="{{ isset($info->map)?$info->map:'' }}" class="form-control mobile-phone-number">
                                </div>
                            </div>


                            <br>
                            <input type="submit" class="btn btn-primary" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Vertical Layout -->

    </div>
    @endsection

    @push('js')

    @endpush

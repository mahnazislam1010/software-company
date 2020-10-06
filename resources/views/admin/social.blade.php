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
                            SOCIAL LINKS
                        </h2>

                    </div>
                    <div class="body">
                        <form action="{{route('admin.social.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <label for="email_address">Facebook</label>
                            <div class="input-group">
                                            <span class="input-group-addon"></span>
                                <div class="form-line">
                                    <input type="text" name="facebook" value="{{ isset($socials->facebook)?$socials->facebook:'' }}" class="form-control mobile-phone-number" placeholder="Enter facebook id link">
                                </div>
                            </div>
                            <label for="email_address">Twitter</label>
                            <div class="input-group">
                                            <span class="input-group-addon"></span>
                                <div class="form-line">
                                    <input type="text" name="twitter" value="{{ isset($socials->twitter)?$socials->twitter:'' }}" class="form-control mobile-phone-number" placeholder="Enter twitter id link">
                                </div>
                            </div>
                            <label for="email_address">Instagram</label>
                            <div class="input-group">
                                            <span class="input-group-addon"></span>
                                <div class="form-line">
                                    <input type="text" name="instagram" value="{{ isset($socials->instagram)?$socials->instagram:'' }}" class="form-control mobile-phone-number" placeholder="Enter instagram id link">
                                </div>
                            </div>
                            <label for="email_address">Youtube</label>
                            <div class="input-group">
                                            <span class="input-group-addon"></span>
                                <div class="form-line">
                                    <input type="text" name="youtube" value="{{ isset($socials->youtube)?$socials->youtube:'' }}" class="form-control mobile-phone-number" placeholder="Enter youtube link">
                                </div>
                            </div>
                            <label for="email_address">Linkedin</label>
                            <div class="input-group">
                                            <span class="input-group-addon"></span>
                                <div class="form-line">
                                    <input type="text" name="linkedin" value="{{ isset($socials->linkedin)?$socials->linkedin:'' }}" class="form-control mobile-phone-number" placeholder="Enter linkedin id link">
                                </div>
                            </div>
                            <label for="email_address">Skype</label>
                            <div class="input-group">
                                            <span class="input-group-addon"></span>
                                <div class="form-line">
                                    <input type="text" name="skype" value="{{ isset($socials->skype)?$socials->skype:'' }}" class="form-control mobile-phone-number" placeholder="Enter skype id link">
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

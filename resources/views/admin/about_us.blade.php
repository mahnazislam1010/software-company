@extends('layouts.backend.app')

@section('title','About us')

@push('css')

@endpush
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                About Us
            </h2>
        </div>
        <!-- Basic Validation -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>About Us</h2>
                    </div>
                    <div class="body">
                        <form action="{{route('admin.about-us.update')}}" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group form-float">
                                <label for="email_address_2">Who We Are</label>
                                <div class="form-line">
                                    <textarea class="description" name="who_we_are">{{ isset($info->who_we_are)?$info->who_we_are:'' }}</textarea>

                                </div>
                            </div>
                            <div class="form-group form-float">
                                <label for="email_address_2">Our Mission</label>
                                <div class="form-line">
                                    <textarea class="description" name="our_mission">{{ isset($info->our_mission)?$info->our_mission:'' }}</textarea>

                                </div>
                            </div>
                            <div class="form-group form-float">
                                <label for="email_address_2">Our Vision</label>
                                <div class="form-line">
                                    <textarea class="description" name="our_vision">{{ isset($info->our_vision)?$info->our_vision:'' }}</textarea>

                                </div>
                            </div>

                            <div class="form-group form-float">
                                <label for="email_address_2">What We Do</label>
                                <div class="form-line">
                                    <textarea class="description" name="what_we_do">{{ isset($info->what_we_do)?$info->what_we_do:'' }}</textarea>

                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div>
                                <input type="submit" class="btn btn-primary btn-lg center-block"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Validation -->

    </div>

@endsection

@push('js')
    <!-- Load TinyMCE -->
    <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
    <script>
        tinymce.init({
            selector:'textarea.description',
            width: 900,
            height: 300
        });
    </script>
    <!-- /TinyMCE -->
@endpush

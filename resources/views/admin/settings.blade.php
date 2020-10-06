@extends('layouts.backend.app')

@section('title','Settings')

@push('css')

@endpush


@section('content')
    <div class="container-fluid">
        <!-- Tabs With Icon Title -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Settings
                        </h2>
                    </div>
                    <div class="body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#profile_with_icon_title" data-toggle="tab">
                                    <i class="material-icons">face</i> Update
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#password_with_icon_title" data-toggle="tab">
                                    <i class="material-icons">change_history</i> Change Password
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="profile_with_icon_title">
                                <!-- Horizontal Layout -->
                                <div class="body">
                                    <form method="POST" action="{{route('admin.settings.update')}}" class="form-horizontal" enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="image"></label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <img src="{{asset('public/storage/admin/'.Auth::user()->image)}}" width="50px;" height="50px;">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="name">Name:</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" class="form-control" placeholder="Enter your name" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="name">Email:</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" id="email" name="email" value="{{ Auth::user()->email }}" class="form-control" placeholder="Enter your name" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="image">Image:</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="file" name="image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <!-- #END# Horizontal Layout -->
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="password_with_icon_title">
                                <!-- Horizontal Layout -->
                                <div class="body">
                                    <center><label id="show"></label></center>
                                    <form id="user_form" class="form-horizontal" method="post" action="javascript:void(0);">
                                        @csrf
                                        @method('POST')
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="old_password">Old Password</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="password" id="old_password" name="old_password" class="form-control" placeholder="Enter your password Old passord">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="password">New Password</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter new password">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="password_confirmation">Confirm Password</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm password">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- #END# Horizontal Layout -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Tabs With Icon Title -->
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function(){
            $("#user_form").submit(function(){
                if( $('#old_password').val() == '' || $('#password').val() == ''|| $('#password_confirmation').val() == ''){
                    $('#old_password').val('');
                    $('#password').val('');
                    $('#password_confirmation').val('');
                    var msg ="<span style='color:red;'>Error! <strong>Field Must not be empty!!!</strong></span>";
                    $("#show").html(msg);
                }else if( $('#password').val() != $('#password_confirmation').val()){
                    $('#old_password').val('');
                    $('#password').val('');
                    $('#password_confirmation').val('');
                    var msg ="<span style='color:red;'>Error! <strong>Confirm Password not match!!!</strong></span>";
                    $("#show").html(msg);
                }else if( $('#password').val().length < 6){
                    $('#old_password').val('');
                    $('#password').val('');
                    $('#password_confirmation').val('');
                    var msg ="<span style='color:red;'>Error! <strong>Password len must be grather than Six!!!</strong></span>";
                    $("#show").html(msg);
                }else{
                    $.post("<?php echo url(route('admin.settings.update'))?>", $("#user_form").serialize(), function(data){
                        //alert("working");
                        $("#show").html(data);
                        $('#old_password').val('');
                        $('#password').val('');
                        $('#password_confirmation').val('');
                    });

                }
                return false;
            });
        });
    </script>

@endpush

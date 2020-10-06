@extends('layouts.backend.app')

@section('title','Dashboard')

@push('css')

@endpush
@section('content')

    <div class="container-fluid">
        <div class="block-header">
            <h2>DASHBOARD</h2>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-pink hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">playlist_add_check</i>
                    </div>
                    <div class="content">
                        <div class="text">TOTAL FEATURES</div>
                        <div class="number count-to" data-from="0" data-to="{{ $count = count($modules) }}" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-cyan hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">help</i>
                    </div>
                    <div class="content">
                        <div class="text">TEAM MEMBERS</div>
                        <div class="number count-to" data-from="0" data-to="{{ $count = count($teams) }}" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-orange hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">person_add</i>
                    </div>
                    <div class="content">
                        <div class="text">TOTAL PARTNERS</div>
                        <div class="number count-to" data-from="0" data-to="{{ $count = count($partners) }}" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-light-green hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">forum</i>
                    </div>
                    <div class="content">
                        <div class="text">TOTAL COMMENTS</div>
                        <div class="number count-to" data-from="0" data-to="{{ $count = count($comments) }}" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>


        </div>
        <!-- #END# Widgets -->
    </div>

@endsection

@push('js')
<!-- Jquery CountTo Plugin Js -->
<script src="{{asset('assets/backend/plugins/jquery-countto/jquery.countTo.js')}}"></script>
@endpush

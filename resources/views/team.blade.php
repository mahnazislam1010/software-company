@extends('layouts.frontend.app')
@section('title','Team')
@push('css')

@endpush
@section('content')
    <div class="section-block">
        <div class="container">
            <div class="section-heading center-holder">
                <h3>Meet Our Team</h3>
                <div class="section-heading-line"></div>
            </div>
            <div class="row mt-50">
                @foreach($teams as $team)
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="team-box">
                            <div class="team-img">
                                <img src="{{ asset('public/storage/team/'.$team->image) }}" alt="img">
                            </div>
                            <div class="team-info">
                                {{$team->email}}
                                <h4>
                                    <a href="#">{{$team->name}}</a>
                                </h4>
                                <p>{{$team->description}}</p>
                            </div>
                            <div class="team-social-icons">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@push('js')

@endpush

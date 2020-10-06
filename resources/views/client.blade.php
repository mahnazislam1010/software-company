@extends('layouts.frontend.app')
@section('title','Client')
@push('css')

@endpush
@section('content')

            {{------------Partner Section Start---------------}}
            <div class="section-block">
                <div class="container">
                    <div class="section-heading center-holder">
                        <h3>Our Clients</h3>
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
        </div>
    </div>


@endsection
@push('js')

@endpush

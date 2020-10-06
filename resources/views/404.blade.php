@extends('layouts.frontend.app')

@section('title','404')
@push('css')

@endpush
@section('content')
    <div class="error-box">
        <div class="back-box"><h2>Error</h2></div>
        <div class="error-box-text"><h1>404</h1>
            <h3>Page not Found</h3> <h4>We're sorry, but the page you were looking for doesn't exist.</h4>
            <div class="mt-30"><a href="index.html" class="dark-button button-md">Back Home</a></div>
        </div>
    </div>
@endsection
@push('js')

@endpush

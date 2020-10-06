<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets//css/stylelogin.css') }}" media="screen" />
</head>
<body>
<div class="container">
    <section id="content">
        <form action="{{ route('login') }}" method="post">
            @csrf
            @method('POST')
            <h1>Admin Login</h1>
            <div>
                <input type="text" class="@error('email') is-invalid @enderror" id="email" placeholder="email" required="" name="email"/>
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div>
                <input type="password" class="@error('password') is-invalid @enderror" id="password" placeholder="Password" required="" name="password"/>
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div>
                <input type="submit" value="Log in" />
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </form><!-- form -->
        <div class="button">
            <a href="#">Training with live project</a>
        </div><!-- button -->
    </section><!-- content -->
</div><!-- container -->
</body>
</html>

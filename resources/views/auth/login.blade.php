@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="login-card">
                    <form class="theme-form login-form" method="POST" action="{{ route('login.authentication.manual') }}">
                        @csrf
                        <h4>Login</h4>
                        <h6>Welcome back! Log in to your account.</h6>

                        <div class="form-group">
                            <label>Email Address</label>
                            <div class="input-group"><span class="input-group-text"><i class="fas fa-envelope"></i></span>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" autocomplete="email" autofocus
                                       placeholder="Test@gmail.com">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group"><span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="current-password" placeholder="*********">
                                <div class="show-hide"><span class="show">                         </span></div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" id="validationFormCheck1" type="checkbox" name="remember">
                            <label class="form-check-label" for="validationFormCheck1">Remember password </label>
                            @if (Route::has('password.request'))
                                <a class="link" style="float: right !important" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                        </div>
                        <div class="login-social-title">
                            <h5>Sign in with</h5>
                        </div>
                        <div class="form-group">
                            <ul class="login-social">
                                <li><a href="https://www.linkedin.com/" target="_blank"><i data-feather="linkedin"></i></a>
                                </li>
                                <li><a href="https://twitter.com/" target="_blank"><i data-feather="twitter"></i></a>
                                </li>
                                <li><a href="https://www.facebook.com/" target="_blank"><i data-feather="facebook"></i></a>
                                </li>
                                <li><a href="https://www.instagram.com/" target="_blank"><i
                                            data-feather="instagram"> </i></a></li>
                            </ul>
                        </div>
                        <p>Don't have account?<a class="ms-2" href="{{ route('register') }}">Create Account</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>

    </script>
    @endsection

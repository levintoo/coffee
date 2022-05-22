@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="login-card">
                    <form class="theme-form login-form" method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <h4>Reset Password</h4>
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="email" class="">{{ __('Email Address') }}</label>

                                <div class="input-group"><span class="input-group-text"><i class="fas fa-envelope"></i></span>

                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">{{ __('Send Password Reset Link') }}</button>
                                </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection

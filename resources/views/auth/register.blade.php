@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card h-auto">
                    <form class="theme-form login-form" method="POST" action="{{ route('register') }}">
                        @csrf
                        <h4>Create your account</h4>
                        <h6>Enter your personal details to create account</h6>
                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <div class="input-group">
                                <input id="name" type="text"
                                       class="form-control @error('name') is-invalid @enderror" name="name"
                                       value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username">{{ __('Username') }}</label>

                            <div class="input-group">

                                <input id="username" type="text"
                                       class="form-control @error('username') is-invalid @enderror" name="username"
                                       value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone">{{ __('Phone') }}</label>

                            <div class="input-group">

                                <input id="phone" type="text"
                                       class="form-control @error('phone') is-invalid @enderror" name="phone"
                                       value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="country"
                            >{{ __('Country ') }}</label>

                            <div class="input-group">

                                <input id="country" type="text"
                                       class="form-control @error('country') is-invalid @enderror" name="country"
                                       value="{{ old('country') }}" required autocomplete="country" autofocus>

                                @error('country')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">{{ __('Description ') }}</label>

                            <div class="input-group">

                                <textarea id="description"
                                          class="form-control @error('description') is-invalid @enderror"
                                          name="description" value="{{ old('description') }}"
                                          autocomplete="description"
                                          autofocus>
                                </textarea>
                                <div class="input-group">
                                <span id="characterLeft" class="invalid-feedback" role="alert">
                                    </span>
                                </div>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="profession"
                            >{{ __('Profession ') }}</label>

                            <div class="input-group">

                                <input id="profession" type="text"
                                       class="form-control @error('profession') is-invalid @enderror"
                                       name="profession" value="{{ old('profession') }}"
                                       autocomplete="profession" autofocus>

                                @error('profession')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email"
                            >{{ __('Email Address') }}</label>

                            <div class="input-group">

                                <input id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror" name="email"
                                       value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>

                            <div class="input-group">

                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>

                            <div class="input-group">

                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <input id="checkbox1" type="checkbox">
                                <label class="text-muted" for="checkbox1">Agree with
                                    <span>Privacy Policy                   </span></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button id="btnSubmit" class="btn btn-primary btn-block" type="submit">Create Account</button>
                        </div>
                        <div class="login-social-title">
                            <h5>signup with</h5>
                        </div>
                        <div class="form-group">
                            <ul class="login-social">
                                <li><a href="https://www.linkedin.com/login" target="_blank"><i
                                            data-feather="linkedin"></i></a></li>
                                <li><a href="https://twitter.com/" target="_blank"><i data-feather="twitter"></i></a>
                                </li>
                                <li><a href="https://www.facebook.com/" target="_blank"><i data-feather="facebook"></i></a>
                                </li>
                                <li><a href="https://www.instagram.com/login" target="_blank"><i
                                            data-feather="instagram"> </i></a></li>
                            </ul>
                        </div>
                        <p>Already have an account?<a class="ms-2" href="{{ route('login') }}">Sign in</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#characterLeft').text('255 characters left');
            $('#description').keyup(function () {
                var max = 255;
                var len = $(this).val().length;
                if (len >= max) {
                    $('#characterLeft').text('You have reached the limit');
                    $('#characterLeft').addClass('invalid-feedback');
                    $('#btnSubmit').addClass('disabled');
                }
                else {
                    var ch = max - len;
                    $('#characterLeft').text(ch + ' characters left');
                    $('#btnSubmit').removeClass('disabled');
                    $('#characterLeft').removeClass('invalid-feedback');
                }
            });
        });
    </script>
@endsection

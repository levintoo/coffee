@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card">
                    <form class="f1 theme-form login-form" method="post" action="{{ route('register') }}">
                        @csrf
                        <h4>Create your account</h4>
                        <h6>Enter your personal details to create account</h6>
                        <div class="f1-steps">
                            <div class="f1-progress">
                                <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3"></div>
                            </div>
                            <div class="f1-step active">
                                <div class="f1-step-icon"><i class="fa fa-user"></i></div>
                                <p>Personal details</p>
                            </div>
                            <div class="f1-step">
                                <div class="f1-step-icon"><i class="fa fa-key"></i></div>
                                <p>Passwords</p>
                            </div>
                            <div class="f1-step">
                                <div class="f1-step-icon"><i class="fa-solid fa-info"></i></div>
                                <p>More Info</p>
                            </div>
                        </div>
                        <fieldset>
                            <div class="mb-2">
                                <label for="name">{{ __('Name') }}</label>
                                <input id="name" type="text"
                                       class="form-control @error('name') is-invalid @enderror" name="name"
                                       value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-2">
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
                            <div class="mb-2">
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
                            <div class="f1-buttons my-2">
                                <button class="btn btn-primary btn-next" type="button">Next</button>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="mb-2">
                                <label for="phone">{{ __('Phone') }}</label>

                                <div class="input-group">
                                    {{--                                    <span class="input-group-text text-muted">+254</span>--}}

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

                            <div class="mb-2">
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
                            <div class="mb-2">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>

                                <div class="input-group">

                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>
                            <div class="f1-buttons my-2">
                                <button class="btn btn-primary btn-previous" style="float: left !important;" type="button">Previous</button>
                                <button class="btn btn-primary btn-next" style="float: right !important;" type="button">Next</button>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="mb-2">

                                <label for="profession"
                                >{{ __('Profession ') }}</label>
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
                            <div class="mb-2">
                                <label for="country"
                                >{{ __('Country ') }}</label>

                                <select id="country" type="text"
                                        class="form-control @error('country') is-invalid @enderror" name="country" required autocomplete="country" autofocus>
                                    <option value="kenya">Kenya</option>
                                </select>
                                @error('country')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="description">{{ __('Description ') }}</label>
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}"
                                          autocomplete="description"
                                          autofocus>
                                </textarea>
                                <span id="characterLeft" class="text-primary" role="alert">
                                   gg </span>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="f1-buttons  my-2">
                                <button class="btn btn-primary btn-previous" style="float: left !important;" type="button">Previous</button>
                                <button class="btn btn-primary btn-submit" style="float: right !important;" type="submit">Submit</button>
                            </div>
                        </fieldset>
                        <div class="login-social-title mt-3">
                            <h5>signup with</h5>
                        </div>
                        <p>Already have an account?<a class="ms-2" href="#">Sign in</a></p>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="../assets/js/jquery-3.5.1.min.js"></script>
    <script src="../assets/js/form-wizard/form-wizard-three.js"></script>
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

<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12">
            <div class="login-card">
                <form class="theme-form login-form" >
                    @csrf
                    <h4>Two-factor Authentication</h4>

                    <h6 class="mt-2">
                        Please enter verification code sent to ******
                    </h6>
                    <div class="form-group">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="otp" class="">{{ __('Verification Code') }}</label>
                        <div class="input-group"><span class="input-group-text"><i class="fas fa-key"></i></span>

                            <input id="otp" type="number" class="form-control @error('otp') is-invalid @enderror" value="{{ old('otp') }}" required autocomplete="email" autofocus wire:model="otp">
                            @error('otp')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="button" wire:click.prevent="validateOtp">{{ __('Verify') }}</button>
                    </div>
                    <p>Didn't receive code?<a class="ms-2" href="" wire:click.prevent="resendOtp">Resend</a></p>
                </form>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>

    </script>
@endpush

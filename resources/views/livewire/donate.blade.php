<main id="main">
    <section id="sectionTop">
        <div class="section-inner">
            <div class="container">
                <div class="row justify-content-center pt-2">
                    <div class="col-12 col-sm-10 col-md-5 col-lg-5">
                        <form id="donateFrm" wire:submit.prevent="donate">
                            @csrf
                            <div class="card">
                                <div id="donateStep1" class="frm-step active" data-step="1">
                                    <div class="card-header">
                                        <h4 class="card-title text-center text-uppercase font-lg">COFFEE</h4>
                                    </div>
                                    <div class="card-body text-center py-2">

                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                        <h4 class="donate-headline">Every $1 is one cup of coffee for {{$username}}</h4>
                                        <div class="row align-items-stretch">
                                            <div class="col mb-3 px-1">
                                                <div class="custom-control custom-checkbox h-100">
                                                    <input name="pounds" value="5" type="radio"
                                                           class="custom-control-input d-none" id="checkPounds5">
                                                    <input type="hidden" name="username" value="{{'$username'}}"
                                                           wire:model="username">
                                                    <label id="donateAmount5"
                                                           class="custom-control-label text-uppercase h-100 d-flex align-items-center justify-content-center "
                                                           for="checkPounds5">5<br>Pounds</label>
                                                </div>
                                            </div>
                                            <div class="col mb-3 px-1">
                                                <div class="custom-control custom-checkbox h-100">
                                                    <input name="pounds" value="20" type="radio" checked
                                                           class="custom-control-input active-donation-amount d-none"
                                                           id="checkPounds20">
                                                    <label id="donateAmount20"
                                                           class="custom-control-label text-uppercase h-100 d-flex align-items-center justify-content-center"
                                                           for="checkPounds20">20<br>Pounds</label>
                                                </div>
                                            </div>
                                            <div class="col mb-3 px-1">
                                                <div class="custom-control custom-checkbox h-100">
                                                    <input name="pounds" value="50" type="radio"
                                                           class="custom-control-input d-none" id="checkPounds50">
                                                    <label id="donateAmount50"
                                                           class="custom-control-label text-uppercase h-100 d-flex align-items-center justify-content-center"
                                                           for="checkPounds50">50<br>Pounds</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-1 px-1">
                                                <div class="custom-control custom-checkbox h-100">
                                                    <input name="pounds" value="100" type="radio"
                                                           class="custom-control-input d-none" id="checkPounds100">
                                                    <label id="donateAmount100"
                                                           class="custom-control-label text-uppercase h-100 d-flex align-items-center justify-content-center"
                                                           for="checkPounds100">100<br>Pounds</label>
                                                </div>
                                            </div>
                                            <div class="col-8 mb-1 px-1">
                                                <input id="donateAmountOther" name="other_amount" type="number"
                                                       class="form-control custom-control h-100 @error('other_amount') is-invalid @enderror"
                                                       maxlength="10" placeholder="Other Amount"
                                                       wire:model="other_amount">
                                                @error('other_amount')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-12 my-2">
                                                <small class="text-muted"><em></em></small>
                                            </div>
                                        </div>
                                            <div class="form-group py-1 mb-1">
                                                <select id="donatePaymentMethod"
                                                        class="form-control custom-control h-100 @error('payment_method') is-invalid @enderror"
                                                        wire:model="payment_method">
                                                    <option value="">select</option>
                                                    <option value="mpesa">mpesa</option>
                                                    <option value="paypal">paypal</option>
                                                </select>
                                                @error('payment_method')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group py-1 mb-1">
                                                <input id="donatePaymentMethod" class="form-control custom-control h-100 @error('input_name') is-invalid @enderror" wire:model="input_name">
                                                @error('input_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group py-1 mb-1">
                                                <textarea id="donatePaymentMethod"  class="form-control custom-control h-100 @error('input_message') is-invalid @enderror" wire:model="input_message"></textarea>
                                                @error('input_message')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        <div class="form-group py-1 mb-1">
                                            <button id="donateBtnStep1" type="submit"
                                                    class="btn btn-large btn-orange text-uppercase frm-step-btn"
                                                    data-step="1">Next
                                            </button>
                                        </div>
                                        {{--                                        <div class="form-group py-1 m-0">--}}
                                        {{--                                            <button type="button" class="btn btn-link text-dark text-uppercase" data-toggle="modal" data-target="#faqModal"><u>FAQ</u></button>--}}
                                        {{--                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer id="footer">
        <div class="section-inner">
            <div class="container pt-5">
                <div class="container text-center">
                    <div class="brand-wrapper">
                        <div class="brand-inner">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </footer>
</main>
@push('scripts')
    <script>
        window.addEventListener('swal:modal', event => {
            swal.fire({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.icon,
                confirmButtonText: event.detail.button,
            })
        });
    </script>
@endpush

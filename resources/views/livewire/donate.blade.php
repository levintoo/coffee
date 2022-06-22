@push('styles')
    <style>
    .image img {
        transition: all 0.5s;
    }

    .name {
        font-size: 22px;
        font-weight: bold
    }

    .idd {
        font-size: 14px;
        font-weight: 600
    }

    .idd1 {
        font-size: 12px
    }

    .number {
        font-size: 22px;
        font-weight: bold
    }

    .follow {
        font-size: 12px;
        font-weight: 500;
        color: #444444
    }

    .btn1 {
        height: 40px;
        width: 150px;
        border: none;
        background-color: #000;
        color: #aeaeae;
        font-size: 15px
    }

    .text span {
        font-size: 13px;
        color: #545454;
        font-weight: 500
    }

    .icons i {
        font-size: 19px
    }

    hr .new1 {
        border: 1px solid
    }

    .join {
        font-size: 14px;
        color: #a0a0a0;
        font-weight: bold
    }

    .date {
        background-color: #ccc
    }
</style>
@endpush
<main id="main">
    <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
        <div class="card p-4">
            <div class=" image d-flex flex-column justify-content-center align-items-center">
                <img src="{{ asset('users') }}/{{ $user->photo_url }}" height="100" width="100" />
                <span class="name mt-3">{{ $user->name }}</span>
                <span class="idd">@ {{ $user->username }}</span>
                <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                    <span class="idd1">{{ $user->username }}</span> <span><i class="fa fa-copy"></i></span>
                </div>
                @if($user->profession)
                <div class=" px-2 rounded mt-4 date ">
                    <span class="join">{{ $user->profession}}</span>
                </div>
                @endif
                @if($user->description)
                <div class="text col-12">
                    <span>
                        </br>
                        {{ $user->description}}
                    </span>
                </div>
                @endif
                <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center">
                    <span><i class="fa fa-twitter"></i></span>
                    <span><i class="fa fa-facebook-f"></i></span>
                    <span><i class="fa fa-instagram"></i></span>
                    <span><i class="fa fa-linkedin"></i></span>
                </div>
                <div class="gap-3 my-3 icons d-flex flex-row justify-content-center align-items-center">
                    <span>
                        <h4 class="donate-headline">Every $1 is one cup of coffee for {{$user->username}}</h4>
                    </span>
                </div>

{{--                <form id="donateFrm" class="w-100">--}}
{{--                    @csrf--}}
{{--                    @if (session('status'))--}}
{{--                    <div class="alert alert-success" role="alert">--}}
{{--                        {{ session('status') }}--}}
{{--                    </div>--}}
{{--                    @endif--}}

{{--                    <div class="col-12">--}}
{{--                        <label class="fs-5">Amount</label>--}}
{{--                        <input id="donateAmountOther" name="other_amount" type="number" class="form-control custom-control h-100 @error('other_amount') is-invalid @enderror" maxlength="10" placeholder="Amount" wire:model="other_amount">--}}
{{--                        @error('other_amount')--}}
{{--                        <span class="invalid-feedback" role="alert">--}}
{{--                            <strong>{{ $message }}</strong>--}}
{{--                        </span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group mt-2">--}}
{{--                        <label class="fs-5">Method of payment</label>--}}
{{--                        <select id="donatePaymentMethod" class="form-control custom-control h-100 @error('payment_method') is-invalid @enderror" wire:model="payment_method">--}}
{{--                            <option value="">select</option>--}}
{{--                            <option value="mpesa">mpesa</option>--}}
{{--                            <option value="paypal">paypal</option>--}}
{{--                        </select>--}}
{{--                        @error('payment_method')--}}
{{--                        <span class="invalid-feedback" role="alert">--}}
{{--                            <strong>{{ $message }}</strong>--}}
{{--                        </span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group mt-2">--}}
{{--                        <label class="fs-5">Your name</label>--}}
{{--                        <input id="donatePaymentMethod" class="form-control custom-control h-100 @error('input_name') is-invalid @enderror" wire:model="input_name" placeholder="John Doe">--}}
{{--                        @error('input_name')--}}
{{--                        <span class="invalid-feedback" role="alert">--}}
{{--                            <strong>{{ $message }}</strong>--}}
{{--                        </span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group mt-2">--}}
{{--                        <label class="fs-5">Say something nice</label>--}}
{{--                        <textarea id="donatePaymentMethod" class="form-control custom-control h-100 @error('input_message') is-invalid @enderror" wire:model="input_message" placeholder="Write a message here"></textarea>--}}
{{--                        @error('input_message')--}}
{{--                        <span class="invalid-feedback" role="alert">--}}
{{--                            <strong>{{ $message }}</strong>--}}
{{--                        </span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <!-- <div class="form-group mt-2">--}}
{{--                        <button id="donateBtnStep1" type="submit" class="btn btn-large btn-orange text-uppercase frm-step-btn" data-step="1">Next--}}
{{--                        </button>--}}
{{--                    </div> -->--}}

{{--                </form>--}}
                <div class="d-flex mt-3">
                    <button type="button" class="btn1 btn-dark" wire:click.prevent="donate">Donate</button>
                </div>
                </div>
        </div>
    </div>


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

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
                <div class="d-flex mt-3">
                    <button type="button" class="btn1 btn-dark" data-bs-toggle="modal" data-bs-target="#donateModal">Donate</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body btn-showcase">
        <div wire:ignore.self class="modal fade" id="donateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">New donation</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="donate" id="submitDonation">
                            @csrf
                            @if(session('status'))
                                {{ session('status') }}
                            @endif
                            <div class="mb-3">
                                <label class="col-form-label">Payment Method:</label>
                                <select class="form-control" wire:model="payment_method">
                                    <option value="" default class="text-muted">--Select--</option>
                                    <option  value="mpesa">Mpesa</option>
                                    <option value="paypal">Paypal</option>
                                </select>
                                @error('payment_method')
                                <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Amount:</label>
                                <input class="form-control" type="number" wire:model="other_amount">
                                @error('other_amount')
                                <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            @if($this->payment_method == "mpesa")
                                <div class="mb-3">
                                    <label class="col-form-label" for="message-text">Phone:</label>
                                    <input class="form-control" wire:model="input_phone">
                                    @error('input_phone')
                                    <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            @endif
{{--                            <div class="mb-3">--}}
{{--                                <label class="col-form-label">Name:</label>--}}
{{--                                <input class="form-control" type="text" wire:model="input_name">--}}
{{--                                @error('input_name')--}}
{{--                                <span class="text-danger" role="alert">--}}
{{--                                            <strong>{{ $message }}</strong>--}}
{{--                                        </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
                            <div class="mb-3">
                                <label class="col-form-label" >Message:</label>
                                <textarea class="form-control" wire:model="input_message" placeholder="Say something nice .."></textarea>
                                @error('input_message')
                                <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

{{--                            <div class="mb-3">--}}
{{--                                <label class="col-form-label" for="message-text">Paypal:</label>--}}
{{--                                <input  class="btn btn-secondary" type="button" value="Paypal">--}}
{{--                            </div>--}}
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit" form="submitDonation">Donate</button>
                    </div>
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
        window.addEventListener('close-modal', event =>{
            $('#donateModal').modal('hide');
        })
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

<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>Wallet</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="home-item" href="index-2.html"><i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item active"> Wallet</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid default-dash">
        <div class="row">
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden">
                    <div class="card-body">
                        <div class="media static-widget">
                            <div class="media-body">
                                <h6 class="font-roboto">Balance</h6>
                                <h4 class="mb-0 counter">{{ number_format($wallet, 0)}}</h4>
                            </div>
                            <svg class="fill-primary" width="48" height="48" viewBox="0 0 48 48" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M22.5938 14.1562V17.2278C20.9604 17.8102 19.7812 19.3566 19.7812 21.1875C19.7812 23.5138 21.6737 25.4062 24 25.4062C24.7759 25.4062 25.4062 26.0366 25.4062 26.8125C25.4062 27.5884 24.7759 28.2188 24 28.2188C23.2241 28.2188 22.5938 27.5884 22.5938 26.8125H19.7812C19.7812 28.6434 20.9604 30.1898 22.5938 30.7722V33.8438H25.4062V30.7722C27.0396 30.1898 28.2188 28.6434 28.2188 26.8125C28.2188 24.4862 26.3263 22.5938 24 22.5938C23.2241 22.5938 22.5938 21.9634 22.5938 21.1875C22.5938 20.4116 23.2241 19.7812 24 19.7812C24.7759 19.7812 25.4062 20.4116 25.4062 21.1875H28.2188C28.2188 19.3566 27.0396 17.8102 25.4062 17.2278V14.1562H22.5938Z"></path>
                                <path
                                    d="M25.4062 0V11.4859C31.2498 12.1433 35.8642 16.7579 36.5232 22.5938H48C47.2954 10.5189 37.4829 0.704531 25.4062 0Z"></path>
                                <path
                                    d="M14.1556 31.8558C12.4237 29.6903 11.3438 26.9823 11.3438 24C11.3438 17.5025 16.283 12.1958 22.5938 11.4859V0C10.0492 0.731813 0 11.2718 0 24C0 30.0952 2.39381 35.6398 6.14897 39.8624L14.1556 31.8558Z"></path>
                                <path
                                    d="M47.9977 25.4062H36.5143C35.8044 31.717 30.4977 36.6562 24.0002 36.6562C21.0179 36.6562 18.3099 35.5763 16.1444 33.8444L8.13779 41.851C12.3604 45.6062 17.905 48 24.0002 48C36.7284 48 47.2659 37.9508 47.9977 25.4062Z"></path>
                            </svg>
                        </div>
                        <div class="progress-widget">
                            <div class="progress sm-progress-bar progress-animate">
                                <div class="progress-gradient-primary" role="progressbar"
                                     style="width: {{$wallet/500*100}}%" aria-valuenow="90" aria-valuemin="0"
                                     aria-valuemax="100"><span class="animate-circle"></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden">
                    <div class="card-body">
                        <div class="media static-widget">
                            <div class="media-body">
                                <h6 class="font-roboto">Today's earning</h6>
                                <h4 class="mb-0 counter">{{ number_format($todaysearning, 0)}}</h4>
                            </div>
                            <svg class="@if($wallet>0){{"fill-success"}}@else {{"fill-danger"}}@endif" width="48"
                                 height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M22.5938 14.1562V17.2278C20.9604 17.8102 19.7812 19.3566 19.7812 21.1875C19.7812 23.5138 21.6737 25.4062 24 25.4062C24.7759 25.4062 25.4062 26.0366 25.4062 26.8125C25.4062 27.5884 24.7759 28.2188 24 28.2188C23.2241 28.2188 22.5938 27.5884 22.5938 26.8125H19.7812C19.7812 28.6434 20.9604 30.1898 22.5938 30.7722V33.8438H25.4062V30.7722C27.0396 30.1898 28.2188 28.6434 28.2188 26.8125C28.2188 24.4862 26.3263 22.5938 24 22.5938C23.2241 22.5938 22.5938 21.9634 22.5938 21.1875C22.5938 20.4116 23.2241 19.7812 24 19.7812C24.7759 19.7812 25.4062 20.4116 25.4062 21.1875H28.2188C28.2188 19.3566 27.0396 17.8102 25.4062 17.2278V14.1562H22.5938Z"></path>
                                <path
                                    d="M25.4062 0V11.4859C31.2498 12.1433 35.8642 16.7579 36.5232 22.5938H48C47.2954 10.5189 37.4829 0.704531 25.4062 0Z"></path>
                                <path
                                    d="M14.1556 31.8558C12.4237 29.6903 11.3438 26.9823 11.3438 24C11.3438 17.5025 16.283 12.1958 22.5938 11.4859V0C10.0492 0.731813 0 11.2718 0 24C0 30.0952 2.39381 35.6398 6.14897 39.8624L14.1556 31.8558Z"></path>
                                <path
                                    d="M47.9977 25.4062H36.5143C35.8044 31.717 30.4977 36.6562 24.0002 36.6562C21.0179 36.6562 18.3099 35.5763 16.1444 33.8444L8.13779 41.851C12.3604 45.6062 17.905 48 24.0002 48C36.7284 48 47.2659 37.9508 47.9977 25.4062Z"></path>
                            </svg>
                        </div>
                        <div class="progress-widget">
                            <div class="progress sm-progress-bar progress-animate">
                                <div
                                    class="@if($wallet>0){{"progress-gradient-success"}}@else {{"progress-gradient-danger"}}@endif"
                                    role="progressbar" style="width: {{$todaysearning/500*100}}%" aria-valuenow="90"
                                    aria-valuemin="0" aria-valuemax="100"><span class="animate-circle"></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden">
                    <div class="card-body">
                        <div class="media static-widget">
                            <div class="media-body">
                                <h6 class="font-roboto">Withdrawals</h6>
                                <h4 class="mb-0 counter">{{ number_format($withdrawal, 0)}}</h4>
                            </div>
                            <svg class="fill-secondary" width="48" height="48" viewBox="0 0 48 48" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M22.5938 14.1562V17.2278C20.9604 17.8102 19.7812 19.3566 19.7812 21.1875C19.7812 23.5138 21.6737 25.4062 24 25.4062C24.7759 25.4062 25.4062 26.0366 25.4062 26.8125C25.4062 27.5884 24.7759 28.2188 24 28.2188C23.2241 28.2188 22.5938 27.5884 22.5938 26.8125H19.7812C19.7812 28.6434 20.9604 30.1898 22.5938 30.7722V33.8438H25.4062V30.7722C27.0396 30.1898 28.2188 28.6434 28.2188 26.8125C28.2188 24.4862 26.3263 22.5938 24 22.5938C23.2241 22.5938 22.5938 21.9634 22.5938 21.1875C22.5938 20.4116 23.2241 19.7812 24 19.7812C24.7759 19.7812 25.4062 20.4116 25.4062 21.1875H28.2188C28.2188 19.3566 27.0396 17.8102 25.4062 17.2278V14.1562H22.5938Z"></path>
                                <path
                                    d="M25.4062 0V11.4859C31.2498 12.1433 35.8642 16.7579 36.5232 22.5938H48C47.2954 10.5189 37.4829 0.704531 25.4062 0Z"></path>
                                <path
                                    d="M14.1556 31.8558C12.4237 29.6903 11.3438 26.9823 11.3438 24C11.3438 17.5025 16.283 12.1958 22.5938 11.4859V0C10.0492 0.731813 0 11.2718 0 24C0 30.0952 2.39381 35.6398 6.14897 39.8624L14.1556 31.8558Z"></path>
                                <path
                                    d="M47.9977 25.4062H36.5143C35.8044 31.717 30.4977 36.6562 24.0002 36.6562C21.0179 36.6562 18.3099 35.5763 16.1444 33.8444L8.13779 41.851C12.3604 45.6062 17.905 48 24.0002 48C36.7284 48 47.2659 37.9508 47.9977 25.4062Z"></path>
                            </svg>
                        </div>
                        <div class="progress-widget">
                            <div class="progress sm-progress-bar progress-animate">
                                <div class="progress-gradient-secondary" role="progressbar"
                                     style="width: {{$withdrawal/1000*100}}%" aria-valuenow="90" aria-valuemin="0"
                                     aria-valuemax="100"><span class="animate-circle"></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden">
                    <div class="card-body">
                        <div class="media static-widget">
                            <div class="media-body">
                                <h6><p class="font-roboto">Today's withdrawal</p></h6>
                                <h4 class="mb-0 counter">{{ number_format($todayswithdrawal, 0)}}</h4>
                            </div>
                            <svg class="@if($todayswithdrawal<1000){{"fill-info"}}@else {{"fill-danger"}}@endif"
                                 width="48" height="48" viewBox="0 0 48 48" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M22.5938 14.1562V17.2278C20.9604 17.8102 19.7812 19.3566 19.7812 21.1875C19.7812 23.5138 21.6737 25.4062 24 25.4062C24.7759 25.4062 25.4062 26.0366 25.4062 26.8125C25.4062 27.5884 24.7759 28.2188 24 28.2188C23.2241 28.2188 22.5938 27.5884 22.5938 26.8125H19.7812C19.7812 28.6434 20.9604 30.1898 22.5938 30.7722V33.8438H25.4062V30.7722C27.0396 30.1898 28.2188 28.6434 28.2188 26.8125C28.2188 24.4862 26.3263 22.5938 24 22.5938C23.2241 22.5938 22.5938 21.9634 22.5938 21.1875C22.5938 20.4116 23.2241 19.7812 24 19.7812C24.7759 19.7812 25.4062 20.4116 25.4062 21.1875H28.2188C28.2188 19.3566 27.0396 17.8102 25.4062 17.2278V14.1562H22.5938Z"></path>
                                <path
                                    d="M25.4062 0V11.4859C31.2498 12.1433 35.8642 16.7579 36.5232 22.5938H48C47.2954 10.5189 37.4829 0.704531 25.4062 0Z"></path>
                                <path
                                    d="M14.1556 31.8558C12.4237 29.6903 11.3438 26.9823 11.3438 24C11.3438 17.5025 16.283 12.1958 22.5938 11.4859V0C10.0492 0.731813 0 11.2718 0 24C0 30.0952 2.39381 35.6398 6.14897 39.8624L14.1556 31.8558Z"></path>
                                <path
                                    d="M47.9977 25.4062H36.5143C35.8044 31.717 30.4977 36.6562 24.0002 36.6562C21.0179 36.6562 18.3099 35.5763 16.1444 33.8444L8.13779 41.851C12.3604 45.6062 17.905 48 24.0002 48C36.7284 48 47.2659 37.9508 47.9977 25.4062Z"></path>
                            </svg>
                        </div>
                        <div class="progress-widget">
                            <div class="progress sm-progress-bar progress-animate">
                                <div
                                    class="@if($todayswithdrawal<1000){{"progress-gradient-info"}}@else {{"progress-gradient-danger"}}@endif"
                                    role="progressbar" style="width: {{$todayswithdrawal/1000*100}}%"
                                    aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"><span
                                        class="animate-circle"></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 col-xl-8 xl-50 col-md-12 box-col-6">
                <div class="card">
                    <div class="card-header">
                        <div class="media">
                            <div class="media-body">
                                <h5>Mpesa</h5>
                            </div>
                        </div>
                    </div>
                    <div class="contact-form card-body">
                        <form class="theme-form" wire:submit.prevent="withdrawMpesa">
                            @csrf
                            @if(session()->has('status'))
                                {{ session('status') }}
                            @endif
                            <div class="form-icon"><i class="icofont icofont-envelope-open"></i></div>
                            <div class="mb-3">
                                <label for="exampleInputAmount">Amount</label>
                                <input wire:model="mpesa_amount" class="form-control" id="exampleMpesaInputAmount" name="inputAmount" type="number" placeholder="500" data-bs-original-title="" title=""  autofocus >
                                @error('mpesa_amount') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label" for="exampleInputPhone1">Number</label>
                                <input wire:model="mpesa_number" class="form-control" id="exampleInputPhone1" type="text" name="inputPhone" :value="old('phone')" autocomplete="[phone]" type="text" placeholder="0700814223" data-bs-original-title="" title="">
                                @error('mpesa_number') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="text-sm-end">
                                <button id="exampleMpesaSubmit" type="submit" class="btn btn-primary" data-bs-original-title="" title="">SEND IT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 col-xl-8 xl-50 col-md-12 box-col-6">
                <div class="card">
                    <div class="card-header">
                        <div class="media">
                            <div class="media-body">
                                <h5>Paypal</h5>
                            </div>
                        </div>
                    </div>
                    <div class="contact-form card-body">
                        <form class="theme-form" wire:submit.prevent="withdrawPaypal">
                            @csrf
                            @if(session()->has('status'))
                                {{ session('status') }}
                            @endif
                            <div class="form-icon"><i class="icofont icofont-envelope-open"></i></div>
                            <div class="mb-3">
                                <label for="exampleInputAmount">Amount</label>
                                <input wire:model="paypal_amount" class="form-control" id="exampleInputAmount" type="number" name="inputAmount"  placeholder="$500" data-bs-original-title="" title="">
                                @error('paypal_amount') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label" for="exampleInputEmail1">Email</label>
                                <input wire:model="paypal_email" class="form-control" id="exampleInputEmail1" type="email" name="inputEmail" placeholder="Demo@gmail.com" data-bs-original-title="" title="">
                                @error('paypal_email') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="text-sm-end">
                                <button type="submit" class="btn btn-primary" data-bs-original-title="" title="">SEND IT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        window.addEventListener('swal:modal', event => {
            swal.fire({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.icon,
                button: event.detail.button,
            })
        });
    </script>
@endpush

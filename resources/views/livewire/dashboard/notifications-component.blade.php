<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>Notifications</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="home-item" href="index-2.html"><i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item active"> Notifications</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="email-wrap">
            <div class="row">
                <div class="col-xl-12 box-col-12 col-md-12 xl-100">
                    <div class="email-right-aside">
                        <div class="card email-body">
                            <div class="email-profile">
                                <div>
                                    <div class="pe-0 b-r-light"></div>
                                    <div class="email-top">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="media">
                                                    <label class="email-chek d-block">
                                                        <input class="checkbox_animated" type="checkbox" checked="">
                                                    </label>
                                                    <div class="media-body">
                                                        <div class="dropdown">
                                                            <button class="btn btn-primary dropdown-toggle"
                                                                    id="dropdownMenuButton" type="button"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">Action
                                                            </button>
                                                            <div class="dropdown-menu"
                                                                 aria-labelledby="dropdownMenuButton" style=""><a
                                                                    class="dropdown-item" href="javascript:void(0)">Refresh</a><a
                                                                    class="dropdown-item" href="javascript:void(0)">Mark
                                                                    as important</a><a class="dropdown-item"
                                                                                       href="javascript:void(0)">Move to
                                                                    span</a><a class="dropdown-item"
                                                                               href="javascript:void(0)">Move to
                                                                    trush </a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if(session()->has('status'))
                                        {{ session('status') }}
                                    @endif
                                    <div class="inbox min-vh-50">
                                        @forelse($this->notifications as $notification)
                                            @if($notification->status > 0)
                                            <div class="media" style="background: rgba(75,80,103,0.02)">
                                                <div class="media-size-email">
                                                    <label class="d-block mb-0">
                                                        <input class="checkbox_animated" type="checkbox">
                                                    </label><img class="me-3 rounded-circle"
                                                                 src="../assets/images/user/user.png" alt="" wire:click="setModalTitle({{ $notification->id }})">
                                                </div>
                                                <div class="media-body" style="cursor: pointer" wire:click="setModalTitle({{ $notification->id }})">
                                                    <h6 class="f-w-300">{{ $notification->title }} </h6>
                                                    <div class="mx-3 text-muted f-w-300">
                                                        {{ $notification->message }}
                                                    </div>
                                                    <span class="f-w-300">11:59 PM</span>
                                                </div>
                                            </div>
                                            @else
                                            <div class="media">
                                                <div class="media-size-email">
                                                    <label class="d-block mb-0">
                                                        <input class="checkbox_animated" type="checkbox" checked="">
                                                    </label><img class="me-3 rounded-circle"
                                                                 src="../assets/images/user/user.png" alt="" wire:click.prefetch="setModalTitle({{ $notification->id }})">
                                                </div>
                                                <div class="media-body" style="cursor: pointer" wire:click.prefetch="setModalTitle({{ $notification->id }})" >
                                                    <h6>{{ $notification->title }}</h6>
                                                    <div class="mx-3 f-w-500">{{ $notification->message }}.</div>
                                                    <span>{{ $notification->notified_at }}</span>
                                                </div>
                                            </div>
                                            @endif
                                        @empty
                                            <div class="my-4 d-flex justify-content-center">
                                                <div class="fs-6">You have no notifications yet.</div>
                                            </div>
                                        @endforelse

                                    </div>
                                </div>
                            </div>
                        </div>
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
                html: event.detail.html,
                footer: event.detail.footer,
                showCancelButton: false,
                showConfirmButton: false,
            })
        });
    </script>
@endpush

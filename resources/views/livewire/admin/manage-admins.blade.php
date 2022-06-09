@push('styles')
    <style>
        .magic-float-bottom-left {
            /* background-color: blue; */
            position: fixed !important;
            z-index: 1001;
            /* right: 0 !important; */
            top: 1.5rem !important;
            left: 20rem !important;
        }
    </style>
@endpush
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>Manage Admins</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a class="home-item" href="index-2.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item"> Admin</li>
                        <li class="breadcrumb-item active"> Users</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="faq-wrap">
            <div class="row">

                <div class="col-12">
                    <div class="card custom-card mb-2">
                        <form class="needs-validation" novalidate="">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label class="form-label" for="validationCustom03">Search</label>
                                    <input class="form-control" id="validationCustom03" type="text"
                                           placeholder="Search" wire:model="search_value">
                                    <div class="invalid-feedback">Please provide a valid city.</div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="validationCustom04">Status</label>
                                    <select class="form-select" id="validationCustom04" wire:model="status">
                                        <option selected="" disabled="" value="">Choose...</option>
                                        <option value="1">Active</option>
                                        <option value="2">Deleted</option>
                                        <option value="3">Suspended</option>
                                        <option>...</option>
                                    </select>
                                    <div class="invalid-feedback">Please select a valid state.</div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="validationCustom04">Sort By</label>
                                    <select class="form-select" id="validationCustom04" wire:model="sort_value">
                                        <option selected="" disabled="" value="">Choose...</option>
                                        <option value="1">Date Joined(old)</option>
                                        <option value="2">Date Joined(new)</option>
                                        <option value="3">Name a-z</option>
                                        <option value="4">Name z-a</option>
                                        <option>...</option>
                                    </select>
                                    <div class="invalid-feedback">Please select a valid state.</div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="validationCustom05"><br/></label>
                                    <input class="form-control btn btn-primary" type="button" id="validationCustom05" value="Clear" wire:click.prevent="resetFilters">
                                    <div class="invalid-feedback">Please provide a valid zip.</div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                @if (session('status'))

                    <div class="card custom-card col-12 alert alert-success" role="alert">
                        <div class=" ">
                            {{ session('status') }}
                            jjjj
                        </div>
                    </div>
                @endif
                <div class="col-sm-6 col-md-3 magic-float-bottom-left" wire:loading>
                    <h6 class="sub-title mb-0 text-center">Loader 3</h6>
                    <div class="loader-box">
                        <div class="loader-3"></div>
                    </div>
                </div>

                @forelse($users as $user)
                    <div class="col-md-4 col-lg-4 col-xl-4 box-col-4">
                        <div class="card custom-card">

                            <div class="card-profile  h-25"><img class="rounded-circle" src="{{ asset('users') }}/{{ $user->photo_url }}" alt="{{ $user->username }}"></div>
                            <div class="text-center profile-details"><a href="user-profile.html">
                                    <h4>{{ $user->name }}</h4></a>
                                <h6 class="mb-1">{{ $user->username }}</h6>
                            @if($user->status == "1")
                                    <span class="badge badge-success">Active</span>
                                @elseif($user->status == "2")
                                    <span class="badge badge-danger">Suspended</span>
                                @else
                                    <span class="badge badge-info">Unknown</span>
                                @endif
                                @if($user->deleted_at != "")
                                    <span class="badge badge-info">deleted</span>
                                @endif
                            </div>
                            <ul class="card-social">
                                <li><a href="#" wire:click.prevent="resetPassword('{{$user->email}}')"><svg class="svg-inline--fa fa-unlock" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="unlock" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M144 192H384C419.3 192 448 220.7 448 256V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V256C0 220.7 28.65 192 64 192H80V144C80 64.47 144.5 0 224 0C281.5 0 331 33.69 354.1 82.27C361.7 98.23 354.9 117.3 338.1 124.9C322.1 132.5 303.9 125.7 296.3 109.7C283.4 82.63 255.9 64 224 64C179.8 64 144 99.82 144 144L144 192z"></path></svg><!-- <i class="fas fa-unlock"></i> Font Awesome fontawesome.com --></a></li>
                                @role('super-admin')<li><a href="#"><svg class="svg-inline--fa fa-ban" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ban" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM99.5 144.8C77.15 176.1 64 214.5 64 256C64 362 149.1 448 256 448C297.5 448 335.9 434.9 367.2 412.5L99.5 144.8zM448 256C448 149.1 362 64 256 64C214.5 64 176.1 77.15 144.8 99.5L412.5 367.2C434.9 335.9 448 297.5 448 256V256z"></path></svg><!-- <i class="fas fa-ban"></i> Font Awesome fontawesome.com --></a></li>@endrole
                                <li><a href="#"><svg class="svg-inline--fa fa-pen-to-square" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-to-square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M490.3 40.4C512.2 62.27 512.2 97.73 490.3 119.6L460.3 149.7L362.3 51.72L392.4 21.66C414.3-.2135 449.7-.2135 471.6 21.66L490.3 40.4zM172.4 241.7L339.7 74.34L437.7 172.3L270.3 339.6C264.2 345.8 256.7 350.4 248.4 353.2L159.6 382.8C150.1 385.6 141.5 383.4 135 376.1C128.6 370.5 126.4 361 129.2 352.4L158.8 263.6C161.6 255.3 166.2 247.8 172.4 241.7V241.7zM192 63.1C209.7 63.1 224 78.33 224 95.1C224 113.7 209.7 127.1 192 127.1H96C78.33 127.1 64 142.3 64 159.1V416C64 433.7 78.33 448 96 448H352C369.7 448 384 433.7 384 416V319.1C384 302.3 398.3 287.1 416 287.1C433.7 287.1 448 302.3 448 319.1V416C448 469 405 512 352 512H96C42.98 512 0 469 0 416V159.1C0 106.1 42.98 63.1 96 63.1H192z"></path></svg><!-- <i class="fas fa-edit"></i> Font Awesome fontawesome.com --></a></li>
                                @role('super-admin')<li><a href="#"><svg class="svg-inline--fa fa-trash" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM394.8 466.1C393.2 492.3 372.3 512 346.9 512H101.1C75.75 512 54.77 492.3 53.19 466.1L31.1 128H416L394.8 466.1z"></path></svg><!-- <i class="fas fa-trash"></i> Font Awesome fontawesome.com --></a></li>@endrole
                            </ul>
                        </div>
                    </div>
                @empty
                    <div class="my-4 d-flex justify-content-center">
                        <div class="fs-6">There are no admins found.</div>
                    </div>
                @endforelse
                <div class="m-auto mb-2">
                    {!! $users->links() !!}
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

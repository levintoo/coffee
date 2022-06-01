    <div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>Settings</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a class="home-item" href="index-2.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item active">Settings</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid default-dash">
        <div class="row mb-5">
            <div class="col-lg-3">
                <div class="card position-sticky top-1">
                    <ul class="nav flex-column bg-white border-radius-lg p-3">
                        <li class="nav-item">
                            <a class="nav-link text-body" data-scroll="" href="#profile">
                                <span class="text-sm">Profile</span>
                            </a>
                        </li>
                        <li class="nav-item pt-2">
                            <a class="nav-link text-body" data-scroll="" href="#basic-info">
                                <span class="text-sm">Basic Info</span>
                            </a>
                        </li>
                        <li class="nav-item pt-2">
                            <a class="nav-link text-body" data-scroll="" href="#password">
                                <span class="text-sm">Change Password</span>
                            </a>
                        </li>
                        <li class="nav-item pt-2">
                            <a class="nav-link text-body" data-scroll="" href="#2fa">
                                <span class="text-sm">2FA</span>
                            </a>
                        </li>
                        <li class="nav-item pt-2">
                            <a class="nav-link text-body" data-scroll="" href="#notifications">
                                <span class="text-sm">Notifications</span>
                            </a>
                        </li>
                        <li class="nav-item pt-2">
                            <a class="nav-link text-body" data-scroll="" href="#sessions">
                                <span class="text-sm">Sessions</span>
                            </a>
                        </li>
                        <li class="nav-item pt-2">
                            <a class="nav-link text-body" data-scroll="" href="#delete">
                                <span class="text-sm">Delete Account</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 mt-lg-0 mt-4">

                <div class="card card-body" id="profile">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-sm-auto col-4">
                            <div class="avatar avatar-xl position-relative">
                                <img src="../../../assets/img/bruce-mars.jpg" alt="{{ Auth::user()->name }}" class="w-100 border-radius-lg shadow-sm">
                            </div>
                        </div>
                        <div class="col-sm-auto col-8 my-auto">
                            <div class="h-100">
                                <h5 class="mb-1 font-weight-bolder">
                                    {{ $name }}
                                </h5>
                                <p class="mb-0 font-weight-bold text-sm">
                                    {{ $profession }} / Co-Founder
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-auto ms-sm-auto mt-sm-0 mt-3 d-flex">
                            <label class="form-check-label mb-0">
{{--                                <small id="profileVisibility">--}}
{{--                                    Switch to invisible--}}
{{--                                </small>--}}
                            </label>
                            <div class="form-check form-switch ms-2">
{{--                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault23" checked="" onchange="visible()">--}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <h5>Basic Info</h5>
                    </div>
                    <form class="card-body pt-0">
                        @csrf
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label mt-4">Name</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="{{ Auth::user()->name }}" required="required"  wire:model="name">
                                </div>
                                @error('name') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-6">
                                <label class="form-label mt-4">Username</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="{{ Auth::user()->username }}" required="required"  wire:model="username">
                                </div>
                                @error('username') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label mt-4">Email</label>
                                <div class="input-group">
                                    <input class="form-control" type="email" placeholder="{{ Auth::user()->email }}"  wire:model="email">
                                </div>
                                @error('email') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-6">
                                <label class="form-label mt-4">Phone Number</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="+254{{ Auth::user()->phone }}"  wire:model="phone">
                                </div>
                                @error('phone') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label mt-4">Country</label>
                                    <div class="input-group">
                                        <input  class="form-control" type="text" placeholder="{{ Auth::user()->country }}"  wire:model="country">
                                    </div>
                                    @error('country') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            <div class="col-6">
                                <label class="form-label mt-4">Profession</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="{{ Auth::user()->profession }}"  wire:model="profession">
                                </div>
                                @error('profession') <span class="error">{{ $message }}</span> @enderror
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label mt-4">Description</label>
                                <div class="input-group">
                                    <textarea class="form-control" placeholder="{{ Auth::user()->description }}"  wire:model="description"></textarea>
                                </div>
                                @error('description') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 float-start mt-2">
                                <button class="btn btn-sm btn-outline-dark mb-0 mt-4"  wire:click.prevent="updateUser">Update info</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card mt-4" id="password">
                    <div class="card-header">
                        <h5>Change Password</h5>
                    </div>
                    <form class="card-body pt-0" method="POST" action="{{ route('post') }}">
                        @csrf
                        <label class="form-label">Current password</label>
                        <div class="form-group">
                            <input class="form-control" type="password" name="current_password" placeholder="Current password" >
                        </div>
                        <label class="form-label mt-2">New password</label>
                        <div class="form-group">
                            <input class="form-control" type="password" name="new_password" placeholder="New password"  aria-autocomplete="list">
                        </div>
                        <label class="form-label mt-2">Confirm new password</label>
                        <div class="form-group">
                            <input class="form-control" type="password" name="confirm_password"  placeholder="Confirm password" >
                        </div>
                        <h5 class="mt-5">Password requirements</h5>
                        <p class="text-muted mb-2">
                            Please follow this guide for a strong password:
                        </p>
                        <ul class="text-muted ps-4 mb-0 float-start">
                            <li>
                                <span class="text-sm">One special characters</span>
                            </li>
                            <li>
                                <span class="text-sm">Min 6 characters</span>
                            </li>
                            <li>
                                <span class="text-sm">One number (2 are recommended)</span>
                            </li>
                            <li>
                                <span class="text-sm">Change it often</span>
                            </li>
                        </ul>
                        <button type="submit" class="btn btn-sm btn-outline-dark mb-0">Update password</button>
                    </form>
                </div>

                <div class="card mt-4" id="2fa">
                    <div class="card-header d-flex">
                        <h5 class="mb-0">Two-factor authentication</h5>
                        <span class="badge badge-success ms-auto">Enabled</span>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <p class="my-auto">Security keys</p>
                            <p class="text-secondary text-sm ms-auto my-auto me-3">No Security Keys</p>
                            <button class="btn btn-sm btn-outline-dark mb-0" type="button" disabled>Add</button>
                        </div>
                        <hr class="horizontal dark">
                        <div class="d-flex">
                            <p class="my-auto">SMS number</p>
                            <p class="text-secondary text-sm ms-auto my-auto me-3">+254{{ Auth::user()->phone }}</p>
                            <button class="btn btn-sm btn-outline-dark mb-0" type="button">Edit</button>
                        </div>
                        <hr class="horizontal dark">
                        <div class="d-flex">
                            <p class="my-auto">Authenticator app</p>
                            <p class="text-secondary text-sm ms-auto my-auto me-3">Not Configured</p>
                            <button class="btn btn-sm btn-outline-dark mb-0" type="button" disabled>Set up</button>
                        </div>
                    </div>
                </div>

                <div class="card mt-4" id="notifications">
                    <div class="card-header">
                        <h5>Notifications</h5>
                        <p class="text-sm">Choose how you receive notifications. These notification settings apply to the things you’re watching.</p>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                <tr>
                                    <th class="ps-1" colspan="4">
                                        <p class="mb-0">Activity</p>
                                    </th>
                                    <th class="text-center">
                                        <p class="mb-0">Email</p>
                                    </th>
                                    <th class="text-center">
                                        <p class="mb-0">Push</p>
                                    </th>
                                    <th class="text-center">
                                        <p class="mb-0">SMS</p>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="ps-1" colspan="4">
                                        <div class="my-auto">
                                            <span class="text-dark d-block text-sm">Donates</span>
                                            <span class="text-xs font-weight-normal">Notify when user donates.</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                            <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault18">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault19">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-1" colspan="4">
                                        <div class="my-auto">
                                            <p class="text-sm mb-0">Log in from a new device</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                            <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault20">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                            <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault21">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                            <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault22">
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card mt-4" id="sessions">
                    <div class="card-header pb-3">
                        <h5>Sessions</h5>
                        <p class="text-sm">This is a list of devices that have logged into your account. Remove those that you do not recognize.</p>
                    </div>
                    <div class="card-body pt-0">
                        <div class="d-flex align-items-center">
                            <div class="text-center w-5">
                                <i class="fas fa-desktop text-lg opacity-6" aria-hidden="true"></i>
                            </div>
                            <div class="my-auto ms-3">
                                <div class="h-100">
                                    <p class="text-sm mb-1">
                                        Bucharest 68.133.163.201
                                    </p>
                                    <p class="mb-0 text-xs">
                                        Your current session
                                    </p>
                                </div>
                            </div>
                            <span class="badge badge-success badge-sm my-auto ms-auto me-3">Active</span>
                            <p class="text-secondary text-sm my-auto me-3">EU</p>
                            <a href="javascript:;" class="text-primary text-sm icon-move-right my-auto">See more
                                <i class="fas fa-arrow-right text-xs ms-1" aria-hidden="true"></i>
                            </a>
                        </div>
                        <hr class="horizontal dark">
                        <div class="d-flex align-items-center">
                            <div class="text-center w-5">
                                <i class="fas fa-desktop text-lg opacity-6" aria-hidden="true"></i>
                            </div>
                            <p class="my-auto ms-3">Chrome on macOS</p>
                            <p class="text-secondary text-sm ms-auto my-auto me-3">US</p>
                            <a href="javascript:;" class="text-primary text-sm icon-move-right my-auto">See more
                                <i class="fas fa-arrow-right text-xs ms-1" aria-hidden="true"></i>
                            </a>
                        </div>
                        <hr class="horizontal dark">
                        <div class="d-flex align-items-center">
                            <div class="text-center w-5">
                                <i class="fas fa-mobile text-lg opacity-6" aria-hidden="true"></i>
                            </div>
                            <p class="my-auto ms-3">Safari on iPhone</p>
                            <p class="text-secondary text-sm ms-auto my-auto me-3">US</p>
                            <a href="javascript:;" class="text-primary text-sm icon-move-right my-auto">See more
                                <i class="fas fa-arrow-right text-xs ms-1" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card mt-4" id="delete">
                    <div class="card-header">
                        <h5>Delete Account</h5>
                        <p class="text-sm mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                    </div>
                    <div class="card-body d-sm-flex pt-0">
                        <div class="d-flex align-items-center mb-sm-0 mb-4">
                            <div>
                                <div class="form-check form-switch mb-0">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault0">
                                </div>
                            </div>
                            <div class="ms-2">
                                <span class="text-dark font-weight-bold d-block text-sm">Confirm</span>
                                <span class="text-xs d-block">I want to delete my account.</span>
                            </div>
                        </div>
                        <button class="btn btn-outline-secondary mb-0 ms-auto mx-1" type="button" name="button">Deactivate</button>
                        <button class="btn btn-outline-danger mb-0 ms-auto" type="button" name="button">Delete Account</button>
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
                    confirmButtonText: event.detail.button,
                })
            });
        </script>
@endpush

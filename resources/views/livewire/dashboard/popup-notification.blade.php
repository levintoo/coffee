<li class="onhover-dropdown">
    <div class="notification-box">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g>
                <g>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9961 2.51416C7.56185 2.51416 5.63519 6.5294 5.63519 9.18368C5.63519 11.1675 5.92281 10.5837 4.82471 13.0037C3.48376 16.4523 8.87614 17.8618 11.9961 17.8618C15.1152 17.8618 20.5076 16.4523 19.1676 13.0037C18.0695 10.5837 18.3571 11.1675 18.3571 9.18368C18.3571 6.5294 16.4295 2.51416 11.9961 2.51416Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M14.306 20.5122C13.0117 21.9579 10.9927 21.9751 9.68604 20.5122" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </g>
            </g>
            @if($this->notifications_count > 0)
        </svg><span class="badge rounded-pill badge-warning">{{ $this->notifications_count }}</span>
        @endif
    </div>
    <div class="onhover-show-div notification-dropdown">
        <div class="dropdown-title">
            <h3>Notification</h3><a class="f-right" href="cart.html"> <i data-feather="bell">                           </i></a>
        </div>
        <ul class="custom-scrollbar">
            @if(session()->has('status'))
                {{ session('status') }}
            @endif
            @forelse($notifications as $notification)
                <li>
                    <div class="media">
                        <div class="notification-img bg-light-primary"><img src="{{ asset('assets/images/avtar/man.png') }}" alt=""></div>
                        <div class="media-body">
                            <h5> <a class="f-14 m-0" href="user-profile.html">{{ $notification->title }}</a></h5>
                            <p>{{$notification->short_message}}</p><span>{{ $notification->short_notified_at }}</span>
                        </div>
                        <div class="notification-right"><a href="#" wire:click.prevent="markSeenNoty({{$notification->id}})"><i data-feather="x"></i></a></div>
                    </div>
                </li>
            @empty
                <li>
                    <div class="my-1 d-flex justify-content-center">
                        <div class="fs-6">You have no new notifications yet.</div>
                    </div>
                </li>
            @endforelse
            <li class="p-0"><a class="btn btn-primary" href="#">Check all</a></li>
        </ul>
    </div>
</li>

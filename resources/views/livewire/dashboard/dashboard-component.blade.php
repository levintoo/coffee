<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>Default</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a class="home-item" href="index-2.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item active"> Default</li>
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


<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Open modal for @getbootstrap</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
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
            <div class="col-xl-12 col-md-12">
                <div class="card ongoing-project">
                    <div class="card-header card-no-border">
                        <div class="media media-dashboard">
                            <div class="media-body">
                                <h5 class="mb-0">Recent Transactions         </h5>
                            </div>
                            <div class=""><a href="{{ route('transactions') }}" class="btn btn-info">view more</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive custom-scrollbar">
                            <table class="table table-bordernone">
                                <thead>
                                <tr>
                                    <th> <span>Payment Method </span></th>
                                    <th> <span>Transacted At </span></th>
                                    <th> <span>Purpose </span></th>
                                    <th> <span>Amount </span></th>
                                    <th> <span>Status   </span></th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($transactions as $transaction)
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="square-box me-2">
                                                    <img class="img-fluid b-r-5" src="{{ asset('assets/images/payment/'.$transaction->image) }}" alt="">
                                                </div>
                                                <div class="media-body ps-2">
                                                    <div class="avatar-details"><a href="#">

                                                            <h6>{{$transaction->mode_of_payment}}</h6></a><span>${{ number_format($transaction->amount, 0)}}</span></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="img-content-box">
                                            <h6> {{ $transaction->readable_transacted_at_day }}</h6><span>
                                               {{$transaction->readable_transacted_at_time}}
                                            </span>
                                        </td>
                                        <td>
                                            <h6>{{$transaction->purpose}}</h6>
                                        </td>
                                        <td>

                                            @if($transaction->type == 'debit')
                                                <h6 class="text-danger">-{{$transaction->amount}}</h6>
                                            @elseif($transaction->type == 'credit')
                                                <h6 class="text-success">+{{$transaction->amount}}</h6>
                                            @else
                                                <h6>{{$transaction->amount}}</h6>
                                            @endif
                                        </td>
                                        <td>
                                            @if($transaction->status == '1')
                                                <div class="badge badge-light-info my-1">pending</div>
                                            @elseif($transaction->status == '2')
                                                <div class="badge badge-light-success my-1">completed</div>
                                            @elseif($transaction->status == '3')
                                                <div class="badge badge-light-secondary my-1">failed</div>
                                            @elseif($transaction->status == '4')
                                                <div class="badge badge-light-danger my-1">cancelled</div>
                                            @endif
                                            {{--                                            <div class="badge badge-light-primary">Regular</div>--}}
                                            {{--                                                <div class="badge badge-light-info">In Progress</div>--}}
                                            {{--                                                <div class="badge badge-light-danger">Rejected</div>--}}
                                            {{--                                                <div class="badge badge-light-secondary">Pending</div>--}}

                                        </td>
                                    </tr>
                                    @empty
                                            <div class="my-4 d-flex justify-content-center">
                                                <div class="fs-6">You have no notifications yet.</div>
                                            </div>
                                        @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

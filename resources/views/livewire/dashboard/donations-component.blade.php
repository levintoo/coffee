<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>Donations</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a class="home-item" href="index-2.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item active"> Donations</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="faq-wrap">
            <div class="row">



                <div class="col-lg-12">

                    <div class="row default-according style-1 faq-accordion" id="accordionoc">

                        <div class="col-12">
                            <div class="row">


                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header faq-header">
                                            <h5 class="d-inline-block ps-0">Latest Donations</h5><span class="pull-right d-inline-block">Show <select wire:model="pagesize"><option>10</option><option>25</option><option>50</option></select> Entries</span>
                                        </div>
                                        <div class="card-body faq-body">
                                            @forelse($donations as $donation)
                                            <div class="media updates-faq-main">
                                                <div class="updates-faq">{{ $donation->readable_amount }}</div>
                                                <div class="media-body updates-bottom-time" wire:click="showModal({{ $donation->id }})">
                                                    <p><a href="">{{ $donation->name }} </a>{{ $donation->message }}</p>
                                                    <p>{{ $donation->readable_donated_at }}</p>
                                                </div>
                                            </div>
                                            @empty
                                                <div class="my-4 d-flex justify-content-center">
                                                    <div class="fs-6">You have no donations yet.</div>
                                                </div>
                                            @endforelse
                                                {!! $donations->links() !!}
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

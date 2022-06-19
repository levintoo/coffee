<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Donation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class DonationsComponent extends Component
{
    public function mount()
    {
        $this->pagesize = 10;
    }
    use withPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $donations = Donation::where('userid',Auth::user()->userid)
            ->where('status','=','2')
            ->orderby('donated_at','DESC')
            ->paginate($this->pagesize);

        return view('livewire.dashboard.donations-component',[
            'donations'=> $donations
        ])->layout('layouts.dashboard');
    }
    public function showModal($id)
    {
        $this->modal_id = $id;
        $modal_data = Donation::where('userid', Auth::user()->userid)
            ->where('id', $this->modal_id)
            ->first();
        $this->dispatchBrowserEvent('swal:modal',[
            'title' => '<span class="fs-6">'.$modal_data->name.' donated</span>' ,
            'html' => '<span class="fs-6">'.$modal_data->message.'</span>' ,
            'footer' => '<p href="">$'.number_format($modal_data->amount,0) .' ' .$modal_data->readable_donated_at,'</p><p class="mt-3 text-muted"><sup>'.$modal_data->readable_donated_at.'</sup></p>',
        ]);
    }
}

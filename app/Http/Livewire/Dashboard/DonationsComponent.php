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
        $donations = Donation::where('userid',Auth::user()->userid)->where('status','=','2')->orderby('donated_at','DESC')->paginate($this->pagesize);
        return view('livewire.dashboard.donations-component',['donations'=> $donations])->layout('layouts.dashboard');
    }
}

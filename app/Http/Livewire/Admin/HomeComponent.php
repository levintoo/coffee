<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class HomeComponent extends Component
{
    public function mount()
    {
        $this->middleware(['role:admin']);
    }
    public function render()
    {
        return view('livewire.admin.home-component');
    }
}

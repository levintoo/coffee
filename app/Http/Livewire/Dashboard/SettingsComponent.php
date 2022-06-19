<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithFileUploads;

class SettingsComponent extends Component
{
    public $name;
    public $username;
    public $email;
    public $phone;
    public $country;
    public $profession;
    public $description;
    public $photo;
    public $image;
    public $edit_image;
    public $delete_account;

    public function mount()
    {
        $this->name = Auth::user()->name;
        $this->username = Auth::user()->username;
        $this->email = Auth::user()->email;
        $this->phone = '0'.Auth::user()->phone;
        $this->country = Auth::user()->country;
        $this->description = Auth::user()->description;
        $this->profession = Auth::user()->profession;
        $this->photo = Auth::user()->photo_url;
        $this->edit_image = 0;
    }

    public function render()
    {
        return view('livewire.dashboard.settings-component')->layout('layouts.dashboard');
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName,[
            'name' => 'string|max:255',
            'email' => 'string|email|max:255',
            'username' => 'string|max:255',
            'phone' => 'numeric|digits_between:9,10',
            'country' => 'string|max:255',
            'description' => 'string|max:2048',
            'profession' => 'string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }

    public function updateUser()
    {
        $this->username == Auth::user()->username ? $this->username = "" :
        $this->email == Auth::user()->email ? $this->email = "" :
        $this->phone == Auth::user()->phone ? $this->phone = "" :
        $this->validate([
            'name' => 'string|max:255',
            'email' => 'string|email|max:25|unique:users',
            'username' => 'string|max:25|unique:users',
            'phone' => 'numeric|digits_between:9,10|unique:users',
            'country' => 'string|max:255',
            'description' => 'string|max:2048',
            'profession' => 'string|max:255',
        ]);
        $this->dispatchBrowserEvent('swal:modal',[
            'type' => "warning",
            'title'=> "yeey!",
            'text'=> "Profile has been successfully updated",
            'icon'=> "success",
            'button'=> "close",
        ]);
    }
    public function editImage()
    {
        $this->dispatchBrowserEvent('edit-image:modal',[]);
    }
    public function closeEditImage()
    {
        $this->dispatchBrowserEvent('close-edit-image:modal',[]);
    }
    use WithFileUploads;
    public function uploadImage()
    {
        session::flash('started','started image');
        $this->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = md5(Auth::user()->userid).Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('/users/', $imageName,['disk' => 'real_public']);

        $user = User::where(['userid'=> Auth::user()->userid])->first();
            $file = public_path('/users/' . $user->photo);
            if (file_exists($file)) {
                unlink(public_path('/users' . '/' . $user->photo));
            }
        $user->photo = $imageName;
        $user->save();
        $this->image = $imageName;
        $this->dispatchBrowserEvent('swal:modal',[
            'type' => "warning",
            'title'=> "yeey!",
            'text'=> "Profile has been successfully updated $imageName",
            'icon'=> "success",
            'button'=> "close",
        ]);
    }
    public function deleteAccount()
    {
        $this->dispatchBrowserEvent('swal:modal',[
            'type' => "warning",
            'title'=> "",
            'text'=> "You think we can let you delete your account?",
            'icon'=> "info",
            'button'=> "close",
        ]);
    }
}

<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class HomeComponent extends Component
{
    public $pagesize;
    public $status;
    public $sort_value;
    public $search_value;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['delete','suspend'];
    public function mount()
    {
       $this->middleware(['role:admin']);
        $this->pagesize = 9;
    }
    public function render()
    {
        // if nothing is typed in search bar
        if (is_null($this->search_value) || $this->search_value == "") {
            // if status is active
            if($this->status == "1") {
                if($this->sort_value == "1") {
                    $users = User::withoutTrashed()
                        ->where('status', '1')
                        ->orderBy('created_at', 'ASC')
                        ->paginate($this->pagesize);
                }elseif($this->sort_value == "2") {
                    $users = User::withoutTrashed()
                        ->where('status', '1')
                        ->orderBy('created_at', 'DESC')
                        ->paginate($this->pagesize);
                }
                elseif($this->sort_value == "3") {
                    $users = User::withoutTrashed()
                        ->where('status', '1')
                        ->orderBy('name', 'ASC')
                        ->paginate($this->pagesize);
                }
                elseif($this->sort_value == "4") {
                    $users = User::withoutTrashed()
                        ->where('status', '1')
                        ->orderBy('name', 'DESC')
                        ->paginate($this->pagesize);
                }else{
                    $users = User::withoutTrashed()
                        ->where('status', '1')
                        ->orderBy('created_at', 'DESC')
                        ->paginate($this->pagesize);
                }
            }
            // if status is deleted
            elseif($this->status == "2"){
                if($this->sort_value == "1") {
                    $users = User::onlyTrashed()
                        ->orderBy('created_at', 'ASC')
                        ->paginate($this->pagesize);
                }elseif($this->sort_value == "2") {
                    $users = User::onlyTrashed()
                        ->orderBy('created_at', 'DESC')
                        ->paginate($this->pagesize);
                }elseif($this->sort_value == "3") {
                    $users = User::onlyTrashed()
                        ->orderBy('name', 'ASC')
                        ->paginate($this->pagesize);
                }elseif($this->sort_value == "4") {
                    $users = User::onlyTrashed()
                        ->orderBy('name', 'DESC')
                        ->paginate($this->pagesize);
                }else{
                    $users = User::onlyTrashed()
                        ->orderBy('created_at', 'DESC')
                        ->paginate($this->pagesize);
                }
            }
            // if status is suspended
            elseif($this->status == "3"){
                if($this->sort_value == "1") {
                    $users = User::withTrashed()
                        ->where('status', '2')
                        ->orderBy('created_at', 'ASC')
                        ->paginate($this->pagesize);
                }elseif($this->sort_value == "2") {
                    $users = User::withTrashed()
                        ->where('status', '2')
                        ->orderBy('created_at', 'DESC')
                        ->paginate($this->pagesize);
                }elseif($this->sort_value == "3") {
                    $users = User::withTrashed()
                        ->where('status', '2')
                        ->orderBy('name', 'ASC')
                        ->paginate($this->pagesize);
                }elseif($this->sort_value == "4") {
                    $users = User::withTrashed()
                        ->where('status', '2')
                        ->orderBy('name', 'DESC')
                        ->paginate($this->pagesize);
                }else {
                        $users = User::withTrashed()
                            ->where('status', '2')
                            ->orderBy('created_at', 'DESC')
                            ->paginate($this->pagesize);
                }
            }
            // if status is default
            else{
                if($this->sort_value == "1") {
                    $users = User::withoutTrashed()
                        ->orderBy('created_at', 'ASC')
                        ->paginate($this->pagesize);
                }elseif($this->sort_value == "2") {
                    $users = User::withoutTrashed()
                        ->orderBy('created_at', 'DESC')
                        ->paginate($this->pagesize);
                }elseif($this->sort_value == "3") {
                    $users = User::withoutTrashed()
                        ->orderBy('name', 'ASC')
                        ->paginate($this->pagesize);
                }elseif($this->sort_value == "4") {
                    $users = User::withoutTrashed()
                        ->orderBy('name', 'DESC')
                        ->paginate($this->pagesize);
                }else {
                    $users = User::withoutTrashed()
                    ->where('status', '1')
                        ->orderBy('created_at', 'DESC')
                        ->paginate($this->pagesize);
                }
            }
        }
        // if a value is typed in search bar
        else {
            // if status is active
            if ($this->status == "1") {
                if ($this->sort_value == "1") {
                    $users = User::withoutTrashed()
                        ->where('status', '1')
                                                ->where(function ($q) {
                            $q->where('name', 'LIKE', "%$this->search_value%")
                                ->orwhere('username', 'LIKE', "%$this->search_value%")
                                ->orwhere('email', 'LIKE', "%$this->search_value%")
                                ->orwhere('phone', 'LIKE', "%$this->search_value%");
                        })
                        ->orderBy('created_at', 'ASC')
                        ->paginate($this->pagesize);
                } elseif ($this->sort_value == "2") {
                    $users = User::withoutTrashed()
                        ->where('status', '1')
                        ->where(function ($q) {
                            $q->where('name', 'LIKE', "%$this->search_value%")
                                ->orwhere('username', 'LIKE', "%$this->search_value%")
                                ->orwhere('email', 'LIKE', "%$this->search_value%")
                                ->orwhere('phone', 'LIKE', "%$this->search_value%");
                        })
                        ->orderBy('created_at', 'DESC')
                        ->paginate($this->pagesize);
                } elseif ($this->sort_value == "3") {
                    $users = User::withoutTrashed()
                        ->where('status', '1')
                                                ->where(function ($q) {
                            $q->where('name', 'LIKE', "%$this->search_value%")
                                ->orwhere('username', 'LIKE', "%$this->search_value%")
                                ->orwhere('email', 'LIKE', "%$this->search_value%")
                                ->orwhere('phone', 'LIKE', "%$this->search_value%");
                        })
                        ->orderBy('name', 'ASC')
                        ->paginate($this->pagesize);
                } elseif ($this->sort_value == "4") {
                    $users = User::withoutTrashed()
                        ->where('status', '1')
                                                ->where(function ($q) {
                            $q->where('name', 'LIKE', "%$this->search_value%")
                                ->orwhere('username', 'LIKE', "%$this->search_value%")
                                ->orwhere('email', 'LIKE', "%$this->search_value%")
                                ->orwhere('phone', 'LIKE', "%$this->search_value%");
                        })
                        ->orderBy('name', 'DESC')
                        ->paginate($this->pagesize);
                } else {
                    $users = User::withoutTrashed()
                        ->where('status', '1')
                                                ->where(function ($q) {
                            $q->where('name', 'LIKE', "%$this->search_value%")
                                ->orwhere('username', 'LIKE', "%$this->search_value%")
                                ->orwhere('email', 'LIKE', "%$this->search_value%")
                                ->orwhere('phone', 'LIKE', "%$this->search_value%");
                        })
                        ->orderBy('created_at', 'DESC')
                        ->paginate($this->pagesize);
                }
            }
            // if status is deleted
            elseif ($this->status == "2") {
                if ($this->sort_value == "1") {
                    $users = User::onlyTrashed()
                                                ->where(function ($q) {
                            $q->where('name', 'LIKE', "%$this->search_value%")
                                ->orwhere('username', 'LIKE', "%$this->search_value%")
                                ->orwhere('email', 'LIKE', "%$this->search_value%")
                                ->orwhere('phone', 'LIKE', "%$this->search_value%");
                        })
                        ->orderBy('created_at', 'ASC')
                        ->paginate($this->pagesize);
                } elseif ($this->sort_value == "2") {
                    $users = User::onlyTrashed()
                                                ->where(function ($q) {
                            $q->where('name', 'LIKE', "%$this->search_value%")
                                ->orwhere('username', 'LIKE', "%$this->search_value%")
                                ->orwhere('email', 'LIKE', "%$this->search_value%")
                                ->orwhere('phone', 'LIKE', "%$this->search_value%");
                        })
                        ->orderBy('created_at', 'DESC')
                        ->paginate($this->pagesize);
                } elseif ($this->sort_value == "3") {
                    $users = User::onlyTrashed()
                                                ->where(function ($q) {
                            $q->where('name', 'LIKE', "%$this->search_value%")
                                ->orwhere('username', 'LIKE', "%$this->search_value%")
                                ->orwhere('email', 'LIKE', "%$this->search_value%")
                                ->orwhere('phone', 'LIKE', "%$this->search_value%");
                        })
                        ->orderBy('name', 'ASC')
                        ->paginate($this->pagesize);
                } elseif ($this->sort_value == "4") {
                    $users = User::onlyTrashed()
                                                ->where(function ($q) {
                            $q->where('name', 'LIKE', "%$this->search_value%")
                                ->orwhere('username', 'LIKE', "%$this->search_value%")
                                ->orwhere('email', 'LIKE', "%$this->search_value%")
                                ->orwhere('phone', 'LIKE', "%$this->search_value%");
                        })
                        ->orderBy('name', 'DESC')
                        ->paginate($this->pagesize);
                } else {
                    $users = User::onlyTrashed()
                                                ->where(function ($q) {
                            $q->where('name', 'LIKE', "%$this->search_value%")
                                ->orwhere('username', 'LIKE', "%$this->search_value%")
                                ->orwhere('email', 'LIKE', "%$this->search_value%")
                                ->orwhere('phone', 'LIKE', "%$this->search_value%");
                        })
                        ->orderBy('created_at', 'DESC')
                        ->paginate($this->pagesize);
                }
            }
            // if status is suspended
            elseif($this->status == "3"){
                if($this->sort_value == "1") {
                    $users = User::withTrashed()
                        ->where('status', '2')
                        ->where(function ($q) {
                            $q->where('name', 'LIKE', "%$this->search_value%")
                                ->orwhere('username', 'LIKE', "%$this->search_value%")
                                ->orwhere('email', 'LIKE', "%$this->search_value%")
                                ->orwhere('phone', 'LIKE', "%$this->search_value%");
                        })
                        ->orderBy('created_at', 'ASC')
                        ->paginate($this->pagesize);
                }elseif($this->sort_value == "2") {
                    $users = User::withTrashed()
                        ->where('status', '2')
                        ->where(function ($q) {
                            $q->where('name', 'LIKE', "%$this->search_value%")
                                ->orwhere('username', 'LIKE', "%$this->search_value%")
                                ->orwhere('email', 'LIKE', "%$this->search_value%")
                                ->orwhere('phone', 'LIKE', "%$this->search_value%");
                        })
                        ->orderBy('created_at', 'DESC')
                        ->paginate($this->pagesize);
                }elseif($this->sort_value == "3") {
                    $users = User::withTrashed()
                        ->where('status', '2')
                        ->where(function ($q) {
                            $q->where('name', 'LIKE', "%$this->search_value%")
                                ->orwhere('username', 'LIKE', "%$this->search_value%")
                                ->orwhere('email', 'LIKE', "%$this->search_value%")
                                ->orwhere('phone', 'LIKE', "%$this->search_value%");
                        })
                        ->orderBy('name', 'ASC')
                        ->paginate($this->pagesize);
                }elseif($this->sort_value == "4") {
                    $users = User::withTrashed()
                        ->where('status', '2')
                        ->where(function ($q) {
                            $q->where('name', 'LIKE', "%$this->search_value%")
                                ->orwhere('username', 'LIKE', "%$this->search_value%")
                                ->orwhere('email', 'LIKE', "%$this->search_value%")
                                ->orwhere('phone', 'LIKE', "%$this->search_value%");
                        })
                        ->orderBy('name', 'DESC')
                        ->paginate($this->pagesize);
                }else {
                    $users = User::withTrashed()
                        ->where('status', '2')
                        ->where(function ($q) {
                            $q->where('name', 'LIKE', "%$this->search_value%")
                                ->orwhere('username', 'LIKE', "%$this->search_value%")
                                ->orwhere('email', 'LIKE', "%$this->search_value%")
                                ->orwhere('phone', 'LIKE', "%$this->search_value%");
                        })
                        ->orderBy('created_at', 'DESC')
                        ->paginate($this->pagesize);
                }
            }
            // if status is default
            else {
                if ($this->sort_value == "1") {
                    $users = User::withoutTrashed()
                                                ->where(function ($q) {
                            $q->where('name', 'LIKE', "%$this->search_value%")
                                ->orwhere('username', 'LIKE', "%$this->search_value%")
                                ->orwhere('email', 'LIKE', "%$this->search_value%")
                                ->orwhere('phone', 'LIKE', "%$this->search_value%");
                        })
                        ->orderBy('created_at', 'ASC')
                        ->paginate($this->pagesize);
                } elseif ($this->sort_value == "2") {
                    $users = User::withoutTrashed()
                                                ->where(function ($q) {
                            $q->where('name', 'LIKE', "%$this->search_value%")
                                ->orwhere('username', 'LIKE', "%$this->search_value%")
                                ->orwhere('email', 'LIKE', "%$this->search_value%")
                                ->orwhere('phone', 'LIKE', "%$this->search_value%");
                        })
                        ->orderBy('created_at', 'DESC')
                        ->paginate($this->pagesize);
                } elseif ($this->sort_value == "3") {
                    $users = User::withoutTrashed()
                                                ->where(function ($q) {
                            $q->where('name', 'LIKE', "%$this->search_value%")
                                ->orwhere('username', 'LIKE', "%$this->search_value%")
                                ->orwhere('email', 'LIKE', "%$this->search_value%")
                                ->orwhere('phone', 'LIKE', "%$this->search_value%");
                        })
                        ->orderBy('name', 'ASC')
                        ->paginate($this->pagesize);
                } elseif ($this->sort_value == "4") {
                    $users = User::withoutTrashed()
                                                ->where(function ($q) {
                            $q->where('name', 'LIKE', "%$this->search_value%")
                                ->orwhere('username', 'LIKE', "%$this->search_value%")
                                ->orwhere('email', 'LIKE', "%$this->search_value%")
                                ->orwhere('phone', 'LIKE', "%$this->search_value%");
                        })
                        ->orderBy('name', 'DESC')
                        ->paginate($this->pagesize);
                } else {
                    $users = User::withoutTrashed()
                        ->where(function ($q) {
                            $q->where('name', 'LIKE', "%$this->search_value%")
                                ->orwhere('username', 'LIKE', "%$this->search_value%")
                                ->orwhere('email', 'LIKE', "%$this->search_value%")
                                ->orwhere('phone', 'LIKE', "%$this->search_value%");
                        })
                        ->orderBy('created_at', 'DESC')
                        ->paginate($this->pagesize);
                }
            }
        }
        return view('livewire.admin.home-component',['users'=>$users])->layout('layouts.dashboard');
    }
    public function resetFilters()
    {
        $this->sort_value = "";
        $this->search_value = "";
    }
    public function resetPassword($email)
    {

        $this->email = $email;
        $this->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            ['email'=> $email]
        );

       $status === Password::RESET_LINK_SENT
            ? $this->dispatchBrowserEvent('swal:modal',[
           'type' => "success",
           'title'=> "Good job!",
           'text'=> "We have emailed $email a password reset link!",
           'icon'=> "success",
           'button'=> "close!",
       ])
            : $this->dispatchBrowserEvent('swal:modal',[
           'type' => "warning",
           'title'=> "Error!",
           'text'=> "An unexpected error occurred",
           'icon'=> "warning",
           'button'=> "close!",
       ]);
    }

    public function deleteUser($username)
    {
        $this->dispatchBrowserEvent('swal:confirmmodal',[
            'title' => 'Warning!',
            'text' => "Are you sure you want to remove ".$username,
            'icon' => 'warning',
            'showCancelButton' => 'true',
            'confirmButtonText' => 'Yes, delete it!',
            'cancelButtonText' => 'No, cancel!',
            'reverseButtons' => 'true',
            'username' => $username,
        ]);
    }
    public function suspendUser($username)
    {
        $this->dispatchBrowserEvent('swal:suspendmodal',[
            'title' => 'Warning!',
            'text' => "Are you sure you want to suspend ".$username,
            'icon' => 'warning',
            'showCancelButton' => 'true',
            'confirmButtonText' => 'Yes, suspend!',
            'cancelButtonText' => 'No, cancel!',
            'reverseButtons' => 'true',
            'username' => $username,
        ]);
    }
    public function delete($username)
    {
        $user = User::where('username',$username)->role(['admin','super-admin'])->first();
        if(is_null($user))
        {
            $user = User::where('username',$username)->first();
            if(!is_null($user)) {
                $destroy = $user->delete();
                $this->dispatchBrowserEvent('swal:modal',[
                    'type' => "warning",
                    'title' => "Success!",
                    'text' => "User deleted sucesfully",
                    'icon' => "success",
                    'button' => "close!",
                ]);
            }else{
                $this->dispatchBrowserEvent('swal:modal',[
                    'type' => "warning",
                    'title'=> "Error!",
                    'text'=> "User does not exist",
                    'icon'=> "warning",
                    'button'=> "close!",
                ]);
            }
        }
        else{
            $this->dispatchBrowserEvent('swal:modal',[
                'type' => "warning",
                'title'=> "Error!",
                'text'=> "You cannot get rid of an admin",
                'icon'=> "warning",
                'button'=> "close!",
            ]);
        }
    }
    public function suspend($username)
    {
        $user = User::where('username',$username)->role(['admin','super-admin'])->first();
        if(is_null($user))
        {
            $user = User::where('username',$username)->first();
            if(!is_null($user)) {
                $user->status = 2;
                $user->save();
                $this->dispatchBrowserEvent('swal:modal',[
                    'type' => "warning",
                    'title' => "Success!",
                    'text' => "User suspended sucesfully",
                    'icon' => "success",
                    'button' => "close!",
                ]);
            }else{
                $this->dispatchBrowserEvent('swal:modal',[
                    'type' => "warning",
                    'title'=> "Error!",
                    'text'=> "User does not exist",
                    'icon'=> "warning",
                    'button'=> "close!",
                ]);
            }
        }
        else{
            $this->dispatchBrowserEvent('swal:modal',[
                'type' => "warning",
                'title'=> "Error!",
                'text'=> "You cannot suspend an admin",
                'icon'=> "warning",
                'button'=> "close!",
            ]);
        }
    }
}

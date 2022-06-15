<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Password;
use Livewire\Component;
use Livewire\WithPagination;

class ManageAdmins extends Component
{
    public $pagesize;
    public $status;
    public $sort_value;
    public $search_value;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
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
                    $users = User::role(['admin','super-admin'])->withoutTrashed()
                        ->where('status', '1')
                        ->orderBy('created_at', 'ASC')
                        ->paginate($this->pagesize);
                }elseif($this->sort_value == "2") {
                    $users = User::role(['admin','super-admin'])->withoutTrashed()
                        ->where('status', '1')
                        ->orderBy('created_at', 'DESC')
                        ->paginate($this->pagesize);
                }
                elseif($this->sort_value == "3") {
                    $users = User::role(['admin','super-admin'])->withoutTrashed()
                        ->where('status', '1')
                        ->orderBy('name', 'ASC')
                        ->paginate($this->pagesize);
                }
                elseif($this->sort_value == "4") {
                    $users = User::role(['admin','super-admin'])->withoutTrashed()
                        ->where('status', '1')
                        ->orderBy('name', 'DESC')
                        ->paginate($this->pagesize);
                }else{
                    $users = User::role(['admin','super-admin'])->withoutTrashed()
                        ->where('status', '1')
                        ->orderBy('created_at', 'DESC')
                        ->paginate($this->pagesize);
                }
            }
            // if status is deleted
            elseif($this->status == "2"){
                if($this->sort_value == "1") {
                    $users = User::role(['admin','super-admin'])->onlyTrashed()
                        ->orderBy('created_at', 'ASC')
                        ->paginate($this->pagesize);
                }elseif($this->sort_value == "2") {
                    $users = User::role(['admin','super-admin'])->onlyTrashed()
                        ->orderBy('created_at', 'DESC')
                        ->paginate($this->pagesize);
                }elseif($this->sort_value == "3") {
                    $users = User::role(['admin','super-admin'])->onlyTrashed()
                        ->orderBy('name', 'ASC')
                        ->paginate($this->pagesize);
                }elseif($this->sort_value == "4") {
                    $users = User::role(['admin','super-admin'])->onlyTrashed()
                        ->orderBy('name', 'DESC')
                        ->paginate($this->pagesize);
                }else{
                    $users = User::role(['admin','super-admin'])->onlyTrashed()
                        ->orderBy('created_at', 'DESC')
                        ->paginate($this->pagesize);
                }
            }
            // if status is suspended
            elseif($this->status == "3"){
                if($this->sort_value == "1") {
                    $users = User::role(['admin','super-admin'])->withTrashed()
                        ->where('status', '2')
                        ->orderBy('created_at', 'ASC')
                        ->paginate($this->pagesize);
                }elseif($this->sort_value == "2") {
                    $users = User::role(['admin','super-admin'])->withTrashed()
                        ->where('status', '2')
                        ->orderBy('created_at', 'DESC')
                        ->paginate($this->pagesize);
                }elseif($this->sort_value == "3") {
                    $users = User::role(['admin','super-admin'])->withTrashed()
                        ->where('status', '2')
                        ->orderBy('name', 'ASC')
                        ->paginate($this->pagesize);
                }elseif($this->sort_value == "4") {
                    $users = User::role(['admin','super-admin'])->withTrashed()
                        ->where('status', '2')
                        ->orderBy('name', 'DESC')
                        ->paginate($this->pagesize);
                }else {
                    $users = User::role(['admin','super-admin'])->withTrashed()
                        ->where('status', '2')
                        ->orderBy('created_at', 'DESC')
                        ->paginate($this->pagesize);
                }
            }
            // if status is default
            else{
                if($this->sort_value == "1") {
                    $users = User::role(['admin','super-admin'])->withoutTrashed()
                        ->orderBy('created_at', 'ASC')
                        ->paginate($this->pagesize);
                }elseif($this->sort_value == "2") {
                    $users = User::role(['admin','super-admin'])->withoutTrashed()
                        ->orderBy('created_at', 'DESC')
                        ->paginate($this->pagesize);
                }elseif($this->sort_value == "3") {
                    $users = User::role(['admin','super-admin'])->withoutTrashed()
                        ->orderBy('name', 'ASC')
                        ->paginate($this->pagesize);
                }elseif($this->sort_value == "4") {
                    $users = User::role(['admin','super-admin'])->withoutTrashed()
                        ->orderBy('name', 'DESC')
                        ->paginate($this->pagesize);
                }else {
                    $users = User::role(['admin','super-admin'])->withoutTrashed()
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
                    $users = User::role(['admin','super-admin'])->withoutTrashed()
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
                    $users = User::role(['admin','super-admin'])->withoutTrashed()
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
                    $users = User::role(['admin','super-admin'])->withoutTrashed()
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
                    $users = User::role(['admin','super-admin'])->withoutTrashed()
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
                    $users = User::role(['admin','super-admin'])->withoutTrashed()
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
                    $users = User::role(['admin','super-admin'])->onlyTrashed()
                        ->where(function ($q) {
                            $q->where('name', 'LIKE', "%$this->search_value%")
                                ->orwhere('username', 'LIKE', "%$this->search_value%")
                                ->orwhere('email', 'LIKE', "%$this->search_value%")
                                ->orwhere('phone', 'LIKE', "%$this->search_value%");
                        })
                        ->orderBy('created_at', 'ASC')
                        ->paginate($this->pagesize);
                } elseif ($this->sort_value == "2") {
                    $users = User::role(['admin','super-admin'])->onlyTrashed()
                        ->where(function ($q) {
                            $q->where('name', 'LIKE', "%$this->search_value%")
                                ->orwhere('username', 'LIKE', "%$this->search_value%")
                                ->orwhere('email', 'LIKE', "%$this->search_value%")
                                ->orwhere('phone', 'LIKE', "%$this->search_value%");
                        })
                        ->orderBy('created_at', 'DESC')
                        ->paginate($this->pagesize);
                } elseif ($this->sort_value == "3") {
                    $users = User::role(['admin','super-admin'])->onlyTrashed()
                        ->where(function ($q) {
                            $q->where('name', 'LIKE', "%$this->search_value%")
                                ->orwhere('username', 'LIKE', "%$this->search_value%")
                                ->orwhere('email', 'LIKE', "%$this->search_value%")
                                ->orwhere('phone', 'LIKE', "%$this->search_value%");
                        })
                        ->orderBy('name', 'ASC')
                        ->paginate($this->pagesize);
                } elseif ($this->sort_value == "4") {
                    $users = User::role(['admin','super-admin'])->onlyTrashed()
                        ->where(function ($q) {
                            $q->where('name', 'LIKE', "%$this->search_value%")
                                ->orwhere('username', 'LIKE', "%$this->search_value%")
                                ->orwhere('email', 'LIKE', "%$this->search_value%")
                                ->orwhere('phone', 'LIKE', "%$this->search_value%");
                        })
                        ->orderBy('name', 'DESC')
                        ->paginate($this->pagesize);
                } else {
                    $users = User::role(['admin','super-admin'])->onlyTrashed()
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
                    $users = User::role(['admin','super-admin'])->withTrashed()
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
                    $users = User::role(['admin','super-admin'])->withTrashed()
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
                    $users = User::role(['admin','super-admin'])->withTrashed()
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
                    $users = User::role(['admin','super-admin'])->withTrashed()
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
                    $users = User::role(['admin','super-admin'])->withTrashed()
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
                    $users = User::role(['admin','super-admin'])->withoutTrashed()
                        ->where(function ($q) {
                            $q->where('name', 'LIKE', "%$this->search_value%")
                                ->orwhere('username', 'LIKE', "%$this->search_value%")
                                ->orwhere('email', 'LIKE', "%$this->search_value%")
                                ->orwhere('phone', 'LIKE', "%$this->search_value%");
                        })
                        ->orderBy('created_at', 'ASC')
                        ->paginate($this->pagesize);
                } elseif ($this->sort_value == "2") {
                    $users = User::role(['admin','super-admin'])->withoutTrashed()
                        ->where(function ($q) {
                            $q->where('name', 'LIKE', "%$this->search_value%")
                                ->orwhere('username', 'LIKE', "%$this->search_value%")
                                ->orwhere('email', 'LIKE', "%$this->search_value%")
                                ->orwhere('phone', 'LIKE', "%$this->search_value%");
                        })
                        ->orderBy('created_at', 'DESC')
                        ->paginate($this->pagesize);
                } elseif ($this->sort_value == "3") {
                    $users = User::role(['admin','super-admin'])->withoutTrashed()
                        ->where(function ($q) {
                            $q->where('name', 'LIKE', "%$this->search_value%")
                                ->orwhere('username', 'LIKE', "%$this->search_value%")
                                ->orwhere('email', 'LIKE', "%$this->search_value%")
                                ->orwhere('phone', 'LIKE', "%$this->search_value%");
                        })
                        ->orderBy('name', 'ASC')
                        ->paginate($this->pagesize);
                } elseif ($this->sort_value == "4") {
                    $users = User::role(['admin','super-admin'])->withoutTrashed()
                        ->where(function ($q) {
                            $q->where('name', 'LIKE', "%$this->search_value%")
                                ->orwhere('username', 'LIKE', "%$this->search_value%")
                                ->orwhere('email', 'LIKE', "%$this->search_value%")
                                ->orwhere('phone', 'LIKE', "%$this->search_value%");
                        })
                        ->orderBy('name', 'DESC')
                        ->paginate($this->pagesize);
                } else {
                    $users = User::role(['admin','super-admin'])->withoutTrashed()
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
        return view('livewire.admin.manage-admins',['users'=>$users])->layout('layouts.dashboard');
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
}

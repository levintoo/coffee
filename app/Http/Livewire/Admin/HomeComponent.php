<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
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
    public function mount()
    {
//        $this->middleware(['role:admin']);
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
}

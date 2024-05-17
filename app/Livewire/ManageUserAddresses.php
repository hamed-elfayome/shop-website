<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ManageUserAddresses extends Component
{
    public $user;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function getAddressesProperty()
    {
        return $this->user->userAddress;
    }

    public function delete($Id)
    {
        $this->user->userAddress()->where('id', $Id)->delete();

        $this->user->refresh();
    }

    public function render()
    {
        return view('profile.manage-user-addresses');
    }
}

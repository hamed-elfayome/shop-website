<?php

namespace App\Livewire;

use Livewire\Component;

class Orders extends Component
{
    public function getOrdersProperty()
    {
        return auth()->user()->orders()->get()->sortByDesc('created_at');
    }

    public function render()
    {
        return view('livewire.orders');
    }
}

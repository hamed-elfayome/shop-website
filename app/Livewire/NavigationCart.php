<?php

namespace App\Livewire;

use App\Factories\CartFactory;
use Livewire\Component;

class NavigationCart extends Component
{
    public $listeners = [
        'CartUpdated' => '$refresh',
    ];

    public function getCountProperty()
    {
        return CartFactory::getOrMake()->items()->sum('quantity');
    }

    public function render()
    {
        return view('livewire.navigation-cart');
    }
}

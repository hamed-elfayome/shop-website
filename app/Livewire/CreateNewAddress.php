<?php

namespace App\Livewire;

use App\Models\UserAddress;
use Livewire\Component;

class CreateNewAddress extends Component
{
    public $country;
    public $city;
    public $street;
    public $building_num;
    public $flat_num;
    public $postal_code;
    public $floor;
    public $additional_info;


    protected $rules = [
        'city' => 'required|string',
        'street' => 'required|string',
        'building_num' => 'nullable|string',
        'flat_num' => 'nullable|string',
        'postal_code' => 'nullable|string',
        'floor' => 'nullable|string',
        'additional_info' => 'nullable|string',
    ];

    public function mount()
    {
        $this->country = 'Egypt';
    }

    public function createAddress()
    {
        $this->validate();

        $newAddress = new UserAddress();
        $newAddress->fill([
            'user_id' => auth()->user()->id,
            'country' => $this->country,
            'city' => $this->city,
            'street' => $this->street,
            'building_num' => $this->building_num,
            'flat_num' => $this->flat_num,
            'postal_code' => $this->postal_code,
            'floor' => $this->floor,
            'additional_info' => $this->additional_info,
        ])->save();

        return redirect()->route('cart');

    }

    public function render()
    {
        return view('livewire.create-new-address');
    }
}

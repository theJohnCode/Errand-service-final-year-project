<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;

class Customer extends Component
{
    public function render()
    {
        return view('livewire.customer.customer')->layout('layouts.base');
    }
}

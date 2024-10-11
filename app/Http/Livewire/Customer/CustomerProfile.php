<?php

namespace App\Http\Livewire\Customer;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CustomerProfile extends Component
{
    public function render()
    {
        $customer = User::where('id', Auth::user()->id)->first();

        return view('livewire.customer.customer-profile', ['customer' => $customer])->layout('layouts.base');
    }
}

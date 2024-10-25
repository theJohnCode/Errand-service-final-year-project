<?php

namespace App\Http\Livewire\Customer;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CustomerProfile extends Component
{
    public $user_id;

    public function mount($user_id = null)
    {
        $user_id ? $this->user_id = $user_id : $this->user_id = Auth::user()->id;
    }

    public function render()
    {
        $customer = User::where('id', $this->user_id)->first();

        return view('livewire.customer.customer-profile', ['customer' => $customer])->layout('layouts.base');
    }
}

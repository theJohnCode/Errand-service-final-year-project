<?php

namespace App\Http\Livewire\Customer;

use App\Models\Service;
use Livewire\Component;
use App\Models\Availability as UserAvailability;
use Illuminate\Support\Facades\Auth;

class Availability extends Component
{
    public function deleteAvailability($id)
    {
        $availablilty = UserAvailability::findOrFail($id);

        $availablilty->delete();

        toastr()->error('Availability Has Been Deleted Successfully', 'Congrats');

        return redirect()->back();
    }
    public function render()
    {
        $availabilities = Auth::user()->availabilities()->latest()->paginate(10);

        return view('livewire.customer.availability', compact('availabilities'))->layout('layouts.base');
    }
}

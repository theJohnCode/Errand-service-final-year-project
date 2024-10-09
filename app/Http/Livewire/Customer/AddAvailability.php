<?php

namespace App\Http\Livewire\Customer;

use App\Models\Availability;
use App\Models\Service;
use Livewire\Component;

class AddAvailability extends Component
{
    public $service_id;
    public $available_from;
    public $available_until;
    public $description;

    public function createNewAvailability()
    {
        $this->validate([
            'service_id' => 'required',
            'description' => 'required',
            'available_from' => 'required|date',
            'available_until' => 'required|date|after:available_from',
        ]);

        $available = new Availability();
        $available->service_id = $this->service_id;
        $available->available_from = $this->available_from;
        $available->available_until = $this->available_until;
        $available->description = $this->description;
        $available->runner_id = auth()->id();

        $available->save();
        // Set a success toast, with a title
        toastr()->success('Availabilty Has Been Add Successfully', 'Congrats');
        return redirect()->route('customer.availability');
    }
    public function render()
    {
        $services = Service::where('status', true)->get();

        return view('livewire.customer.add-availability', compact('services'))->layout('layouts.base');
    }
}

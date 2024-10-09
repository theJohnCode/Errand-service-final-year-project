<?php

namespace App\Http\Livewire;

use App\Models\Availability;
use Livewire\Component;

class AvailabilityDetails extends Component
{
    public $availability_id;

    public function mount($availability_id)
    {
        $this->availability_id = $availability_id;
    }
    public function render()
    {
        $availability = Availability::where('id', $this->availability_id)->first();

        $related_availability = Availability::whereHas('service', function ($query) use ($availability) {
            $query->where('service_category_id', $availability->service_id);
        })
            ->where('id', '!=', $this->id)
            ->inRandomOrder()
            ->first();

        return view('livewire.availability-details', [
            'availability' => $availability,
            'related_availability' => $related_availability
        ])->layout('layouts.base');
    }
}

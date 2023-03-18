<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ServiceCategory extends Component
{
    public function render()
    {
        $serviceCategories = \App\Models\ServiceCategory::all();
        return view('livewire.service-category',['serviceCategories' => $serviceCategories])->layout('layouts.base');
    }
}

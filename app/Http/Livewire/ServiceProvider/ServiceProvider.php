<?php

namespace App\Http\Livewire\ServiceProvider;

use Livewire\Component;

class ServiceProvider extends Component
{
    public function render()
    {
        return view('livewire.service-provider.service-provider')->layout('layouts.base');
    }
}

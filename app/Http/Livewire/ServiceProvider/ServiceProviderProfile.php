<?php

namespace App\Http\Livewire\ServiceProvider;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ServiceProviderProfile extends Component
{
    public function render()
    {
        $serviceProvider = \App\Models\ServiceProviderProfile::where('user_id', Auth::user()->id)->first();
        return view('livewire.service-provider.service-provider-profile', ['serviceProvider' => $serviceProvider])->layout('layouts.base');
    }
}

<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class ErrandClient extends Component
{
    public function render()
    {
        return view('livewire.admin.errand-client')->layout('layouts.base');
    }
}

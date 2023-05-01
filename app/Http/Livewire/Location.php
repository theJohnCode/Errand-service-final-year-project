<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Location extends Component
{
    protected $listeners = ['refreshComponent'=>'$refresh'];
    public function render()
    {
        return view('livewire.location')->layout('layouts.base');
    }
}

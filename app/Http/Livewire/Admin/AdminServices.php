<?php

namespace App\Http\Livewire\Admin;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class AdminServices extends Component
{
    use WithPagination;

    public function render()
    {
        $services = Service::latest()->paginate(10);
        return view('livewire.admin.admin-serivces',['services'=>$services])->layout('layouts.base');
    }
}

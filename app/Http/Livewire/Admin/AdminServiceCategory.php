<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;

class AdminServiceCategory extends Component
{
    use WithPagination;
    public function render()
    {
        $serviceCategories = \App\Models\ServiceCategory::paginate(10);
        return view('livewire.admin.admin-service-category',['serviceCategories' => $serviceCategories])->layout('layouts.base');
    }
}

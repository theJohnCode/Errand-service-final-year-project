<?php

namespace App\Http\Livewire\Admin;

use App\Models\Service;
use App\Models\ServiceCategory;
use Livewire\Component;
use Livewire\WithPagination;

class AdminServiceByCategory extends Component
{
    use WithPagination;

    public $category_slug;

    public function mount($category_slug)
    {
        $this->$category_slug = $category_slug;
    }

    public function render()
    {
        $serviceCategory = ServiceCategory::where('slug', $this->category_slug)->first();
        $services = Service::where('service_category_id', $serviceCategory->id)->paginate(10);
        return view('livewire.admin.admin-serivce-by-category',
            ['category_name' => $serviceCategory->name, 'services' => $services])->layout('layouts.base');
    }
}

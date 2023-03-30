<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ServiceCategory;

class ServiceByCategory extends Component
{
    public $category_slug;

    public function mount($category_slug){
        $this->$category_slug = $category_slug;
    }

    public function render()
    {
        $serviceCategory = ServiceCategory::where('slug',$this->category_slug)->first();

        return view('livewire.service-by-category',['serviceCategory'=>$serviceCategory])->layout('layouts.base');
    }
}

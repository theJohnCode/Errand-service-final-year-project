<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ServiceCategory;

class HeaderComponent extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = ServiceCategory::with(['children','services'])
        ->whereNull('parent_id')
        ->whereHas('children')
        ->get();
        // dd($this->categories);
    }

    public function render()
    {
        return view('livewire.header-component');
    }
}

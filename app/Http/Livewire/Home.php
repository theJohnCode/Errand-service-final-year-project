<?php

namespace App\Http\Livewire;

use App\Models\Slider;
use App\Models\Service;
use Livewire\Component;
use App\Models\ServiceCategory;

class Home extends Component
{
    public function render()
    {
        $service_categories = ServiceCategory::inRandomOrder()->take(15)->get();
        $featured_services = Service::where('featured', 1)->inRandomOrder()->take(8)->get();
        $featured_categories = ServiceCategory::where('featured', 1)->inRandomOrder()->take(8)->get();
        $sids = ServiceCategory::whereIn('slug', ['tv', 'ac', 'refrigerator', 'geyser', 'water-purifier'])->get()->pluck('id');
        $appliance_services = Service::whereIn('service_category_id', $sids)->inRandomOrder()->take(8)->get();
        $slides = Slider::where('status', '1')->get();
       
        return view('livewire.home', [
            'service_categories' => $service_categories, 'featured_services' => $featured_services,
            'featured_categories' => $featured_categories, 'appliance_services' => $appliance_services, 'slides' => $slides
        ])
            ->layout('layouts.base');
    }
}

<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Service;
use Livewire\Component;
use App\Enums\UserTypeEnum;
use App\Models\ServiceCategory;

class Admin extends Component
{
    public function render()
    {
        $totalErC = User::where('utype', UserTypeEnum::ERRAND_CLIENT)->count();
        $totalErR = User::where('utype', UserTypeEnum::ERRAND_RUNNER)->count();
        $totalAdm = User::where('utype', UserTypeEnum::ADMIN)->count();
        $totalActiveServices = Service::where('status', true)->count();
        $totalFeaturedServices = Service::where('status', true)->where('featured', true)->count();
        $totalServiceCat = ServiceCategory::count();

        return view(
            'livewire.admin.admin',
            ['totalErC' => $totalErC,
             'totalErR' => $totalErR,
             'totalAdm' => $totalAdm,
             'totalActiveServices' => $totalActiveServices,
             'totalFeaturedServices' => $totalFeaturedServices,
             'totalServiceCat' => $totalServiceCat,
             ]
        )->layout('layouts.base');
    }
}

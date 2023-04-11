<?php

namespace App\Http\Livewire\Admin;

use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class AdminServices extends Component
{
    use WithPagination;

    public function deleteService($id){
        $service = Service::findOrFail($id);

        if ($service->image){
            Storage::disk('public_uploads')->delete('/services/services/' . $service->image);
        }

        if ($service->thumbnail){
            Storage::disk('public_uploads')->delete('/services/thumbnails/' . $service->thumbnail);
        }

        $service->delete();
        toastr()->error('Service Has Been Deleted Successfully', 'Congrats');
        return redirect()->back();
    }

    public function render()
    {
        $services = Service::latest()->paginate(10);
        return view('livewire.admin.admin-serivces',['services'=>$services])->layout('layouts.base');
    }
}

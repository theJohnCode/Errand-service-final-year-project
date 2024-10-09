<?php

namespace App\Http\Livewire\Admin;

use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class AdminServices extends Component
{
    use WithPagination;

    public function deleteService($id)
    {
        $service = Service::findOrFail($id);

        if ($service->image) {
            Storage::disk('public_uploads')->delete('/services/services/' . $service->image);
        }

        if ($service->thumbnail) {
            Storage::disk('public_uploads')->delete('/services/thumbnails/' . $service->thumbnail);
        }

        $service->delete();

        toastr()->error('Service Has Been Deleted Successfully', 'Congrats');

        return redirect()->back();
    }

    public function render()
    {
        $user = auth()->user();

        if ($user->utype === 'ADM') {
            // If the user is an admin, fetch all services
            $services = Service::latest()->paginate(10);
        } else {
            // If the user is a client, fetch only the services posted by this client
            $services = Service::where('posted_by', $user->id)->latest()->paginate(10);
        }
        // $services = Service::latest()->paginate(10);

        return view('livewire.admin.admin-serivces', ['services' => $services])->layout('layouts.base');
    }
}

<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ServiceCategory;
class AdminServiceCategory extends Component
{
    use WithPagination;

    public function deleteServiceCategory($id){
        $serviceCategory = ServiceCategory::findOrFail($id);

        if ($serviceCategory->image){
            Storage::disk('public_uploads')->delete('/categories/'.$serviceCategory->image);
        }

        $serviceCategory->delete();
        toastr()->error('Service Category Has Been Deleted Successfully', 'Congrats');
        return redirect()->back();
    }

    public function render()
    {
        $serviceCategories = ServiceCategory::latest()->paginate(10);
        return view('livewire.admin.admin-service-category',['serviceCategories' => $serviceCategories])->layout('layouts.base');
    }
}

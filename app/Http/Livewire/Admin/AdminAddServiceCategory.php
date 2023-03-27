<?php

namespace App\Http\Livewire\Admin;

use App\Models\ServiceCategory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
class AdminAddServiceCategory extends Component
{
    use WithFileUploads;

    /* inputs */
    public $name;
    public $slug;
    public $image;

    /**
     * this method for generate slug from category name
     */
    public function generateSlug(){
        $this->slug = Str::slug($this->name,'-');
    }

    /**
     * this method for real time validation for this inputs
     */
    public function updated($fields)
    {
        $this->validateOnly($fields,[
           'name' => 'required',
           'slug' => 'required',
           'image' => 'required|mimes:jpeg,jpg,png,gif',
        ]);
    }

    /**
     * this method for create new service category
     */
    public function createNewCategory(){
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif',
        ]);

        $serviceCategory = new ServiceCategory();
        $serviceCategory->name = $this->name;
        $serviceCategory->slug = $this->slug;
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('categories',$imageName,$disk = 'public_uploads');
        $serviceCategory->image = $imageName;
        $serviceCategory->save();
        // Set a success toast, with a title
        toastr()->success('Service Category Has Been Add Successfully', 'Congrats');
        return redirect()->route('admin.service_categories');
//        session()->flash('massage','Service Category Has Been Add Successfully');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-service-category')->layout('layouts.base');
    }
}

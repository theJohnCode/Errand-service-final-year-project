<?php

namespace App\Http\Livewire\Admin;

use App\Models\ServiceCategory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditServiceCategory extends Component
{
    use WithFileUploads;

    public $category_id;
    public $name;
    public $slug;
    public $featured;
    public $image;
    public $newImage;

    public function mount(){
        $serviceCategory = ServiceCategory::findOrFail($this->category_id);
        $this->category_id = $serviceCategory->id;
        $this->name = $serviceCategory->name;
        $this->slug = $serviceCategory->slug;
        $this->featured = $serviceCategory->featured;
        $this->image = $serviceCategory->image;
    }

    public function generateSlug(){
        $this->slug = Str::slug($this->name . '-');
    }

    public function updated($fields){
        $this->validateOnly($fields,[
           'name'=>'required',
           'slug'=>'required',
        ]);

        if ($this->newImage){
            $this->validateOnly($fields,[
                'newImage'=>'required|mimes:jpeg,jpg,png,gif',
            ]);
        }
    }

    public function editCategory(){
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        if ($this->newImage){
            $this->validate([
                'newImage'=>'required|mimes:jpeg,jpg,png,gif',
            ]);
        }

        $serviceCategory = ServiceCategory::findOrFail($this->category_id);
        $serviceCategory->name = $this->name;
        $serviceCategory->slug = $this->slug;
        $serviceCategory->featured = $this->featured;

        if ($this->newImage){
            Storage::disk('public_uploads')->delete('/categories/'.$this->image);
            $newName = Carbon::now()->timestamp . '.' . $this->newImage->extension();
            $this->newImage->storeAs('categories',$newName,$disk = 'public_uploads');
            $serviceCategory->image = $newName;
        }

        $serviceCategory->save();
        toastr()->info('Service Category Has Been Updated Successfully', 'Congrats');
        return redirect()->route('admin.service_categories');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-service-category')->layout('layouts.base');
    }
}

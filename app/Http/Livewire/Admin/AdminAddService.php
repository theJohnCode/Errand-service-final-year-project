<?php

namespace App\Http\Livewire\Admin;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddService extends Component
{
    use WithFileUploads;

    /* inputs */
    public $name;
    public $slug;
    public $tagline;
    public $service_category_id;
    // public $price;
    // public $discount;
    // public $discount_type;
    public $description;
    public $image;
    public $thumbnail;

    /**
     * this method for generate slug from category name
     */
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    /**
     * this method for real time validation for this inputs
     */
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required',
            'tagline' => 'required',
            'service_category_id' => 'required',
            // 'price' => 'required',
            // 'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif',
            'thumbnail' => 'required|mimes:jpeg,jpg,png,gif',
        ]);
    }

    public function createNewService()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'tagline' => 'required',
            'service_category_id' => 'required',
            // 'price' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif',
            'thumbnail' => 'required|mimes:jpeg,jpg,png,gif',
        ]);

        $service = new Service();
        $service->name = $this->name;
        $service->slug = $this->slug;
        $service->tagline = $this->tagline;
        $service->service_category_id = $this->service_category_id;
        // $service->price = $this->price;
        // $service->discount = $this->discount;
        // $service->discount_type = $this->discount_type;
        $service->description = $this->description;
        $service->posted_by = auth()->id();

        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('services/services', $imageName, $disk = 'public_uploads');
        $service->image = $imageName;

        $thumbnailName = Carbon::now()->timestamp . '.' . $this->thumbnail->extension();
        $this->thumbnail->storeAs('services/thumbnails', $thumbnailName, $disk = 'public_uploads');
        $service->thumbnail = $thumbnailName;

        $service->save();
        // Set a success toast, with a title
        toastr()->success('Service Has Been Add Successfully', 'Congrats');
        return redirect()->route('admin.all_services');
    }

    public function render()
    {
        $serviceCategories = ServiceCategory::all();
        return view('livewire.admin.admin-add-service', ['serviceCategories' => $serviceCategories])->layout('layouts.base');
    }
}

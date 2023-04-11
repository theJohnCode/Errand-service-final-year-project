<?php

namespace App\Http\Livewire\Admin;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditService extends Component
{
    use WithFileUploads;

    /* inputs */
    public $name;
    public $slug;
    public $tagline;
    public $service_category_id;
    public $price;
    public $discount;
    public $discount_type;
    public $description;
    public $inclusion;
    public $exclusion;
    public $image;
    public $thumbnail;
    public $service_id;

    public $newImage;
    public $newThumbnail;
    public $featured;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function mount()
    {
        $service = Service::findOrFail($this->service_id);
        $this->name = $service->name;
        $this->slug = $service->slug;
        $this->tagline = $service->tagline;
        $this->service_category_id = $service->service_category_id;
        $this->price = $service->price;
        $this->discount = $service->discount;
        $this->discount_type = $service->discount_type;
        $this->featured = $service->featured;
        $this->description = $service->description;
        $this->inclusion = str_replace("|", "\n", $service->inclusion);
        $this->exclusion = str_replace("|", "\n", $service->exclusion);
        $this->image = $service->image;
        $this->thumbnail = $service->thumbnail;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required',
            'tagline' => 'required',
            'service_category_id' => 'required',
            'price' => 'required',
            'description' => 'required',
            'inclusion' => 'required',
            'exclusion' => 'required',
        ]);

        if ($this->newImage) {
            $this->validateOnly($fields,[
                'newImage' => 'required|mimes:jpeg,jpg,png,gif',
            ]);
        }

        if ($this->newThumbnail) {
            $this->validateOnly($fields,[
                'newThumbnail' => 'required|mimes:jpeg,jpg,png,gif',
            ]);
        }
    }

    public function updateService(){
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'tagline'=> 'required',
            'service_category_id'=> 'required',
            'price'=> 'required',
            'description'=> 'required',
            'inclusion'=> 'required',
            'exclusion'=> 'required',
        ]);

        if ($this->newImage) {
            $this->validate([
                'newImage' => 'required|mimes:jpeg,jpg,png,gif',
            ]);

        }if ($this->newThumbnail) {
            $this->validate([
                'newThumbnail' => 'required|mimes:jpeg,jpg,png,gif',
            ]);
        }

        $service = Service::findOrFail($this->service_id);
        $service->name = $this->name;
        $service->slug = $this->slug;
        $service->tagline = $this->tagline;
        $service->service_category_id = $this->service_category_id;
        $service->price = $this->price;
        $service->discount = $this->discount;
        $service->discount_type = $this->discount_type;
        $service->featured = $this->featured;
        $service->description = $this->description;
        $service->inclusion = str_replace("\n",'|',trim($this->inclusion));
        $service->exclusion = str_replace("\n",'|',trim($this->exclusion));

        if ($this->newImage){
            Storage::disk('public_uploads')->delete('/services/services/'.$this->image);
            $imageName = Carbon::now()->timestamp . '.' . $this->newImage->extension();
            $this->newImage->storeAs('services/services',$imageName,$disk = 'public_uploads');
            $service->image = $imageName;
        }

        if ($this->newThumbnail){
            Storage::disk('public_uploads')->delete('/services/thumbnails/'.$this->thumbnail);
            $thumbnailName = Carbon::now()->timestamp . '.' . $this->newThumbnail->extension();
            $this->newThumbnail->storeAs('services/thumbnails',$thumbnailName,$disk = 'public_uploads');
            $service->thumbnail = $thumbnailName;
        }

        $service->save();
        // Set a success toast, with a title
        toastr()->success('Service Has Been Updated Successfully', 'Congrats');
        return redirect()->route('admin.all_services');
    }

    public function render()
    {
        $serviceCategories = ServiceCategory::all();
        return view('livewire.admin.admin-edit-service', ['serviceCategories' => $serviceCategories])->layout('layouts.base');
    }
}

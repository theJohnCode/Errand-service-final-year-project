<?php

namespace App\Http\Livewire\ServiceProvider;

use App\Models\ServiceCategory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditServiceProviderProfile extends Component
{
    use WithFileUploads;
    public $newImage;
    public $service_provider_id;
    public $service_category_id;
    public $image;
    public $about;
    public $city;
    public $service_locations;

    public function mount()
    {
        $serviceProvider = \App\Models\ServiceProviderProfile::where('user_id',Auth::user()->id)->first();
        $this->service_provider_id = $serviceProvider->id;
        $this->image = $serviceProvider->image;
        $this->about = $serviceProvider->about;
        $this->city = $serviceProvider->city;
        $this->service_locations = $serviceProvider->service_locations;
        $this->service_category_id = $serviceProvider->service_category_id;
    }

    public function editProfile(){
        if ($this->newImage){
            $this->validate([
                'newImage'=>'mimes:jpeg,jpg,png,gif',
            ]);
        }

        $serviceProvider = \App\Models\ServiceProviderProfile::where('user_id',Auth::user()->id)->first();
        $serviceProvider->about = $this->about;
        $serviceProvider->city = $this->city;
        $serviceProvider->service_locations = $this->service_locations;
        $serviceProvider->service_category_id = $this->service_category_id;

        if ($this->newImage){
            Storage::disk('public_uploads')->delete('/service_providers/'.$this->image);
            $newName = Carbon::now()->timestamp . '.' . $this->newImage->extension();
            $this->newImage->storeAs('service_providers',$newName,$disk = 'public_uploads');
            $serviceProvider->image = $newName;
        }

        $serviceProvider->save();
        toastr()->info('Profile Has Been Updated Successfully', 'Congrats');
        return redirect()->route('service-provider.profile');
    }

    public function render()
    {
        $serviceCategories = ServiceCategory::all();
        return view('livewire.service-provider.edit-service-provider-profile', ['serviceCategories' => $serviceCategories])->layout('layouts.base');
    }
}

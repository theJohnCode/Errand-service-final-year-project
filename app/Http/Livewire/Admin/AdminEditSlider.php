<?php

namespace App\Http\Livewire\Admin;

use App\Models\Slider;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditSlider extends Component
{
    use WithFileUploads;

    public $title;
    public $status = 0;
    public $image;
    public $newImage;
    public $slider_id;

    public function mount(){
        $slide = Slider::findOrFail($this->slider_id);
        $this->title = $slide->title;
        $this->status = $slide->status;
        $this->image = $slide->image;
        $this->slider_id = $slide->id;
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'title'=> 'required',
        ]);

        if ($this->newImage){
            $this->validateOnly($fields,[
                'newImage' => 'required|mimes:jpeg,jpg,png,gif',
            ]);
        }
    }

    public function updateSlide(){
        $this->validate([
            'title'=> 'required',
        ]);

        if ($this->newImage){
            $this->validate([
                'newImage' => 'required|mimes:jpeg,jpg,png,gif',
            ]);
        }

        $slide = Slider::findOrFail($this->slider_id);
        $slide->title = $this->title;
        $slide->status = $this->status;

        if ($this->newImage){
            Storage::disk('public_uploads')->delete('/slides/'.$this->image);
            $imageName = Carbon::now()->timestamp . '.' . $this->newImage->extension();
            $this->newImage->storeAs('slides',$imageName,$disk='public_uploads');
            $slide->image = $imageName;
        }

        $slide->save();
        toastr()->success('Slide Has Been updated Successfully', 'Congrats');
        return redirect()->route('admin.slider');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-slider')->layout('layouts.base');
    }
}

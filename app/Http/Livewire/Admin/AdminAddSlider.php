<?php

namespace App\Http\Livewire\Admin;

use App\Models\Slider;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddSlider extends Component
{
    use WithFileUploads;

    public $title;
    public $status = 0;
    public $image;

    public function updated($fields){
        $this->validateOnly($fields,[
            'title'=> 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif',
        ]);
    }

    public function createNewSlide(){
        $this->validate([
            'title'=> 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif',
        ]);

        $slide = new Slider();
        $slide->title = $this->title;
        $slide->status = $this->status;
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('slides',$imageName,$disk='public_uploads');
        $slide->image = $imageName;
        $slide->save();
        toastr()->success('Slide Has Been Add Successfully', 'Congrats');
        return redirect()->route('admin.slider');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-slider')->layout('layouts.base');
    }
}

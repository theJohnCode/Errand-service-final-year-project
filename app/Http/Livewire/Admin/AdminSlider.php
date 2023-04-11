<?php

namespace App\Http\Livewire\Admin;

use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class AdminSlider extends Component
{
    use WithPagination;

    public function deleteSlide($id){
        $slide = Slider::findOrFail($id);

        if ($slide->image){
            Storage::disk('public_uploads')->delete('/slides/' . $slide->image);
        }

        $slide->delete();
        toastr()->error('Slider deleted successfully', 'Congrats');
        return redirect()->back();
    }

    public function render()
    {
        $slides = Slider::latest()->paginate(10);
        return view('livewire.admin.admin-slider',['slides'=>$slides])->layout('layouts.base');
    }
}

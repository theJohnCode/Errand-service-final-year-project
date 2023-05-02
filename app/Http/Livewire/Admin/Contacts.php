<?php

namespace App\Http\Livewire\Admin;

use App\Models\ContactUs;
use Livewire\Component;
use Livewire\WithPagination;

class Contacts extends Component
{
    use WithPagination;

    public function deleteMessage($id){
        $contact = \App\Models\ContactUs::findOrFail($id)->delete();

        toastr()->error('Message Has Been Deleted Successfully', 'Congrats');
        return redirect()->back();
    }

    public function render()
    {
        $messages = ContactUs::paginate(20);
        return view('livewire.admin.contacts', ['messages' => $messages])->layout('layouts.base');
    }
}

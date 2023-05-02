<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContactUs extends Component
{
    public $name;
    public $email;
    public $phone;
    public $title;
    public $message;

    public function updated($fields){
        $this->validateOnly($fields,[
            'name'=> 'required',
            'email'=> 'required|email',
            'phone'=> 'required|numeric',
            'title'=> 'required',
            'message'=> 'required',
        ]);
    }

    public function sendMessage(){
        $this->validate([
            'name'=> 'required',
            'email'=> 'required|email',
            'phone'=> 'required|numeric',
            'title'=> 'required',
            'message'=> 'required',
        ]);

        $contact = new \App\Models\ContactUs();
        $contact->name = $this->name;
        $contact->email = $this->name;
        $contact->phone = $this->phone;
        $contact->title = $this->title;
        $contact->message = $this->message;

        $contact->save();

        // Set a success toast, with a title
        toastr()->success('Message Has Been Send Successfully', 'Congrats');
        return redirect()->route('home.contactus');
    }

    public function render()
    {
        return view('livewire.contact-us')->layout('layouts.base');
    }
}

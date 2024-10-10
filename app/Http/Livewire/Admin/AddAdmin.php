<?php

namespace App\Http\Livewire\Admin;

use App\Enums\UserTypeEnum;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;

class AddAdmin extends Component
{
    use WithFileUploads;
    
    public $name;
    public $email;
    public $phone;
    public $password;
    public $image;

    /**
     * this method for real time validation for this inputs
     */
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required|numeric|min:11',
            'password' => 'required|min:8',
            'image' => 'required|mimes:jpeg,jpg,png,gif',
        ]);
    }

    public function createAdmin()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required|numeric|min:11',
            'password' => 'required|min:8',
            'image' => 'required|mimes:jpeg,jpg,png,gif',
        ]);

        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->password = Hash::make($this->phone);
        $user->utype = UserTypeEnum::ADMIN;
        $user->is_student = false;

        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('users-avatar', $imageName, $disk = 'public');
        $user->avatar = $imageName;


        $user->save();
        // Set a success toast, with a title
        toastr()->success('Admin Has Been Add Successfully', 'Congrats');
        return redirect()->route('admin.admins');
    }

    public function render()
    {
        return view('livewire.admin.add-admin')->layout('layouts.base');
    }
}

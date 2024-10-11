<?php

namespace App\Http\Livewire\Customer;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EditCustomerProfile extends Component
{
    use WithFileUploads;

    public $name;
    public $phone;
    public $address;
    public $dob;
    public $state;
    public $lga;
    public $faculty;
    public $department;
    public $level;
    public $newAvatar;
    public $user_id;
    public $avatar;

    public function mount()
    {
        $user = User::where('id', Auth::user()->id)->first();

        $this->name = $user->name;
        $this->phone = $user->phone;
        $this->address = $user->address;
        $this->dob = $user->dob;
        $this->state = $user->state;
        $this->lga = $user->lga;
        $this->faculty = $user->faculty;
        $this->department = $user->department;
        $this->level = $user->level;
        $this->department = $user->department;
        $this->user_id = $user->id;
        $this->avatar = $user->avatar;

        // dd($this->name);
    }

    public function editProfile()
    {
        if ($this->newAvatar) {
            $this->validate([
                'newAvatar' => 'mimes:jpeg,jpg,png,gif',
            ]);
        }

        $user = User::where('id', Auth::user()->id)->first();

        $user->name = $this->name;
        $user->phone = $this->phone;
        $user->address = $this->address;
        $user->dob = $this->dob;
        $user->state = $this->state;
        $user->lga = $this->lga;
        $user->faculty = $this->faculty;
        $user->department = $this->department;
        $user->level = $this->level;
        $user->department = $this->department;
        $user->user_id = $this->id;
    
        if ($this->newAvatar) {
            Storage::disk('public')->delete('/users-avatar/' . $this->avatar);
            $newName = Carbon::now()->timestamp . '.' . $this->newAvatar->extension();
            $this->newAvatar->storeAs('users-avatar', $newName, $disk = 'public');
            $user->avatar = $newName;
        }

        $user->save();

        toastr()->info('Profile Has Been Updated Successfully', 'Congrats');

        return redirect()->route('service-provider.profile');
    }

    public function render()
    {
        return view('livewire.customer.edit-customer-profile')->layout('layouts.base');
    }
}

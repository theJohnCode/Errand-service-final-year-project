<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Enums\UserTypeEnum;
use Illuminate\Support\Facades\Storage;

class Admins extends Component
{
    public function deleteAdmin($id)
    {
        $user = User::findOrFail($id);

        if ($user->image) {
            Storage::disk('public')->delete('/users-avatar/' . $user->avatar);
        }

        $user->delete();

        toastr()->error('Admin Has Been Deleted Successfully', 'Congrats');

        return redirect()->back();
    }
    public function render()
    {
        $users = User::where('utype', UserTypeEnum::ADMIN)->paginate();

        return view('livewire.admin.admins',['users' => $users])->layout('layouts.base');
    }
}

<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Enums\UserTypeEnum;
use Illuminate\Support\Facades\Storage;

class ErrandClient extends Component
{
    public function deleteClient($id)
    {
        $user = User::findOrFail($id);

        if ($user->image) {
            Storage::disk('public')->delete('/users-avatar/' . $user->avatar);
        }

        $user->delete();

        toastr()->error('Errand Client Has Been Deleted Successfully', 'Congrats');

        return redirect()->back();
    }
    public function render()
    {
        $users = User::where('utype', UserTypeEnum::ERRAND_CLIENT)->paginate();

        return view('livewire.admin.errand-client',['users' => $users])->layout('layouts.base');
    }
}

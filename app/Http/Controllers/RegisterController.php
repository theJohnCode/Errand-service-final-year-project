<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showErrRegistrationForm()
    {
        return view('auth.register_err');
    }

    public function showErcRegistrationForm()
    {
        return view('auth.register_erc');
    }

    public function editUser()
    {
        $user = User::where('id', Auth::user()->id)->first();

        return view('auth.edit-user', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::query()->find($id);

        $data = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'unique:users,phone,' . $user->id],
            'address' => ['required', 'string'],
            'dob' => ['required', 'string', 'date'],
            'state' => ['required', 'string'],
            'lga' => ['required', 'string'],
            'faculty' => ['required', 'string'],
            'department' => ['required', 'string'],
            'level' => ['required', 'integer', 'in:100,200,300,400,500'],
        ], [
            'level.in' => 'The allowed level are 100, 200, 300, 400 and 500',
        ])->validate();

        $user->name = $data['name'];
        $user->phone = $data['phone'];
        $user->address = $data['address'];
        $user->dob = $data['dob'];
        $user->state = $data['state'];
        $user->lga = $data['lga'];
        $user->faculty = $data['faculty'];
        $user->department = $data['department'];
        $user->level = $data['level'];

        $user->update();

        return redirect()->route('customer.profile');
    }
}

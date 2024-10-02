<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;
use App\Models\ServiceProviderProfile;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param array $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        if ($input['registerAs'] == 'ERR') {
            Validator::make($input, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'phone' => ['required', 'unique:users'],
                'address' => ['required', 'string'],
                'is_student' => ['required', 'boolean', 'in:1'],
                'registerAs' => ['required', 'in:ERR'],
                'dob' => ['required', 'string', 'date'],
                'state' => ['required', 'string'],
                'lga' => ['required', 'string'],
                'school' => ['required', 'string'],
                'faculty' => ['required', 'string'],
                'department' => ['required', 'string'],
                'level' => ['required', 'integer', 'in:100,200,300,400,500'],
                'password' => $this->passwordRules(),
                'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            ], [
                'is_student.in' => 'Non students are not allowed to register as errand runners',
                'level.in' => 'The allowed level are 100, 200, 300, 400 and 500',
            ])->validate();
        }

        if ($input['registerAs'] == 'ERC') {
            Validator::make($input, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'phone' => ['required', 'unique:users'],
                'address' => ['required', 'string'],
                'is_student' => ['required', 'boolean', 'in:0,1'],
                'registerAs' => ['required', 'in:ERC'],
                'dob' => ['required', 'string', 'date'],
                'state' => ['required', 'string'],
                'lga' => ['required', 'string'],
                'school' => ['required', 'string'],
                'faculty' => ['nullable', 'string'],
                'department' => ['nullable', 'string'],
                'level' => ['nullable', 'integer', 'in:100,200,300,400,500'],
                'password' => $this->passwordRules(),
                'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            ], [
                'level.in' => 'The allowed level are 100, 200, 300, 400 and 500',
            ])->validate();
        }

        $register_as = $input['registerAs'] === 'ERC' ? 'ERC' : 'ERR';

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'address' => $input['address'],
            'is_student' => $input['is_student'],
            'dob' => $input['dob'],
            'lga' => $input['lga'],
            'school' => $input['school'],
            'faculty' => $input['faculty'],
            'department' => $input['department'],
            'level' => $input['level'],
            'password' => Hash::make($input['password']),
            'utype' => $register_as,
        ]);

        if ($register_as === 'ERC') {
            ServiceProviderProfile::create(['user_id' => $user->id]);
        }

        return $user;
    }
}

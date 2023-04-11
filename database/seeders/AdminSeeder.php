<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'mohamed ibrahiem',
            'email' => 'mohamedelfert@yahoo.com',
            'password' => bcrypt('2662610'),
            'phone' => '01153225410',
            'utype' => 'ADM',
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\NewUser;

class NewUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NewUser::create([
            'name'      => 'Manager',
            'nic'       => ' ',
            'address'   => ' ',
            'mobile'    => ' ',
            'email'     => ' ',
            'gender'    => 'male',
            'territory' => 0,
            'username'  => 'Admin001',
            'password'  => Hash::make('admin1@'),
            // 'remember_token'    => str_random(10),
        ]);
    }
}

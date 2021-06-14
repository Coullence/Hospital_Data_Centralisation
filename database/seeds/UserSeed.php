<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'mobile' => '0736363637',
            'password' => bcrypt('password')
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'name' => 'Mahantesh Kumbar',
            'email' => 'user@user.com',
            'mobile' => '0736363634',
            'password' => bcrypt('password')
        ]);
        $user->assignRole('user');
    }
}

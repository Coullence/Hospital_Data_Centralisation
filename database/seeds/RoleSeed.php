<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo('admin');

        // Doctor Role
        $role = Role::create(['name' => 'doctor']);
        $role->givePermissionTo('doctor');   

        // Patient Role 
        $role = Role::create(['name' => 'user']);
        $role->givePermissionTo('user');   
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminPermissions = Permission::all();

        $adminRole       = new Role();
        $adminRole->slug = 'admin';
        $adminRole->name = 'Admin';
        $adminRole->save();
        $adminRole->permissions()->attach($adminPermissions);
    }
}

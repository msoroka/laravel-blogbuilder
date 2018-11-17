<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::where('slug', 'admin')->first();

        $user = new User();
        $user->first_name = 'Mateusz';
        $user->last_name = 'Soroka';
        $user->nickname = 'msoroka';
        $user->email = 'ms@example.com';
        $user->password = 'test123';
        $user->save();
        $user->roles()->attach($adminRole);
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = new Permission();
        $permission->slug = 'dashboard';
        $permission->name = 'Dashboard';
        $permission->save();

        $permission = new Permission();
        $permission->slug = 'list-users';
        $permission->name = 'List users';
        $permission->save();

        $permission = new Permission();
        $permission->slug = 'create-users';
        $permission->name = 'Create users';
        $permission->save();

        $permission = new Permission();
        $permission->slug = 'edit-users';
        $permission->name = 'Edit users';
        $permission->save();

        $permission = new Permission();
        $permission->slug = 'remove-users';
        $permission->name = 'Remove users';
        $permission->save();

        $permission = new Permission();
        $permission->slug = 'list-posts';
        $permission->name = 'List posts';
        $permission->save();

        $permission = new Permission();
        $permission->slug = 'create-posts';
        $permission->name = 'Create posts';
        $permission->save();

        $permission = new Permission();
        $permission->slug = 'edit-posts';
        $permission->name = 'Edit posts';
        $permission->save();

        $permission = new Permission();
        $permission->slug = 'remove-posts';
        $permission->name = 'Remove posts';
        $permission->save();

        $permission = new Permission();
        $permission->slug = 'status-posts';
        $permission->name = 'Status posts';
        $permission->save();

        $permission = new Permission();
        $permission->slug = 'assign-posts';
        $permission->name = 'Assign posts';
        $permission->save();

        $permission = new Permission();
        $permission->slug = 'upload-files';
        $permission->name = 'Upload files';
        $permission->save();
    }
}

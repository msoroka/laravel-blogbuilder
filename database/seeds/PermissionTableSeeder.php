<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->globalPermissions();
        $this->userPermissions();
        $this->postPermissions();
        $this->categoryPermissions();
        $this->tagPermissions();
        $this->rolePermissions();
    }

    protected function globalPermissions()
    {
        $permission       = new Permission();
        $permission->slug = 'dashboard';
        $permission->name = 'Dashboard';
        $permission->save();

        $permission       = new Permission();
        $permission->slug = 'upload-files';
        $permission->name = 'Upload files';
        $permission->save();

        $permission       = new Permission();
        $permission->slug = 'blog-settings';
        $permission->name = 'Blog settings';
        $permission->save();

        $permission       = new Permission();
        $permission->slug = 'contact';
        $permission->name = 'contact';
        $permission->save();
    }

    protected function userPermissions()
    {
        $permission       = new Permission();
        $permission->slug = 'list-users';
        $permission->name = 'List users';
        $permission->save();

        $permission       = new Permission();
        $permission->slug = 'create-users';
        $permission->name = 'Create users';
        $permission->save();

        $permission       = new Permission();
        $permission->slug = 'edit-users';
        $permission->name = 'Edit users';
        $permission->save();

        $permission       = new Permission();
        $permission->slug = 'remove-users';
        $permission->name = 'Remove users';
        $permission->save();

        $permission       = new Permission();
        $permission->slug = 'assign-roles';
        $permission->name = 'Assign role';
        $permission->save();

        $permission       = new Permission();
        $permission->slug = 'assign-permissions';
        $permission->name = 'Assign permission';
        $permission->save();
    }

    protected function postPermissions()
    {
        $permission       = new Permission();
        $permission->slug = 'list-posts';
        $permission->name = 'List posts';
        $permission->save();

        $permission       = new Permission();
        $permission->slug = 'create-posts';
        $permission->name = 'Create posts';
        $permission->save();

        $permission       = new Permission();
        $permission->slug = 'edit-posts';
        $permission->name = 'Edit posts';
        $permission->save();

        $permission       = new Permission();
        $permission->slug = 'remove-posts';
        $permission->name = 'Remove posts';
        $permission->save();

        $permission       = new Permission();
        $permission->slug = 'status-posts';
        $permission->name = 'Status posts';
        $permission->save();

        $permission       = new Permission();
        $permission->slug = 'assign-posts';
        $permission->name = 'Assign posts';
        $permission->save();
    }

    protected function categoryPermissions()
    {
        $permission       = new Permission();
        $permission->slug = 'list-categories';
        $permission->name = 'List categories';
        $permission->save();

        $permission       = new Permission();
        $permission->slug = 'create-categories';
        $permission->name = 'Create categories';
        $permission->save();

        $permission       = new Permission();
        $permission->slug = 'edit-categories';
        $permission->name = 'Edit categories';
        $permission->save();

        $permission       = new Permission();
        $permission->slug = 'remove-categories';
        $permission->name = 'Remove categories';
        $permission->save();
    }

    protected function tagPermissions()
    {
        $permission       = new Permission();
        $permission->slug = 'list-tags';
        $permission->name = 'List tags';
        $permission->save();

        $permission       = new Permission();
        $permission->slug = 'create-tags';
        $permission->name = 'Create tags';
        $permission->save();

        $permission       = new Permission();
        $permission->slug = 'edit-tags';
        $permission->name = 'Edit tags';
        $permission->save();

        $permission       = new Permission();
        $permission->slug = 'remove-tags';
        $permission->name = 'Remove tags';
        $permission->save();
    }

    protected function rolePermissions()
    {
        $permission       = new Permission();
        $permission->slug = 'list-roles';
        $permission->name = 'List roles';
        $permission->save();

        $permission       = new Permission();
        $permission->slug = 'create-roles';
        $permission->name = 'Create roles';
        $permission->save();

        $permission       = new Permission();
        $permission->slug = 'edit-roles';
        $permission->name = 'Edit roles';
        $permission->save();

        $permission       = new Permission();
        $permission->slug = 'remove-roles';
        $permission->name = 'Remove roles';
        $permission->save();
    }
}

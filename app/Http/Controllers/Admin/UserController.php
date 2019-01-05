<?php

namespace App\Http\Controllers\Admin;

use App\Handlers\UserHandler;
use App\Handlers\RoleHandler;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $handler;

    public function __construct(UserHandler $handler, RoleHandler $roleHandler)
    {
        $this->handler = $handler;
        $this->roleHandler = $roleHandler;
    }

    public function getAllUsers()
    {
        return view('admin.user.index', [
            'users' => $this->handler->getAllUsers(),
        ]);
    }

    public function getCreateUser()
    {
        return view('admin.user.create', [
            'roles' => $this->roleHandler->getAllRoles(),
            'permissions' => $this->roleHandler->getAllPermissions(),
        ]);
    }

    public function storeUser(Request $request)
    {
        return $this->handler->storeUser($request);
    }

    public function getEditUser($id)
    {
        return view('admin.user.edit', [
            'user' => $this->handler->editUser($id),
            'roles' => $this->roleHandler->getAllRoles(),
            'permissions' => $this->roleHandler->getAllPermissions(),
        ]);
    }

    public function updateUser(Request $request, $id)
    {
        return $this->handler->updateUser($request, $id);
    }

    public function removeUser($id)
    {
        return $this->handler->removeUser($id);
    }

    public function updateUserFirstPassword(Request $request)
    {
        return $this->handler->updateUserFirstPassword($request);
    }
}

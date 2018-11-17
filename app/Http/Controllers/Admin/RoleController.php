<?php

namespace App\Http\Controllers\Admin;

use App\Handlers\RoleHandler;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $handler;

    public function __construct(RoleHandler $handler)
    {
        $this->handler = $handler;
    }

    public function getAllRoles()
    {
        return view('admin.role.index', [
            'roles' => $this->handler->getAllRoles(),
        ]);
    }

    public function getCreateRole()
    {
        return view('admin.role.create', [
            'permissions' => $this->handler->getAllPermissions(),
        ]);
    }

    public function storeRole(Request $request)
    {
        return $this->handler->storeRole($request);
    }

    public function getEditRole($id)
    {
        return view('admin.role.edit', [
            'role' => $this->handler->editRole($id),
            'permissions' => $this->handler->getAllPermissions(),
        ]);
    }

    public function updateRole(Request $request, $id)
    {
        return $this->handler->updateRole($request, $id);
    }

    public function removeRole($id)
    {
        return $this->handler->removeRole($id);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Handlers\UserHandler;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $handler;

    public function __construct(UserHandler $handler)
    {
        $this->handler = $handler;
    }

    public function getAllUsers()
    {
        return view('admin.user.index', [
            'users' => $this->handler->getAllUsers(),
        ]);
    }

    public function getCreateUser()
    {
        return view('admin.user.create');
    }

    public function storeUser(Request $request)
    {
        return $this->handler->storeUser($request);
    }

    public function getEditUser($id)
    {
        return view('admin.user.edit', [
            'user' => $this->handler->editUser($id),
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
}

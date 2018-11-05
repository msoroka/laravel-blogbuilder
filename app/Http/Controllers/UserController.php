<?php

namespace App\Http\Controllers;

use App\Handlers\UserHandler;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $handler;

    public function __construct(UserHandler $handler)
    {
        $this->handler = $handler;
    }

    public function getAllUsers()
    {
        return $this->handler->getAllUsers();
    }

    public function getCreateUser()
    {
        return $this->handler->createUser();
    }

    public function storeUser(Request $request)
    {
        return $this->handler->storeUser($request);
    }

    public function getEditUser($id)
    {
        return $this->handler->editUser($id);
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

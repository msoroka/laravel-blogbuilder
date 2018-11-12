<?php

namespace App\Handlers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserHandler
{
    public function getAllUsers()
    {
        return User::all();
    }

    public function editUser($id)
    {
        return User::find($id);
    }

    public function storeUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:50',
            'last_name'  => 'required|string|max:50',
            'nickname'   => 'required|string|max:50|unique:users',
            'email'      => 'required|email|unique:users',
            'password'   => 'required',
        ]);

        $data = $request->only([
            'first_name',
            'last_name',
            'nickname',
            'email',
            'password',
        ]);

        if ($validator->fails()) {
            flash('Sorry, credentials are occupied.')->error();

            return redirect()->back()->withInput();
        }

        $user = User::create($data);

        if (!$user) {
            flash('Sorry, someting went wrong. Please try again.')->error();

            return redirect()->back()->withInput();
        }

        flash('Success')->success();

        return redirect()->route('admin.user.list-users');
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:50',
            'last_name'  => 'required|string|max:50',
            'nickname'   => 'required|string|max:50|unique:users,nickname,' . $user->nickname . ',nickname',
            'email'      => 'required|email|unique:users,email,' . $user->id . ',id',
        ]);

        $columns = [
            'first_name',
            'last_name',
            'nickname',
            'email',
        ];

        if (!empty($request->input('password'))) {
            $columns[] = 'password';
        }

        $data = $request->only($columns);

        if ($validator->fails()) {
            flash('Sorry, credentials are occupied.')->error();

            return redirect()->back()->withInput();
        }

        $user = $user->update($data);

        if (!$user) {
            return redirect()->back()->withInput();
        }

        flash('Success')->success();

        return redirect()->route('admin.user.list-users');
    }

    public function removeUser($id)
    {
        $user = User::find($id);

        if ($user->delete()) {
            flash('Success')->success();

            return redirect()->route('admin.user.list-users');
        }

        flash('Sorry, someting went wrong. Please try again.')->error();

        return redirect()->route('admin.user.list-users');
    }
}

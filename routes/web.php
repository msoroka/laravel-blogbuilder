<?php

Route::group(['middleware' => ['auth', 'can:dashboard'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::name('list-users')->get('/', 'UserController@getAllUsers')->middleware('can:list-users');
        Route::name('create-user')->get('create', 'UserController@getCreateUser')->middleware('can:create-users');
        Route::name('store-user')->post('store', 'UserController@storeUser')->middleware('can:create-users');
        Route::name('edit-user')->get('{id}/edit', 'UserController@getEditUser')->middleware('can:edit-users');
        Route::name('update-user')->put('{id}/update', 'UserController@updateUser')->middleware('can:edit-users');
        Route::name('remove-user')->delete('{id}/remove', 'UserController@removeUser')->middleware('can:remove-users');
    });
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

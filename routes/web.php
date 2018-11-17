<?php

Route::group(['middleware' => ['auth', 'can:dashboard'], 'prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin'], function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    });

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::name('list-users')->get('/', 'UserController@getAllUsers')->middleware('can:list-users');
        Route::name('create-user')->get('create', 'UserController@getCreateUser')->middleware('can:create-users');
        Route::name('store-user')->post('store', 'UserController@storeUser')->middleware('can:create-users');
        Route::name('edit-user')->get('{id}/edit', 'UserController@getEditUser')->middleware('can:edit-users');
        Route::name('update-user')->put('{id}/update', 'UserController@updateUser')->middleware('can:edit-users');
        Route::name('remove-user')->delete('{id}/remove', 'UserController@removeUser')->middleware('can:remove-users');
    });

    Route::group(['prefix' => 'post', 'as' => 'post.'], function () {
        Route::name('list-posts')->get('/', 'PostController@getAllPosts')->middleware('can:list-posts');
        Route::name('create-post')->get('create', 'PostController@getCreatePost')->middleware('can:create-posts');
        Route::name('store-post')->post('store', 'PostController@storePost')->middleware('can:create-posts');
        Route::name('edit-post')->get('{id}/edit', 'PostController@getEditPost')->middleware('can:edit-posts');
        Route::name('update-post')->put('{id}/update', 'PostController@updatePost')->middleware('can:edit-posts');
        Route::name('remove-post')->delete('{id}/remove', 'PostController@removePost')->middleware('can:remove-posts');
    });

    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
        Route::name('list-categories')->get('/', 'CategoryController@getAllCategories')->middleware('can:list-categories');
        Route::name('create-category')->get('create', 'CategoryController@getCreateCategory')->middleware('can:create-categories');
        Route::name('store-category')->post('store', 'CategoryController@storeCategory')->middleware('can:create-categories');
        Route::name('edit-category')->get('{id}/edit', 'CategoryController@getEditCategory')->middleware('can:edit-categories');
        Route::name('update-category')->put('{id}/update', 'CategoryController@updateCategory')->middleware('can:edit-categories');
        Route::name('remove-category')->delete('{id}/remove', 'CategoryController@removeCategory')->middleware('can:remove-categories');
    });

    Route::group(['prefix' => 'tag', 'as' => 'tag.'], function () {
        Route::name('list-tags')->get('/', 'TagController@getAllTags')->middleware('can:list-tags');
        Route::name('create-tag')->get('create', 'TagController@getCreateTag')->middleware('can:create-tags');
        Route::name('store-tag')->post('store', 'TagController@storeTag')->middleware('can:create-tags');
        Route::name('edit-tag')->get('{id}/edit', 'TagController@getEditTag')->middleware('can:edit-tags');
        Route::name('update-tag')->put('{id}/update', 'TagController@updateTag')->middleware('can:edit-tags');
        Route::name('remove-tag')->delete('{id}/remove', 'TagController@removeTag')->middleware('can:remove-tags');
    });

    Route::group(['prefix' => 'upload', 'as' => 'upload.'], function () {
        Route::name('upload')->get('/', function () {
            return view('admin.upload.index');
        })->middleware('can:upload-files');
    });
});

Route::get('/', function () {
    return view('home');
});

Auth::routes();

<?php

namespace App\Http\Controllers\Admin;

use App\Handlers\CategoryHandler;
use App\Handlers\PostHandler;
use App\Handlers\TagHandler;
use App\Handlers\UserHandler;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $handler;

    public function __construct(
        PostHandler $handler,
        UserHandler $userHandler,
        TagHandler $tagHandler,
        CategoryHandler $categoryHandler
    ) {
        $this->handler         = $handler;
        $this->userHandler     = $userHandler;
        $this->tagHandler      = $tagHandler;
        $this->categoryHandler = $categoryHandler;
    }

    public function getAllPosts()
    {
        return view('admin.post.index', [
            'posts' => $this->handler->getAllPosts(),
        ]);
    }

    public function getCreatePost()
    {
        return view('admin.post.create', [
            'statuses'   => $this->handler->getPostStatuses(),
            'users'      => $this->userHandler->getAllUsers()->pluck('full_name', 'id'),
            'categories' => $this->categoryHandler->getAllCategories()->pluck('name', 'id'),
            'tags'       => $this->tagHandler->getAllTags()->pluck('name', 'id'),
        ]);
    }

    public function storePost(Request $request)
    {
        return $this->handler->storePost($request);
    }

    public function getEditPost($id)
    {
        return view('admin.post.edit', [
            'post'     => $this->handler->editPost($id),
            'statuses' => $this->handler->getPostStatuses(),
            'users'    => $this->userHandler->getAllUsers()->pluck('full_name', 'id'),
            'categories' => $this->categoryHandler->getAllCategories()->pluck('name', 'id'),
            'tags'       => $this->tagHandler->getAllTags()->pluck('name', 'id'),
        ]);
    }

    public function updatePost(Request $request, $id)
    {
        return $this->handler->updatePost($request, $id);
    }

    public function removePost($id)
    {
        return $this->handler->removePost($id);
    }
}

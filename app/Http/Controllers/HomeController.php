<?php

namespace App\Http\Controllers;

use App\Handlers\CategoryHandler;
use App\Handlers\PostHandler;
use App\Handlers\TagHandler;
use App\Models\Post;

class HomeController extends Controller
{
    public function __construct(PostHandler $handler, CategoryHandler $categoryHandler, TagHandler $tagHandler)
    {
        $this->handler         = $handler;
        $this->categoryHandler = $categoryHandler;
        $this->tagHandler      = $tagHandler;
    }

    public function index()
    {
        return view('home', [
            'posts'       => $this->handler->getAllPosts()->where('status', '2'),
            'latestPosts' => $this->handler->getAllPosts()->where('status', '2')->take(5),
            'categories'  => $this->categoryHandler->getAllCategories(),
        ]);
    }

    public function getPost($id)
    {
        return view('single-post', [
            'post'        => $this->handler->getPost($id),
            'latestPosts' => $this->handler->getAllPosts()->where('status', '2')->take(5),
            'categories'  => $this->categoryHandler->getAllCategories(),
        ]);
    }

    public function getPostWithCategory($id)
    {
        $category         = $this->categoryHandler->getCategory($id);
        $ids = $category->children->map(function($cat){
            return $cat->id;
        });
        $ids->push($category->id);
        // dd($parent);
        // $categoryParentId = $category->parent->id;

        return view('single-category', [
            'posts'       => $this->handler->getAllPosts()->where('status', '2')->whereIn('category_id', $ids),
            'latestPosts' => $this->handler->getAllPosts()->where('status', '2')->take(5),
            'categories'  => $this->categoryHandler->getAllCategories(),
            'category'    => $category,
        ]);
    }

    public function getPostWithTag($id)
    {
        $tag = $this->tagHandler->getTag($id);

        $posts = Post::whereHas('tags', function ($query) use ($tag) {
            $query->whereName($tag->name);
        })->orderBy('created_at', 'desc')->get();

        return view('single-tag', [
            'posts'       => $posts->where('status', '2'),
            'latestPosts' => $this->handler->getAllPosts()->where('status', '2')->take(5),
            'categories'  => $this->categoryHandler->getAllCategories(),
            'tag'         => $tag,
        ]);
    }
}

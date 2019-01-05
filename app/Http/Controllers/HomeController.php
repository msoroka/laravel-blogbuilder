<?php

namespace App\Http\Controllers;

use App\Handlers\CategoryHandler;
use App\Handlers\ContactHandler;
use App\Handlers\PostHandler;
use App\Handlers\SettingHandler;
use App\Handlers\TagHandler;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(PostHandler $handler, CategoryHandler $categoryHandler, TagHandler $tagHandler, SettingHandler $settingHandler, ContactHandler $contactHandler)
    {
        $this->handler         = $handler;
        $this->categoryHandler = $categoryHandler;
        $this->tagHandler      = $tagHandler;
        $this->theme           = $settingHandler->getTheme();
        $this->contactHandler  = $contactHandler;
    }

    public function index()
    {
        return view($this->theme . '.home', [
            'posts'       => $this->handler->getAllPosts()->where('status', '2'),
            'latestPosts' => $this->handler->getAllPosts()->where('status', '2')->take(5),
            'categories'  => $this->categoryHandler->getAllCategories(),
        ]);
    }

    public function getPost($id)
    {
        return view($this->theme . '.single-post', [
            'post'        => $this->handler->getPost($id),
            'latestPosts' => $this->handler->getAllPosts()->where('status', '2')->take(5),
            'categories'  => $this->categoryHandler->getAllCategories(),
        ]);
    }

    public function getPostWithCategory($id)
    {
        $category = $this->categoryHandler->getCategory($id);
        $ids      = $category->children->map(function ($cat) {
            return $cat->id;
        });
        $ids->push($category->id);

        return view($this->theme . '.single-category', [
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

        return view($this->theme . '.single-tag', [
            'posts'       => $posts->where('status', '2'),
            'latestPosts' => $this->handler->getAllPosts()->where('status', '2')->take(5),
            'categories'  => $this->categoryHandler->getAllCategories(),
            'tag'         => $tag,
        ]);
    }

    public function getContactForm()
    {
        return view($this->theme . '.contact', [
            'latestPosts' => $this->handler->getAllPosts()->where('status', '2')->take(5),
            'categories'  => $this->categoryHandler->getAllCategories(),
        ]);
    }

    public function storeContactForm(Request $request)
    {
        return $this->contactHandler->storeContact($request);
    }
}

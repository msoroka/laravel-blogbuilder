<?php

namespace App\Http\Controllers;

use App\Handlers\PostHandler;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(PostHandler $handler)
    {
        $this->handler = $handler;
    }

    public function index()
    {
        return view('home', [
            'posts' => $this->handler->getAllPosts()->where('status', '2'),
        ]);
    }

    public function getPost($id)
    {
        return view('single-post', [
            'post' => $this->handler->getPost($id),
        ]);
    }
}

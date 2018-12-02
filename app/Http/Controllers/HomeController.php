<?php

namespace App\Http\Controllers;

use App\Handlers\PostHandler;

class HomeController extends Controller
{
    public function __construct(PostHandler $handler)
    {
        $this->handler = $handler;
    }

    public function index()
    {
        return view('home', [
            'posts' => $this->handler->getAllPosts(),
        ]);
    }
}

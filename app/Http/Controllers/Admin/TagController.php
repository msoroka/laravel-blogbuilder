<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Handlers\TagHandler;
use App\Handlers\UserHandler;

class TagController extends Controller
{
    protected $handler;

    public function __construct(TagHandler $handler)
    {
        $this->handler = $handler;
    }

    public function getAllTags()
    {
        return view('admin.tag.index', [
            'tags' => $this->handler->getAllTags(),
        ]);
    }

    public function getCreateTag()
    {
        return view('admin.tag.create');
    }

    public function storeTag(Request $request)
    {
        return $this->handler->storeTag($request);
    }

    public function getEditTag($id)
    {
        return view('admin.tag.edit', [
            'tag' => $this->handler->editTag($id),
        ]);
    }

    public function updateTag(Request $request, $id)
    {
        return $this->handler->updateTag($request, $id);
    }

    public function removeTag($id)
    {
        return $this->handler->removeTag($id);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Handlers\CategoryHandler;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $handler;

    public function __construct(CategoryHandler $handler)
    {
        $this->handler = $handler;
    }

    public function getAllCategories()
    {
        return view('admin.category.index', [
            'categories' => $this->handler->getAllCategories(),
        ]);
    }

    public function getCreateCategory()
    {
        return view('admin.category.create', [
            'categories' => $this->handler->getAllCategories()->pluck('name', 'id')->prepend('None', ''),
        ]);
    }

    public function storeCategory(Request $request)
    {
        return $this->handler->storeCategory($request);
    }

    public function getEditCategory($id)
    {
        return view('admin.category.edit', [
            'category' => $this->handler->editCategory($id),
            'categories' => $this->handler->getAllCategories()->pluck('name', 'id')->prepend('None', ''),
        ]);
    }

    public function updateCategory(Request $request, $id)
    {
        return $this->handler->updateCategory($request, $id);
    }

    public function removeCategory($id)
    {
        return $this->handler->removeCategory($id);
    }
}

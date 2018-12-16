<?php

namespace App\Handlers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryHandler
{
    public function getAllCategories()
    {
        $this->fixTree();

        return Category::defaultOrder()->get()->linkNodes();
    }

    public function editCategory($id)
    {
        $this->fixTree();

        return Category::find($id);
    }

    public function storeCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
        ]);

        $data = $request->only([
            'name',
            'parent_id',
        ]);

        if ($validator->fails()) {
            flash('Sorry, someting went wrong. Please try again.')->error();

            return redirect()->back()->withInput();
        }

        $category = Category::create($data);

        if (!$category) {
            flash('Sorry, someting went wrong. Please try again.')->error();

            return redirect()->back()->withInput();
        }

        activity()
            ->withProperties(['Changed things:' => $category])
            ->log('Category was created');

        $node = Category::find($data['parent_id']);
        if ($node) {
            $node->appendNode($category);
        }

        $this->fixTree();

        flash('Success')->success();

        return redirect()->route('admin.category.list-categories');
    }

    public function updateCategory(Request $request, $id)
    {
        $category = Category::find($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
        ]);

        $data = $request->only([
            'name',
            'parent_id',
        ]);

        if ($validator->fails()) {
            flash('Sorry, someting went wrong. Please try again.')->error();

            return redirect()->back()->withInput();
        }

        if (!$category) {
            return redirect()->back()->withInput();
        }

        $node = Category::find($data['parent_id']);
        if ($node) {
            $node->appendNode($category);
        }

        $category = $category->fill($data);
        activity()
            ->withProperties(['Changed things:' => $category->getDirty()])
            ->log('Category was updated');

        $category = $category->update($data);

        $this->fixTree();

        flash('Success')->success();

        return redirect()->route('admin.category.list-categories');
    }

    public function removeCategory($id)
    {
        $category = Category::find($id);

        activity()
            ->withProperties(['Changed things:' => $category])
            ->log('Category was removed');

        if ($category->delete()) {
            flash('Success')->success();

            $this->fixTree();

            return redirect()->route('admin.category.list-categories');
        }

        flash('Sorry, someting went wrong. Please try again.')->error();

        return redirect()->route('admin.category.list-categories');
    }

    public function fixTree()
    {
        if (Category::isBroken()) {
            Category::fixTree();
        }
    }
}

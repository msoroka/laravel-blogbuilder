<?php

namespace App\Handlers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TagHandler
{
    public function getAllTags()
    {
        return Tag::all();
    }

    public function editTag($id)
    {
        return Tag::find($id);
    }

    public function storeTag(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:tags',
        ]);

        $data = $request->only([
            'name',
        ]);

        if ($validator->fails()) {
            flash('Sorry, something went wrong. Please try again.')->error();

            return redirect()->back()->withInput();
        }

        $tag = Tag::create($data);

        if (!$tag) {
            flash('Sorry, someting went wrong. Please try again.')->error();

            return redirect()->back()->withInput();
        }

        activity()
            ->withProperties(['Changed things:' => $tag])
            ->log('Tag was created');

        flash('Success')->success();

        return redirect()->route('admin.tag.list-tags');
    }

    public function updateTag(Request $request, $id)
    {
        $tag = Tag::find($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:tags,name,' . $tag->id . ',id',
        ]);

        $data = $request->only([
            'name',
        ]);

        if ($validator->fails()) {
            flash('Sorry, something went wrong. Please try again.')->error();

            return redirect()->back()->withInput();
        }

        $tag = $tag->fill($data);
        activity()
            ->withProperties(['Changed things:' => $tag->getDirty()])
            ->log('Tag was updated');

        $tag = $tag->update($data);

        if (!$tag) {
            flash('Sorry, someting went wrong. Please try again.')->error();

            return redirect()->back()->withInput();
        }

        flash('Success')->success();

        return redirect()->route('admin.tag.list-tags');
    }

    public function removeTag($id)
    {
        $tag = Tag::find($id);

        activity()
            ->withProperties(['Changed things:' => $tag])
            ->log('Tag was removed');

        if ($tag->delete()) {
            flash('Success')->success();

            return redirect()->route('admin.tag.list-tags');
        }

        flash('Sorry, someting went wrong. Please try again.')->error();

        return redirect()->route('admin.tag.list-tags');
    }
}

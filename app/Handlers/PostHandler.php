<?php

namespace App\Handlers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostHandler
{
    public function getAllPosts()
    {
        return Post::all();
    }

    public function editPost($id)
    {
        return Post::find($id);
    }

    public function storePost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string',
            'content' => 'required',
        ]);

        $data = $request->only([
            'name',
            'author_id',
            'content',
            'status',
        ]);

        if ($request->only(['status']) == null) {
            $data['status'] = '1';
        }

        if ($request->only(['author_id']) == null) {
            $data['author_id'] = Auth::user()->id;
        }

        if ($validator->fails()) {
            flash('Sorry, something went wrong. Please try again.')->error();

            return redirect()->back()->withInput();
        }

        $post = Post::create($data);

        if (!$post) {
            flash('Sorry, someting went wrong. Please try again.')->error();

            return redirect()->back()->withInput();
        }

        flash('Success')->success();

        return redirect()->route('admin.post.list-posts');
    }

    public function updatePost(Request $request, $id)
    {
        $post = Post::find($id);

        $validator = Validator::make($request->all(), [
            'name'      => 'required|string',
            'author_id' => 'required',
            'content'   => 'required',
            'status'    => 'required',
        ]);

        $data = $request->only([
            'name',
            'author_id',
            'content',
            'status',
        ]);

        if ($validator->fails()) {
            flash('Sorry, something went wrong. Please try again.')->error();

            return redirect()->back()->withInput();
        }

        $post = $post->update($data);

        if (!$post) {
            flash('Sorry, someting went wrong. Please try again.')->error();

            return redirect()->back()->withInput();
        }

        flash('Success')->success();

        return redirect()->route('admin.post.list-posts');
    }

    public function removePost($id)
    {
        $post = post::find($id);

        if ($post->delete()) {
            flash('Success')->success();

            return redirect()->route('admin.post.list-posts');
        }

        flash('Sorry, someting went wrong. Please try again.')->error();

        return redirect()->route('admin.post.list-posts');
    }

    public function getPostStatuses()
    {
        return Post::postStatuses();
    }
}

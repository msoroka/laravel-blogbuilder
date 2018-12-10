<?php

namespace App\Handlers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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

    public function getPost($id)
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
            'category_id',
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

        $post->tags()->sync($request->tags);

        Mail::send([], [], function ($message) use ($post) {
            $message->to(config('app.email'))
                ->subject('New post added')
                ->setBody($post->author->full_name . ' created post ' . $post->name);
        });

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
            'category_id',
            'content',
            'status',
        ]);

        if ($validator->fails()) {
            flash('Sorry, something went wrong. Please try again.')->error();

            return redirect()->back()->withInput();
        }

        if (!$post) {
            flash('Sorry, someting went wrong. Please try again.')->error();

            return redirect()->back()->withInput();
        }

        $post->tags()->sync($request->tags);

        Mail::send([], [], function ($message) use ($post) {
            $message->to(config('app.email'))
                ->subject($post->name . ' was updated by ' . Auth::user()->full_name)
                ->setBody(Auth::user()->full_name . ' updated post ' . $post->name);
        });

        $post = $post->update($data);

        flash('Success')->success();

        return redirect()->route('admin.post.list-posts');
    }

    public function removePost($id)
    {
        $post = post::find($id);

        Mail::send([], [], function ($message) use ($post) {
            $message->to(config('app.email'))
                ->subject($post->name . ' was deleted by ' . Auth::user()->full_name)
                ->setBody(Auth::user()->full_name . ' deleted post ' . $post->name);
        });

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

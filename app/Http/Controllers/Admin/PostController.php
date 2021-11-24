<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Category;
use App\Tag;


class PostController extends Controller
{
    protected $validationRules = [
        'title' => 'required|string|max:100',
        'content' => 'required|string',
        'category_id' => 'nullable|exists:categories,id',
        'tags' => 'exists:tags,id'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all();
        $posts = Auth::user()->posts;

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationRules);

        $newPost = new Post();
        $newPost->fill($request->all());
        //TO DO creare un slug unique
        $newPost->slug = Str::slug($newPost->title, '-');
        $newPost->user_id = Auth::id();
        $newPost->save();

        $newPost->tags()->attach($request['tags']);

        return redirect()->route("admin.posts.index")->with('success', "Post created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if ($post['user_id'] != Auth::id()) {
            abort(403);
        }

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if ($post['user_id'] != Auth::id()) {
            abort(403);
        }

        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate($this->validationRules);

        $post->fill($request->all());
        //TO DO creare un slug unique
        $post->slug = Str::slug($post->title, '-');

        $post->save();
        $post->tags()->sync($request['tags']);

        return redirect()->route("admin.posts.index")->with('success', "Post edited successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $post = Post::find($request->id);
        
        $post->delete();

        return redirect()->route('admin.posts.index')->with('error', "Post {$post->id} has been deleted!");
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category')->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = User::all();
        $categories = Category::all();
        return view('posts.create', compact('authors', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationRules());

        $image = Storage::disk('public')->put('posts', $request->file('image'));
        // $image = Storage::put('storage/posts',  $request->file('image'));

        // alternative 1
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->image = $image;
        $post->user_id = $request->user_id;
        $post->category_id = $request->category_id;
        $post->save();

        // alternative 2
        // $post = Post::create([
        //     'title' => $request->title,
        //     'body' => $request->body,
        //     'user_id' => $request->user_id,
        //     'category_id' => $request->category_id
        // ]);
        // Alternative 3
        // Post::create($request->all());

        return redirect()->route('posts.show', $post->id)->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::with('category', 'user')->findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $authors = User::all();
        $categories = Category::all();
        return view('posts.edit', compact('post', 'authors', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->validationRules());

        $post = Post::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = Storage::disk('public')->put('posts', $request->file('image'));
            $post->image = $image;
        }
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = $request->user_id;
        $post->category_id = $request->category_id;
        $post->save();

        return redirect()->route('posts.show', $post->id)->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }

    private function validationRules()
    {
        return [
            'title' => ['required', 'min:5', 'max:255'],
            'body' => 'required|min:10',
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}

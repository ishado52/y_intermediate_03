<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // select
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('index', compact('posts'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }


    // insert
    public function store(Request $request)
    {
        // バリデーション（100字以内）
        $request->validate([
            'content' => 'required|max:100',
        ]);

        Post::create($request->all());

        return redirect()->route('index')->with('success', '投稿成功');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('edit', compact('post'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    $request->validate([
        'content'=>'required|max:100',
    ]);

    $post =Post::findOrFail($id);

    $post->content = $request->input('content');
    $post->save();

    return redirect()->route('index')->with('success','更新成功');
    }

    // delete
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('index')->with('success', '削除成功');
    }
}

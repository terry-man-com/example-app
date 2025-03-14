<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // 記事一覧表示用
    public function index() {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    //投稿データ作成用
    public function create() {
        return view ('post.create');
    }
    // 投稿データ保存用
    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|max:20',
            'body' => 'required|max:400'
        ]);
        $post = Post::create($validated);
        $request->session()->flash('message', '保存しました');
        return back();
    }
}

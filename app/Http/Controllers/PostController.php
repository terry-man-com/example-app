<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;


class PostController extends Controller
{
    // 記事一覧表示用
    public function index() {
        $posts = Post::where('user_id', auth()->id())->get(); //条件付きデータ取得
        return view('post.index', compact('posts'));
    }

    //投稿データ作成用
    public function create() {
        return view ('post.create');
    }
    // 投稿データ保存用
    public function store(Request $request) {
        Gate::authorize('test');
        
        $validated = $request->validate([
            'title' => 'required|max:20',
            'body' => 'required|max:400'
        ]);

        $validated['user_id'] = auth()->id();

        $post = Post::create($validated);
        $request->session()->flash('message', '保存しました');
        return back();
    }
}

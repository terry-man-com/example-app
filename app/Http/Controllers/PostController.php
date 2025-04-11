<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminates\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(10); // 10件だけ表示
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:20',
            'body' => 'required|max:400'
        ]);
        $validated['user_id'] = auth()->id();

        $post = Post::create($validated);
        $request->session()->flash('message','保存しました');
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|max:20',
            'body' => 'required|max:400'
        ]);
        $validated['user_id'] = auth()->id();

        $post->update($validated);
        $request->session()->flash('message','更新しました');
        return redirect()->route('post.mypage.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Post $post)
    {
        $post->delete();
        $request->session()->flash('message', '削除しました。');
        return redirect()->route('post.mypage');
    }

    // キーワード検索
    public function search(Request $request) {

        session()->forget('alertMessage');
        if(empty($request->input('keyword'))) {
            session()->flash('formEmptyMessage', 'キーワードを入力してください');
            return redirect()->route('post.index');
        }
        $keyword = $request->input('keyword');
        $query = Post::query(); //全件取得してクエリ化
        if(!empty($keyword)) {
            $query->where('title', 'LIKE', '%' . $keyword . '%');
            $query->orWhere('body', 'LIKE', '%' . $keyword . '%');
        }

        $posts = $query->paginate(10);

        if ($posts->isEmpty()) {
            session()->flash('alertMessage', '記事がありません');
        }

        return view('post.search', compact('posts', 'keyword'));
    }
    // マイページ用
    // マイページ閲覧
    public function mypage()
    {
        $posts = Post::where('user_id', auth()->id())->paginate(10);
        return view('post.mypage', compact('posts'));
    }

    // マイページの個別表示用
    public function mypageShow(Post $post)
    {
        if($post->user_id !== auth()->id()) {
            abort(403, 'この投稿にはアクセスできません。');
        }
        return view('post.mypageShow', compact('post'));
    }
}

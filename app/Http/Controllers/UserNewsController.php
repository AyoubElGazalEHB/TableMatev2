<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserNewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('news.user_index', compact('news'));
    }

    public function show($id)
    {
        $newsItem = News::with(['comments.user'])->findOrFail($id);
        return view('news.show', compact('newsItem'));
    }

    public function storeComment(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string|min:3|max:1000',
        ]);

        $newsItem = News::findOrFail($id);

        Comment::create([
            'news_id' => $newsItem->id,
            'user_id' => Auth::id(),
            'name' => Auth::user()->name,
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('message', 'Your comment has been added successfully!');
    }
}
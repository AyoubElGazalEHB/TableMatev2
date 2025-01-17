<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class UserNewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('news.user_index', compact('news'));
    }

    public function show($id)
    {
        $newsItem = News::with('comments')->findOrFail($id);
        return view('news.show', compact('newsItem'));
    }
}
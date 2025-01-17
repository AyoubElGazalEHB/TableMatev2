<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    // Show all news for users
    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('news.index', compact('news'));
    }

    // Show news detail
    public function show($id)
    {
        $newsItem = News::with('comments')->findOrFail($id);
        return view('news.show', compact('newsItem'));
    }

    // Admin: Manage news
    public function adminIndex()
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    // Admin: Add news
    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'content' => 'required',
            'publication_date' => 'required|date',
        ]);

        $path = $request->file('image')->store('news', 'public');

        News::create([
            'title' => $validated['title'],
            'image_path' => $path,
            'content' => $validated['content'],
            'publication_date' => $validated['publication_date'],
        ]);

        return redirect()->route('admin.news.index')->with('message', 'News item added successfully!');
    }

    // Admin: Edit news
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'content' => 'required',
            'publication_date' => 'required|date',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            Storage::disk('public')->delete($news->image_path);
            $path = $request->file('image')->store('news', 'public');
            $news->image_path = $path;
        }

        $news->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'publication_date' => $validated['publication_date'],
            'image_path' => $news->image_path, // Keep the updated image or the old one
        ]);

        return redirect()->route('admin.news.index')->with('message', 'News item updated successfully!');
    }

    // Admin: Delete news
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        Storage::disk('public')->delete($news->image_path);
        $news->delete();

        return redirect()->route('admin.news.index')->with('message', 'News item deleted successfully!');
    }

    // Add comment
    public function addComment(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'comment' => 'required|string',
        ]);

        $news = News::findOrFail($id);
        $news->comments()->create($request->only(['name', 'comment']));

        return redirect()->back()->with('message', 'Comment added successfully!');
    }
}
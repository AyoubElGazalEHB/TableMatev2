<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminNewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('admin.news.admin_index', compact('news'));
    }

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
            Storage::disk('public')->delete($news->image_path);
            $path = $request->file('image')->store('news', 'public');
            $news->image_path = $path;
        }

        $news->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'publication_date' => $validated['publication_date'],
            'image_path' => $news->image_path,
        ]);

        return redirect()->route('admin.news.index')->with('message', 'News item updated successfully!');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        Storage::disk('public')->delete($news->image_path);
        $news->delete();

        return redirect()->route('admin.news.index')->with('message', 'News item deleted successfully!');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq_Items;
use App\Models\Faq_categories;
use Illuminate\Support\Facades\Auth;

class FAQItemController extends Controller
{
    /* User Panel */
    public function display()
    {
        $categories = Faq_categories::with(['faqItems.user'])->get();
        return view('user.faq', compact('categories'));
    }

    /* Admin Panel */
    public function faqItem_management()
    {
        $data = Faq_Items::with(['category', 'user'])->get();
        if (Auth::check() && Auth::user()->typeUser == '1') {
            return view('admin.faqItem.faq_item', compact('data'));
        }
        return redirect('login')->with('message', 'Unauthorized access');
    }

    public function add_it()
    {
        $categories = Faq_categories::all();
        if (Auth::check() && Auth::user()->typeUser == '1') {
            return view('admin.faqItem.add_item', compact('categories'));
        }
        return redirect('login')->with('message', 'Unauthorized access');
    }

    public function add_item(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string|max:255',
            'answer' => 'nullable|string',
        ]);

        Faq_Items::create([
            'faq_categories_id' => $validated['category_id'],
            'question' => $validated['question'],
            'answer' => $validated['answer'] ?? null,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('message', 'The question has been added successfully');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string|max:255',
        ]);

        Faq_Items::create([
            'faq_categories_id' => $validated['faq_category_id'],
            'question' => $validated['question'],
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('message', 'Your question has been submitted successfully.');
    }

    public function edit_item($id)
    {
        $data = Faq_Items::findOrFail($id);
        $categories = Faq_categories::all();

        if (Auth::check() && Auth::user()->typeUser == '1') {
            return view('admin.faqItem.edit_item', compact('data', 'categories'));
        }

        return redirect('login')->with('message', 'Unauthorized access');
    }

    public function update_item(Request $request, $id)
    {
        $validated = $request->validate([
            'faq_categories_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string|max:255',
            'answer' => 'nullable|string',
        ]);

        $item = Faq_Items::findOrFail($id);
        $item->update($validated);

        return redirect()->back()->with('message', "The question '{$item->question}' has been updated successfully");
    }
}
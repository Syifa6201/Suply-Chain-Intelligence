<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();

        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'     => 'required|max:255',
            'category'  => 'required|max:100',
            'content'   => 'required',
            'status'    => 'required|in:Draft,Published',
            'image'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request
                ->file('image')
                ->store('articles', 'public');
        }

        $data['author_id'] = session('user_id');

        Article::create($data);

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Article berhasil ditambahkan.');
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $data = $request->validate([
            'title'     => 'required|max:255',
            'category'  => 'required|max:100',
            'content'   => 'required',
            'status'    => 'required|in:Draft,Published',
            'image'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {

            if (
                $article->image &&
                Storage::disk('public')->exists($article->image)
            ) {
                Storage::disk('public')->delete($article->image);
            }

            $data['image'] = $request
                ->file('image')
                ->store('articles', 'public');
        }

        $article->update($data);

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Article berhasil diperbarui.');
    }

    public function destroy(Article $article)
    {
        if (
            $article->image &&
            Storage::disk('public')->exists($article->image)
        ) {
            Storage::disk('public')->delete($article->image);
        }

        $article->delete();

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Article berhasil dihapus.');
    }
}
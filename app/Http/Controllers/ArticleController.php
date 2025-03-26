<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        // Mostra tutti gli articoli a tutti
        $articles = Article::with('user')->get();
        return view('article.index', compact('articles'));
    }

    public function create()
    {
        return view('article.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'subtitle' => 'required|min:3',
            'body' => 'required|min:10',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['title', 'subtitle', 'body']);

        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('img', 'public');
        } else {
            $data['img'] = 'img/default.jpg';
        }

        $data['user_id'] = Auth::id();

        Article::create($data);

        return redirect()->route('article.index')->with('message', 'Articolo creato con successo!');
    }

    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    public function edit(Article $article)
    {
        // Solo l’autore può modificare
        if (Auth::id() !== $article->user_id) {
            abort(403);
        }

        return view('article.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        if (Auth::id() !== $article->user_id) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|min:3',
            'subtitle' => 'required|min:3',
            'body' => 'required|min:10',
            'img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['title', 'subtitle', 'body']);

        if ($request->hasFile('img')) {
            if ($article->img && $article->img !== 'img/default.jpg') {
                Storage::disk('public')->delete($article->img);
            }
            $data['img'] = $request->file('img')->store('img', 'public');
        }

        $article->update($data);

        return redirect()->route('article.show', $article)->with('message', 'Articolo modificato con successo!');
    }

    public function destroy(Article $article)
    {
        if (Auth::id() !== $article->user_id) {
            abort(403);
        }

        if ($article->img && $article->img !== 'img/default.jpg') {
            Storage::disk('public')->delete($article->img);
        }

        $article->delete();

        return redirect()->route('article.index')->with('message', 'Articolo eliminato con successo!');
    }
}

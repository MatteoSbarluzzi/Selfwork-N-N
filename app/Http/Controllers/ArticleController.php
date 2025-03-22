<?php

// Percorso: app/Http/Controllers/ArticleController.php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
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

        Article::create($data);

        return redirect()->route('article.index')->with('message', 'Articolo creato con successo!');
    }

    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
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

        return redirect()->route('article.show', $article)->with('message', 'Articolo aggiornato con successo!');
    }

    public function destroy(Article $article)
    {
        if ($article->img && $article->img !== 'img/default.jpg') {
            Storage::disk('public')->delete($article->img);
        }

        $article->delete();

        return redirect()->route('article.index')->with('message', 'Articolo eliminato con successo!');
    }
}

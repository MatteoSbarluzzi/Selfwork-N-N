<!-- Percorso: resources/views/article/show.blade.php -->

<x-layout>

<header class="header">
    <div class="container h-100">
        <div class="row justify-content-center align-content-center h-100">
            <div class="col-12 col-md-6 d-flex justify-content-center">
                <h1 class="text-center">Articolo con id {{ $article->id }}</h1>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="row my-5">
        <div class="col-12 col-md-4">
            <div class="card shadow-lg p-3" style="width: 100%; border-radius: 15px;">
                <img src="{{ Storage::url($article->img ?? 'img/default.jpg') }}" class="card-img-top rounded" alt="immagine articolo">

                <div class="card-body text-center">
                    <h5 class="card-title text-warning text-uppercase">{{ $article->title }}</h5>
                    <p class="card-subtitle text-secondary-emphasis">{{ $article->subtitle }}</p>
                    <p class="card-text mt-2">{{ $article->body }}</p>

                    @auth
                    <div class="mt-4 d-flex justify-content-center gap-3">
                        <a href="{{ route('article.edit', $article) }}" class="btn btn-warning btn-lg w-50 text-white d-flex align-items-center justify-content-center gap-2">
                            ✏️ Modifica
                        </a>

                        <form action="{{ route('article.destroy', $article) }}" method="POST" class="w-50">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-lg w-100 d-flex align-items-center justify-content-center gap-2">
                                🗑️ Elimina
                            </button>
                        </form>
                    </div>
                    @endauth

                </div>
            </div>
        </div>
    </div>
</div>

</x-layout>

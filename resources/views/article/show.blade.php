<x-layout>
  <header class="header">
    <div class="container h-100">
      <div class="row justify-content-center align-content-center h-100">
        <div class="col-12 col-md-6 d-flex justify-content-center">
          <h1 class="text-center">Articolo con ID {{ $article->id }}</h1>
        </div>
      </div>
    </div>
  </header>

  <x-display-message />

  <div class="container">
    <div class="row my-5">
      <div class="col-12 col-md-6 offset-md-3">
        <div class="card shadow-lg p-3" style="width: 100%; border-radius: 15px;">
          <img src="{{ Storage::url($article->img ?? 'img/default.jpg') }}" class="card-img-top rounded" style="max-height: 300px; object-fit: cover;" alt="Immagine articolo">

          <div class="card-body text-center">
            <h5 class="card-title text-warning text-uppercase text-break">{{ $article->title }}</h5>
            <p class="card-subtitle text-secondary-emphasis text-break">{{ $article->subtitle }}</p>

            <p class="card-text mt-2 text-break overflow-auto" style="max-height: 250px;">
              {{ $article->body }}
            </p>

            @if($article->tags->isNotEmpty())
              <div class="mt-3">
                @foreach($article->tags as $tag)
                  <span class="badge bg-primary">#{{ $tag->name }}</span>
                @endforeach
              </div>
            @endif

            <p class="text-muted mt-3">Pubblicato da: <strong>{{ $article->user->name }}</strong></p>

            @auth
              @if (Auth::id() === $article->user_id)
                <div class="mt-4 d-flex justify-content-center gap-3">
                  <a href="{{ route('article.edit', $article) }}" class="btn btn-warning btn-lg w-50 text-white d-flex align-items-center justify-content-center gap-2">
                    ✏️ Modifica
                  </a>

                  <form action="{{ route('article.destroy', $article) }}" method="POST" class="w-50" onsubmit="return confirm('Sei sicuro di voler eliminare questo articolo?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-lg w-100 d-flex align-items-center justify-content-center gap-2">
                      🗑️ Elimina
                    </button>
                  </form>
                </div>
              @endif
            @endauth

            <a href="{{ route('article.index') }}" class="btn btn-outline-light mt-4">⬅️ Torna alla lista</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-layout>

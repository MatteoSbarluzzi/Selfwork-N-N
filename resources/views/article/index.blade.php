<x-layout>

  <x-masthead title="I miei articoli" />

  <x-display-message />

  <div class="container">
    <div class="row my-5">
      @foreach($articles as $article)
        <div class="col-12 col-md-4 mb-4">
          <div class="card shadow-lg p-3" style="width: 100%; border-radius: 15px;">
            <img src="{{ Storage::url($article->img ?? 'img/default.jpg') }}" class="card-img-top rounded" style="max-height: 200px; object-fit: cover;" alt="immagine articolo">

            <div class="card-body text-center">
              <h5 class="card-title text-warning text-uppercase text-break">{{ $article->title }}</h5>
              <p class="card-subtitle text-secondary-emphasis text-break">{{ $article->subtitle }}</p>

              <p class="card-text text-break overflow-auto" style="max-height: 120px;">
                {{ Str::limit($article->body, 300) }}
              </p>

              <a href="{{ route('article.show', $article) }}" class="btn btn-outline-primary w-100 mt-2">🔍 Dettaglio articolo</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

</x-layout>

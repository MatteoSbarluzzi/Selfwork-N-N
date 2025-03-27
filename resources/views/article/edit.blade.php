<x-layout>
  <x-display-message />
  <x-display-errors />

  <div class="container">
    <div class="row mt-5 justify-content-center my-5">
      <div class="col-12 col-md-6 justify-content-center">
        <form class="rounded-4 shadow bg-secondary-subtle p-3" action="{{ route('article.update', $article) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="mb-3">
            <label for="title" class="form-label">Titolo articolo</label>
            <input name="title" type="text" value="{{ $article->title }}" class="form-control" id="title">
          </div>

          <div class="mb-3">
            <label for="subtitle" class="form-label">Sottotitolo articolo</label>
            <input name="subtitle" type="text" value="{{ $article->subtitle }}" class="form-control" id="subtitle">
          </div>

          <div class="mb-3">
            <label for="body" class="form-label">Corpo articolo</label>
            <textarea name="body" class="form-control" id="body" cols="30" rows="10">{{ $article->body }}</textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Tag associati</label>
            @foreach ($tags as $tag)
              <div class="form-check">
                <input
                  class="form-check-input"
                  name="tags[]"
                  type="checkbox"
                  value="{{ $tag->id }}"
                  id="tag-{{ $tag->id }}"
                  @if($article->tags->contains($tag)) checked @endif
                >
                <label class="form-check-label" for="tag-{{ $tag->id }}">
                  {{ $tag->name }}
                </label>
              </div>
            @endforeach
          </div>

          <div class="mb-3">
            <label class="form-label">Immagine attuale:</label><br>
            <img src="{{ Storage::url($article->img) }}" alt="{{ $article->title }}" width="300" class="rounded">
          </div>

          <div class="mb-3">
            <label for="img" class="form-label">Sostituisci immagine</label>
            <input name="img" type="file" class="form-control" id="img">
          </div>

          <button type="submit" class="btn btn-primary">Salva modifiche</button>
        </form>
      </div>
    </div>
  </div>
</x-layout>

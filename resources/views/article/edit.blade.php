<x-layout>
    <header class="header">
        <div class="container h-100">
            <div class="row justify-content-center align-content-center h-100">
                <div class="col-12 col-md-6 d-flex justify-content-center">
                    <h1 class="text-center">Modifica Articolo</h1>
                </div>
            </div>
        </div>
    </header>



    <div class="container">
        <form action="{{ route('article.update', $article) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input name="title" type="text" value="{{$article->title}}" class="form-control" id="title">
            </div>

            <div class="mb-3">
                <label for="subtitle" class="form-label">Sottotitolo</label>
                <input name="subtitle" type="text" value="{{$article->subtitle}}" class="form-control" id="subtitle">
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Corpo dell'articolo</label>
                <textarea name="body" class="form-control" id="body" cols="30" rows="10">{{$article->body}}</textarea>
            </div>

            <div class="mb-3">
                <span class="form-label">Immagine attuale:</span>
                <img src="{{ Storage::url($article->img) }}" alt="{{$article->title}}" width="400" height="200">
            </div>

            <div class="mb-3">
                <label for="img" class="form-label">Inserisci immagine</label>
                <input name="img" type="file" class="form-control">
                @if(Storage::exists($article->img))
                    <img src="{{ Storage::url($article->img) }}" class="img-fluid mt-2" width="200">
                @endif
            </div>

            <button type="submit" class="btn btn-success w-100 py-2 fw-bold">💾 Salva modifiche</button>
        </form>
    </div>
</x-layout>

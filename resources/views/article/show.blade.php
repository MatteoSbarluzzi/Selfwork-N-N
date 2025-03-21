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
            <div class="card" style="width: 18rem;">
                <img src="{{ Storage::url($article->img) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <p class="card-subtitle">{{ $article->subtitle }}</p>
                    <p class="card-text">{{ $article->body }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

</x-layout>

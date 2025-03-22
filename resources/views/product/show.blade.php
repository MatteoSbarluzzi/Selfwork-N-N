<!-- Percorso: resources/views/product/show.blade.php -->

<x-layout>

<header class="header">
  <div class="container h-100">
    <div class="row justify-content-center align-content-center h-100">
      <div class="col-12 col-md-6 d-flex justify-content-center">
        <h1 class="text-center">Prodotto: {{ $product->name }}</h1>
      </div>
    </div>
  </div>
</header>

<div class="container">
  <div class="row my-5">
    <div class="col-12 col-md-4">
      <div class="card shadow-lg p-3" style="width: 100%; border-radius: 15px;">
        <img src="{{ Storage::url($product->img ?? 'img/default.jpg') }}" class="card-img-top rounded" alt="immagine prodotto">
        <div class="card-body text-center">
          <h5 class="card-title text-warning text-uppercase">{{ $product->name }}</h5>
          <p class="card-subtitle text-secondary-emphasis">{{ $product->description }}</p>
          <p class="card-text fw-bold">{{ $product->price }} €</p>
        </div>
      </div>
    </div>
  </div>
</div>

</x-layout>

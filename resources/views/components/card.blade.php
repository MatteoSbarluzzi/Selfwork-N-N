<div class="card shadow-lg p-3" style="width: 100%; border-radius: 15px;">
  <img src="{{ Storage::url($product->img ?? 'img/default.jpg') }}" class="card-img-top rounded" alt="Immagine prodotto">

  <div class="card-body text-center">
    <h5 class="card-title text-warning text-uppercase">{{ $product->name }}</h5>
    <p class="card-text text-secondary-emphasis">{{ $product->description }}</p>
    <p class="card-text fw-bold">{{ $product->price }} €</p>

    <a href="{{ route('product.show', $product) }}" class="btn btn-primary w-100 mt-2">🔍 Vedi dettaglio</a>
  </div>
</div>

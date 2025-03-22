<!-- Percorso: resources/views/components/card.blade.php -->

<div class="card shadow-lg p-3" style="width: 100%; border-radius: 15px;">
  <img src="{{ Storage::url($product->img ?? 'img/default.jpg') }}" class="card-img-top rounded" alt="Immagine prodotto">
  <div class="card-body text-center">
    <h5 class="card-title text-warning text-uppercase">{{ $product->name }}</h5>
    <p class="card-text text-secondary-emphasis">{{ $product->description }}</p>
    <p class="card-text fw-bold">{{ $product->price }} €</p>

    <a href="{{ route('product.show', $product) }}" class="btn btn-primary w-100 mt-2">🔍 Vedi dettaglio</a>

    @auth
    <div class="mt-3 d-flex justify-content-center gap-3">
      <a href="{{ route('product.edit', $product) }}" class="btn btn-warning btn-lg w-50 text-white d-flex align-items-center justify-content-center gap-2">
        ✏️ Modifica
      </a>

      <form action="{{ route('product.destroy', $product) }}" method="POST" class="w-50">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-lg w-100 d-flex align-items-center justify-content-center gap-2" onclick="return confirm('Sei sicuro di voler eliminare questo prodotto?')">
          🗑️ Elimina
        </button>
      </form>
    </div>
    @endauth
  </div>
</div>

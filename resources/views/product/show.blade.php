<x-layout>

  <x-masthead title="Prodotto: {{ $product->name }}" />

  <x-display-message />

  <div class="container">
    <div class="row my-5">
      <div class="col-12 col-md-6 offset-md-3">
        <div class="card shadow-lg p-3" style="border-radius: 15px;">
          <img src="{{ Storage::url($product->img ?? 'img/default.jpg') }}" class="card-img-top rounded" style="max-height: 300px; object-fit: cover;" alt="immagine prodotto">

          <div class="card-body text-center">
            <h5 class="card-title text-warning text-uppercase text-break">{{ $product->name }}</h5>
            <p class="card-subtitle text-secondary-emphasis text-break">{{ $product->description }}</p>
            <p class="card-text fw-bold mt-3">{{ $product->price }} €</p>

            @if ($product->user)
              <p class="text-muted mt-2">Aggiunto da: {{ $product->user->name }}</p>
            @endif

            @auth
              <div class="mt-4 d-flex justify-content-center gap-3">
                <a href="{{ route('product.edit', $product) }}" class="btn btn-warning btn-lg w-50 text-white d-flex align-items-center justify-content-center gap-2">
                  ✏️ Modifica
                </a>

                <form action="{{ route('product.destroy', $product) }}" method="POST" class="w-50" onsubmit="return confirm('Sei sicuro di voler eliminare questo prodotto?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-lg w-100 d-flex align-items-center justify-content-center gap-2">
                    🗑️ Elimina
                  </button>
                </form>
              </div>
            @endauth

            <a href="{{ route('product.index') }}" class="btn btn-outline-light mt-4">⬅️ Torna alla lista</a>
          </div>
        </div>
      </div>
    </div>
  </div>

</x-layout>

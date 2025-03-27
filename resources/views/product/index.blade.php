<x-layout>

  <x-masthead title="I miei prodotti" />

  <x-display-message />

  <div class="container">
    <div class="row my-5">
      @foreach($products as $product)
        <div class="col-12 col-md-4 mb-4">
          <div class="card shadow-lg p-3" style="border-radius: 15px;">
            <img src="{{ Storage::url($product->img ?? 'img/default.jpg') }}" class="card-img-top rounded" style="max-height: 200px; object-fit: cover;" alt="immagine prodotto">
            <div class="card-body text-center">
              <h5 class="card-title text-warning text-uppercase text-break">{{ $product->name }}</h5>
              <p class="card-subtitle text-secondary-emphasis text-break">{{ $product->description }}</p>
              <p class="card-text fw-bold">{{ $product->price }} €</p>
              <a href="{{ route('product.show', $product) }}" class="btn btn-outline-primary w-100 mt-2">🔍 Vedi dettaglio</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

</x-layout>

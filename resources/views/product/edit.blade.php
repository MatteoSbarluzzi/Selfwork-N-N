<x-layout>

  <x-masthead title="Modifica prodotto"></x-masthead>
  <x-display-errors />

  <div class="container">
    <div class="row mt-5 justify-content-center">
      <div class="col-12 col-md-6">
        <form class="rounded-4 shadow bg-secondary-subtle p-3" action="{{ route('product.update', $product) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input name="name" type="text" value="{{ old('name', $product->name) }}" class="form-control text-break" id="name" required>
          </div>

          <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea name="description" class="form-control text-break" id="description" rows="8" required>{{ old('description', $product->description) }}</textarea>
          </div>

          <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input name="price" type="number" step="0.01" value="{{ old('price', $product->price) }}" class="form-control" id="price" required>
          </div>

          <div class="mb-3">
            <label for="img" class="form-label">Immagine</label>
            <input name="img" type="file" class="form-control">
            @if(Storage::exists($product->img))
              <img src="{{ Storage::url($product->img) }}" class="img-fluid mt-3 rounded" style="max-height: 250px; object-fit: cover;">
            @endif
          </div>

          <button type="submit" class="btn btn-success w-100">💾 Salva modifiche</button>
        </form>
      </div>
    </div>
  </div>

</x-layout>

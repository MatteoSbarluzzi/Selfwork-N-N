<!-- Percorso: resources/views/product/edit.blade.php -->

<x-layout>
  <header class="header">
    <div class="container h-100">
      <div class="row justify-content-center align-content-center h-100">
        <div class="col-12 col-md-6 d-flex justify-content-center">
          <h1 class="text-center">Modifica Prodotto</h1>
        </div>
      </div>
    </div>
  </header>

  <x-display-errors />

  <div class="container">
    <form action="{{ route('product.update', $product) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input name="name" type="text" value="{{ old('name', $product->name) }}" class="form-control" id="name">
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <textarea name="description" class="form-control" id="description" rows="3">{{ old('description', $product->description) }}</textarea>
      </div>

      <div class="mb-3">
        <label for="price" class="form-label">Prezzo</label>
        <input name="price" type="text" value="{{ old('price', $product->price) }}" class="form-control" id="price">
      </div>

      <div class="mb-3">
        <label for="img" class="form-label">Immagine</label>
        <input name="img" type="file" class="form-control">
        @if(Storage::exists($product->img))
          <img src="{{ Storage::url($product->img) }}" class="img-fluid mt-2 rounded" width="200">
        @endif
      </div>

      <button type="submit" class="btn btn-success w-100 py-2">💾 Salva modifiche</button>
    </form>
  </div>
</x-layout>

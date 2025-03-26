<x-layout>

<header class="header">
    <div class="container h-100">
        <div class="row justify-content-center align-content-center h-100">
            <div class="col-12 col-md-6 d-flex justify-content-center">
                <h1 class="text-center">Inventario</h1>
            </div>
        </div>
    </div>
</header>

<x-display-message />

<div class="container">
    <div class="row my-5">
        @foreach($products as $product)
            <div class="col-12 col-md-4 mb-4">
                <div class="card" style="width: 100%;">
                    <img src="{{ Storage::url($product->img ?? 'img/default.jpg') }}" class="card-img-top" alt="immagine prodotto">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-subtitle">{{ $product->description }}</p>
                        <p class="card-text fw-bold">{{ $product->price }} €</p>
                        <a href="{{ route('product.show', $product) }}" class="btn btn-outline-primary w-100 mt-2">🔍 Vedi dettaglio</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

</x-layout>

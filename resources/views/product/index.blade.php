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

<div class="container">
    <div class="row">
        @foreach($products as $product)
            <div class="col-12 col-md-4">
                <x-card 
                :product="$product"
                />
            </div>
        @endforeach
    </div>
</div>

</x-layout>

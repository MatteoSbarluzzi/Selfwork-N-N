<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav d-flex align-items-center">
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('home') }}">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('product.index') }}">Inventario</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('article.index') }}">I miei articoli</a>
        </li>

        @guest
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">Registrati</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">Accedi</a>
        </li>
        @endguest

        @auth
        <li class="nav-item">
          <a class="nav-link" href="{{ route('product.create') }}">Crea Prodotto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('article.create') }}">Crea Articolo</a>
        </li>
        <li class="nav-item">
          <span class="nav-link">Benvenut* {{ Auth::user()->name }}</span>
        </li>
        <li class="nav-item">
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="nav-link btn btn-link" type="submit">Logout</button>
          </form>
        </li>
        @endauth

      </ul>
    </div>
  </div>
</nav>

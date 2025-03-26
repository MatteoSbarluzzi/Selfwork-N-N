<x-layout>

<header class="header">
    <div class="container h-100">
        <div class="row justify-content-center align-content-center h-100">
            <div class="col-12 col-md-6 d-flex justify-content-center">
                <h1 class="text-center">Registrati</h1>
            </div>
        </div>
    </div>
</header>

<x-display-errors/>

<div class="container">
    <div class="row mt-5 justify-content-center">
        <div class="col-12 col-md-10 col-lg-6">
            <form
                class="p-5 shadow rounded-4 w-100"
                style="max-width: 600px; margin: auto;"
                action="{{ route('register') }}"
                method="POST"
            >
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Conferma Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Registrati</button>
            </form>
        </div>
    </div>
</div>

</x-layout>

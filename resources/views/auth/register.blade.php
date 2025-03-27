<x-layout>

    <x-masthead :title="'Registrati'" />

    <x-display-errors/>

    <div class="container mb-5">
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
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Conferma Password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Registrati</button>
                </form>
            </div>
        </div>
    </div>

</x-layout>

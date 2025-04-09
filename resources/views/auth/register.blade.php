<x-guest-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('kepek/icon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/regisztracio.css') }}">

    <form method="POST" action="{{ route('register') }}" class="p-4 mx-auto mt-5 shadow rounded" style="max-width: 400px; background: #fff;">
        @csrf
        <h3 class="mb-4 text-center">Regisztráció</h3>

        <div class="input-group mb-3">
            <span class="input-group-text">👤</span>
            <input type="text" class="form-control" placeholder="Név" id="name" name="name" value="{{ old('name') }}" required autofocus>
            @error('name')
                <span class="invalid-feedback d-block" role="alert">{{ __('A név mező kitöltése kötelező.') }}</span>
            @enderror
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">@</span>
            <input type="email" class="form-control" placeholder="Email cím" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <span class="invalid-feedback d-block" role="alert">{{ __('Érvényes email címet kell megadni.') }}</span>
            @enderror
        </div>

        <div class="input-group mb-3 position-relative">
            <span class="input-group-text"><i class="bi bi-file-lock2"></i></span>
            <input type="password" class="form-control pe-5" placeholder="Jelszó" id="password-signin" name="password" required>
            <img src="{{ asset('kepek/szem_be.png') }}" onclick="megnez('password-signin', this)" class="jelszo-icon">
            @error('password')
                <span class="invalid-feedback d-block" role="alert">
                    {{ __('A jelszónak legalább 8 karakter hosszúnak kell lennie.') }}
                </span>
            @enderror
        </div>

        <div class="input-group mb-3 position-relative">
            <span class="input-group-text"><i class="bi bi-file-lock2-fill"></i></span>
            <input type="password" class="form-control pe-5" placeholder="Jelszó megerősítése" id="password_confirmation" name="password_confirmation" required>
            <img src="{{ asset('kepek/szem_be.png') }}" onclick="megnez('password_confirmation', this)" class="jelszo-icon">
        </div>

        <div class="d-grid gap-2 mb-3">
            <button type="submit" class="btn btn-primary btn-lg">Regisztráció</button>
        </div>

        <div class="text-center">
            <a class="text-decoration-none" href="{{ route('login') }}">
                {{ __('Már regisztráltál?') }}
            </a>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/regisztracio.js') }}"></script>
</x-guest-layout>

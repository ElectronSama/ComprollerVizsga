<title>Comproller</title>
<x-guest-layout>
    <link rel="icon" type="image/x-icon" href="kepek/icon.png">
    <form method="POST" action="{{ route('register') }}" class="p-2">
        @csrf
        <h3 class="mb-4 text-center">Regisztráció</h3>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">👤</span>
            <input type="text" class="form-control" placeholder="Név" id="name" name="name" value="{{ old('name') }}" required autofocus>
            @error('name')
                <span class="invalid-feedback d-block" role="alert">{{ __('A név mező kitöltése kötelező.') }}</span>
            @enderror
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2">@</span>
            <input type="email" class="form-control" placeholder="Email cím" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <span class="invalid-feedback d-block" role="alert">{{ __('Érvényes email címet kell megadni.') }}</span>
            @enderror
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon3"><i class="bi bi-file-lock2"></i></span>
            <input type="password" class="form-control" placeholder="Jelszó" id="password" name="password" required>
            @error('password')
                <span class="invalid-feedback d-block" role="alert">{{ __('A jelszónak legalább 8 karakter hosszúnak kell lennie.') }}</span>
            @enderror
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon4"><i class="bi bi-file-lock2-fill"></i></span>
            <input type="password" class="form-control" placeholder="Jelszó megerősítése" id="password_confirmation" name="password_confirmation" required>
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
</x-guest-layout>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('css/bejelentkezes.css') }}">
<link rel="icon" type="image/x-icon" href="kepek/icon.png">
<title>Comproller</title>
<script src="{{ asset('js/bejelentkezes.js') }}"></script>

<x-guest-layout>
    <div class="wrapper">
        <div class="form-wrapper sign-in">
            <form method="POST" action="{{ route('login') }}" id="loginForm">
                @csrf
                <h2 class="text-center mb-4">Bejelentkezés</h2>
                <div class="input-group mb-3">
                    <input type="text" class="" id="b_nev" name="email" required>
                    <label for="b_nev" class="form-label">Email</label>
                    @error('email')
                        <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input id="password-signin" type="password" class="" name="password" required>
                    <label for="password-signin" class="form-label">Jelszó</label>
                    <img src="{{ asset('kepek/szem_be.png') }}" onclick="megnez('password-signin', this)" class="jelszo-icon" style="cursor: pointer;">
                    @error('password')
                        <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="text-center">
                    <button class="btn btn-primary btn-lg" type="submit">Bejelentkezés</button>
                </div>
                <div id="error-message"></div>
            </form>
        </div>
    </div>
</x-guest-layout>
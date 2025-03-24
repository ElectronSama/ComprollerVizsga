<section>
    <header class="mb-4">
        <h2 class="h4">
            {{ __('Jelszó módosítása') }}
        </h2>

        <p class="text-muted small"></p>
            {{ __('Biztonsága érdekében használjon hosszú, véletlenszerű jelszót.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-4"></form>
        @csrf
        @method('put')

        <div class="mb-3">
            <x-input-label for="update_password_current_password" :value="__('Jelenlegi jelszó')" class="form-label" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="invalid-feedback d-block" />
        </div>

        <div class="mb-3">
            <x-input-label for="update_password_password" :value="__('Új jelszó')" class="form-label" />
            <x-text-input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="invalid-feedback d-block" />
        </div>

        <div class="mb-3">
            <x-input-label for="update_password_password_confirmation" :value="__('Jelszó megerősítése')" class="form-label" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="invalid-feedback d-block" />
        </div>

        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary">{{ __('Mentés') }}</button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-success mb-0"
                >{{ __('Mentve.') }}</p>
            @endif
        </div>
    </form>
</section>

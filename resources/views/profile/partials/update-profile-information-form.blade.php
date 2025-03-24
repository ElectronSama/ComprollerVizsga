<section>
    <header>
        <h2 class="h4 mb-3">
            {{ __('Profil Információk') }}
        </h2>

        <p class="text-muted small mb-4">
            {{ __("Frissítse fiókja profil információit és email címét.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mb-4">
        @csrf
        @method('patch')

        <div class="mb-3">
            <x-input-label for="name" :value="__('Név')" class="form-label" />
            <x-text-input id="name" name="name" type="text" class="form-control" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="invalid-feedback d-block" :messages="$errors->get('name')" />
        </div>

        <div class="mb-3">
            <x-input-label for="email" :value="__('Email')" class="form-label" />
            <x-text-input id="email" name="email" type="email" class="form-control" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="invalid-feedback d-block" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-muted small"></p>
                        {{ __('Az email címe nincs megerősítve.') }}

                        <button form="send-verification" class="btn btn-link btn-sm p-0">
                            {{ __('Kattintson ide az ellenőrző email újraküldéséhez.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="text-success small mt-2">
                            {{ __('Az új megerősítő link elküldve az email címére.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-3">
            <x-primary-button class="btn btn-primary">{{ __('Mentés') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-success small mb-0"
                >{{ __('Mentve.') }}</p>
            @endif
        </div>
    </form>
</section>

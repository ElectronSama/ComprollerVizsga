<section class="mb-4">
    <header>
        <h2 class="h4 text-dark">
            {{ __('Fiók törlése') }}
        </h2>

        <p class="text-muted small mt-2">
            {{ __('A fiók törlése után minden erőforrás és adat véglegesen törlődik. Mielőtt törölné a fiókját, kérjük, töltse le azokat az adatokat vagy információkat, amelyeket meg szeretne tartani.') }}
        </p>
    </header>

    <button
        class="btn btn-danger"
        data-bs-toggle="modal"
        data-bs-target="#confirm-user-deletion"
    >{{ __('Fiók törlése') }}</button>

    <div class="modal fade" id="confirm-user-deletion" tabindex="-1" aria-labelledby="deleteAccountModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{ route('profile.destroy') }}" class="p-3">
                    @csrf
                    @method('delete')

                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteAccountModal">
                            {{ __('Biztosan törölni szeretné a fiókját?') }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Bezárás"></button>
                    </div>

                    <div class="modal-body">
                        <p class="text-muted">
                            {{ __('A fiók törlése után minden erőforrás és adat véglegesen törlődik. Kérjük, adja meg jelszavát a fiók végleges törlésének megerősítéséhez.') }}
                        </p>

                        <div class="mb-3">
                            <label for="password" class="visually-hidden">{{ __('Jelszó') }}</label>
                            <input
                                type="password"
                                class="form-control"
                                id="password"
                                name="password"
                                placeholder="{{ __('Jelszó') }}"
                            >
                            @error('password', 'userDeletion')
                                <div class="invalid-feedback d-block">{{ __('Hibás jelszó. Kérjük, próbálja újra.') }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            {{ __('Mégsem') }}
                        </button>
                        <button type="submit" class="btn btn-danger">
                            {{ __('Fiók törlése') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

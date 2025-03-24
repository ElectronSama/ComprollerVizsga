<x-app-layout>
    <x-slot name="header">
        <h2 class="h3 mb-4">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="container py-4">
        <div class="row">
            <div class="col-md-8 mx-auto">
            <div class="card mb-3">
                <div class="card-body py-3">
                @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-body py-3">
                @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-body py-3">
                @include('profile.partials.delete-user-form')
                </div>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>

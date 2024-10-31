{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


@extends('layouts.app-auth')

@section('auth-title', 'Enregistrement membre')

@section('auth-css')
    <style>
        .authentication-wrapper.authentication-basic {
            align-items: baseline !important;
        }
    </style>
@endsection

@section('auth-content')
    <div class="card transparency-register">
        <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
                <a href="{{ route('home') }}" class="app-brand-link gap-2">
                    <span class="app-brand-logo demo">
                        <img src="{{ asset('logo/favicon-32x32.png') }}" alt="">
                    </span>
                    <span class="app-brand-text demo text-body fw-bolder">Créer un compte</span>
                </a>
            </div>
            <!-- /Logo -->

            <form id="formAuthentication" class="mb-3" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Nom complet</label>
                    <input type="text" class="form-control" id="username" name="name" placeholder="Nom complet"
                        autofocus value="{{ old('name') }}" required />
                </div>
                @php
                    $nameError = $errors->get('name');
                @endphp
                <div class="mb-3">
                    @if ($nameError)
                    @foreach ((array) $nameError as $message)
                        <p style="color: red">{{ $message }}</p>
                    @endforeach
                @endif
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Téléphone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}"
                         required />
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}"
                        placeholder="Enter vodre adresse email" required />
                </div>
                @php
                    $emailError = $errors->get('email');
                @endphp
                <div class="mb-3">
                    @if ($emailError)
                    @foreach ((array) $emailError as $message)
                        <p style="color: red">{{ $message }}</p>
                    @endforeach
                @endif
                </div>
                <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="password">Mot de passe</label>
                    <div class="input-group input-group-merge">
                        <input type="password" id="password" class="form-control" name="password" required
                            aria-describedby="password" />
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                </div>
                @php
                    $pwdErrors = $errors->get('password');
                @endphp
                <div class="mb-3">
                    @if ($pwdErrors)
                        @foreach ((array) $pwdErrors as $message)
                            <p style="color: red">{{ $message }}</p>
                        @endforeach
                    @endif
                </div>
                <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="password_confirmation">Confirmer le mot de passe</label>
                    <div class="input-group input-group-merge">
                        <input type="password" id="password_confirmation" class="form-control" name="password_confirmation"
                            required aria-describedby="password" />
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                </div>
                @php
                    $pwdConfError = $errors->get('password_confirmation');
                @endphp
                <div class="mb-3">
                    @if ($pwdConfError)
                    @foreach ((array) $pwdConfError as $message)
                        <p style="color: red">{{ $message }}</p>
                    @endforeach
                @endif
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                        <label class="form-check-label" for="terms-conditions"
                            title="J'accepte la politique de confidentialité et les conditions d'utilisation">
                            I agree to
                            <a href="javascript:void(0);">Accepter la PCCU</a>
                        </label>
                    </div>
                </div>
                <button class="btn btn-primary d-grid w-100">Sign up</button>
            </form>

            <p class="text-center">
                <span>Vous avez déjà un compte?</span>
                <a href="{{ route('home') }}">
                    <span>S'identifier</span>
                </a>
            </p>
        </div>
    </div>
@endsection

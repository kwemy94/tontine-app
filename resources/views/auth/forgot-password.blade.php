{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


@extends('layouts.app-auth')
@section('auth-title', "Reset password")
@section('auth-css')
    <style>
        .authentication-wrapper.authentication-basic{
            align-items: baseline !important;
        }
    </style>
@endsection

@section('auth-content')
    <div class="card">
        <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
                <a href="{{ route('home') }}" class="app-brand-link gap-2">
                    <span class="app-brand-logo demo">
                        <img src="{{ asset('logo/favicon-32x32.png') }}" alt="">
                    </span>
                    <span class="app-brand-text demo text-body fw-bolder">Mot de passe oublié ?</span>
                </a><br>
            </div>
            <div class="mb-3">
                <p>Pas de problème. Indiquez-nous votre adresse électronique et nous vous enverrons un lien de réinitialisation du mot de passe qui vous permettra d'en choisir un nouveau.</p>
            </div>
            <!-- /Logo -->
            <form id="formAuthentication" class="mb-3" action="{{ route('password.email') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email"
                        autofocus />
                </div>
                    @php
                        $status = session('status');
                        $messages = $errors->get('email');
                    @endphp
                <div class="mb-3">
                    @if ($status)
                        <p style="color: green">
                            {{ $status }}
                        </p>
                    @endif
                    @if ($messages)
                            @foreach ((array) $messages as $message)
                                <p style="color: red">{{ $message }}</p>
                            @endforeach
                    @endif
                </div>
                
                <button class="btn btn-primary d-grid w-100">Réinitialiser</button>
            </form>
            <div class="text-center">
                <a href="{{ route('home') }}" class="d-flex align-items-center justify-content-center">
                    <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                    Retour
                </a>
            </div>
        </div>
    </div>
@endsection


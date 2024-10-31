{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout> --}}

@extends('layouts.app-auth')

@section('auth-title', 'Account verification')

@section('auth-css')
    <style>
        .authentication-wrapper.authentication-basic {
            align-items: baseline !important;
        }
    </style>
@endsection

@section('auth-content')
    <div class="card transparency-login">
        <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                    <span class="app-brand-logo demo">
                      <img src="{{ asset('logo/favicon-32x32.png') }}" alt="">
                    </span>
                    <span class="app-brand-text demo text-body fw-bolder">KP-App</span>
                </a>
            </div>
            <!-- /Logo -->
            <h4 class="mb-2 text-center">Activer votre compte</h4>
            <p class="mb-4 text-reset">
                Merci de vous être inscrit ! Avant de commencer, pourriez-vous
                vérifier votre adresse électronique en cliquant sur le lien que nous
                venons de vous envoyer par courrier électronique ? Si vous n'avez pas
                reçu l'e-mail, nous vous en enverrons un autre avec plaisir.
            </p>
            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ __("Un nouveau lien de vérification a été envoyé à l'adresse électronique que vous avez fournie lors de votre inscription.") }}
                </div>
            @endif
            <form id="formAuthentication" class="mb-3" action="{{ route('verification.send') }}" method="POST">
                @csrf
                <button class="btn btn-primary d-grid w-100">Renvoyer le mail de vérification</button>
            </form>
            <div class="text-center">
                <form action="{{ route('logout') }}" method="POST"
                    class="d-flex align-items-center justify-content-center">
                    @csrf
                    <button class="btn" title="Déconnexion">
                        <i class="bx bx-power-off me-2 scaleX-n1-rtl bx-sm"></i>
                    </button>

                </form>
            </div>
        </div>
    </div>
@endsection

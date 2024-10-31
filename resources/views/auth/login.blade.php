{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


    @if (isset($login) && $login)
        
        <div class="card transparency-login">
            <div class="card-body">
                <!-- Logo -->
                <div class="app-brand justify-content-center">
                    <a href="{{ route('home') }}" class="app-brand-link gap-2">
                        <span class="app-brand-logo demo">
                            <img src="{{ asset('logo/favicon-32x32.png') }}" alt="">
                        </span>
                        <span class="app-brand-text demo text-body fw-bolder">Connectez-vous</span>
                    </a>
                </div>
                <!-- /Logo -->

                <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email/Téléphone</label>
                        <input type="text" class="form-control" id="email" name="email"
                            placeholder="Email ou Téléphone" autofocus />
                    </div>
                    <div class="mb-3">
                        @php
                            $messages = $errors->get('email');
                        @endphp
                        @if ($messages)
                                @foreach ((array) $messages as $message)
                                    <p style="color: red">Login ou mot de passe incorrecte</p>
                                @endforeach
                        @endif
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <div class="d-flex justify-content-between">
                            @if (Route::has('password.request'))
                                <label class="form-label" for="password">Password</label>
                                <a href="{{ route('password.request') }}">
                                    <small>Mot de passe oublié?</small>
                                </a>
                            @endif
                        </div>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control" name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password" />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember-me" name="remember" />
                            <label class="form-check-label" for="remember-me"> Se souvenir de moi </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary d-grid w-100" type="submit">Se connecter</button>
                    </div>
                </form>

                <p class="text-center">
                    <span>Nouveau ?</span>
                    <a href="{{ route('register') }}">
                        <span>Créer un compte</span>
                    </a>
                </p>
            </div>
        </div>
    @else
        @include('welcome')
    @endif



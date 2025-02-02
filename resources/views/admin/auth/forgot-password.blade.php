{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('admin.password.email') }}">
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

@extends('admin.layouts.auth')


@section('content')
    <div class="container container-tight py-4">
        <div class="text-center mb-4">
            <a href="#" class="navbar-brand navbar-brand-autodark">
                {{-- <img src="./static/logo.svg" width="110" height="32" alt="Tabler" class="navbar-brand-image"> --}}
                <h1 class="text-center">Forgot Password</h1>
            </a>
        </div>
        <div class="card card-md">

            <div class="card-body">
                <h2 class="lead text-muted mb-4">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</h2>
                <form method="POST" action="{{ route('admin.password.email') }}" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control"
                            placeholder="your@email.com" autocomplete="username" required autofocus>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                    </div>
                   
               
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">Rset Password</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
@endsection


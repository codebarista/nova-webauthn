@extends('nova-webauthn::layouts.base')

@section('content')
    <div class="py-6 px-1 md:px-2 lg:px-6">
        <div class="mx-auto py-8 max-w-sm flex justify-center">
            <span>
            @include('nova-webauthn::partials.logo')
            </span>
        </div>
        <div class="relative mb-6">
            <form class="bg-white dark:bg-gray-800 shadow rounded-lg p-8 max-w-[25rem] mx-auto"
                  action="{{ route('nova.login') }}" method="POST">
                <h2 class="text-2xl text-center font-normal mb-6">Welcome Back!</h2>
                <svg class="block mx-auto mb-6" xmlns="http://www.w3.org/2000/svg"
                     width="100" height="2" viewBox="0 0 100 2">
                    <path fill="#D8E3EC" d="M0 0h100v2H0z"></path>
                </svg>
                @csrf

                <div class="mb-6">
                    <label class="block mb-2" for="email">Email Address</label>
                    <input class="form-control form-input form-input-bordered w-full" id="email" type="email"
                           name="email" autofocus="" required="" value="{{ old('email') }}">
                    @error('email')
                    <p class="help-text mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2" for="password">Password</label>
                    <input class="form-control form-input form-input-bordered w-full" id="password" type="password"
                           name="password" required="">
                    @error('password')
                    <p class="help-text mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex mb-6">
                    <input type="checkbox" id="remember" tabindex="0"
                           class="group inline-flex shrink-0 items-center gap-2 focus:outline-none">
                    <label for="remember" class="pl-3">Remember me</label>
                    <div class="ml-auto">
                        <a class="text-gray-500 font-bold no-underline"
                           href="{{ route('nova.pages.password.email') }}">Forgot your password?</a>
                    </div>
                </div>
                <button type="submit"
                        class="border text-left appearance-none cursor-pointer rounded text-sm font-bold focus:outline-none focus:ring ring-primary-200 dark:ring-gray-600 relative disabled:cursor-not-allowed inline-flex items-center justify-center shadow h-9 px-3 bg-primary-500 border-primary-500 hover:[&amp;:not(:disabled)]:bg-primary-400 hover:[&amp;:not(:disabled)]:border-primary-400 text-white dark:text-gray-900 w-full flex justify-center">
                    <span class="flex items-center gap-1"><span>Log In With Password</span></span>
                </button>
            </form>
        </div>
        <div class="relative mb-6">
            <form id="nova-webauthn-form" class="bg-white dark:bg-gray-800 shadow rounded-lg p-8 max-w-[25rem] mx-auto">
                <button type="submit"
                        class="border text-left appearance-none cursor-pointer rounded text-sm font-bold focus:outline-none focus:ring ring-primary-200 dark:ring-gray-600 relative disabled:cursor-not-allowed inline-flex items-center justify-center shadow h-9 px-3 bg-primary-500 border-primary-500 hover:[&amp;:not(:disabled)]:bg-primary-400 hover:[&amp;:not(:disabled)]:border-primary-400 text-white dark:text-gray-900 w-full flex justify-center">
                    <span class="flex items-center gap-1"><span>Log In With Passkey</span></span>
                </button>
            </form>
        </div>
    </div>

@endsection
@push('js')
    <script src="{{ asset('vendor/webauthn/webauthn.js') }}"></script>
    <script>
        const login = event => {
            event.preventDefault()

            new WebAuthn().login().then(response => location.replace('{{ Laravel\Nova\Nova::url('/') }}'))
                .catch(error => alert('Something went wrong. Try again or log in with password!'))
        }

        document.getElementById('nova-webauthn-form').addEventListener('submit', login)
    </script>
@endpush

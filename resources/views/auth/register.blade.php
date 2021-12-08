@extends('layout')

@section('content')
    <x-auth-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

        <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- UserName -->
            <div>
                <x-label for="username" :value="__('auth.UserName')"/>

                <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus/>
            </div>

            <!-- FulName -->
            <div>
                <x-label for="fullname" :value="__('auth.FullName')"/>

                <x-input id="fullname" class="block mt-1 w-full" type="text" name="fullname" :value="old('fullname')" required autofocus/>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('auth.Email')"/>

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('auth.Password')"/>

                <x-input id="password" class="block mt-1 w-full"
                         type="password"
                         name="password"
                         required autocomplete="new-password"/>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('auth.Confirm Password')"/>

                <x-input id="password_confirmation" class="block mt-1 w-full"
                         type="password"
                         name="password_confirmation" required/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('auth.Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('auth.Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
@endsection

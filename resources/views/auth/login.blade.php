{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block w-full mt-1"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}

@extends('layouts.app')
@section('css')

@endsection

@section('content')
    {{-- @include('partials.nav') --}}
    <section id="login">
        <div class="container">
            <div class="shadow-lg card">
                <h3 class="text-center">تسجيل الدخول</h3>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <input type="email" name="email" class="mt-3 form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="ادخل البريد الالكتروني">
                    </div>
                    <div class="mt-3 form-group">
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                            placeholder="كلمة السر">
                    </div>
                    <button type="submit" class="m-auto mt-4 mb-4 d-block btn btn-info ">تسجيل الدخول</button>
                </form>
                <div class="text-center d-block">
                    @if (Route::has('password.request'))
                        <a class="btn" href="{{ route('password.request') }}">هل نسيت كلمة السر؟</a>
                    @endif
                </div>
                <div class="text-center d-block ">
                    <p>ليس لديك حساب؟ <a href="{{route('register')}}">أنشاء حساب</a></p>
                </div>
            </div>
        </div>
    </section>
    @include('partials.footer')
@endsection


@section('js')

@endsection

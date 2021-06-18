{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block w-full mt-1"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block w-full mt-1"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
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
    <section id="register">
        <div class="container">
            <div class="shadow-lg card">
                <h3 class="text-center">انشاء حساب</h3>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="mt-3 form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="الاسم الثلاثي" name="name" :value="old('name')" required autofocus />
                    </div>
                    <div class="form-group">
                        <input type="text" class="mt-3 form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="رقم الهاتف" name="phone" />
                    </div>
                    <div class="form-group">
                        <input type="email" class="mt-3 form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="البريد الالكتروني" name="email" :value="old('email')" required />
                    </div>
                    <div class="mt-3 form-group">
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="كلمة السر"
                            name="password" required autocomplete="new-password" />
                    </div>
                    <div class="mt-3 form-group">
                        <input type="password" class="form-control" id="exampleInputPassword1"
                            placeholder="اعد كتابة كلمة السر" name="password_confirmation" required />
                    </div>
                    <button type="submit" class="m-auto mt-4 mb-4 d-block btn btn-info">
                        أنشاء حساب
                    </button>
                </form>
                <!-- <div class="text-center d-block">
                  <a class="btn">هل نسيت كلمة السر؟</a>
                </div> -->
                <div class="text-center d-block">
                    <p>لدي حساب بالفعل: <a href="login.html">تسجيل الدخول</a></p>
                </div>
            </div>
        </div>
    </section>


    @include('partials.footer')
@endsection


@section('js')

@endsection

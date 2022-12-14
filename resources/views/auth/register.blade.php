<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->

            <div style="text-align: center; padding-top:30px; padding-bottom:30px;  font-size: 30px; ">
                {{-- <h3>Registrasi</h3> --}}

                <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
                    {{-- < class="logo me-auto"><a href="{{route ('mahasiswa')}}"> --}}
                        <img src="{{url('themes/frontend/assets/img/logo2.png')}}" alt=""></a>
                </div>
                <h6 style="font-size: 25px;">Sistem Informasi Asdos MKU</h6>
                <h4 style="font-size: 25px;">Universitas Bengkulu</h4>
            </div>
            <div>
                <x-input-label for="name" :value="__('Name')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div style="text-align: center;  padding-top: 7px">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>
            <div style="text-align: center;  padding-top: 20px; padding-bottom:20px;">

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

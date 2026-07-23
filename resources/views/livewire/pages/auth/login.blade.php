<?php

use App\Livewire\Forms\LoginForm;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: RouteServiceProvider::HOME, navigate: true);
    }
}; ?>


<div class="max-w-md mx-auto">

    {{-- پیام موفقیت --}}
    <x-auth-session-status class="mb-5" :status="session('status')" />

    <form wire:submit="login" class="space-y-5">

        {{-- ایمیل --}}
        <div>
            <x-input-label
                for="email"
                value="ایمیل"
                class="mb-2 font-medium"
            />

            <div class="relative">

                <span class="absolute inset-y-0 right-4 flex items-center text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                         fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M16 12H8m8-4H8m8 8H8"/>
                    </svg>
                </span>

                <x-text-input
                    wire:model="form.email"
                    id="email"
                    type="email"
                    name="email"
                    dir="ltr"
                    class="block w-full pr-12 mt-1"
                    placeholder="example@gmail.com"
                    required
                    autofocus
                    autocomplete="username"
                />
            </div>

            <x-input-error
                :messages="$errors->get('form.email')"
                class="mt-2"
            />
        </div>


        {{-- رمز عبور --}}
        <div>

            <x-input-label
                for="password"
                value="رمز عبور"
                class="mb-2 font-medium"
            />

            <div class="relative">

                <span class="absolute inset-y-0 right-4 flex items-center text-gray-400">
                    🔒
                </span>

                <x-text-input
                    wire:model="form.password"
                    id="password"
                    type="password"
                    name="password"
                    dir="ltr"
                    class="block w-full pr-12 mt-1"
                    placeholder="••••••••"
                    required
                    autocomplete="current-password"
                />

            </div>

            <x-input-error
                :messages="$errors->get('form.password')"
                class="mt-2"
            />

        </div>


        {{-- مرا به خاطر بسپار --}}
        <div class="flex items-center justify-between">

            <label class="flex items-center gap-2 cursor-pointer">

                <input
                    wire:model="form.remember"
                    id="remember"
                    type="checkbox"
                    name="remember"
                    class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                >

                <span class="text-sm text-gray-700">
                    مرا به خاطر بسپار
                </span>

            </label>

            @if (Route::has('password.request'))
                <a
                    href="{{ route('password.request') }}"
                    wire:navigate
                    class="text-sm text-indigo-600 hover:text-indigo-800 transition"
                >
                    رمز عبور را فراموش کرده‌اید؟
                </a>
            @endif

        </div>


        {{-- دکمه ورود --}}
        <div class="pt-2">

            <x-primary-button
                class="w-full justify-center py-3 text-base font-bold rounded-xl"
            >
                ورود به حساب کاربری
            </x-primary-button>

        </div>

    </form>

</div>

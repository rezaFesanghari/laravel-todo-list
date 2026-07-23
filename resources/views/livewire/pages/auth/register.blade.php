<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(RouteServiceProvider::HOME, navigate: true);
    }
}; ?>

<div class="max-w-md mx-auto">

    <form wire:submit="register" class="space-y-5">

        {{-- نام و نام خانوادگی --}}
        <div>

            <x-input-label
                for="name"
                value="نام و نام خانوادگی"
                class="mb-2 font-medium"
            />

            <div class="relative">

                <span class="absolute inset-y-0 right-4 flex items-center text-gray-400">
                    👤
                </span>

                <x-text-input
                    wire:model="name"
                    id="name"
                    type="text"
                    name="name"
                    class="block w-full pr-12 mt-1"
                    placeholder="مثلا علی غلامی"
                    required
                    autofocus
                    autocomplete="name"
                />

            </div>

            <x-input-error
                :messages="$errors->get('name')"
                class="mt-2"
            />

        </div>


        {{-- ایمیل --}}
        <div>

            <x-input-label
                for="email"
                value="ایمیل"
                class="mb-2 font-medium"
            />

            <div class="relative">

                <span class="absolute inset-y-0 right-4 flex items-center text-gray-400">
                    📧
                </span>

                <x-text-input
                    wire:model="email"
                    id="email"
                    type="email"
                    name="email"
                    dir="ltr"
                    class="block w-full pr-12 mt-1"
                    placeholder="example@gmail.com"
                    required
                    autocomplete="username"
                />

            </div>

            <x-input-error
                :messages="$errors->get('email')"
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
                    wire:model="password"
                    id="password"
                    type="password"
                    name="password"
                    dir="ltr"
                    class="block w-full pr-12 mt-1"
                    placeholder="حداقل ۸ کاراکتر"
                    required
                    autocomplete="new-password"
                />

            </div>

            <x-input-error
                :messages="$errors->get('password')"
                class="mt-2"
            />

        </div>


        {{-- تکرار رمز عبور --}}
        <div>

            <x-input-label
                for="password_confirmation"
                value="تکرار رمز عبور"
                class="mb-2 font-medium"
            />

            <div class="relative">

                <span class="absolute inset-y-0 right-4 flex items-center text-gray-400">
                    🔐
                </span>

                <x-text-input
                    wire:model="password_confirmation"
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    dir="ltr"
                    class="block w-full pr-12 mt-1"
                    placeholder="رمز عبور را دوباره وارد کنید"
                    required
                    autocomplete="new-password"
                />

            </div>

            <x-input-error
                :messages="$errors->get('password_confirmation')"
                class="mt-2"
            />

        </div>


        {{-- لینک ورود --}}
        <div class="text-center">

            <a
                href="{{ route('login') }}"
                wire:navigate
                class="text-sm text-indigo-600 hover:text-indigo-800 transition"
            >
                قبلاً حساب کاربری ساخته‌اید؟ وارد شوید
            </a>

        </div>


        {{-- دکمه ثبت‌نام --}}
        <div>

            <x-primary-button
                class="w-full justify-center py-3 rounded-xl text-base font-bold"
            >
                ایجاد حساب کاربری
            </x-primary-button>

        </div>

    </form>

</div>

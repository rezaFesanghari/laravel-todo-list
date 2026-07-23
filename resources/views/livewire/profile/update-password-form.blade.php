<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;

new class extends Component
{
    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Update the password for the currently authenticated user.
     */
    public function updatePassword(): void
    {
        try {
            $validated = $this->validate([
                'current_password' => ['required', 'string', 'current_password'],
                'password' => ['required', 'string', Password::defaults(), 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        $this->dispatch('password-updated');
    }
}; ?>

<section>
    <header class="flex items-center gap-3 mb-6">
        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-purple-100 text-lg">
            🔒
        </div>
        <div>
            <h2 class="text-lg font-bold text-gray-800">
                تغییر رمز عبور
            </h2>
            <p class="mt-0.5 text-sm text-gray-500">
                برای امنیت بیشتر، از یک رمز عبور طولانی و تصادفی استفاده کن
            </p>
        </div>
    </header>

    <form wire:submit="updatePassword" class="space-y-5">

        {{-- رمز عبور فعلی --}}
        <div>
            <x-input-label for="update_password_current_password" value="رمز عبور فعلی" />
            <x-text-input
                wire:model="current_password"
                id="update_password_current_password"
                name="current_password"
                type="password"
                class="mt-1.5 block w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500 transition"
                autocomplete="current-password"
            />
            <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
        </div>

        {{-- رمز عبور جدید --}}
        <div>
            <x-input-label for="update_password_password" value="رمز عبور جدید" />
            <x-text-input
                wire:model="password"
                id="update_password_password"
                name="password"
                type="password"
                class="mt-1.5 block w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500 transition"
                autocomplete="new-password"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- تکرار رمز عبور جدید --}}
        <div>
            <x-input-label for="update_password_password_confirmation" value="تکرار رمز عبور جدید" />
            <x-text-input
                wire:model="password_confirmation"
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                class="mt-1.5 block w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500 transition"
                autocomplete="new-password"
            />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        {{-- دکمه ذخیره --}}
        <div class="flex items-center gap-4 pt-2">
            <button
                type="submit"
                class="rounded-xl bg-gradient-to-l from-indigo-600 to-purple-600 text-white font-semibold px-6 py-2.5 hover:shadow-lg hover:shadow-indigo-200 hover:scale-[1.02] transition"
            >
                ذخیره رمز عبور
            </button>

            <x-action-message class="text-green-600 text-sm font-medium flex items-center gap-1" on="password-updated">
                ✅ با موفقیت ذخیره شد.
            </x-action-message>
        </div>
    </form>
</section>

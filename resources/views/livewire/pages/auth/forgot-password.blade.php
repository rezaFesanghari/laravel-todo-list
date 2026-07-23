<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $this->only('email')
        );

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));

            return;
        }

        $this->reset('email');

        session()->flash('status', __($status));
    }
}; ?>

<div class="max-w-md mx-auto">

    {{-- توضیحات --}}
    <div class="mb-6 text-sm text-center leading-7 text-gray-600">
        رمز عبور خود را فراموش کرده‌اید؟
        <br>
        ایمیل حساب کاربری‌تان را وارد کنید تا لینک بازیابی رمز عبور برای شما ارسال شود.
    </div>

    {{-- پیام موفقیت --}}
    <x-auth-session-status
        class="mb-5"
        :status="session('status')"
    />

    <form wire:submit="sendPasswordResetLink" class="space-y-5">

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
                    autofocus
                />

            </div>

            <x-input-error
                :messages="$errors->get('email')"
                class="mt-2"
            />

        </div>

        {{-- دکمه --}}
        <div>

            <x-primary-button
                class="w-full justify-center py-3 rounded-xl text-base font-bold"
            >
                ارسال لینک بازیابی رمز عبور
            </x-primary-button>

        </div>

    </form>

</div>

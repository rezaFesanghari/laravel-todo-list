<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component
{
    public string $password = '';

    /**
     * Delete the currently authenticated user.
     */
    public function deleteUser(Logout $logout): void
    {
        $this->validate([
            'password' => ['required', 'string', 'current_password'],
        ]);

        tap(Auth::user(), $logout(...))->delete();

        $this->redirect('/', navigate: true);
    }
}; ?>

<section class="space-y-6">
    <header class="flex items-center gap-3">
        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-red-100 text-lg">
            ⚠️
        </div>
        <div>
            <h2 class="text-lg font-bold text-red-700">
                حذف حساب کاربری
            </h2>
            <p class="mt-0.5 text-sm text-gray-600">
                این عملیات غیرقابل بازگشت است
            </p>
        </div>
    </header>


    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="rounded-xl"
    >
        🗑️ حذف حساب کاربری
    </x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable>
        <form wire:submit="deleteUser" class="p-6">

            <div class="flex items-center gap-3 mb-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-red-100 text-2xl">
                    🚨
                </div>
                <h2 class="text-lg font-bold text-gray-900">
                    آیا از حذف حساب خود مطمئن هستید؟
                </h2>
            </div>

            <p class="mt-1 text-sm text-gray-600 leading-relaxed">
                با حذف حساب کاربری، تمام اطلاعات و منابع آن برای همیشه پاک می‌شود.
                لطفاً برای تایید نهایی، رمز عبور خود را وارد کنید.
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="رمز عبور" class="sr-only" />

                <x-text-input
                    wire:model="password"
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-red-500 focus:ring-red-500 transition"
                    placeholder="رمز عبور خود را وارد کنید"
                />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end gap-2">
                <x-secondary-button x-on:click="$dispatch('close')" class="rounded-xl">
                    انصراف
                </x-secondary-button>

                <x-danger-button class="rounded-xl">
                    بله، حساب را حذف کن
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>

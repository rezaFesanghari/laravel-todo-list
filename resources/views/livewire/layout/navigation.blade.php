<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-6">

        <div class="flex items-center justify-between h-16">

            {{-- لوگو --}}
            <div class="flex items-center gap-8">

                <a href="{{ route('dashboard') }}" class="flex items-center gap-3">

                    <div
                        class="w-10 h-10 rounded-xl bg-indigo-600 text-white flex items-center justify-center font-bold text-lg shadow">
                        ✓
                    </div>

                    <div>
                        <h1 class="font-bold text-lg text-gray-800">
                            تسک‌فلو
                        </h1>

                        <p class="text-xs text-gray-500">
                            مدیریت هوشمند کارهای روزانه
                        </p>
                    </div>

                </a>

                {{-- منو --}}
                <div class="hidden lg:flex items-center gap-2">

                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate
                       class="px-4 py-2 rounded-xl bg-indigo-50 text-indigo-600 font-medium">
                        {{ __('داشبورد') }}
                    </x-nav-link>
                    <x-nav-link :href="route('tasks')" :active="request()->routeIs('tasks')" wire:navigate
                       class="px-4 py-2 rounded-xl text-gray-600 hover:bg-gray-100 transition">
                        {{ __('وظایف من') }}
                    </x-nav-link>

                    <x-nav-link :href="route('categories')" :active="request()->routeIs('categories')" wire:navigate
                                class="px-4 py-2 rounded-xl text-gray-600 hover:bg-gray-100 transition">
                        مدیریت دسته‌بندی‌ها
                    </x-nav-link>

                    <a href="#"
                       class="px-4 py-2 rounded-xl text-gray-600 hover:bg-gray-100 transition">
                        گزارش‌ها
                    </a>

                </div>

            </div>

            {{-- سمت چپ --}}
            <div class="flex items-center gap-4">


                {{-- کاربر --}}
                <div class="flex items-center gap-3">

                    <div
                        class="w-10 h-10 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold">

                        {{ strtoupper(substr(auth()->user()->name,0,1)) }}

                    </div>

                    <div class="hidden lg:block">

                        <p class="font-semibold text-gray-700">
                            {{ auth()->user()->name }}
                        </p>

                        <p class="text-xs text-gray-500">
                            خوش اومدی 👋
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>
</nav>

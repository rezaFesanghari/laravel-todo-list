<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 text-2xl shadow-lg shadow-indigo-200">
                👤
            </div>
            <div>
                <h2 class="text-2xl font-bold text-gray-800">
                    حساب کاربری
                </h2>
                <p class="mt-1 text-sm text-gray-500">
                    اطلاعات شخصی، رمز عبور و تنظیمات حساب خودت رو مدیریت کن
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- اطلاعات پروفایل --}}
            <div class="rounded-2xl bg-white p-6 sm:p-8 shadow-sm border">
                <div class="max-w-xl">
                    <livewire:profile.update-profile-information-form />
                </div>
            </div>

            {{-- تغییر رمز عبور --}}
            <div class="rounded-2xl bg-white p-6 sm:p-8 shadow-sm border">
                <div class="max-w-xl">
                    <livewire:profile.update-password-form />
                </div>
            </div>

            {{-- حذف حساب --}}
            <div class="rounded-2xl bg-red-50/50 p-6 sm:p-8 shadow-sm border border-red-100">
                <div class="max-w-xl">
                    <livewire:profile.delete-user-form />
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

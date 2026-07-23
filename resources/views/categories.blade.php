<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-purple-500 to-indigo-600 text-2xl shadow-lg shadow-purple-200">
                🗂️
            </div>
            <div>
                <h2 class="text-2xl font-bold text-gray-800">
                    مدیریت دسته‌بندی‌ها
                </h2>
                <p class="mt-1 text-sm text-gray-500">
                    دسته‌بندی‌های خودت رو بساز، رنگ‌آمیزی کن و وظایفت رو مرتب‌تر کن
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <livewire:task.category-manager />
        </div>
    </div>
</x-app-layout>

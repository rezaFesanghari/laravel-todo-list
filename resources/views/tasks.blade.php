<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 text-2xl shadow-lg shadow-indigo-200">
                    📋
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">
                        {{ __('وظایف من') }}
                    </h2>
                    <p class="mt-1 text-sm text-gray-500">
                        {{ __('در این صفحه می‌توانید وظایف خود را مدیریت، فیلتر و پیگیری کنید') }}
                    </p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <livewire:task.task-list />
            <livewire:task.task-form />
        </div>
    </div>
</x-app-layout>

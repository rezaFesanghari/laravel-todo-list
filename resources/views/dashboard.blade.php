<x-app-layout>

    <div class="max-w-7xl mx-auto px-6 py-8">

        <!-- Hero -->
        <section
            class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-indigo-600 via-indigo-500 to-sky-500 p-8 text-white shadow-xl">

            <div class="absolute right-0 top-0 h-48 w-48 rounded-full bg-white/10 blur-3xl"></div>
            <div class="absolute bottom-0 left-0 h-40 w-40 rounded-full bg-black/10 blur-3xl"></div>

            <div class="relative flex items-center justify-between">

                <div>

                    <p class="text-indigo-100">
                        👋 خوش آمدید
                    </p>

                    <h1 class="mt-2 text-4xl font-bold">
                        {{ auth()->user()->name }}
                    </h1>

                    <p class="mt-3 text-indigo-100 max-w-xl">
                        تمرکز خود را حفظ کنید و کار های امروزتان را با موفقیت به پایان برسانید
                    </p>

                    <div class="mt-6 flex gap-3">

                        <button
                            onclick="Livewire.dispatch('open-task-form')"
                            class="rounded-xl bg-white px-5 py-3 font-semibold text-indigo-600 transition hover:scale-105">
                            + وظیفه جدید
                        </button>

                        <button href="{{ route('tasks') }}" wire:navigate
                            class="rounded-xl border border-white/30 px-5 py-3 transition hover:bg-white/10">

                            دیدن وظیفه ها

                        </button>

                    </div>

                </div>

                <livewire:task.today-goal/>

            </div>

        </section>

        <!-- Statistics -->

        <livewire:task.task-stats />

        <!-- Main -->

        <section class="grid gap-8 mt-10 lg:grid-cols-3">
            <!-- لیست وظایف -->

            <div class="lg:col-span-3">

                <div class="rounded-3xl border bg-white shadow-sm">

                    <div class="border-b p-6 flex justify-between items-center">

                        <div>

                            <h3 class="text-xl font-bold">
                                📋 وظایف امروز
                            </h3>

                            <p class="text-sm text-gray-500">
                                روی کارهای امروز تمرکز کن و آن‌ها را به پایان برسان.
                            </p>

                        </div>

                        <a href="{{ route('tasks') }}" wire:navigate
                            class="rounded-xl bg-indigo-600 px-4 py-2 text-sm text-white hover:bg-indigo-700">

                            مشاهده همه

                        </a>

                    </div>

                    <div class="p-6">

                        <livewire:task.task-list />
                        <livewire:task.task-form />

                    </div>

                </div>

            </div>

        </section>
    </div>

</x-app-layout>

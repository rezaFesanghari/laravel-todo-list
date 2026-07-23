<section class="grid grid-cols-1 gap-6 mt-8 md:grid-cols-2 xl:grid-cols-4">

    {{-- مجموع وظایف --}}
    <div class="rounded-2xl bg-white p-6 shadow-sm border">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">مجموع وظایف</p>
                <h2 class="mt-3 text-4xl font-bold">{{ $totalTasks }}</h2>
                <span class="text-green-600 text-sm">
                    @if ($tasksThisWeek > 0)
                        +{{ $tasksThisWeek }} مورد در این هفته
                    @else
                        موردی این هفته اضافه نشده
                    @endif
                </span>
            </div>
            <div class="text-4xl">📝</div>
        </div>
    </div>

    {{-- انجام‌شده --}}
    <div class="rounded-2xl bg-white p-6 shadow-sm border">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">انجام‌شده</p>
                <h2 class="mt-3 text-4xl font-bold text-green-600">{{ $completedTasks }}</h2>
                <span class="text-green-600 text-sm">عالی پیش رفتی 👏</span>
            </div>
            <div class="text-4xl">✅</div>
        </div>
    </div>

    {{-- در انتظار انجام --}}
    <div class="rounded-2xl bg-white p-6 shadow-sm border">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">در انتظار انجام</p>
                <h2 class="mt-3 text-4xl font-bold text-orange-500">{{ $pendingTasks }}</h2>
                <span class="text-orange-500 text-sm">نیاز به رسیدگی</span>
            </div>
            <div class="text-4xl">⏳</div>
        </div>
    </div>

    {{-- روزهای متوالی --}}
    <div class="rounded-2xl bg-white p-6 shadow-sm border">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">روزهای متوالی</p>
                <h2 class="mt-3 text-4xl font-bold text-indigo-600">{{ $streak }}</h2>
                <span class="text-indigo-600 text-sm">روز متوالی 🔥</span>
            </div>
            <div class="text-4xl">🚀</div>
        </div>
    </div>

</section>

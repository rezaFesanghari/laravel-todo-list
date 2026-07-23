<div class="hidden lg:block text-right">

    <div class="rounded-2xl bg-white/10 p-6 backdrop-blur">

        <p class="text-sm text-indigo-100">
            هدف امروز
        </p>

        <h2 class="mt-2 text-5xl font-bold">
            {{ $percentage }}٪
        </h2>

        <p class="mt-2 text-sm text-indigo-100">
            @if ($percentage >= 80)
                عالی پیش میری 🚀
            @elseif ($percentage >= 40)
                خوب پیش میری 💪
            @else
                میتونی بهتر از این باشی 🔥
            @endif
        </p>

    </div>

</div>

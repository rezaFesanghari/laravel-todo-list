<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TaskFlow | مدیریت وظایف</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50 text-slate-800 antialiased">

<!-- Navbar -->
<header class="fixed top-0 w-full z-50 bg-white/80 backdrop-blur-xl border-b border-slate-200">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex items-center justify-between h-20">

            <a href="/" class="text-3xl font-black text-blue-600">
                TaskFlow
            </a>

            <nav class="hidden lg:flex items-center gap-8">

                <a href="#features"
                   class="text-slate-600 hover:text-blue-600 transition">
                    امکانات
                </a>

                <a href="#about"
                   class="text-slate-600 hover:text-blue-600 transition">
                    درباره پروژه
                </a>

                <a href="#tech"
                   class="text-slate-600 hover:text-blue-600 transition">
                    تکنولوژی‌ها
                </a>

            </nav>

            <div class="flex items-center gap-3">

                @auth

                    <a href="{{ route('dashboard') }}"
                       class="px-6 py-2 rounded-xl bg-blue-600 text-white hover:bg-blue-700 transition">

                        داشبورد

                    </a>

                @else

                    <a href="{{ route('login') }}"
                       class="text-slate-600 hover:text-blue-600">

                        ورود

                    </a>

                    <a href="{{ route('register') }}"
                       class="px-5 py-2 rounded-xl bg-blue-600 text-white hover:bg-blue-700 transition">

                        شروع رایگان

                    </a>

                @endauth

            </div>

        </div>

    </div>

</header>





<!-- Hero -->

<section class="pt-44 pb-24 overflow-hidden">

    <div class="max-w-7xl mx-auto px-6">

        <div class="grid lg:grid-cols-2 gap-20 items-center">

            <div>

                    <span
                        class="inline-flex items-center gap-2 rounded-full bg-blue-100 text-blue-700 px-4 py-2 text-sm font-bold">

                        ✨ ساخته شده با Laravel 12 + Livewire 3

                    </span>

                <h1
                    class="mt-8 text-5xl lg:text-6xl font-black leading-tight">

                    مدیریت وظایف
                    <br>

                    سریع، ساده و حرفه‌ای

                </h1>

                <p
                    class="mt-8 text-lg leading-9 text-slate-600">

                    TaskFlow یک سیستم مدیریت وظایف مدرن است که
                    برای مدیریت پروژه‌های شخصی و تیمی طراحی شده است.

                    <br><br>

                    با رابط کاربری سریع، معماری قدرتمند Laravel،
                    تجربه‌ای روان و امکانات کاربردی،
                    مدیریت کارهای روزانه تنها با چند کلیک انجام می‌شود.

                </p>

                <div class="flex flex-wrap gap-4 mt-10">

                    <a href="{{ route('register') }}"
                       class="px-8 py-4 rounded-xl bg-blue-600 text-white font-bold hover:bg-blue-700 transition">

                        شروع رایگان

                    </a>

                    <a href="{{ route('login') }}"
                       class="px-8 py-4 rounded-xl border border-slate-300 hover:border-blue-600 hover:text-blue-600 transition">

                        ورود به حساب

                    </a>

                </div>

                <div class="grid grid-cols-3 gap-6 mt-16">

                    <div class="bg-white rounded-2xl p-6 shadow-sm border">

                        <div class="text-3xl font-black text-blue-600">
                            +500
                        </div>

                        <div class="mt-2 text-slate-500">
                            وظیفه ثبت شده
                        </div>

                    </div>

                    <div class="bg-white rounded-2xl p-6 shadow-sm border">

                        <div class="text-3xl font-black text-green-600">
                            99%
                        </div>

                        <div class="mt-2 text-slate-500">
                            سرعت عملکرد
                        </div>

                    </div>

                    <div class="bg-white rounded-2xl p-6 shadow-sm border">

                        <div class="text-3xl font-black text-indigo-600">
                            Livewire
                        </div>

                        <div class="mt-2 text-slate-500">
                            بدون رفرش صفحه
                        </div>

                    </div>

                </div>

            </div>





            <!-- Dashboard Preview -->

            <div class="relative">

                <div
                    class="absolute -top-10 -left-10 w-72 h-72 bg-blue-300 rounded-full blur-3xl opacity-30">
                </div>

                <div
                    class="relative rounded-3xl bg-white shadow-2xl border overflow-hidden">

                    <div
                        class="flex items-center gap-2 p-5 border-b bg-slate-100">

                            <span
                                class="w-3 h-3 rounded-full bg-red-400"></span>

                        <span
                            class="w-3 h-3 rounded-full bg-yellow-400"></span>

                        <span
                            class="w-3 h-3 rounded-full bg-green-400"></span>

                    </div>

                    <div class="p-8">

                        <h3 class="text-2xl font-bold">
                            داشبورد مدیریت وظایف
                        </h3>

                        <div class="space-y-4 mt-8">

                            <div
                                class="rounded-xl border p-4 flex justify-between items-center">

                                <div>

                                    <div class="font-bold">
                                        طراحی صفحه اصلی
                                    </div>

                                    <div class="text-sm text-slate-500">
                                        اولویت بالا
                                    </div>

                                </div>

                                <span
                                    class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">

                                        انجام شده

                                    </span>

                            </div>

                            <div
                                class="rounded-xl border p-4 flex justify-between items-center">

                                <div>

                                    <div class="font-bold">
                                        توسعه داشبورد
                                    </div>

                                    <div class="text-sm text-slate-500">
                                        در حال انجام
                                    </div>

                                </div>

                                <span
                                    class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">

                                        درحال انجام

                                    </span>

                            </div>

                            <div
                                class="rounded-xl border p-4 flex justify-between items-center">

                                <div>

                                    <div class="font-bold">
                                        اتصال API
                                    </div>

                                    <div class="text-sm text-slate-500">
                                        برنامه‌ریزی شده
                                    </div>

                                </div>

                                <span
                                    class="bg-slate-200 text-slate-700 px-3 py-1 rounded-full text-sm">

                                        در انتظار

                                    </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- ========================= -->
<!-- Features -->
<!-- ========================= -->

<section id="features" class="py-24 bg-white">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center">

            <span
                class="inline-flex rounded-full bg-blue-100 text-blue-700 px-4 py-2 text-sm font-bold">

                امکانات سیستم

            </span>

            <h2 class="mt-6 text-4xl font-black">

                هر آنچه برای مدیریت حرفه‌ای وظایف نیاز دارید

            </h2>

            <p class="mt-6 text-slate-500 max-w-3xl mx-auto leading-8">

                TaskFlow با هدف افزایش بهره‌وری طراحی شده است.
                تمام ابزارهای موردنیاز برای مدیریت پروژه‌های شخصی
                و تیمی را در یک محیط ساده، سریع و مدرن در اختیار شما قرار می‌دهد.

            </p>

        </div>





        <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-8 mt-20">

            <!-- Card -->

            <div
                class="group bg-slate-50 rounded-3xl p-8 hover:bg-blue-600 hover:text-white transition duration-300 hover:-translate-y-2">

                <div
                    class="w-16 h-16 rounded-2xl bg-blue-100 flex items-center justify-center text-3xl">

                    ✅

                </div>

                <h3 class="mt-6 text-2xl font-bold">

                    مدیریت وظایف

                </h3>

                <p class="mt-4 leading-8 text-slate-500 group-hover:text-white/90">

                    ایجاد، ویرایش، حذف و مدیریت کامل وظایف
                    تنها با چند کلیک.

                </p>

            </div>





            <div
                class="group bg-slate-50 rounded-3xl p-8 hover:bg-blue-600 hover:text-white transition duration-300 hover:-translate-y-2">

                <div
                    class="w-16 h-16 rounded-2xl bg-green-100 flex items-center justify-center text-3xl">

                    ⭐

                </div>

                <h3 class="mt-6 text-2xl font-bold">

                    اولویت‌بندی

                </h3>

                <p class="mt-4 leading-8 text-slate-500 group-hover:text-white/90">

                    تعیین سطح اهمیت هر وظیفه
                    برای مدیریت بهتر زمان.

                </p>

            </div>





            <div
                class="group bg-slate-50 rounded-3xl p-8 hover:bg-blue-600 hover:text-white transition duration-300 hover:-translate-y-2">

                <div
                    class="w-16 h-16 rounded-2xl bg-yellow-100 flex items-center justify-center text-3xl">

                    📅

                </div>

                <h3 class="mt-6 text-2xl font-bold">

                    زمان‌بندی

                </h3>

                <p class="mt-4 leading-8 text-slate-500 group-hover:text-white/90">

                    تعیین تاریخ شروع،
                    ددلاین و پیگیری زمان انجام پروژه‌ها.

                </p>

            </div>





            <div
                class="group bg-slate-50 rounded-3xl p-8 hover:bg-blue-600 hover:text-white transition duration-300 hover:-translate-y-2">

                <div
                    class="w-16 h-16 rounded-2xl bg-pink-100 flex items-center justify-center text-3xl">

                    📂

                </div>

                <h3 class="mt-6 text-2xl font-bold">

                    دسته‌بندی

                </h3>

                <p class="mt-4 leading-8 text-slate-500 group-hover:text-white/90">

                    مرتب‌سازی وظایف
                    بر اساس پروژه یا دسته‌بندی دلخواه.

                </p>

            </div>





            <div
                class="group bg-slate-50 rounded-3xl p-8 hover:bg-blue-600 hover:text-white transition duration-300 hover:-translate-y-2">

                <div
                    class="w-16 h-16 rounded-2xl bg-indigo-100 flex items-center justify-center text-3xl">

                    🔍

                </div>

                <h3 class="mt-6 text-2xl font-bold">

                    جستجوی سریع

                </h3>

                <p class="mt-4 leading-8 text-slate-500 group-hover:text-white/90">

                    در چند ثانیه
                    هر وظیفه‌ای را پیدا کنید.

                </p>

            </div>





            <div
                class="group bg-slate-50 rounded-3xl p-8 hover:bg-blue-600 hover:text-white transition duration-300 hover:-translate-y-2">

                <div
                    class="w-16 h-16 rounded-2xl bg-red-100 flex items-center justify-center text-3xl">

                    ⚡

                </div>

                <h3 class="mt-6 text-2xl font-bold">

                    عملکرد سریع

                </h3>

                <p class="mt-4 leading-8 text-slate-500 group-hover:text-white/90">

                    استفاده از Livewire
                    بدون نیاز به رفرش صفحه.

                </p>

            </div>

        </div>

    </div>

</section>







<!-- ========================= -->
<!-- About -->
<!-- ========================= -->

<section id="about" class="py-24 bg-slate-50">

    <div class="max-w-7xl mx-auto px-6">

        <div class="grid lg:grid-cols-2 gap-16 items-center">

            <div>

                <span
                    class="inline-flex rounded-full bg-blue-100 text-blue-700 px-4 py-2 text-sm font-bold">

                    درباره پروژه

                </span>

                <h2 class="mt-6 text-4xl font-black">

                    TaskFlow فقط یک Todo List نیست!

                </h2>

                <p class="mt-8 leading-9 text-slate-600">

                    این پروژه با هدف نمایش توانایی توسعه یک
                    محصول واقعی طراحی شده است.

                    <br><br>

                    در توسعه این سیستم از معماری استاندارد Laravel،
                    رابط کاربری مدرن، Livewire، Tailwind CSS و
                    بهترین شیوه‌های برنامه‌نویسی استفاده شده است.

                    <br><br>

                    هدف این پروژه صرفاً ثبت وظایف نیست؛
                    بلکه ایجاد یک تجربه کاربری سریع،
                    روان و حرفه‌ای برای مدیریت فعالیت‌های روزانه است.

                </p>

            </div>





            <div class="grid grid-cols-2 gap-6">

                <div class="bg-white rounded-3xl p-8 shadow">

                    <div class="text-5xl font-black text-blue-600">

                        Laravel

                    </div>

                    <p class="mt-4 text-slate-500">

                        Backend Framework

                    </p>

                </div>

                <div class="bg-white rounded-3xl p-8 shadow">

                    <div class="text-5xl font-black text-green-600">

                        Livewire

                    </div>

                    <p class="mt-4 text-slate-500">

                        SPA Experience

                    </p>

                </div>

                <div class="bg-white rounded-3xl p-8 shadow">

                    <div class="text-5xl font-black text-cyan-600">

                        Tailwind

                    </div>

                    <p class="mt-4 text-slate-500">

                        Modern UI

                    </p>

                </div>

                <div class="bg-white rounded-3xl p-8 shadow">

                    <div class="text-5xl font-black text-indigo-600">

                        MySQL

                    </div>

                    <p class="mt-4 text-slate-500">

                        Database

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- ========================= -->
<!-- Statistics -->
<!-- ========================= -->

<section class="py-24 bg-white">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center">

            <span class="inline-flex px-4 py-2 rounded-full bg-blue-100 text-blue-700 font-bold text-sm">
                آمار پروژه
            </span>

            <h2 class="mt-6 text-4xl font-black">
                ساخته شده برای سرعت، سادگی و توسعه‌پذیری
            </h2>

            <p class="mt-6 text-slate-500 max-w-3xl mx-auto leading-8">
                TaskFlow با استفاده از جدیدترین تکنولوژی‌های Laravel توسعه یافته
                تا تجربه‌ای سریع، امن و مدرن را برای کاربران فراهم کند.
            </p>

        </div>

        <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-8 mt-20">

            <div class="rounded-3xl bg-slate-50 p-10 text-center border hover:shadow-xl transition">

                <div class="text-5xl font-black text-blue-600">
                    +500
                </div>

                <div class="mt-3 text-slate-500">
                    وظیفه ثبت شده
                </div>

            </div>

            <div class="rounded-3xl bg-slate-50 p-10 text-center border hover:shadow-xl transition">

                <div class="text-5xl font-black text-green-600">
                    99%
                </div>

                <div class="mt-3 text-slate-500">
                    رضایت کاربران
                </div>

            </div>

            <div class="rounded-3xl bg-slate-50 p-10 text-center border hover:shadow-xl transition">

                <div class="text-5xl font-black text-indigo-600">
                    24/7
                </div>

                <div class="mt-3 text-slate-500">
                    در دسترس
                </div>

            </div>

            <div class="rounded-3xl bg-slate-50 p-10 text-center border hover:shadow-xl transition">

                <div class="text-5xl font-black text-orange-600">
                    100%
                </div>

                <div class="mt-3 text-slate-500">
                    Responsive
                </div>

            </div>

        </div>

    </div>

</section>







<!-- ========================= -->
<!-- Tech Stack -->
<!-- ========================= -->

<section id="tech" class="py-24 bg-slate-50">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center">

            <span class="inline-flex px-4 py-2 rounded-full bg-blue-100 text-blue-700 font-bold text-sm">
                تکنولوژی‌های استفاده شده
            </span>

            <h2 class="mt-6 text-4xl font-black">
                توسعه یافته با بهترین ابزارهای روز
            </h2>

        </div>

        <div class="grid lg:grid-cols-5 md:grid-cols-3 grid-cols-2 gap-8 mt-20">

            <div class="bg-white rounded-3xl p-10 border text-center hover:-translate-y-2 hover:shadow-xl transition">

                <img src="https://cdn.simpleicons.org/laravel" class="h-14 mx-auto">

                <h3 class="mt-6 font-bold text-xl">
                    Laravel 12
                </h3>

            </div>

            <div class="bg-white rounded-3xl p-10 border text-center hover:-translate-y-2 hover:shadow-xl transition">

                <img src="https://cdn.simpleicons.org/livewire" class="h-14 mx-auto">

                <h3 class="mt-6 font-bold text-xl">
                    Livewire 3
                </h3>

            </div>

            <div class="bg-white rounded-3xl p-10 border text-center hover:-translate-y-2 hover:shadow-xl transition">

                <img src="https://cdn.simpleicons.org/tailwindcss" class="h-14 mx-auto">

                <h3 class="mt-6 font-bold text-xl">
                    Tailwind CSS
                </h3>

            </div>

            <div class="bg-white rounded-3xl p-10 border text-center hover:-translate-y-2 hover:shadow-xl transition">

                <img src="https://cdn.simpleicons.org/alpinedotjs" class="h-14 mx-auto">

                <h3 class="mt-6 font-bold text-xl">
                    Alpine.js
                </h3>

            </div>

            <div class="bg-white rounded-3xl p-10 border text-center hover:-translate-y-2 hover:shadow-xl transition">

                <img src="https://cdn.simpleicons.org/mysql" class="h-14 mx-auto">

                <h3 class="mt-6 font-bold text-xl">
                    MySQL
                </h3>

            </div>

        </div>

    </div>

</section>







<!-- ========================= -->
<!-- CTA -->
<!-- ========================= -->

<section class="py-24">

    <div class="max-w-5xl mx-auto px-6">

        <div class="rounded-[40px] bg-gradient-to-r from-blue-600 to-indigo-700 p-16 text-center text-white shadow-2xl">

            <h2 class="text-5xl font-black leading-relaxed">

                آماده مدیریت حرفه‌ای وظایف خود هستید؟

            </h2>

            <p class="mt-8 text-lg text-blue-100 leading-9">

                همین حالا حساب کاربری خود را ایجاد کنید و
                مدیریت پروژه‌های شخصی و تیمی را با تجربه‌ای سریع،
                مدرن و لذت‌بخش آغاز کنید.

            </p>

            <div class="flex flex-wrap justify-center gap-5 mt-12">

                <a href="{{ route('register') }}"
                   class="px-8 py-4 rounded-xl bg-white text-blue-700 font-bold hover:scale-105 transition">

                    ایجاد حساب کاربری

                </a>

                <a href="{{ route('login') }}"
                   class="px-8 py-4 rounded-xl border border-white hover:bg-white hover:text-blue-700 transition">

                    ورود به حساب

                </a>

            </div>

        </div>

    </div>

</section>







<!-- ========================= -->
<!-- Footer -->
<!-- ========================= -->

<footer class="border-t bg-white">

    <div class="max-w-7xl mx-auto px-6 py-10">

        <div class="flex flex-col lg:flex-row items-center justify-between gap-6">

            <div>

                <h2 class="text-3xl font-black text-blue-600">

                    TaskFlow

                </h2>

                <p class="mt-3 text-slate-500">

                    یک سیستم مدیریت وظایف مدرن با Laravel و Livewire

                </p>

            </div>

            <div class="text-slate-500 text-center lg:text-left">

                Developed with ❤️ by

                <span class="font-bold text-slate-700">
                    Reza Fesanghari
                </span>

            </div>

        </div>

    </div>

</footer>

</body>

</html>

</body>

</html>

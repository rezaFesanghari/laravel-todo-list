<div>

    @if (session()->has('message'))
        <div class="mb-6 rounded-xl bg-green-50 border border-green-200 text-green-700 px-4 py-3 text-sm">
            {{ session('message') }}
        </div>
    @endif

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

        {{-- ستون سمت راست: فرم درج/ویرایش --}}
        <div class="rounded-2xl bg-white p-6 shadow-sm border h-fit sticky top-6">

            <div class="flex items-center gap-3 mb-6">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-100 text-lg">
                    {{ $editingId ? '✏️' : '➕' }}
                </div>
                <h3 class="font-bold text-gray-800">
                    {{ $editingId ? 'ویرایش دسته‌بندی' : 'افزودن دسته‌بندی جدید' }}
                </h3>
            </div>

            <form wire:submit="save" class="space-y-5">

                {{-- نام دسته‌بندی --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">نام دسته‌بندی</label>
                    <input
                        type="text"
                        wire:model="name"
                        placeholder="مثلا: کاری، شخصی، درسی..."
                        class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                    >
                    @error('name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                {{-- انتخاب رنگ --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">رنگ دسته‌بندی</label>

                    <div class="flex items-center gap-3">
                        <input
                            type="color"
                            wire:model="color"
                            class="h-12 w-16 rounded-lg border border-gray-300 cursor-pointer"
                        >

                        <div class="flex flex-wrap gap-2">
                            @foreach (['#6366f1', '#ef4444', '#22c55e', '#f59e0b', '#ec4899', '#06b6d4'] as $preset)
                                <button
                                    type="button"
                                    wire:click="$set('color', '{{ $preset }}')"
                                    class="h-8 w-8 rounded-full border-2 transition {{ $color === $preset ? 'border-gray-800 scale-110' : 'border-transparent' }}"
                                    style="background-color: {{ $preset }}"
                                ></button>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- پیش‌نمایش --}}
                <div class="rounded-xl border border-dashed border-gray-300 p-4 flex items-center gap-2">
                    <span class="text-xs text-gray-400">پیش‌نمایش:</span>
                    <span
                        class="px-3 py-1 rounded-full text-xs font-medium"
                        style="background-color: {{ $color }}20; color: {{ $color }}"
                    >
                        {{ $name ?: 'نام دسته‌بندی' }}
                    </span>
                </div>

                {{-- دکمه‌ها --}}
                <div class="flex gap-2 pt-2">
                    <button
                        type="submit"
                        class="flex-1 rounded-xl bg-gradient-to-l from-blue-600 to-blue-600 text-white font-semibold py-3 hover:shadow-lg hover:shadow-indigo-200 transition"
                        wire:loading.attr="disabled"
                    >
                        <span wire:loading.remove>{{ $editingId ? 'ذخیره تغییرات' : 'افزودن دسته‌بندی' }}</span>
                        <span wire:loading>در حال ذخیره...</span>
                    </button>

                    @if ($editingId)
                        <button
                            type="button"
                            wire:click="cancelEdit"
                            class="rounded-xl border border-gray-300 px-4 py-3 text-gray-600 hover:bg-gray-50 transition"
                        >
                            انصراف
                        </button>
                    @endif
                </div>

            </form>
        </div>

        {{-- ستون سمت چپ: لیست دسته‌بندی‌ها --}}
        <div class="rounded-2xl bg-white p-6 shadow-sm border">

            <div class="flex items-center gap-3 mb-6">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-purple-100 text-lg">
                    🗂️
                </div>
                <h3 class="font-bold text-gray-800">
                    دسته‌بندی‌های شما
                    <span class="text-gray-400 font-normal text-sm">({{ $categories->count() }})</span>
                </h3>
            </div>

            <div class="space-y-3">
                @forelse ($categories as $category)
                    <div class="group flex items-center justify-between rounded-xl border border-gray-100 p-4 hover:border-gray-200 hover:shadow-sm transition">

                        <div class="flex items-center gap-3">
                            <span
                                class="h-4 w-4 rounded-full flex-shrink-0"
                                style="background-color: {{ $category->color }}"
                            ></span>
                            <div>
                                <p class="font-medium text-gray-800">{{ $category->name }}</p>
                                <p class="text-xs text-gray-400">{{ $category->tasks_count }} وظیفه</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-1 opacity-0 group-hover:opacity-100 transition">
                            <button
                                wire:click="edit({{ $category->id }})"
                                class="h-8 w-8 flex items-center justify-center rounded-lg text-black hover:bg-indigo-50 hover:text-indigo-600 transition"
                                title="ویرایش"
                            >
                                ✏️
                            </button>
                            <button
                                wire:click="delete({{ $category->id }})"
                                wire:confirm="آیا از حذف این دسته‌بندی مطمئن هستید؟"
                                class="h-8 w-8 flex items-center justify-center rounded-lg text-gray-400 hover:bg-red-50 hover:text-red-600 transition"
                                title="حذف"
                            >
                                🗑️
                            </button>
                        </div>

                    </div>
                @empty
                    <div class="text-center py-12">
                        <div class="text-5xl mb-3">📭</div>
                        <p class="text-gray-400 text-sm">هنوز دسته‌بندی‌ای نساختی</p>
                        <p class="text-gray-300 text-xs mt-1">از فرم کنار شروع کن!</p>
                    </div>
                @endforelse
            </div>

        </div>

    </div>

</div>

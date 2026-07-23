<div>
    @if ($showModal)
        <div
            class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/60 backdrop-blur-sm p-4"
            wire:click.self="closeModal">

            <div class="w-full max-w-2xl overflow-hidden rounded-3xl bg-white shadow-2xl">

                {{-- Header --}}
                <div
                    class="flex items-center justify-between bg-gradient-to-r from-indigo-600 to-blue-600 px-6 py-5">

                    <div>

                        <h3 class="text-2xl font-bold text-white">
                            {{ $taskId ? 'ویرایش تسک' : 'ایجاد تسک جدید' }}
                        </h3>

                        <p class="mt-1 text-sm text-indigo-100">
                            اطلاعات تسک را تکمیل کنید.
                        </p>

                    </div>

                    <button
                        wire:click="closeModal"
                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/10 text-white transition hover:bg-white/20">

                        ✕

                    </button>

                </div>

                <form wire:submit="save">

                    <div class="space-y-6 p-6">

                        {{-- عنوان --}}
                        <div>

                            <label class="mb-2 block text-sm font-semibold text-slate-700">
                                عنوان تسک
                            </label>

                            <input
                                type="text"
                                wire:model="title"
                                placeholder="مثلاً: تکمیل پروژه لاراول"

                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 transition
                                       focus:border-indigo-500
                                       focus:bg-white
                                       focus:outline-none
                                       focus:ring-4
                                       focus:ring-indigo-100">

                            @error('title')
                            <p class="mt-2 text-sm text-red-500">
                                {{ $message }}
                            </p>
                            @enderror

                        </div>

                        {{-- توضیحات --}}
                        <div>

                            <label class="mb-2 block text-sm font-semibold text-slate-700">
                                توضیحات
                            </label>

                            <textarea
                                wire:model="description"
                                rows="5"

                                placeholder="در مورد این تسک توضیح بنویسید..."

                                class="w-full rounded-xl border border-slate-200 bg-slate-50 p-4 transition
                                       focus:border-indigo-500
                                       focus:bg-white
                                       focus:outline-none
                                       focus:ring-4
                                       focus:ring-indigo-100"></textarea>

                            @error('description')
                            <p class="mt-2 text-sm text-red-500">
                                {{ $message }}
                            </p>
                            @enderror

                        </div>

                        <div class="grid gap-5 md:grid-cols-2">

                            {{-- اولویت --}}
                            <div>

                                <label class="mb-2 block text-sm font-semibold text-slate-700">
                                    اولویت
                                </label>

                                <select
                                    wire:model="priority"

                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 transition
                                           focus:border-indigo-500
                                           focus:bg-white
                                           focus:ring-4
                                           focus:ring-indigo-100">

                                    <option value="low">🟢 کم</option>
                                    <option value="medium">🟡 متوسط</option>
                                    <option value="high">🔴 زیاد</option>

                                </select>

                            </div>

                            {{-- وضعیت --}}
                            <div>

                                <label class="mb-2 block text-sm font-semibold text-slate-700">
                                    وضعیت
                                </label>

                                <select
                                    wire:model="status"

                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 transition
                                           focus:border-indigo-500
                                           focus:bg-white
                                           focus:ring-4
                                           focus:ring-indigo-100">

                                    <option value="pending">در انتظار</option>
                                    <option value="in_progress">در حال انجام</option>
                                    <option value="completed">تکمیل شده</option>

                                </select>

                            </div>

                        </div>

                        <div class="grid gap-5 md:grid-cols-2">

                            {{-- دسته بندی --}}
                            <div>

                                <label class="mb-2 block text-sm font-semibold text-slate-700">
                                    دسته‌بندی
                                </label>

                                <select
                                    wire:model="category_id"

                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 transition
                                           focus:border-indigo-500
                                           focus:bg-white
                                           focus:ring-4
                                           focus:ring-indigo-100">

                                    <option value="">
                                        بدون دسته‌بندی
                                    </option>

                                    @foreach ($categories as $category)

                                        <option value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>

                                    @endforeach

                                </select>

                            </div>

                            {{-- تاریخ --}}
                            <div>

                                <label class="mb-2 block text-sm font-semibold text-slate-700">
                                    تاریخ سررسید
                                </label>

                                <input
                                    type="date"
                                    wire:model="due_date"

                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 transition
                                           focus:border-indigo-500
                                           focus:bg-white
                                           focus:ring-4
                                           focus:ring-indigo-100">

                                @error('due_date')

                                <p class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </p>

                                @enderror

                            </div>

                        </div>

                    </div>

                    {{-- Footer --}}
                    <div
                        class="flex items-center justify-end gap-3 border-t border-slate-200 bg-slate-50 px-6 py-5">

                        <button
                            type="button"
                            wire:click="closeModal"

                            class="rounded-xl border border-slate-300 bg-white px-5 py-3 font-medium text-slate-700 transition hover:bg-slate-100">

                            انصراف

                        </button>

                        <button
                            type="submit"
                            wire:loading.attr="disabled"

                            class="rounded-xl bg-indigo-600 px-6 py-3 font-semibold text-white shadow-lg shadow-indigo-500/30 transition hover:bg-indigo-700 disabled:opacity-50">

                            <span wire:loading.remove>
                                {{ $taskId ? 'ذخیره تغییرات' : 'ایجاد تسک' }}
                            </span>

                            <span wire:loading>
                                در حال ذخیره...
                            </span>

                        </button>

                    </div>

                </form>

            </div>

        </div>
    @endif
</div>

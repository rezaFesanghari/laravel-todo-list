<div class="space-y-4">

    {{-- پیام موفقیت --}}
    @if (session()->has('message'))
        <div class="bg-green-100 text-green-700 p-3 rounded-lg text-sm">
            {{ session('message') }}
        </div>
    @endif

    {{-- نوار فیلتر و جستجو --}}
    <div class="flex flex-wrap gap-3 items-center bg-white p-4 rounded-xl shadow-sm">

        <input
            type="text"
            wire:model.live.debounce.400ms="search"
            placeholder="جستجو در تسک‌ها..."
            class="border rounded-lg px-3 py-2 flex-1 min-w-[200px]"
        >

        <select wire:model.live="statusFilter" class="border rounded-lg px-3 py-2">
            <option value="all">همه وضعیت‌ها</option>
            <option value="pending">در انتظار</option>
            <option value="in_progress">در حال انجام</option>
            <option value="completed">تکمیل‌شده</option>
        </select>

        <select wire:model.live="priorityFilter" class="border rounded-lg px-3 py-2">
            <option value="all">همه اولویت‌ها</option>
            <option value="low">کم</option>
            <option value="medium">متوسط</option>
            <option value="high">بالا</option>
        </select>

        <select wire:model.live="categoryFilter" class="border rounded-lg px-3 py-2">
            <option value="">همه دسته‌بندی‌ها</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <button
            wire:click="$dispatch('open-task-form')"
            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700"
        >
            + تسک جدید
        </button>


    </div>

    {{-- لیست تسک‌ها --}}
    <div class="bg-white rounded-xl shadow-sm divide-y" wire:loading.class="opacity-50">
        @forelse ($tasks as $task)
            <livewire:task.task-item :task="$task" :key="$task->id" />
        @empty
            <p class="text-center text-gray-400 py-10">هیچ تسکی پیدا نشد.</p>
        @endforelse
    </div>

    {{-- صفحه‌بندی --}}
    <div>
        {{ $tasks->links() }}
    </div>

</div>

<div class="p-4 flex items-center justify-between hover:bg-gray-50">

    <div class="flex items-center gap-3">
        {{-- چک‌باکس تکمیل --}}
        <input
            type="checkbox"
            wire:click="toggleComplete"
            @checked($task->completed)
            class="w-5 h-5 rounded"
        >

        <div>
            <p class="font-medium {{ $task->completed ? 'line-through text-gray-400' : 'text-gray-800' }}">
                {{ $task->title }}
            </p>

            <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                {{-- اولویت --}}
                <span @class([
                    'px-2 py-0.5 rounded-full',
                    'bg-red-100 text-red-600' => $task->priority === 'high',
                    'bg-yellow-100 text-yellow-600' => $task->priority === 'medium',
                    'bg-green-100 text-green-600' => $task->priority === 'low',
                ])>
                    {{ match($task->priority) {
                        'high' => 'بالا',
                        'medium' => 'متوسط',
                        'low' => 'کم',
                    } }}
                </span>

                {{-- دسته‌بندی --}}
                @if ($task->category)
                    <span class="px-2 py-0.5 rounded-full" style="background-color: {{ $task->category->color }}20; color: {{ $task->category->color }}">
                        {{ $task->category->name }}
                    </span>
                @endif

                {{-- تاریخ سررسید --}}
                @if ($task->due_date)
                    <span class="{{ $task->due_date->isPast() && !$task->completed ? 'text-red-500 font-medium' : '' }}">
                        📅 {{ $task->due_date->format('Y-m-d') }}
                    </span>
                @endif
            </div>
        </div>
    </div>

    {{-- دکمه‌های عملیات --}}
    <div class="flex items-center gap-2">
        <button wire:click="editTask" class="text-gray-400 hover:text-blue-600 text-sm">
            ویرایش
        </button>
        <button
            wire:click="deleteTask"
            wire:confirm="آیا از حذف این تسک مطمئن هستید؟"
            class="text-gray-400 hover:text-red-600 text-sm"
        >
            حذف
        </button>
    </div>

</div>

<?php

namespace App\Livewire\Task;

use App\Models\Task;
use Livewire\Component;

class TaskItem extends Component
{
    public Task $task;

    public function toggleComplete()
    {
        $this->authorize('update', $this->task);

        $this->task->completed = ! $this->task->completed;
        $this->task->status = $this->task->completed ? 'completed' : 'pending';
        $this->task->completed_at = $this->task->completed ? now() : null;
        $this->task->save();

        $this->dispatch('task-saved');
    }

    public function deleteTask()
    {
        $this->authorize('delete', $this->task);

        $this->task->delete();

        $this->dispatch('task-saved'); // برای رفرش لیست
        session()->flash('message', 'تسک با موفقیت حذف شد.');
    }

    public function editTask()
    {
        $this->dispatch('open-task-form-edit', taskId: $this->task->id);
    }

    public function render()
    {
        return view('livewire.task.task-item');
    }
}

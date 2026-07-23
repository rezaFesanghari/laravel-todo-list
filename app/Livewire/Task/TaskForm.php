<?php

namespace App\Livewire\Task;

use App\Models\Category;
use App\Models\Task;
use Livewire\Attributes\On;
use Livewire\Component;

class TaskForm extends Component
{
    public bool $showModal = false;
    public ?int $taskId = null;

    public string $title = '';
    public string $description = '';
    public string $priority = 'medium';
    public string $status = 'pending';
    public ?int $category_id = null;
    public ?string $due_date = null;

    protected function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:pending,in_progress,completed',
            'category_id' => 'nullable|exists:categories,id',
            'due_date' => 'nullable|date',
        ];
    }

    #[On('open-task-form')]
    public function openForCreate()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    #[On('open-task-form-edit')]
    public function openForEdit(int $taskId)
    {
        $task = Task::findOrFail($taskId);
        $this->authorize('update', $task);

        $this->taskId = $task->id;
        $this->title = $task->title;
        $this->description = $task->description ?? '';
        $this->priority = $task->priority;
        $this->status = $task->status;
        $this->category_id = $task->category_id;
        $this->due_date = $task->due_date?->format('Y-m-d');

        $this->showModal = true;
    }

    public function save()
    {
        $validated = $this->validate();

        if ($this->taskId) {

            $task = Task::findOrFail($this->taskId);
            $this->authorize('update', $task);
            $task->update($validated);
        } else {

            $validated['user_id'] = auth()->id();
            Task::create($validated);
        }

        $this->dispatch('task-saved');
        $this->closeModal();
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->reset([
            'taskId', 'title', 'description', 'priority',
            'status', 'category_id', 'due_date',
        ]);
        $this->priority = 'medium';
        $this->status = 'pending';
        $this->resetErrorBag();
    }

    public function render()
    {
        $categories = Category::where('user_id', auth()->id())->get();

        return view('livewire.task.task-form', [
            'categories' => $categories,
        ]);
    }
}

<?php

namespace App\Livewire\Task;

use App\Models\Task;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class TaskList extends Component
{
    use WithPagination;

    public string $search = '';
    public string $statusFilter = 'all';
    public string $priorityFilter = 'all';
    public ?int $categoryFilter = null;
    public string $sortBy = 'order';
    public string $sortDirection = 'asc';


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatusFilter()
    {
        $this->resetPage();
    }

    public function updatingPriorityFilter()
    {
        $this->resetPage();
    }

    public function updatingCategoryFilter()
    {
        $this->resetPage();
    }

    public function sortByField(string $field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function toggleComplete(int $taskId)
    {
        $task = Task::findOrFail($taskId);
        $this->authorize('update', $task);

        $task->is_completed = ! $task->is_completed;
        $task->status = $task->is_completed ? 'completed' : 'pending';
        $task->completed_at = $task->is_completed ? now() : null;
        $task->save();
    }

    public function deleteTask(int $taskId)
    {
        $task = Task::findOrFail($taskId);
        $this->authorize('delete', $task);

        $task->delete();
        session()->flash('message', 'تسک با موفقیت حذف شد.');
    }

    #[On('task-saved')]
    public function refreshList()
    {

    }

    public function render()
    {
        $tasks = Task::query()
            ->where('user_id', auth()->id())
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%');
            })
            ->when($this->statusFilter !== 'all', function ($query) {
                $query->where('status', $this->statusFilter);
            })
            ->when($this->priorityFilter !== 'all', function ($query) {
                $query->where('priority', $this->priorityFilter);
            })
            ->when($this->categoryFilter, function ($query) {
                $query->where('category_id', $this->categoryFilter);
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10);

        $categories = Category::where('user_id', auth()->id())->get();

        return view('livewire.task.task-list', [
            'tasks' => $tasks,
            'categories' => $categories,
        ]);
    }
}

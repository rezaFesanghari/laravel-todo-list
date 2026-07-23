<?php

namespace App\Livewire\Task;

use App\Models\Task;
use Livewire\Attributes\On;
use Livewire\Component;

class TodayGoal extends Component
{
    #[On('task-saved')]
    public function refresh()
    {
        //
    }

    public function render()
    {
        $userId = auth()->id();

        $todayTasks = Task::where('user_id', $userId)
            ->whereDate('due_date', now()->toDateString())
            ->count();

        $todayCompleted = Task::where('user_id', $userId)
            ->whereDate('due_date', now()->toDateString())
            ->where('status', 'completed')
            ->count();

        $percentage = $todayTasks > 0
            ? round(($todayCompleted / $todayTasks) * 100)
            : 0;

        return view('livewire.task.today-goal', [
            'percentage' => $percentage,
        ]);
    }
}

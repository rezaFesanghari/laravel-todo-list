<?php

namespace App\Livewire\Task;

use App\Models\Task;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class TaskStats extends Component
{
    #[On('task-saved')]
    public function refreshStats(){

    }

    public function render()
    {
        $userId = auth()->id();

        $totalTasks = Task::where('user_id', $userId)->count();

        $tasksThisWeek = Task::where('user_id', $userId)
            ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->count();

        $completedTasks = Task::where('user_id', $userId)
            ->where('status', 'completed')
            ->count();

        $pendingTasks = Task::where('user_id', $userId)
            ->where('status', '!=', 'completed')
            ->count();

        $streak = $this->calculateStreak($userId);

        return view('livewire.task.task-stats', [
            'totalTasks' => $totalTasks,
            'tasksThisWeek' => $tasksThisWeek,
            'completedTasks' => $completedTasks,
            'pendingTasks' => $pendingTasks,
            'streak' => $streak,
        ]);
    }

    private function calculateStreak(int $userId): int
    {
        $completedDates = Task::where('user_id', $userId)
            ->where('status', 'completed')
            ->whereNotNull('completed_at')
            ->orderByDesc('completed_at')
            ->pluck('completed_at')
            ->map(fn ($date) => $date->format('Y-m-d'))
            ->unique()
            ->values();

        if ($completedDates->isEmpty()) {
            return 0;
        }

        $streak = 0;
        $expectedDate = now()->startOfDay();

        foreach ($completedDates as $date) {
            $date = \Carbon\Carbon::parse($date);

            if ($date->equalTo($expectedDate)) {
                $streak++;
                $expectedDate = $expectedDate->copy()->subDay();
            } elseif ($date->lessThan($expectedDate)) {
                break;
            }
        }

        return $streak;
    }
}

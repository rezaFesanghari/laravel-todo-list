<?php

namespace App\Livewire\Task;

use App\Models\Category;
use Livewire\Component;

class CategoryManager extends Component
{
    public ?int $editingId = null;

    public string $name = '';
    public string $color = '#6366f1';

    protected function rules(): array
    {
        return [
            'name' => 'required|string|max:50',
            'color' => 'required|string',
        ];
    }

    public function save()
    {
        $this->validate();

        if ($this->editingId) {
            $category = Category::where('user_id', auth()->id())->findOrFail($this->editingId);
            $category->update([
                'name' => $this->name,
                'color' => $this->color,
            ]);
        } else {
            Category::create([
                'user_id' => auth()->id(),
                'name' => $this->name,
                'color' => $this->color,
            ]);
        }

        $this->resetForm();
        session()->flash('message', $this->editingId ? 'دسته‌بندی ویرایش شد.' : 'دسته‌بندی جدید اضافه شد.');
    }

    public function edit(int $id)
    {
        $category = Category::where('user_id', auth()->id())->findOrFail($id);

        $this->editingId = $category->id;
        $this->name = $category->name;
        $this->color = $category->color;
    }

    public function delete(int $id)
    {
        $category = Category::where('user_id', auth()->id())->findOrFail($id);
        $category->delete();

        session()->flash('message', 'دسته‌بندی حذف شد.');

        if ($this->editingId === $id) {
            $this->resetForm();
        }
    }

    public function cancelEdit()
    {
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->reset(['editingId', 'name']);
        $this->color = '#6366f1';
        $this->resetErrorBag();
    }

    public function render()
    {
        $categories = Category::where('user_id', auth()->id())
            ->withCount('tasks')
            ->latest()
            ->get();

        return view('livewire.task.category-manager', [
            'categories' => $categories,
        ]);
    }
}

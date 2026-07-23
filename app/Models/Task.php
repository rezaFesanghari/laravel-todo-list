<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Livewire\Attribute;

class Task extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'due_date' => 'date' ,
        'completed_at' => 'datetime' ,
        'completed' => 'boolean' ,
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function scopePending($query){
        return $query->where('status' , 'pending');
    }

    public function scopeOverdue($query){
        return $query->whereNotNull('due_date')
            ->where('due_date', '<', now())
            ->where('completed' , false);
    }

    protected function isCompleted(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->status === 'completed',
        );
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_id', 'todos'
    ];

    public function todolistTitle()
    {
        return $this->belongsTo(TodolistTitle::class, 'title_id', 'title_id');
    }
}

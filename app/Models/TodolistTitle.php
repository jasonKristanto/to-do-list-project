<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodolistTitle extends Model
{
    use HasFactory;

    protected $primaryKey = 'title_id';

    protected $fillable = [
        'user_id', 'title'
    ];

    public function todolist()
    {
        return $this->hasMany(Todolist::class, 'title_id', 'title_id');
    }
}

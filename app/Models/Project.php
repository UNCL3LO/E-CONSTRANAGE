<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        // Add more fields as needed
    ];

    // Define relationships if any
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}

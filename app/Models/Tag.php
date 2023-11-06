<?php

namespace App\Models;
use App\Models\Tag;
use App\Models\Task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;
    public $timestamps = false;
     protected $fillable = [
        'name',
    ];
    // Define the many-to-many relationship with tasks
    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }
}

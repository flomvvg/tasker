<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $table = 'task';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'taskListId',
        'description',
        'dueDate',
        'done',
        'note',
    ];

    public function tasklist(): BelongsTo
    {
        return $this->belongsTo(Tasklist::class);
    }
}

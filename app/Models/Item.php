<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;
    protected $table = 'item';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'taskId'
    ];

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }
}

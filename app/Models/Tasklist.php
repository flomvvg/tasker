<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Tasklist extends Model
{
    use HasFactory;

    protected $table = 'tasklist';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'description',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function task(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public static function booted()
    {
        static::creating(function ($tasklist){
            $tasklist->user_id = Auth::id();
        });
    }

}

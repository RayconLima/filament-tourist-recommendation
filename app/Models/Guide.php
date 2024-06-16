<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Guide extends Model
{
    use HasFactory;

    protected $fillable = ['label', 'user_id', 'total_cost', 'total_duration'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transportation extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'origin_id',
        'destination_id',
        'duration',
        'cost',
    ];

    public function origin(): BelongsTo
    {
        return $this->belongsTo(Destination::class);
    }

    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class);
    }
}

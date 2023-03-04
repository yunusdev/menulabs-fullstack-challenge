<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Weather extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'city',
        'temperature',
        'pressure',
        'country',
        'timestamp',
        'icon',
        'main',
        'description',
        'wind_speed',
        'wind_degree',
        'humidity',
        'feels_like',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

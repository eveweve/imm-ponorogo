<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;
use App\Models\User;

class Attending extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_id',
        'num_tickets'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function Event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}

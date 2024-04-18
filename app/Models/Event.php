<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'start_date',
        'end_date',
        'start_time',
        'image',
        'address',
        'user_id',
        'country_id',
        'city_id',
        'num_tickets'
    ];

    protected $casts = [
        'start_date' => 'date:m//d/y',
        'end_date' => 'date:m//d/y',
        'image' => 'array'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function country() :BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function city() :BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function comments() :HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function likes_events()
    {
        return $this->belongsToMany(User::class, 'likes_events')->withTimestamps();
    }

    public function attendings() :HasMany
    {
        return $this->hasMany(Attending::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getThumbnailUrl()
    {
        $isUrl = str_contains($this->image, 'http');

        return ($isUrl) ? $this->image : Storage::disk('public')->url($this->image);
    }

    public function getExcerpt()
    {
        return Str::limit(strip_tags($this->description), 150);
    }

    public function scopePublished($query)
    {
        $query->where('created_at', '<=', Carbon::now());
    }

}

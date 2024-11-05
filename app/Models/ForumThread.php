<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ForumThread extends Model
{


    /** @use HasFactory<\Database\Factories\ForumThreadFactory> */
    use HasFactory;

    protected $guarded = [];
    // Add this to handle dates
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'last_posted_at' => 'datetime',
    ];
    public function forum_category(): BelongsTo
    {
        return $this->belongsTo(ForumCategory::class, 'category_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function forum_posts(): HasMany
    {
        return $this->hasMany(ForumPost::class, 'thread_id');
    }

}

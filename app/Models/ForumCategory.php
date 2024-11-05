<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ForumCategory extends Model
{
    /** @use HasFactory<\Database\Factories\ForumCategoryFactory> */
    use HasFactory;

    protected $guarded = [];
    public function forum_threads() : HasMany
    {
        return $this->hasMany(ForumThread::class, 'category_id');
    }
}

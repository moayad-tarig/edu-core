<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseCategory extends Model
{
    public function subCategories(): HasMany
    {
        return $this->hasMany(CourseCategory::class, 'parent_id');
    }

    public function parentCategory(): BelongsTo
    {
        return $this->belongsTo(CourseCategory::class, 'parent_id');
    }

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class, 'category_id');
    }
}

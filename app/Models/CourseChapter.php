<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseChapter extends Model
{
    


    public function lessons() : HasMany
    {
        return $this->hasMany(courseChapterLession::class , 'chapter_id')->orderBy('order');
    }
}

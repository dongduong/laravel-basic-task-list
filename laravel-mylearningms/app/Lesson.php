<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Lesson extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'lessons';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'slug',
        'title',
        'position',
        'course_id',
        'full_text',
        'published',
        'short_text',
        'created_at',
        'updated_at',
        'deleted_at',
        'free_lesson',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function getlessonImageAttribute()
    {
        $file = $this->getMedia('lesson_image')->last();

        if ($file) {
            $file->url = $file->getUrl();
        }

        return $file;
    }

    public function getdownloadableFilesAttribute()
    {
        return $this->getMedia('downloadable_files');
    }

    public function test() {
        return $this->hasOne(Test::class);
    }
}

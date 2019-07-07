<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Course extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'courses';

    protected $dates = [
        'start_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'slug',
        'title',
        'price',
        'published',
        'start_date',
        'created_at',
        'updated_at',
        'deleted_at',
        'description',
    ];

    public function teachers()
    {
        return $this->belongsToMany(User::class, 'course_user');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'course_students')->withTimestamps();
    }

    public function getcourseImageAttribute()
    {
        $file = $this->getMedia('course_image')->last();

        if ($file) {
            $file->url = $file->getUrl();
        }

        return $file;
    }

    public function getStartDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function scopeOfTeacher($query)
    {
        if (!\Auth::user()->isAdmin()) {
            return $query->whereHas('teachers', function($q) {
                $q->where('user_id', \Auth::user()->id);
            });
        }
        return $query;
    }

    public function lessons() {
        return $this->hasMany(Lesson::class)->orderBy('position');
    }

    public function publishedLessons() {
        return $this->hasMany(Lesson::class)->orderBy('position')->where('published', 1);
    }
}

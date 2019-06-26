<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Question extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'questions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'score',
        'question',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getquestionImageAttribute()
    {
        $file = $this->getMedia('question_image')->last();

        if ($file) {
            $file->url = $file->getUrl();
        }

        return $file;
    }
}

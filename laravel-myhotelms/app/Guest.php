<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guest extends Model
{
    use SoftDeletes;

    public $table = 'guests';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'city',
        'email',
        'phone',
        'address',
        'country',
        'last_name',
        'first_name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function fullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}

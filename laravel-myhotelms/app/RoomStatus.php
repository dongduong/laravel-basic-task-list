<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomStatus extends Model
{
    use SoftDeletes;

    public $table = 'room_statuses';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getClassSpanName()
    {
        switch ($this->id) {
            case 1: //Available
                return "badge-success";
            case 2: //Booking
                return "badge-warning";
            case 3: //On Repair
                return "badge-danger";
            case 4: //Unknown
                return "badge-dark";
            default:
                return "badge-light";
        }
    }
}

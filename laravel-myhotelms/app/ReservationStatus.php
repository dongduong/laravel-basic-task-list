<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReservationStatus extends Model
{
    use SoftDeletes;

    public $table = 'reservation_statuses';

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
            case 1:
                return "badge-warning";
            case 2:
                return "badge-info";
            case 3:
                return "badge-primary";
            case 4:
                return "badge-success";
            case 5:
                return "badge-danger";
            case 6:
                return "badge-danger";
            case 7:
                return "badge-secondary";
            case 8:
                return "badge-secondary";
            case 9:
                return "badge-dark";
            default:
                return "badge-light";
        }
    }
}

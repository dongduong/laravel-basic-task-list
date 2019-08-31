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
            case 1: //On-Request
                return "badge-warning";
            case 2: //Confirmed
                return "badge-info";
            case 3: //Operational
                return "badge-primary";
            case 4: //Completed
                return "badge-success";
            case 5: //Cancelled
                return "badge-danger";
            case 6: //Cancelled With Penalty
                return "badge-danger";
            case 7: //No Show
                return "badge-secondary";
            case 8: //No Show With Penalty
                return "badge-secondary";
            case 9: // Unsuccessful
                return "badge-dark";
            default:
                return "badge-light";
        }
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentStatus extends Model
{
    use SoftDeletes;

    public $table = 'payment_statuses';

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
            case 1: //On Progress
                return "badge-warning";
            case 2: //Success
                return "badge-success";
            case 3: //Cancelled
                return "badge-dark";
            case 4: //Failed
                return "badge-danger";
            case 5: //Withdraw
                return "badge-primary";
            default:
                return "badge-light";
        }
    }
}

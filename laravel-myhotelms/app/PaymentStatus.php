<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Enums\PAYMENT_STATUS;

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
            case PAYMENT_STATUS::Waiting:
                return "badge-warning";
            case PAYMENT_STATUS::OnProgress:
                return "badge-warning";
            case PAYMENT_STATUS::Success:
                return "badge-success";
            case PAYMENT_STATUS::Cancelled:
                return "badge-dark";
            case PAYMENT_STATUS::Failed:
                return "badge-danger";
            case PAYMENT_STATUS::Withdraw:
                return "badge-primary";
            default:
                return "badge-light";
        }
    }
}

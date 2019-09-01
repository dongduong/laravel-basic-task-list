<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReservationHistory extends Model
{
    use SoftDeletes;

    public $table = 'reservation_histories';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'changed_at,',
    ];

    protected $fillable = [
        'action',
        'changed_at',
        'note',
        'created_at',
        'updated_at',
        'deleted_at',
        'edit_user_id',
        'reservation_id',
    ];

    public function edit_user()
    {
        return $this->belongsTo(User::class, 'edit_user_id');
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }
}

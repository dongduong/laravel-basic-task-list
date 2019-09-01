<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use SoftDeletes;

    public $table = 'reservations';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'check_in_date',
        'check_out_date',
    ];

    protected $fillable = [
        'code',
        'adults',
        'room_id',
        'guest_id',
        'children',
        'created_at',
        'updated_at',
        'deleted_at',
        'check_in_date',
        'check_out_date',
        'additional_information',
        'reservation_status_id',
        'token',
        'editing_user_id'
    ];

    public function guest()
    {
        return $this->belongsTo(Guest::class, 'guest_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function reservation_status()
    {
        return $this->belongsTo(ReservationStatus::class, 'reservation_status_id');
    }

    public function editing_user()
    {
        return $this->belongsTo(User::class, 'editing_user_id');
    }

    public function getCheckInDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setCheckInDateAttribute($value)
    {
        $this->attributes['check_in_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getCheckOutDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setCheckOutDateAttribute($value)
    {
        $this->attributes['check_out_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}

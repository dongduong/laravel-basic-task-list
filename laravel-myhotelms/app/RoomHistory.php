<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomHistory extends Model
{
    use SoftDeletes;

    public $table = 'room_histories';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'note',
        'created_at',
        'updated_at',
        'deleted_at',
        'room_id',
        'reservation_id',
        'room_status_id',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }
}

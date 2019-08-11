<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use SoftDeletes;

    public $table = 'rooms';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'slug',
        'floor',
        'created_at',
        'updated_at',
        'deleted_at',
        'room_number',
        'description',
        'room_type_id',
        'room_status_id',
    ];

    public function room_type()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }

    public function room_status()
    {
        return $this->belongsTo(RoomStatus::class, 'room_status_id');
    }

    public function booking()
    {
        return $this->HasOne(Reservation::class, 'room_id')->withTrashed();
    }
}

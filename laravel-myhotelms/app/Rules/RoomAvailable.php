<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Room;

class RoomAvailable implements Rule
{

    protected $time_from;
    protected $time_to;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($time_from, $time_to)
    {
        $this->time_from = $time_from;
        $this->time_to = $time_to;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $time_from = $this->time_from;
        $time_to = $this->time_to;

        $rooms = Room::with('booking')->whereHas('booking', function ($q) use ($time_from, $time_to) {
            $q->where(function ($q2) use ($time_from, $time_to) {
                $q2->where('check_in_date', '>=', date('Y-m-d', strtotime($time_to)))
                   ->orWhere('check_out_date', '<=', date('Y-m-d', strtotime($time_from)));
            });
        })->orWhereDoesntHave('booking')->get();

        return $rooms->contains('id', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Room is not available.';
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

use App\Events\RoomReserved;
use App\Events\RoomPayment;
use App\Events\RoomConfirmed;
use App\Listeners\SendReservationNotification;
use App\Listeners\SendReservationPayment;
use App\Listeners\SendReservationConfirm;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        RoomReserved::class => [
            SendReservationNotification::class,
        ],
        RoomPayment::class => [
            SendReservationPayment::class,
        ],
        RoomConfirmed::class => [
            SendReservationConfirm::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}

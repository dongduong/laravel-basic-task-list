@component('emails.layouts.master')

    <div style="padding: 30px;">
        <div style="font-size: 20px;color: #242424;line-height: 30px;margin-bottom: 34px;">
            <span style="font-weight: bold;">
                {{ __('mail.reservation-info.heading') }}
            </span> <br>

            <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                {{ __('mail.reservation-info.dear', ['customer_name' => $reservation->guest->fullName()]) }},
            </p>

            <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                {!! __('mail.reservation-info.greeting', [
                    'order_code' => '<a href="' . route('book-rooms.success', ['token' => $reservation->token]) . '" style="color: #0041FF; font-weight: bold;">' . $reservation->code . '</a>',
                    'created_at' => $reservation->created_at
                    ]) 
                !!}
            </p>
        </div>

        <div style="font-weight: bold;font-size: 20px;color: #242424;line-height: 30px;margin-bottom: 20px !important;">
            {{ __('mail.reservation-info.summary') }}
        </div>

        <div style="display: flex;flex-direction: row;margin-top: 20px;justify-content: space-between;margin-bottom: 40px;">
            <div style="line-height: 25px;">
                <div style="font-weight: bold;font-size: 16px;color: #242424;">
                    {{ __('mail.reservation-info.guest') }}
                </div>

                <div>
                    {{ $reservation->guest->fullName() }}
                </div>

                <div>
                    {{ $reservation->guest->address }}
                </div>

                <div>
                    {{ $reservation->guest->city }}, {{ $reservation->guest->country }}
                </div>

                <div style="margin-bottom: 40px;">
                    {{ __('mail.reservation-info.phone') }} : {{ $reservation->guest->phone }} 
                </div>

            </div>

        </div>

        <div style="background: #FFFFFF;border: 1px solid #E8E8E8;border-radius: 3px;padding: 20px;margin-bottom: 10px">

            <div style="margin-bottom: 10px;">
                <label style="font-size: 16px;color: #5E5E5E;font-weight: bold;">
                    {{ __('mail.reservation-info.room-number') }}
                </label>
                <span style="font-size: 18px;color: #242424;margin-left: 40px;">
                    {{ $reservation->room->room_number }}
                </span>
            </div>

            <div style="margin-bottom: 10px;">
                <label style="font-size: 16px;color: #5E5E5E;font-weight: bold;">
                    {{ __('mail.reservation-info.room-type') }}
                </label>
                <span style="font-size: 18px;color: #242424;margin-left: 40px;">
                    {{ $reservation->room->room_type->name }}
                </span>
            </div>

            <div style="margin-bottom: 10px;">
                <label style="font-size: 16px;color: #5E5E5E;font-weight: bold;">
                    {{ __('mail.reservation-info.check-in-date') }}
                </label>
                <span style="font-size: 18px;color: #242424;margin-left: 40px;">
                    {{ $reservation->check_in_date }}
                </span>
            </div>

            <div style="margin-bottom: 10px;">
                <label style="font-size: 16px;color: #5E5E5E;font-weight: bold;">
                    {{ __('mail.reservation-info.check-out-date') }}
                </label>
                <span style="font-size: 18px;color: #242424;margin-left: 40px;">
                    {{ $reservation->check_out_date }}
                </span>
            </div>
        </div>

        <div style="margin-top: 65px;font-size: 16px;color: #5E5E5E;line-height: 24px;display: inline-block">
            <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                {{ __('mail.reservation-info.final-summary') }}
            </p>

            <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                {!! 
                    __('mail.reservation-info.help', [
                        'support_email' => '<a style="color:#0041FF" href="mailto:' . config('mail.from.address') . '">' . config('mail.from.address'). '</a>'
                        ]) 
                !!}
            </p>

            <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                {{ __('mail.reservation-info.thanks') }}
            </p>
        </div>
    </div>
@endcomponent

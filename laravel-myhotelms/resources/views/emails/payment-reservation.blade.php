@component('emails.layouts.master')

    <div style="padding: 30px;">
        <div style="font-size: 20px;color: #242424;line-height: 30px;margin-bottom: 34px;">
            <span style="font-weight: bold;">
                {{ __('mail.reservation-payment.heading') }}
            </span> <br>

            <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                {{ __('mail.reservation-payment.dear', ['customer_name' => $reservation->guest->fullName()]) }},
            </p>

            <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                {!! __('mail.reservation-payment.greeting', [
                    'reservation_code' => '<a href="' . route('book-rooms.success', ['token' => $reservation->token]) . '" style="color: #0041FF; font-weight: bold;">' . $reservation->code . '</a>'
                    ]) 
                !!}
            </p>

            <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                {!! __('mail.reservation-payment.payment-url', [
                    'payment_url' => '<a href="' . route('payment.index', ['token' => $reservation->token]) . '" style="color: #0041FF; font-weight: bold;">' . route('payment.index', ['token' => $reservation->token]) . '</a>'
                    ]) 
                !!}
            </p>
        </div>

        <div style="font-weight: bold;font-size: 20px;color: #242424;line-height: 30px;margin-bottom: 20px !important;">
            {{ __('mail.reservation-payment.summary') }}
        </div>

        <div style="display: flex;flex-direction: row;margin-top: 20px;justify-content: space-between;margin-bottom: 40px;">
            <div style="line-height: 25px;">
                <div style="font-weight: bold;font-size: 16px;color: #242424;">
                    {{ __('mail.reservation-payment.guest') }}
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
                    {{ __('mail.reservation-payment.phone') }} : {{ $reservation->guest->phone }} 
                </div>

            </div>

        </div>

        <div style="background: #FFFFFF;border: 1px solid #E8E8E8;border-radius: 3px;padding: 20px;margin-bottom: 10px">

            <div style="margin-bottom: 10px;">
                <label style="font-size: 16px;color: #5E5E5E;font-weight: bold;">
                    {{ __('mail.reservation-payment.room-number') }}
                </label>
                <span style="font-size: 18px;color: #242424;margin-left: 40px;">
                    {{ $reservation->room->room_number }}
                </span>
            </div>

            <div style="margin-bottom: 10px;">
                <label style="font-size: 16px;color: #5E5E5E;font-weight: bold;">
                    {{ __('mail.reservation-payment.room-type') }}
                </label>
                <span style="font-size: 18px;color: #242424;margin-left: 40px;">
                    {{ $reservation->room->room_type->name }}
                </span>
            </div>

            <div style="margin-bottom: 10px;">
                <label style="font-size: 16px;color: #5E5E5E;font-weight: bold;">
                    {{ __('mail.reservation-payment.check-in-date') }}
                </label>
                <span style="font-size: 18px;color: #242424;margin-left: 40px;">
                    {{ $reservation->check_in_date }}
                </span>
            </div>

            <div style="margin-bottom: 10px;">
                <label style="font-size: 16px;color: #5E5E5E;font-weight: bold;">
                    {{ __('mail.reservation-payment.check-out-date') }}
                </label>
                <span style="font-size: 18px;color: #242424;margin-left: 40px;">
                    {{ $reservation->check_out_date }}
                </span>
            </div>
        </div>

        <div style="margin-top: 65px;font-size: 16px;color: #5E5E5E;line-height: 24px;display: inline-block">
            <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                {{ __('mail.reservation-payment.final-summary') }}
            </p>

            <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                {!! 
                    __('mail.reservation-payment.help', [
                        'support_email' => '<a style="color:#0041FF" href="mailto:' . config('mail.from.address') . '">' . config('mail.from.address'). '</a>'
                        ]) 
                !!}
            </p>

            <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                {{ __('mail.reservation-payment.thanks') }}
            </p>
        </div>
    </div>
@endcomponent

<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class PAYMENT_METHOD extends Enum
{
    const InternetBanking	=	1;
    const VisaMasterCard 	=	2;
    const Paypal 			=	3;
    const VNPay				=	4;
    const Tranfer 			=	5;
}

<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class PAYMENT_STATUS extends Enum
{
    const Waiting			=	1;
    const OnProgress 		=	2;
    const Success 			=	3;
    const Cancelled			=	4;
    const Failed 			=	5;
    const Withdraw 			=	6;
}

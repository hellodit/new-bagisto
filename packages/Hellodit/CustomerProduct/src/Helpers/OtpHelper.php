<?php

namespace Hellodit\CustomerProduct\Helpers;


class OtpHelper
{

    static public function GenerateOTPDigit(): int
    {
        return random_int(100000, 999999);
    }

}

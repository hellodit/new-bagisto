<?php

namespace Hellodit\CustomerProduct\Helpers;


class OtpHelper
{

    static public function GenerateOTPDigit(): int
    {
        return random_int(1000, 9999);
    }

    public static function formatIndonesianPhoneNumber($phoneNumber)
    {
        $phoneNumber = str_replace('+', '', preg_replace('/\D/', '', $phoneNumber));
        if (str_starts_with($phoneNumber, '0')) {
            $phoneNumber = '62' . substr($phoneNumber, 1);
        }

        return $phoneNumber;
    }

}

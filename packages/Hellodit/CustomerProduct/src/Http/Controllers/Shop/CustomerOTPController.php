<?php

namespace Hellodit\CustomerProduct\Http\Controllers\Shop;

use Carbon\Carbon;
use Hellodit\CustomerProduct\Helpers\OtpHelper;
use Hellodit\CustomerProduct\Mail\SendOTPMail;
use Illuminate\Http\Request;
use Webkul\Shop\Http\Controllers\Controller;

class CustomerOTPController extends Controller
{

    public function index()
    {
        return view('customerproduct::shop.default.otp.index');
    }



    public function sendNewOtp()
    {
        $current_user = auth()->guard('customer')->user();
        $newOtp = OtpHelper::GenerateOTPDigit();
        $current_user->update([
            'otp' => $newOtp,
            'otp_created_at' => now()
        ]);

        \Mail::to($current_user)->send(new SendOTPMail($newOtp));

        return redirect()->back('success', "Success end new otp");
    }


    public function verify(Request $request)
    {
        $request->validate([
            'otp' => 'required'
        ]);

        $userOtp = implode('', $request->otp);

        $currentUser = auth()->guard('customer')->user();
        $currentTime = Carbon::now();
        $otpTime = Carbon::parse($currentUser->otp_created_at);

        if ($otpTime->diffInMinutes($currentTime) <= 5 && $currentUser->otp == $userOtp) {
            $currentUser->update([
                'is_verify' => true,
                'otp' => null,
                'otp_created_at' => null
            ]);

            return redirect()->route('shop.customers.account.profile.index');
        }

        return redirect()->back()->with('warning', 'Invalid OTP please request new ');
    }

}

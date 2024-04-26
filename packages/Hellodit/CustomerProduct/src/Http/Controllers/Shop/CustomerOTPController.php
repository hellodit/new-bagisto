<?php

namespace Hellodit\CustomerProduct\Http\Controllers\Shop;

use Carbon\Carbon;
use Hellodit\CustomerProduct\Helpers\OtpHelper;
use Hellodit\CustomerProduct\Mail\SendOTPMail;
use Hellodit\CustomerProduct\Mail\SuccessVerifyOtp;
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

        return response()->json('ok');
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
            \Mail::to($currentUser)->send(new SuccessVerifyOtp());
            return redirect()->route('shop.customers.account.profile.index')->with('success','Success verify using OTP');
        }

        return redirect()->back()->with('warning', 'Invalid OTP please request new ');
    }

}

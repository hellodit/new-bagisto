@component('admin::emails.layout')
    <p>Dear User,</p>

    <p>Your One-Time Password (OTP) for verification is: <strong>{{ $otp }}</strong></p>

    <p>This OTP is valid for 5 minutes. Please use it to complete the verification process.</p>

    <p>If you did not request this OTP, please ignore this email.</p>

    <p>Thank you,</p>
@endcomponent

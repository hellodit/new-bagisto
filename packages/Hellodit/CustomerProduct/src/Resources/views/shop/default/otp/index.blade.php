<x-shop::layouts.account.clear>
    {{-- Page Title --}}
    <x-slot:title>
        Verify your Account
    </x-slot:title>
    <div class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-gray-50 py-12">
        <div class="relative bg-white px-6 pt-10 pb-9 shadow-xl mx-auto w-full max-w-lg rounded-2xl">
            <div class="mx-auto flex w-full max-w-md flex-col space-y-16">
                <div class="flex flex-col items-center justify-center text-center space-y-2">
                    <div class="font-semibold text-3xl">
                        <p>OTP Verification</p>
                    </div>
                    <div class="flex flex-row text-sm font-medium text-gray-400">
                        <p>We have sent a code to your email</p>
                    </div>
                </div>

                <div>
                    <form action="" method="post">
                        <div class="flex flex-col space-y-16">
                            <div class="flex flex-row items-center justify-between ">
                                <input type="text" name="name" id="name" value=""
                                       class="w-full mb-3 py-2 px-3 shadow border rounded text-[14px] text-gray-600 transition-all hover:border-gray-400 focus:border-gray-400"
                                       required placeholder="Your otp"></div>

                            <div class="flex flex-col items-center py-4 space-y-5">
                                <div>
                                    <button class="primary-button">
                                        Verify Account
                                    </button>
                                </div>

                                <div
                                    class="flex flex-row items-center justify-center text-center text-sm font-medium space-x-1 text-gray-500">
                                    <p>Didn't recieve code?</p> <a class="flex flex-row items-center text-blue-600"
                                                                   href="http://" target="_blank"
                                                                   rel="noopener noreferrer">Resend</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-shop::layouts.account.clear>

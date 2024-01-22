<x-shop::layouts.account.clear>
    {{-- Page Title --}}
    <x-slot:title>
        Verify your Account
    </x-slot:title>

    @push('styles')
        <script src="https://cdn.tailwindcss.com"></script>

        @bagistoVite([
          'src/Resources/assets/css/app.css',
          'src/Resources/assets/js/app.js'
        ], 'customer-product')
    @endpush


    <div class="relative flex min-h-screen flex-col justify-center overflow-hidden  py-12">
        <div class="relative bg-white px-6 pt-10 pb-9 shadow-xl mx-auto w-full max-w-lg rounded-2xl">

            @if(session('warning'))
                <div class="bg-yellow-200 text-yellow-800 p-4 mb-4 rounded-md">
                    {{ session('warning') }}
                </div>
            @endif


            <div class="mx-auto flex w-full max-w-md flex-col space-y-16">
                <div class="flex flex-col items-center justify-center text-center space-y-2">
                    <div class="font-semibold text-3xl">
                        <p>OTP Verification</p>
                    </div>
                    <div class="flex flex-row text-sm font-medium text-gray-400">
                        <p>We have sent a code to your email {{auth()->user()->email}}</p>
                    </div>
                </div>

                <div>

                    <form action="{{route('shop.otp.verify')}}" method="post">
                        @csrf
                        <div class="flex flex-col space-y-16">
                            <div class="flex flex-row items-center justify-between mx-auto w-full max-w-xs">
                                <div class="w-16 h-16 ">
                                    <input
                                        class="w-full h-full flex flex-col items-center justify-center text-center px-5 outline-none rounded-xl border border-gray-200 text-lg bg-white focus:bg-gray-50 focus:ring-1 ring-blue-700"
                                        type="text" name="otp[]" id="">
                                </div>
                                <div class="w-16 h-16 ">
                                    <input
                                        class="w-full h-full flex flex-col items-center justify-center text-center px-5 outline-none rounded-xl border border-gray-200 text-lg bg-white focus:bg-gray-50 focus:ring-1 ring-blue-700"
                                        type="text" name="otp[]" id="">
                                </div>
                                <div class="w-16 h-16 ">
                                    <input
                                        class="w-full h-full flex flex-col items-center justify-center text-center px-5 outline-none rounded-xl border border-gray-200 text-lg bg-white focus:bg-gray-50 focus:ring-1 ring-blue-700"
                                        type="text" name="otp[]" id="">
                                </div>
                                <div class="w-16 h-16 ">
                                    <input
                                        class="w-full h-full flex flex-col items-center justify-center text-center px-5 outline-none rounded-xl border border-gray-200 text-lg bg-white focus:bg-gray-50 focus:ring-1 ring-blue-700"
                                        type="text" name="otp[]" id="">
                                </div>
                            </div>

                            <div class="flex flex-col space-y-5">
                                <div>
                                    <button
                                        class="flex flex-row items-center justify-center text-center w-full border rounded-xl outline-none py-5 bg-blue-700 border-none text-white text-sm shadow-sm">
                                        Verify Account
                                    </button>
                                </div>

                                <div id="loading-otp" class="justify-center text-center"></div>

                                <div
                                    class="flex flex-row items-center justify-center text-center text-sm font-medium space-x-1 text-gray-500">
                                    <p>Didn't recieve code?</p>
                                    <a class="flex flex-row items-center text-blue-600"
                                       id="request_otp" onclick="newOtp()"
                                       href="javascript:;"
                                       rel="noopener noreferrer">Resend</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        function newOtp() {
            let progressBar = document.getElementById('loading-otp')
            progressBar.innerText = 'loading ...'

            // Example data to send in the request body
            var dataToSend = {
                key1: 'value1',
                key2: 'value2'
            };

            fetch('/customer/otp-verification/new-request', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(dataToSend)
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log(data);
                })
                .catch(error => {
                    progressBar.innerText = 'There was a problem with the fetch operation'
                    console.error('There was a problem with the fetch operation:', error);
                });


        }
    </script>


</x-shop::layouts.account.clear>


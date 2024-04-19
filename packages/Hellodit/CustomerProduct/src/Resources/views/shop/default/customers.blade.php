<x-shop::layouts>
    <x-slot:title>
        Users Product
    </x-slot:title>
{{--    @push('styles')--}}
{{--        @bagistoVite([--}}
{{--          'src/Resources/assets/css/app.css',--}}
{{--          'src/Resources/assets/js/app.js'--}}
{{--        ], 'location')--}}
{{--    @endpush--}}


    <section class="mx-auto">
        <div class="container">
            <div class="mt-5 text-center mb-2">
                <h2 class="font-medium text-gray-800 text-[25px]">All Customers Product</h2>
            </div>

            <div class="grid grid-cols-3 gap-8 mt-[30px] max-sm:mt-[20px] max-1060:grid-cols-2 max-sm:justify-items-center max-sm:gap-[16px]">
                @foreach($customers as $customer)
                    <div class="grid gap-2.5 content-start w-full relative">
                        <a href="{{route('shop.customer_product.information',['user_id' => $customer->id])}}"
                           class="p-4 flex flex-col items-center justify-center border rounded-md hover:border-blue-500 transition">
                            <img src="{{empty($customer->image_url) ? asset('assets/images/avatar-default.jpg') : $customer->image_url}}"
                                 alt="Image 1" class="object-fill h-50 w-50 rounded-md" style="height: 250px;width: 100%;object-fit: contain;">
                            <p class="mt-2 text-center text-gray-800">{{$customer->firt_name." ".$customer->last_name}}</p>
                        </a>
                    </div>

                @endforeach
            </div>
        </div>
    </section>

</x-shop::layouts>

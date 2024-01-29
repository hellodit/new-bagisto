<x-shop::layouts>
    {{-- Page Title --}}
    <x-slot:title>
        {{ $partner->title ?? '' }}
    </x-slot:title>
    <section class="mx-auto bg-lightOrange">
        <div class="container">
            <div class="gap-[40px] items-start max-lg:gap-[20px] pt-[28px] pb-[21px]">
                <div class="flex justify-between  ">
                    <div class="flex flex-col gap-[8px] flex-1 max-xl:flex-auto">
                        <p class="text-[20px] text-gray-800 dark:text-white font-bold">
                            {{$partner->title}}
                        </p>
                        <p>
                            {{$partner->description}}
                        </p>
                    </div>
                    <div class="flex flex-col gap-[8px] flex-1 max-xl:flex-auto">
                        <img class='w-[25%]' src="{{$partner->imageAssets()}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-[25px]">
        <div class="container">
            <div class="grid grid-cols-2 gap-4 mt-[14px] mb-[25px] max-xl:flex-wrap">
                <div class="flex flex-col gap-[8px] flex-1 max-xl:flex-auto">
                    <p class="text-[25px] text-gray-800 dark:text-white font-semibold mb-[16px]"> Personal Data </p>
                    <div class="mb-[10px] flex items-center">
                        <p class="font-bold m-0"> Title</p>
                        <p class="font-medium m-0 ml-[10px]">
                            <span class="underline-text">{{$partner->title}}</span>
                        </p>
                    </div>
                    <div class="mb-[10px] flex items-center">
                        <p class="font-bold m-0"> Solution</p>
                        <p class="font-medium m-0 ml-[10px]">
                            <span class="underline-text">{{$partner->solution}}</span>
                        </p>
                    </div>

                    <div class="mb-[10px] flex items-center">
                        <p class="font-bold m-0"> Language</p>
                        <p class="font-medium m-0 ml-[10px]">
                            <span class="underline-text">{{$partner->language}}</span>
                        </p>
                    </div>

                    <div class="mb-[10px] flex items-center">
                        <p class="font-bold m-0"> Last Name</p>
                        <p class="font-medium m-0 ml-[10px]">
                            <span class="underline-text">{{$partner->last_name}}</span>
                        </p>
                    </div>

                    <div class="mb-[10px] flex items-center">
                        <p class="font-bold m-0"> First Name</p>
                        <p class="font-medium m-0 ml-[10px]">
                            <span class="underline-text">{{$partner->first_name}}</span>
                        </p>
                    </div>


                </div>
                <div class="flex flex-col gap-[8px] flex-1 max-xl:flex-auto">
                    <p class="text-[25px] text-gray-800 dark:text-white font-semibold mb-[16px]"> Communication </p>
                    <div class="mb-[10px] flex items-center">
                        <p class="font-bold m-0"> Telephone</p>
                        <p class="font-medium m-0 ml-[10px]">
                            <span class="underline-text">{{$partner->phone}}</span>
                        </p>
                    </div>

                    <div class="mb-[10px] flex items-center gap-[10px]">
                        <p class="font-bold m-0"> Mobile</p>
                        <p class="font-medium m-0 ml-[10px] mr-5 ">
                            <span class="underline-text">{{$partner->mobile}}</span>
                        </p>

                        @if($partner->mobile)
                            <a href="https://wa.me/{{$partner->mobile}}" target="_blank"
                               class="primary-button h-[30px] flex items-center justify-center text-sm">
                                Send WhatsApp
                            </a>
                        @endif



                    </div>

                    <div class="mb-[10px] flex items-center">
                        <p class="font-bold m-0"> faximile</p>
                        <p class="font-medium m-0 ml-[10px]">
                            <span class="underline-text">{{$partner->famille}}</span>
                        </p>
                    </div>

                    <div class="mb-[10px] flex items-center">
                        <p class="font-bold m-0"> Email</p>
                        <p class="font-medium m-0 ml-[10px]">
                            <span class="underline-text">{{$partner->email}}</span>
                        </p>
                    </div>

                    <div class="mb-[10px] flex items-center gap-[10px]">
                        <p class="font-bold m-0"> Website</p>
                        <p class="font-medium m-0 ml-[10px]">
                            <span class="underline-text">{{$partner->website}}</span>
                        </p>
                        <a href="{{$partner->website}}}" target="_blank"
                           class="primary-button h-[30px] flex items-center justify-center text-sm">
                            Open Website
                        </a>

                    </div>

                    <!-- ... (repeat similar modifications for other input fields) ... -->
                </div>

            </div>
            @foreach($partner->address as $partner_address)
                <div class="grid grid-cols-2 gap-4 mt-[14px] mb-[25px] max-xl:flex-wrap">
                    <div class="flex flex-col gap-[8px] flex-1 max-xl:flex-auto">
                        <p class="text-[25px] text-gray-800 dark:text-white font-semibold mb-[16px]"> Address </p>
                        <div class="mb-[10px] flex items-center">
                            <p class="font-bold m-0"> Street</p>
                            <p class="font-medium m-0 ml-[10px]">
                                <span class="underline-text">{{$partner_address->street ?? '-'}}</span>
                            </p>
                        </div>

                        <div class="mb-[10px] flex items-center">
                            <p class="font-bold m-0"> Zip code</p>
                            <p class="font-medium m-0 ml-[10px]">
                                <span class="underline-text">{{$partner_address->zip_code  ?? '-'}}</span>
                            </p>
                        </div>

                        <div class="mb-[10px] flex items-center">
                            <p class="font-bold m-0"> City</p>
                            <p class="font-medium m-0 ml-[10px]">
                                <span class="underline-text">{{$partner_address->city  ?? '-'}}</span>
                            </p>
                        </div>


                        <div class="mb-[10px] flex items-center">
                            <p class="font-bold m-0"> Country</p>
                            <p class="font-medium m-0 ml-[10px]">
                                <span class="underline-text">{{$partner_address->country  ?? '-'}}</span>
                            </p>
                        </div>


                        <div class="mb-[10px] flex items-center">
                            <p class="font-bold m-0"> State</p>
                            <p class="font-medium m-0 ml-[10px]">
                                <span class="underline-text">{{$partner_address->state  ?? '-'}}</span>
                            </p>
                        </div>

                    </div>

                    <div class="flex flex-col gap-[8px] flex-1 max-xl:flex-auto">
                        <p class="text-[25px] text-gray-800 dark:text-white font-semibold mb-[16px]"> Company
                            Detail </p>
                        <div class="mb-[10px] flex items-center">
                            <p class="font-bold m-0"> Company</p>
                            <p class="font-medium m-0 ml-[10px]">
                                <span class="underline-text">{{$partner_address->company  ?? '-'}}</span>
                            </p>
                        </div>

                        <div class="mb-[10px] flex items-center">
                            <p class="font-bold m-0"> ID </p>
                            <p class="font-medium m-0 ml-[10px]">
                                <span class="underline-text">{{$partner_address->company_id  ?? '-'}}</span>
                            </p>
                        </div>


                        <div class="mb-[10px] flex items-center">
                            <p class="font-bold m-0"> Telephone</p>
                            <p class="font-medium m-0 ml-[10px]">
                                <span class="underline-text">{{$partner_address->telephone  ?? '-'}}</span>
                            </p>
                        </div>

                        <div class="mb-[10px] flex items-center gap-[10px]">
                            <p class="font-bold m-0"> Mobile</p>
                            <p class="font-medium m-0 ml-[10px]">
                                <span class="underline-text">{{$partner_address->mobile  ?? '-'}}</span>
                            </p>
                            @if($partner_address->mobile)
                                <a href="https://wa.me/{{$partner_address->mobile}}" target="_blank"
                                   class="primary-button h-[30px] flex items-center justify-center text-sm">
                                    Send WhatsApp
                                </a>
                            @endif
                        </div>



                        <div class="mb-[10px] flex items-center">
                            <p class="font-bold m-0"> Email</p>
                            <p class="font-medium m-0 ml-[10px]">
                                <span class="underline-text">{{$partner_address->email  ?? '-'}}</span>
                            </p>
                        </div>


                    </div>
                </div>
            @endforeach


        </div>
    </section>
    {{-- Page Content --}}
</x-shop::layouts>

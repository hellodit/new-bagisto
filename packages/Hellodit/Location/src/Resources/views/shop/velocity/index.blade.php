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

    <section class="pt-[25px]" id="product_location">
        <div class="container">
            <div class="grid grid-cols-2 gap-4 mt-[14px] mb-[25px] max-xl:flex-wrap">

            </div>
        </div>
    </section>
    {{-- Page Content --}}
</x-shop::layouts>

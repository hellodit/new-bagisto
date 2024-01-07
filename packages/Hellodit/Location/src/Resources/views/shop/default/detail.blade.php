<x-shop::layouts>
    {{-- Page Title --}}
    <x-slot:title>
        {{ $location->name ?? '' }}
    </x-slot:title>
    <section class="mx-auto bg-lightOrange">
        <div class="container">
            <div class="items-start gap-10 pt-[28px] pb-[21px]">
                <div class="flex justify-between  ">
                    <div class="flex flex-col flex-1 ">
                        <p class="text-[20px] text-gray-800 dark:text-white font-bold">
                            {{$location->name}}
                        </p>
                        <p>
                            {{$location->description}}
                        </p>
                    </div>
                    <div class="flex flex-col flex-1 items-end justify-center">
                        <img class='w-[25%]' src="{{$location->imageAssets()}}" alt="">
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

<x-shop::layouts>
    <x-slot:title>
        All Locations
    </x-slot:title>


    <section class="mx-auto">
        <div class="container">
            <div class="mt-5 text-center mb-2">
                <h2 class="font-medium text-gray-800 text-[25px]">All Locations</h2>
            </div>

            <div
                class="grid grid-cols-3 gap-8 mt-[30px] max-sm:mt-[20px] max-1060:grid-cols-2 max-sm:gap-[16px]">
                @foreach($locations as $location)
                    <div class="grid gap-2.5 content-start w-full relative">
                        <a href="{{ route('shop.location.detail', ['slug' => $location->slug]) }}"
                           class="p-4 flex flex-col items-center justify-center  rounded-md  transition">
                            <img src="{{ $location->imageAssets() }}" alt="{{ $location->name }}"
                                 class="w-[50%]  rounded-md">
                            <p class="mt-2 text-center text-gray-800">{{ $location->name }}</p>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    </section>


</x-shop::layouts>

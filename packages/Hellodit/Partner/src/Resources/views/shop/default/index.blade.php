<x-shop::layouts>
    {{-- Page Title --}}
    <x-slot:title>
        All Partner
    </x-slot:title>
    <section class="mx-auto">
        <div class="container">
            <div class="mt-5 text-center mb-5">
                <h2 class="font-medium text-gray-800 text-[25px]" style="font-size: x-large;">All Partner</h2>
            </div>
            <div class="flex flex-col">
                @foreach($locations as $location)
                    <div class="mb-3">
                        <h3 class="font-medium text-gray-800 mb-3" style="font-size: medium;" >{{$location->name}}</h3>
                        <div class="grid grid-cols-3 gap-8 mt-[30px] max-sm:mt-[20px] max-1060:grid-cols-2 max-sm:gap-[16px]">
                            @foreach($location->partner_address as $address)
                                <div class="grid gap-2.5 content-start w-full relative">
                                    {{$address->partner->name}}
                                    <a href="{{route('shop.partner.detail',['id' => $address->partner->id])}}"
                                       class="">
                                        <img src="{{$address->partner->imageAssets()}}" alt="Image 1" class="w-[50%]">
                                        <p class="mt-2 text-gray-800 ">{{$address->partner->title}}</p>
                                    </a>
                                </div>

                            @endforeach
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </section>

</x-shop::layouts>

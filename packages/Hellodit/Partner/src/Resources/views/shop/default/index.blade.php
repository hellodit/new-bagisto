<x-shop::layouts>
    {{-- Page Title --}}
    <x-slot:title>
        All Partner
    </x-slot:title>
    <section class="mx-auto">
        <div class="container">
            <div class="mt-5 text-center mb-5">
                <h2 class="font-medium text-gray-800" style="font-size: x-large;">All Partner</h2>
            </div>
            <div class="flex flex-col">
                @foreach($locations as $location)
                    <div class="mb-3">
                        <h3 class="font-medium text-gray-800 mb-3" style="font-size: medium;">{{$location->name}}</h3>
                        <div class="grid grid-cols-3 gap-3 items-center justify-center">
                            @foreach($location->partner_address as $address)
                                {{$address->partner->name}}
                                <a href="{{route('shop.partner.detail',['id' => $address->partner->id])}}"
                                   class="">
                                    <img src="{{$address->partner->imageAssets()}}" alt="Image 1" class="w-[50%]">
                                    <p class="mt-2 text-gray-800 ">{{$address->partner->title}}</p>
                                </a>
                            @endforeach
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </section>

</x-shop::layouts>

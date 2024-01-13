<x-shop::layouts>
    <x-slot:title>
        Users Product
    </x-slot:title>
    <section class="mx-auto">
        <div class="container">
            <div class="mt-5 text-center mb-2">
                <h2 class="font-medium text-gray-800" style="font-size: x-large">All Locations</h2>
            </div>

            <div class="grid grid-cols-3 gap-3">
                @foreach($locations as $location)
                    <a href="{{route('shop.customer_product.information',['user_id' => $location->id])}}"
                       class="p-4 flex flex-col items-center justify-center">
                        <img src="{{$location->imageAssets()}}" alt="Image 1" class="w-[50%]">
                        <p class="mt-2 text-center text-gray-800">{{$location->name}}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

</x-shop::layouts>

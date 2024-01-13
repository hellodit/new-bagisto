<x-shop::layouts>
    <x-slot:title>
        Users Product
    </x-slot:title>
    <section class="mx-auto">
        <div class="container">
            <div class="mt-5 text-center mb-2">
                <h2 class="font-medium text-gray-800" style="font-size: x-large">All Users Product</h2>
            </div>

            <div class="grid grid-cols-3 gap-3">
                @foreach($customers as $customer)
                    <a href="{{route('shop.customer_product.information',['user_id' => $customer->id])}}"
                       class="p-4 flex flex-col items-center justify-center">
                        <img src="{{$customer->image_url}}" alt="Image 1" class="w-[50%]">
                        <p class="mt-2 text-center text-gray-800">{{$customer->firt_name." ".$customer->last_name}}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

</x-shop::layouts>

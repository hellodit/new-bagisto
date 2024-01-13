<x-shop::layouts>
    {{-- Page Title --}}
    <x-slot:title>
        {{ $partner->title ?? 'Partners' }}
    </x-slot:title>
    <section class="mx-auto">
        <div class="container">
            <div class="mt-5">
                <h2 class="text-2xl font-medium text-gray-800">All Partner</h2>
            </div>

            <div class="grid grid-cols-3 gap-3">
                @foreach($partners as $partner)
                    <a href="{{route('shop.partner.detail',['id' => $partner->id])}}"
                       class="p-4 flex flex-col items-center justify-center">
                        <img src="{{$partner->imageAssets()}}" alt="Image 1" class="w-[50%]">
                        <p class="mt-2 text-center text-gray-800">{{$partner->title}}</p>
                    </a>
                @endforeach
            </div>

        </div>
    </section>

</x-shop::layouts>

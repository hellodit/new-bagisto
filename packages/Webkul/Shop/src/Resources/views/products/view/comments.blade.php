
@foreach($product->reviews->where('status','approved') as $review)
    <div class="flex gap-[20px] p-[25px] border border-[#e5e5e5] rounded-[12px] max-sm:flex-wrap max-xl:mb-[20px]">


        <div class="w-full">
            <div class="flex justify-between">
                <p
                    class="text-[20px] font-medium max-sm:text-[16px]"
                >
                    {{$review->name}}
                </p>

            </div>

            <p
                class="mt-[10px] text-[14px] font-medium max-sm:text-[12px]"
            >
                {{$review->created_at}}
            </p>

            <p
                class="mt-[20px] text-[16px] text-[#6E6E6E] font-semibold max-sm:text-[12px]"
            >
                {{$review->title}}

            </p>

            <p
                class="mt-[20px] text-[16px] text-[#6E6E6E] max-sm:text-[12px]"
            >
                {{$review->comment}}

            </p>

            <div class="flex gap-2 flex-wrap mt-2">



            </div>
        </div>
    </div>

@endforeach

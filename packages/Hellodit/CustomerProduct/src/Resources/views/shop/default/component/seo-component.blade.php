<div class="relative rounded-[4px] ">
    <div class="mb-[10px]">
        <label for="meta_title"
               class="block mb-15px mt-30px text-16px">Meta
            Title</label>
        <textarea
            type="textarea"
            name="meta_title"
            class="w-full mb-3 py-2 px-3 shadow border rounded text-14px text-gray-600 transition-all hover:border-gray-400 focus:border-gray-400"
            id="meta_title">{{$product->meta_title}}</textarea></div>

    <div class="mb-[10px]">
        <label for="meta_keywords"
               class="block mb-15px mt-30px text-16px">Meta
            Keywords</label>
        <textarea
            type="textarea"
            name="meta_keywords"
            class="w-full mb-3 py-2 px-3 shadow border rounded text-14px text-gray-600 transition-all hover:border-gray-400 focus:border-gray-400"
            id="meta_keywords">{{$product->meta_keywords}}</textarea>
        <!---->
    </div>

    <div class="mb-[10px]">
        <label for="meta_keywords"
               class="block mb-15px mt-30px text-16px">Meta
            Description</label>
        <textarea
            type="textarea"
            name="meta_description"
            class="w-full mb-3 py-2 px-3 shadow border rounded text-14px text-gray-600 transition-all hover:border-gray-400 focus:border-gray-400"
            id="meta_description">{{$product->meta_description}}</textarea>
    </div>
</div>

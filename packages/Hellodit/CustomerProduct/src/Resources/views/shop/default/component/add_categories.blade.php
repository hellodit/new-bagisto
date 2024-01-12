<div class="mb-3">
    <p class="text-16px text-gray-800 dark:text-white font-semibold mb-15px"> Categories </p>
    @foreach($categories as $category)
        <div class="flex items-center mb-1">
            <label class="inline-flex gap-[10px] w-max p-[6px] items-center cursor-pointer select-none group"
                   for="category_{{$category->category_id}}">
                <input class="" type="checkbox" id="category_{{$category->category_id}}" name="categories[]"
                       value="{{$category->category_id}}" {{in_array($category->category_id, $ids) ? 'checked' : ''}}>
                <div
                    class="text-[14px] text-gray-600 dark:text-gray-300 cursor-pointer hover:text-gray-800 dark:hover:text-white">
                    {{$category->name}}
                </div>
            </label>
        </div>
    @endforeach

</div>

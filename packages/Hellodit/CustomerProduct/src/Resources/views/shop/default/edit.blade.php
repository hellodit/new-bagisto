<x-shop::layouts.account>
    {{-- Page Title --}}
    <x-slot:title>
        Create Customer Product
    </x-slot:title>


    <style>
        <
        link href

        =
        "https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
        rel

        =
        "stylesheet"
        /
        >
    </style>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>

        $(document).ready(function () {
            $('.js-example-basic-single').select2();
        });
    </script>

    <div class="flex justify-between items-center">
        <div class="">
            <h2 class="text-[26px] font-medium">
                Update Product SKU: {{$product->sku}}
            </h2>
        </div>
    </div>
    <div class="flex gap-[10px] mt-[14px] max-xl:flex-wrap">
        <div class="flex flex-col gap-[8px] flex-1 max-xl:flex-auto  ">
            <form method="post" action="{{ route('shop.customer_product.update',['id' => $product->id]) }}"
                  class="rounded mt-[30px]" enctype="multipart/form-data">

                @csrf

                <div class="flex gap-10px mt-14px max-xl:flex-wrap">
                    <div class="flex flex-col gap-8px flex-1 max-xl:flex-auto">
                        <p class="text-16px text-gray-800 dark:text-white font-semibold mb-5px"> General Info</p>

                        <div class="mb-2">
                            <label for="image"
                                   class="block mb-15px mt-30px text-16px text-gray-800 dark:text-white required">Image</label>
                            <input type="file" name="images[files][]" id="image"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50"
                                   accept="image/*"
                                   multiple>
                        </div>

                        <ul class="mb-3">
                            <div class="flex gap-2">
                                @foreach($product->product->images as $images)
                                    <a href="{{Storage::url($images->path)}}">
                                        <img src="{{Storage::url($images->path)}}" class="w-[200px] h-[200px] w-fit"
                                             alt="">
                                    </a>
                                @endforeach
                            </div>
                        </ul>


                        {{--                        @include('customerproduct::shop.default.edit.categories')--}}
                        {{--                        @include('customerproduct::shop.default.edit.videos')--}}
                        {{--                        @include('customerproduct::shop.default.edit.images')--}}

                        <div class="mb-2">
                            <label for="location_id"
                                   class="block mb-15px mt-30px text-16px text-gray-800 dark:text-white required">Location</label>
                            <select name="location_id" id="location_id"
                                    class="custom-select block w-full py-2 px-3 shadow bg-white border border-[#E9E9E9] rounded-lg text-[16px] transition-all hover:border-gray-400 focus:border-gray-400">
                                @foreach(\Hellodit\Location\Models\Location::all() as $location)
                                    <option
                                            value="{{ $location->id }}" {{ $location->id == $product->location_id ? 'selected' : '' }}>{{ $location->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-2">
                            <label for="sku"
                                   class="block mb-15px mt-30px text-16px text-gray-800 dark:text-white required">SKU</label>
                            <input type="text" name="sku" id="sku" value="{{ old('sku') ?? $product->sku }}"
                                   class="w-full mb-3 py-2 px-3 shadow border rounded text-[14px] text-gray-600 transition-all hover:border-gray-400 focus:border-gray-400"
                                   required placeholder="Product SKU">
                        </div>

                        <div class="mb-2">
                            <label for="name"
                                   class="block mb-15px mt-30px text-16px text-gray-800 dark:text-white required">Product
                                Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') ?? $product->name }}"
                                   class="w-full mb-3 py-2 px-3 shadow border rounded text-[14px] text-gray-600 transition-all hover:border-gray-400 focus:border-gray-400"
                                   required placeholder="Product Name">
                        </div>

                        <div class="mb-2">
                            <label for="short_description"
                                   class="block mb-15px mt-30px text-16px text-gray-800 dark:text-white required">Short
                                Description</label>
                            <textarea name="short_description" id="short_description"
                                      class="w-full mb-3 py-2 px-3 shadow border rounded text-14px text-gray-600 transition-all hover:border-gray-400 focus:border-gray-400"
                                      required
                                      placeholder="Short Description">{{ old('short_description') ?? $product->short_description }}</textarea>
                        </div>

                        <div class="mb-2">
                            <label for="description"
                                   class="block mb-15px mt-30px text-16px text-gray-800 dark:text-white required">Description</label>

                            <textarea name="description" id="description"
                                      class="w-full mb-3 py-2 px-3 shadow border rounded text-14px text-gray-600 transition-all hover:border-gray-400 focus:border-gray-400"
                                      required
                                      cols="30" rows="10"
                                      placeholder="Description">{{ old('description') ?? $product->description }}</textarea>
                        </div>


                        <div class="flex gap-[10px] mt-[14px] max-xl:flex-wrap">
                            @foreach ($product->attribute_family->attribute_groups->groupBy('column') as $column => $groups)
                                <div

                                        @if ($column == 1) class="flex flex-col gap-[8px] flex-1 max-xl:flex-auto"
                                        @endif
                                        @if ($column == 2) class="flex flex-col gap-[8px] w-[360px] max-w-full max-sm:w-full" @endif
                                >
                                    @foreach ($groups->where('name','General') as $group)
                                        @php
                                            $customAttributes = $product->getEditableAttributes($group);
                                        @endphp


                                        <div
                                                class="relative p-[16px] bg-white dark:bg-gray-900 rounded-[4px] box-shadow">
                                            <p class="text-[16px] text-gray-800 dark:text-white font-semibold mb-[16px]">
                                                {{ $group->name }}
                                            </p>
                                            @foreach ($customAttributes->whereNotIn('code',['sku','product_number','name','url_key','meta_title',
                                                        'meta_keywords','meta_description','description','short_description']) as $attribute)
                                                <x-admin::form.control-group>
                                                    <x-admin::form.control-group.label>
                                                        {{ $attribute->admin_name . ($attribute->is_required ? '*' : '') }}
                                                    </x-admin::form.control-group.label>
                                                    @include ('customerproduct::shop.default.edit.control_2', [
                                                        'attribute' => $attribute,
                                                        'product'   => $product,
                                                    ])
                                                </x-admin::form.control-group>

                                            @endforeach
                                        </div>
                                    @endforeach

                                </div>

                            @endforeach
                        </div>


                        @include('customerproduct::shop.default.component.add_categories',['categories' => $categories ,'ids' => $product->categories->pluck('id')->toArray()])
                        <p class="text-16px text-gray-800 dark:text-white font-semibold mb-5px"> Price Info </p>

                        <div class="mb-2">
                            <label for="price"
                                   class="block mb-15px mt-30px text-16px text-gray-800 dark:text-white required">Price</label>
                            <input type="number" name="price" id="price" value="{{ old('price') ?? $product->price }}"
                                   class="w-full mb-3 py-2 px-3 shadow border rounded text-[14px] text-gray-600 transition-all hover:border-gray-400 focus:border-gray-400"
                                   required placeholder="Product Price">
                        </div>


                        <p class="text-16px text-gray-800 dark:text-white font-semibold mb-15px"> Meta Description</p>
                        @include('customerproduct::shop.default.component.seo-component')

                        <div class="mb-3">
                            <label for="status"
                                   class="block mb-15px mt-30px text-16px text-gray-800 dark:text-white required">Status</label>
                            <select name="status" id="status"
                                    class="custom-select block w-full py-2 px-3 shadow bg-white border border-[#E9E9E9] rounded-lg text-[16px] transition-all hover:border-gray-400 focus:border-gray-400">
                                <option value="1" {{ old('status') ?? $product->status ? 'selected' : '' }}>Active
                                </option>
                                <option value="0" {{ old('status') ?? !$product->status ? 'selected' : '' }}>Inactive
                                </option>
                            </select>
                        </div>

                    </div>
                </div>

                <div class="grid gap-10px mt-5">
                    <div class="flex gap-16px justify-between items-center max-sm:flex-wrap">
                        <div class="flex gap-x-10px items-center">

                            <button type="submit" class="primary-button">
                                @lang('admin::app.catalog.products.edit.save-btn')
                            </button>
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>


</x-shop::layouts.account>

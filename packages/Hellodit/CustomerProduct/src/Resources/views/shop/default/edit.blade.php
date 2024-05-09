<x-shop::layouts.account>
    {{-- Page Title --}}
    <x-slot:title>
        Create Customer Product
    </x-slot:title>
    @push('styles')

        @bagistoVite([
          'src/Resources/assets/css/app.css',
          'src/Resources/assets/js/app.js'
        ], 'customer-product')

    @endpush

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

                        @include('customerproduct::shop.default.edit.images')

                        <div class="mb-2">
                            <label for="location_id"
                                   class="block mb-15px mt-30px text-16px  required">Lokasi Anda Kota/Kabupaten</label>
                            <select name="location_id" id="location_id"
                                    class="select2 custom-select block w-full py-2 px-3 shadow bg-white border border-[#E9E9E9] rounded-lg text-[16px] transition-all hover:border-gray-400 focus:border-gray-400">
                                @foreach(\Hellodit\Location\Models\Location::all() as $location)
                                    <option
                                        value="{{ $location->id }}" {{ $location->id == $product->location_id ? 'selected' : '' }}>{{ $location->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-2">

                            <input type="hidden" name="sku" id="sku" value="{{ old('sku') ?? $product->sku }}"
                                   class="w-full mb-3 py-2 px-3 shadow border rounded text-[14px] text-gray-600 transition-all hover:border-gray-400 focus:border-gray-400"
                                   required placeholder="Product SKU">
                        </div>

                        <div class="mb-2">
                            <label for="name"
                                   class="block mb-15px mt-30px text-16px  required">Nama Barang Gadaian
                                </label>
                            <input type="text" name="name" id="product_name" value="{{ old('name') ?? $product->name }}"
                                   class="w-full mb-3 py-2 px-3 shadow border rounded text-[14px] text-gray-600 transition-all hover:border-gray-400 focus:border-gray-400"
                                   required placeholder="Product Name">
                        </div>

                        <div class="mb-2">
                            <label for="short_description"
                                   class="block mb-15px mt-30px text-16px  required">Keterangan Barang Gadaian</label>
                            <textarea name="short_description" id="short_description"
                                      class="w-full mb-3 py-2 px-3 shadow border rounded text-14px text-gray-600 transition-all hover:border-gray-400 focus:border-gray-400"
                                      required
                                      placeholder="Short Description">{{ old('short_description') ?? $product->short_description }}</textarea>
                        </div>

                        <div class="mb-2">
                            <label for="description"
                                   class="block mb-15px mt-30px text-16px  required">Kelengkapan/Kelebihan & Kekurangan Barang Gadaian</label>

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
                                            class="relative bg-white  rounded-[4px]">
                                            <p class="text-[16px]  font-semibold mb-[16px]">
                                                {{ $group->name }}
                                            </p>
                                            @foreach ($customAttributes->whereNotIn('code',['sku','product_number','name','url_key','meta_title',
                                                        'meta_keywords','meta_description','description','short_description']) as $attribute)
                                                <x-admin::form.control-group>

                                                    <label class="block leading-[24px] text-[12px] font-medium">
                                                        {{ $attribute->admin_name . ($attribute->is_required ? '*' : '') }}
                                                    </label>


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


                        {{--                        @include('customerproduct::shop.default.component.add_categories',['categories' => $categories ,'ids' => $product->categories->pluck('id')->toArray()])--}}

                        @include('customerproduct::shop.default.edit.categories',['product' => $product])
                        <p class="text-16px text-gray-800  font-semibold mb-5px"> Jumlah Pinjaman (Rp) </p>

                        <div class="mb-2">
                            <label for="price"
                                   class="block mb-15px mt-30px text-16px text-gray-800  required">Nominal Pinjaman Yang Anda Ajukan</label>
                            <input type="text" name="price" id="product_price"
                                   value="{{ old('price') ?? number_format(floor($product->price), 0, ',', '.') }}"
                                   class="w-full mb-3 py-2 px-3 shadow border rounded text-[14px] text-gray-600 transition-all hover:border-gray-400 focus:border-gray-400"
                                   required placeholder="Product Price">
                        </div>


                        <p class="text-16px font-semibold mb-15px"> Keyword Search Engines</p>
                        {{--                        <x-admin::seo/>--}}

                        @include('customerproduct::shop.default.component.seo-component')

                        <div class="mb-2">
                            <p class="text-16px text-gray-800  font-semibold mb-3 ">Status Iklan Barang Gadai </p>

                            <!--Default checkbox-->
                            <div class="mb-[0.125rem] block min-h-[1.5rem] ps-[1.5rem]">
                                <input type="radio" name="status" id="product_hidden" value="0"
                                       @if($product->status == 0) checked @endif>

                                <label
                                    class="inline-block ps-[0.15rem] hover:cursor-pointer"
                                    for="checkboxDefault">
                                    Tidak Aktif
                                </label>
                            </div>

                            <!--Default checked checkbox-->
                            <div class="mb-[0.125rem] block min-h-[1.5rem] ps-[1.5rem]">
                                <input type="radio" name="status" id="product_visible" value="1"
                                       @if($product->status == 1) checked @endif>

                                <label
                                    class="inline-block ps-[0.15rem] hover:cursor-pointer"
                                    for="checkboxChecked">
                                    Aktif
                                </label>
                            </div>


                        </div>


                    </div>
                </div>

                <div class="grid gap-10px mt-5">
                    <div class="flex gap-16px justify-between items-center max-sm:flex-wrap">
                        <div class="flex gap-x-10px items-center">

                            <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                @lang('admin::app.catalog.products.edit.save-btn')
                            </button>
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>


    <script type="text/javascript">

        setTimeout(function () {
            console.log('Running custom script')
            let rupiah = document.getElementById("product_price");
            let product_name = document.getElementById("product_name");
            let meta_title = document.getElementById("meta_title");
            let meta_keywords = document.getElementById("meta_keywords");
            let meta_description = document.getElementById("meta_description");


            rupiah.addEventListener("keyup", function (e) {
                rupiah.value = formatRupiah(this.value, "");
            });

            product_name.addEventListener("change", function (e) {

                if (meta_title.value === '') {
                    meta_title.value = this.value;
                }
                if (meta_keywords.value === '') {
                    meta_keywords.value = this.value;
                }

                if (meta_description.value === '') {
                    meta_description.value = this.value;
                }

            });




            /* Fungsi formatRupiah */
            function formatRupiah(angka, prefix) {
                let number_string = angka.replace(/[^,\d]/g, "").toString(),
                    split = number_string.split(","),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                    separator = sisa ? "." : "";
                    rupiah += separator + ribuan.join(".");
                }

                rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
                return prefix == undefined ? rupiah : rupiah ? "" + rupiah : "";
            }

        }, 2500); // <-- time in milliseconds


    </script>


</x-shop::layouts.account>

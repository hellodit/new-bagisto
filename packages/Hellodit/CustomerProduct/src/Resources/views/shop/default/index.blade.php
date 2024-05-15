<x-shop::layouts.account>


    <x-slot:title>
        Iklan Anda
    </x-slot:title>

            @section('breadcrumbs')
{{--                <x-shop::breadcrumbs name="products"></x-shop::breadcrumbs>--}}
            @endSection

    <div class="">
        <div class="mb-2">
            <h2 class="text-[26px] font-medium">
                Iklan Anda
            </h2>
        </div>

        <v-create-product-form>

        </v-create-product-form>


    </div>



    {!! view_render_event('bagisto.shop.customers.account.products.list.before') !!}
    <x-shop::datagrid :isMultiRow="true" :src="route('shop.customer_product.index')">
        <template #header="{ columns, records, sortPage, selectAllRecords, applied, isLoading}">
            <template v-if="! isLoading">
                <div class="row grid grid-cols-3 items-center px-[10px] py-[10px] border-b-[1px] dark:border-gray-800 bg-gray-100">
                    <div
                        class="flex gap-[6px] items-center select-none"
                        v-for="(columnGroup, index) in [['name', 'sku', 'attribute_family'], ['base_image', 'price', 'quantity'], ['status', 'category_name', 'type']]"
                    >
                        <label
                            class="flex gap-[4px] items-center w-max cursor-pointer select-none"
                            for="mass_action_select_all_records"
                            v-if="! index"
                        >
                            <input
                                type="checkbox"
                                name="mass_action_select_all_records"
                                id="mass_action_select_all_records"
                                class="hidden peer"
                                :checked="['all', 'partial'].includes(applied.massActions.meta.mode)"
                                @change="selectAllRecords"
                            >

                            <span
                                class="icon-uncheckbox cursor-pointer rounded-[6px] text-[24px]"
                                :class="[
                                        applied.massActions.meta.mode === 'all' ? 'peer-checked:icon-checked peer-checked:text-blue-600' : (
                                            applied.massActions.meta.mode === 'partial' ? 'peer-checked:icon-checkbox-partial peer-checked:text-blue-600' : ''
                                        ),
                                    ]"
                            >
                                </span>
                        </label>

                        <p class="text-gray-600 dark:text-gray-300">
                            <span class="[&>*]:after:content-['_/_']">
                                <template v-for="(column, columnIndex) in columnGroup">
                                    <span
                                        class="after:content-[' '] last:after:content-[' ']"
                                        :class="{
                                            'text-gray-800 dark:text-white font-medium': applied.sort.column == column,
                                            'cursor-pointer hover:text-gray-800 dark:hover:text-white': columns.find(columnTemp => columnTemp.index === column)?.sortable,
                                        }"
                                        @click="
                                            columns.find(columnTemp => columnTemp.index === column)?.sortable ? sortPage(columns.find(columnTemp => columnTemp.index === column)): {}
                                        "
                                    >
                                        @{{ columns.find(columnTemp => columnTemp.index === column)?.label }} <br>
                                    </span>
                                </template>
                            </span>

                            <i
                                class="ltr:ml-[5px] rtl:mr-[5px] text-[16px] text-gray-800 dark:text-white align-text-bottom"
                                :class="[applied.sort.order === 'asc' ? 'icon-down-stat': 'icon-up-stat']"
                                v-if="columnGroup.includes(applied.sort.column)"
                            ></i>
                        </p>
                    </div>
                </div>
            </template>

            <template v-else>
                <x-admin::shimmer.datagrid.table.head :isMultiRow="true"></x-admin::shimmer.datagrid.table.head>
            </template>
        </template>

        <template #body="{ columns, records, setCurrentSelectionMode, applied, isLoading }">
            <template v-if="! isLoading">
                <div
                    class="row grid grid-cols-3 px-[16px] py-[10px] border-b-[1px] dark:border-gray-800 transition-all hover:bg-gray-50 dark:hover:bg-gray-950"
                    v-for="record in records"
                >
                    {{--                     Name, SKU, Attribute Family Columns--}}
                    <div class="flex gap-[6px]">
                        <input
                            type="checkbox"
                            :name="`mass_action_select_record_${record.product_id}`"
                            :id="`mass_action_select_record_${record.product_id}`"
                            :value="record.product_id"
                            class="hidden peer"
                            v-model="applied.massActions.indices"
                            @change="setCurrentSelectionMode"
                        >

                        <label
                            class="icon-uncheckbox rounded-[6px] text-[24px] cursor-pointer peer-checked:icon-checked peer-checked:text-blue-600"
                            :for="`mass_action_select_record_${record.product_id}`"
                        ></label>

                        <div class="flex flex-col gap-[6px]">
                            <p
                                class="text-[16px] text-gray-800 dark:text-white font-semibold"
                                v-text="record.name"
                            >
                            </p>

                            <p
                                class="text-gray-600 dark:text-gray-300"
                            >
                                @{{ "@lang('admin::app.catalog.products.index.datagrid.sku-value')".replace(':sku', record.sku) }}
                            </p>

                            <p
                                class="text-gray-600 dark:text-gray-300"
                            >
                                @{{ "@lang('admin::app.catalog.products.index.datagrid.attribute-family-value')
                                ".replace(':attribute_family', record.attribute_family) }}
                            </p>
                        </div>
                    </div>

                    {{--                     Image, Price, Id, Stock Columns--}}
                    <div class="flex gap-[6px] mb-3">
                        <div class="relative">
                            <template v-if="record.base_image">
                                <img
                                    class="min-h-[50px] min-w-[50px] max-h-[50px] max-w-[50px] rounded-[4px]"
                                    :src=`{{ Storage::url('') }}${record.base_image}`
                                />

                                <span
                                    class="absolute bottom-[1px] ltr:left-[1px] rtl:right-[1px] text-[12px] font-bold text-white bg-darkPink rounded-full px-[6px]"
                                    v-text="record.images_count"
                                >
                                </span>
                            </template>

                            <template v-else>
                                <div
                                    class="w-full h-[60px] max-w-[60px] max-h-[60px] relative border border-dashed border-gray-300 dark:border-gray-800 rounded-[4px] dark:invert dark:mix-blend-exclusion">
                                    <img src="{{ asset('/assets/svg/front.svg') }}">
                                </div>
                            </template>
                        </div>

                        <div class="flex flex-col gap-[6px]">
                            <p
                                class="text-[16px] text-gray-800 dark:text-white font-semibold"
                                v-text="record.price"
                            >
                            </p>

                            <!-- Parent Product Quantity -->
                            <div v-if="['configurable', 'bundle', 'grouped'].includes(record.type)">
                                <p class="text-gray-600 dark:text-gray-300">
                                    <span class="text-red-600" v-text="'N/A'"></span>
                                </p>
                            </div>

                            <div v-else>
                                <p
                                    class="text-gray-600 dark:text-gray-300"
                                    v-if="record.quantity > 0"
                                >
                                    <span class="text-green-600">
                                        @{{ "@lang('admin::app.catalog.products.index.datagrid.qty-value')".replace(':qty', record.quantity) }}
                                    </span>
                                </p>

                                {{--                                <p--}}
                                {{--                                    class="text-gray-600 dark:text-gray-300"--}}
                                {{--                                    v-else--}}
                                {{--                                >--}}
                                {{--                                    <span class="text-red-600">--}}
                                {{--                                        @lang('admin::app.catalog.products.index.datagrid.out-of-stock')--}}
                                {{--                                    </span>--}}
                                {{--                                </p>--}}
                            </div>

                            <p class="text-gray-600 dark:text-gray-300">
                                @{{ "@lang('admin::app.catalog.products.index.datagrid.id-value')".replace(':id',
                                record.product_id) }}
                            </p>
                        </div>
                    </div>

                    {{--                     Status, Category, Type Columns--}}
                    <div class="flex gap-x-[16px] justify-between items-center">
                        <div class="flex flex-col gap-[6px]">
                            <p :class="[record.status ? 'label-active-store': 'label-info-store']" style="">
                                @{{ record.status == 1 ? "@lang('admin::app.catalog.products.index.datagrid.active')" :
                                "@lang('admin::app.catalog.products.index.datagrid.disable')" }}
                            </p>

                            <p
                                class="text-gray-600 dark:text-gray-300"
                                v-text="record.category_name ?? 'N/A'"
                            >
                            </p>

                            <p
                                class="text-gray-600 dark:text-gray-300"
                                v-text="record.type"
                            >
                            </p>
                        </div>

                        <a :href=`{{ route('shop.customer_product.edit', '') }}/${record.product_id}`>
                            <span class="icon-cart text-[24px] ltr:ml-[4px] rtl:mr-[4px] p-[6px] rounded-[6px] cursor-pointer transition-all hover:bg-gray-200 dark:hover:bg-gray-800">
                            </span>
                        </a>
                        <a :href=`{{route('shop.product_or_category.index','')}}/${record.url_key}`>
                            <span class="icon-eye text-[24px] ltr:ml-[4px] rtl:mr-[4px] p-[6px] rounded-[6px] cursor-pointer transition-all hover:bg-gray-200 dark:hover:bg-gray-800">
                            </span>
                        </a>

                    </div>
                </div>
            </template>

            <template v-else>
                <x-admin::shimmer.datagrid.table.body :isMultiRow="true"></x-admin::shimmer.datagrid.table.body>
            </template>
        </template>

    </x-shop::datagrid>

    {!! view_render_event('bagisto.shop.customers.account.orders.list.after') !!}



    @include('customerproduct::shop.default.component.add_product_form')

</x-shop::layouts.account>

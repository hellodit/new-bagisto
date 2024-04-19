@pushOnce('scripts')

    <script type="text/x-template" id="v-create-product-form-template">
        <div>
            <!-- Product Create Button -->
            <button
                type="button"
                class="items-center gap-[15px] max-w-[200px] w-full pl-[12px]
                pr-[15px] py-[7px] rounded-lg bg-white border border-[#E9E9E9] text-[14px]
                transition-all hover:border-gray-400 focus:border-gray-400 bg-[#F1EADF]
                max-md:pr-[10px] max-md:pl-[10px] max-md:border-0 max-md:w-[110px] cursor-pointer"
                @click="$refs.productCreateModal.toggle()"
            >
                @lang('admin::app.catalog.products.index.create-btn')
            </button>

            <x-admin::form
                v-slot="{ meta, errors, handleSubmit }"
                as="div"
            >
                <form @submit="handleSubmit($event, create)">
                    <!-- Customer Create Modal -->
                    <x-shop::modal ref="productCreateModal">
                        <x-slot:header>
                            <!-- Modal Header -->
                            <p
                                class="text-[18px] text-gray-800 dark:text-white font-bold"
                                v-if="! attributes.length"
                            >
                                @lang('admin::app.catalog.products.index.create.title')
                            </p>

                            <p
                                class="text-[18px] text-gray-800 dark:text-white font-bold"
                                v-else
                            >
                                @lang('admin::app.catalog.products.index.create.configurable-attributes')
                            </p>
                        </x-slot:header>

                        <x-slot:content>
                            <!-- Modal Content -->
                            <div class="px-[16px] py-[10px] ">
                                <div v-show="! attributes.length">
                                    {!! view_render_event('bagisto.admin.catalog.products.create_form.general.controls.before') !!}

                                    <x-shop::form.control-group>
                                        <x-shop::form.control-group.label class="required text-left">
                                            @lang('admin::app.catalog.products.index.create.type')
                                        </x-shop::form.control-group.label>

                                        <x-shop::form.control-group.control
                                            type="select"
                                            name="type"
                                            rules="required"
                                            :label="trans('admin::app.catalog.products.index.create.type')"
                                        >
                                            <option value="simple" selected>Simple</option>
                                        </x-shop::form.control-group.control>

                                        <x-shop::form.control-group.error
                                            control-name="type"></x-shop::form.control-group.error>
                                    </x-shop::form.control-group>

                                    <x-shop::form.control-group>
                                        <x-shop::form.control-group.label class="required text-left">
                                            @lang('admin::app.catalog.products.index.create.family')
                                        </x-shop::form.control-group.label>

                                        <x-shop::form.control-group.control
                                            type="select"
                                            name="attribute_family_id"
                                            rules="required"
                                            :label="trans('admin::app.catalog.products.index.create.family')"
                                        >
                                            @foreach($families as $family)
                                                <option value="{{ $family->id }}">
                                                    {{ $family->name }}
                                                </option>
                                            @endforeach
                                        </x-shop::form.control-group.control>

                                        <x-shop::form.control-group.error
                                            control-name="attribute_family_id"></x-shop::form.control-group.error>
                                    </x-shop::form.control-group>

                                    <input type="hidden" name="type" value="simple">
                                    <x-shop::form.control-group class="mb-[10px]">

                                        <x-shop::form.control-group.control
                                            type="hidden"
                                            name="sku"
                                            value="{{\Illuminate\Support\Str::uuid()}}"
                                            ::rules="{ required: true, regex: /^[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+)*$/ }"
                                            :label="trans('admin::app.catalog.products.index.create.sku')"
                                        >
                                        </x-shop::form.control-group.control>

                                        <x-shop::form.control-group.error
                                            control-name="sku"></x-shop::form.control-group.error>
                                    </x-shop::form.control-group>

                                    {!! view_render_event('bagisto.admin.catalog.products.create_form.general.controls.before') !!}


                                    <div class="mb-[10px]">
                                        <label class="block mb-[15px] mt-[30px] text-[16px] required text-left">
                                            Location
                                        </label>
                                        <select required name="location_id" id="location_id" class="border border-red-500 custom-select block w-full py-2 px-3 shadow bg-white border border-[#E9E9E9] rounded-lg text-[16px] transition-all hover:border-gray-400 focus:border-gray-400 select2">
                                            @foreach(\Hellodit\Location\Models\Location::all() as $location)
                                                <option value="{{$location->id}}">{{$location->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div v-show="attributes.length">
                                    {!! view_render_event('bagisto.admin.catalog.products.create_form.attributes.controls.before') !!}

                                    <div
                                        class="mb-[10px]"
                                        v-for="attribute in attributes"
                                    >
                                        <label
                                            class="block leading-[24px] text-[12px] text-gray-800 dark:text-white font-medium">
                                            @{{ attribute.name }}
                                        </label>

                                        <div
                                            class="flex flex-wrap gap-[4px] min-h-[38px] p-[6px] border dark:border-gray-800 rounded-[6px]">
                                            <p
                                                class="flex items-center py-[3px] px-[8px] bg-gray-600 rounded-[4px] text-white font-semibold"
                                                v-for="option in attribute.options"
                                            >
                                                @{{ option.name }}

                                                <span
                                                    class="icon-cross text-white text-[18px] ltr:ml-[5px] rtl:mr-[5px] cursor-pointer"
                                                    @click="removeOption(option)"
                                                ></span>
                                            </p>
                                        </div>
                                    </div>

                                    {!! view_render_event('bagisto.admin.catalog.products.create_form.attributes.controls.before') !!}
                                </div>
                            </div>

                            <!-- Modal Submission -->
                            <div class="px-[16px] py-[10px]">
                                <button
                                    type="submit"
                                    class="items-center gap-[15px] max-w-[200px] w-full pl-[12px] pr-[15px] py-[7px] rounded-lg bg-white border border-[#E9E9E9] text-[14px] transition-all hover:border-gray-400 focus:border-gray-400 bg-[#F1EADF] max-md:pr-[10px] max-md:pl-[10px] max-md:border-0 max-md:w-[110px] cursor-pointer"
                                >
                                    @lang('admin::app.catalog.products.index.create.save-btn')
                                </button>
                            </div>
                        </x-slot:content>


                    </x-shop::modal>


                </form>
            </x-admin::form>
        </div>
    </script>

    <script type="module">
        app.component('v-create-product-form', {
            template: '#v-create-product-form-template',
            mounted() {
                this.$nextTick(function () {
                    // Code that will run only after the entire view has been rendered
                    $('.select2').select2({
                        placeholder: "Select Location"
                    });
                })
            },
            data() {
                return {
                    attributes: [],

                    superAttributes: {}
                };
            },

            methods: {
                create(params, {resetForm, resetField, setErrors}) {
                    this.attributes.forEach(attribute => {
                        params.super_attributes ||= {};

                        params.super_attributes[attribute.code] = this.superAttributes[attribute.code];
                    });

                    params.location_id = $('#location_id').val();

                    this.$axios.post("{{ route('shop.customer_product.store') }}", params)
                        .then((response) => {
                            if (response.data.data.redirect_url) {
                                window.location.href = response.data.data.redirect_url;
                            } else {
                                this.attributes = response.data.data.attributes;

                                this.setSuperAttributes();
                            }
                        })
                        .catch(error => {
                            setErrors(error.response.data.errors);
                        });
                },

                removeOption(option) {
                    this.attributes.forEach(attribute => {
                        attribute.options = attribute.options.filter(item => item.id != option.id);
                    });

                    this.attributes = this.attributes.filter(attribute => attribute.options.length > 0);

                    this.setSuperAttributes();
                },

                setSuperAttributes() {
                    this.superAttributes = {};

                    this.attributes.forEach(attribute => {
                        this.superAttributes[attribute.code] = [];

                        attribute.options.forEach(option => {
                            this.superAttributes[attribute.code].push(option.id);
                        });
                    });
                }
            }
        })

    </script>


    <script type="text/javascript">

    </script>
@endPushOnce

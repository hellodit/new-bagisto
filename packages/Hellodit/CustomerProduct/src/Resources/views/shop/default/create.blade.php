<x-shop::layouts.account>
    {{-- Page Title --}}
    <x-slot:title>
        @lang('shop::app.customers.account.products.create-title')
    </x-slot:title>


    <div class="flex justify-between items-center">
        <div class="">
            <h2 class="text-[26px] font-medium">
                @lang('shop::app.customers.account.products.create-title')
            </h2>
        </div>
    </div>
    <x-shop::form
        :action="route('shop.customers.account.profile.store')"
        class="rounded mt-[30px]"
        enctype="multipart/form-data"
    >
        <div class="flex gap-[10px] mt-[14px] max-xl:flex-wrap">
            <div class="flex flex-col gap-[8px] flex-1 max-xl:flex-auto  ">
                <p class="text-[16px] text-gray-800 dark:text-white font-semibold mb-[5px]"> General Info</p>

{{--  images here --}}

                @include('admin::catalog.products.edit.categories', ['product' => $product])

                <x-shop::form.control-group class="mb-2">
                    <x-shop::form.control-group.label class="required">
                        Image
                    </x-shop::form.control-group.label>
                    <x-shop::form.control-group.control
                        type="image"
                        name="sku"
                        :value="old('sku')"
                        rules="required"
                        label="Images"
                    ></x-shop::form.control-group.control>
                </x-shop::form.control-group>


                <x-shop::form.control-group class="mb-2">
                    <x-shop::form.control-group.label class="required">
                        Location
                    </x-shop::form.control-group.label>
                    <x-shop::form.control-group.control
                        type="select"
                        name="location_id"
                        :value="old('location_id')"
                        rules="required"
                        label="location"
                    >
                        @foreach(\Hellodit\Location\Models\Location::all() as $location)
                            <option value="{{$location->id}}">{{$location->name}}</option>
                        @endforeach
                    </x-shop::form.control-group.control>
                </x-shop::form.control-group>



                <x-shop::form.control-group class="mb-2">
                    <x-shop::form.control-group.label class="required">
                        SKU
                    </x-shop::form.control-group.label>
                    <x-shop::form.control-group.control
                        type="text"
                        name="sku"
                        :value="old('sku')"
                        rules="required"
                        label="SKU"
                        placeholder="Product SKU"
                    ></x-shop::form.control-group.control>
                </x-shop::form.control-group>
                <x-shop::form.control-group class="mb-2">
                    <x-shop::form.control-group.label class="required">
                        Product Name
                    </x-shop::form.control-group.label>
                    <x-shop::form.control-group.control
                        type="text"
                        name="product_name"
                        :value="old('product_name')"
                        rules="required"
                        label="Product Name"
                        placeholder="Product Name"
                    ></x-shop::form.control-group.control>
                </x-shop::form.control-group>
                <x-shop::form.control-group class="mb-2">
                    <x-shop::form.control-group.label class="required">
                        URL Key
                    </x-shop::form.control-group.label>
                    <x-shop::form.control-group.control
                        type="text"
                        name="url_key"
                        :value="old('url_key')"
                        rules="required"
                        label="Url Key"
                        placeholder="Url Key"
                    ></x-shop::form.control-group.control>
                </x-shop::form.control-group>
                <x-shop::form.control-group class="mb-2">
                    <x-shop::form.control-group.label class="required">
                        Short Description
                    </x-shop::form.control-group.label>
                    <x-shop::form.control-group.control
                        type="textarea"
                        name="short_description"
                        :value="old('short_description')"
                        rules="required"
                        label="Short Description"
                        placeholder="Short Description"
                    ></x-shop::form.control-group.control>
                </x-shop::form.control-group>
                <x-shop::form.control-group class="mb-2">
                    <x-shop::form.control-group.label class="required">
                        Description
                    </x-shop::form.control-group.label>
                    <x-shop::form.control-group.control
                        type="textarea"
                        name="description"
                        :value="old('description')"
                        rules="required"
                        label="Description"
                        placeholder="Short Description"
                    ></x-shop::form.control-group.control>
                </x-shop::form.control-group>


                <p class="text-[16px] text-gray-800 dark:text-white font-semibold mb-[5px]"> Price Info </p>
                <x-shop::form.control-group class="mb-2">
                    <x-shop::form.control-group.label class="required">
                        Price
                    </x-shop::form.control-group.label>
                    <x-shop::form.control-group.control
                        type="number"
                        name="price"
                        :value="old('price')"
                        rules="required|min:0"
                        label="Price"
                        placeholder="Product Price"
                    ></x-shop::form.control-group.control>

                </x-shop::form.control-group>


                <x-shop::form.control-group class="mb-2">
                    <x-shop::form.control-group.label class="required">
                        Status
                    </x-shop::form.control-group.label>
                    <x-shop::form.control-group.control
                        type="switch"
                        name="status"
                        :value="old('status')"
                        rules="required"
                        label="Status"
                        placeholder="Product Status"
                    ></x-shop::form.control-group.control>

                </x-shop::form.control-group>


            </div>

        </div>




        {{--        {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.before', ['customer' => $customer]) !!}--}}

        {{--        <x-shop::form.control-group class="mt-[15px]">--}}
        {{--            <x-shop::form.control-group.control--}}
        {{--                type="image"--}}
        {{--                name="image[]"--}}
        {{--                class="!p-0 rounded-[12px] text-gray-700 mb-0"--}}
        {{--                :label="trans('Image')"--}}
        {{--                :is-multiple="false"--}}
        {{--                accepted-types="image/*"--}}
        {{--                :src="$customer->image_url"--}}
        {{--            >--}}
        {{--            </x-shop::form.control-group.control>--}}

        {{--            <x-shop::form.control-group.error--}}
        {{--                control-name="image[]"--}}
        {{--            >--}}
        {{--            </x-shop::form.control-group.error>--}}
        {{--        </x-shop::form.control-group>--}}

        {{--        {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.image.after') !!}--}}

        {{--        <x-shop::form.control-group class="mb-4">--}}
        {{--            <x-shop::form.control-group.label class="required">--}}
        {{--                @lang('shop::app.customers.account.profile.first-name')--}}
        {{--            </x-shop::form.control-group.label>--}}

        {{--            <x-shop::form.control-group.control--}}
        {{--                type="text"--}}
        {{--                name="first_name"--}}
        {{--                :value="old('first_name') ?? $customer->first_name"--}}
        {{--                rules="required"--}}
        {{--                :label="trans('shop::app.customers.account.profile.first-name')"--}}
        {{--                :placeholder="trans('shop::app.customers.account.profile.first-name')"--}}
        {{--            >--}}
        {{--            </x-shop::form.control-group.control>--}}

        {{--            <x-shop::form.control-group.error--}}
        {{--                control-name="first_name"--}}
        {{--            >--}}
        {{--            </x-shop::form.control-group.error>--}}
        {{--        </x-shop::form.control-group>--}}

        {{--        {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.first_name.after') !!}--}}

        {{--        <x-shop::form.control-group class="mb-4">--}}
        {{--            <x-shop::form.control-group.label class="required">--}}
        {{--                @lang('shop::app.customers.account.profile.last-name')--}}
        {{--            </x-shop::form.control-group.label>--}}

        {{--            <x-shop::form.control-group.control--}}
        {{--                type="text"--}}
        {{--                name="last_name"--}}
        {{--                :value="old('last_name') ?? $customer->last_name"--}}
        {{--                rules="required"--}}
        {{--                :label="trans('shop::app.customers.account.profile.last-name')"--}}
        {{--                :placeholder="trans('shop::app.customers.account.profile.last-name')"--}}
        {{--            >--}}
        {{--            </x-shop::form.control-group.control>--}}

        {{--            <x-shop::form.control-group.error--}}
        {{--                control-name="last_name"--}}
        {{--            >--}}
        {{--            </x-shop::form.control-group.error>--}}
        {{--        </x-shop::form.control-group>--}}

        {{--        {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.last_name.after') !!}--}}

        {{--        <x-shop::form.control-group class="mb-4">--}}
        {{--            <x-shop::form.control-group.label class="required">--}}
        {{--                @lang('shop::app.customers.account.profile.email')--}}
        {{--            </x-shop::form.control-group.label>--}}

        {{--            <x-shop::form.control-group.control--}}
        {{--                type="text"--}}
        {{--                name="email"--}}
        {{--                :value="old('email') ?? $customer->email"--}}
        {{--                rules="required|email"--}}
        {{--                :label="trans('shop::app.customers.account.profile.email')"--}}
        {{--                :placeholder="trans('shop::app.customers.account.profile.email')"--}}
        {{--            >--}}
        {{--            </x-shop::form.control-group.control>--}}

        {{--            <x-shop::form.control-group.error--}}
        {{--                control-name="email"--}}
        {{--            >--}}
        {{--            </x-shop::form.control-group.error>--}}
        {{--        </x-shop::form.control-group>--}}

        {{--        {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.email.after') !!}--}}

        {{--        <x-shop::form.control-group class="mb-4">--}}
        {{--            <x-shop::form.control-group.label class="required">--}}
        {{--                @lang('shop::app.customers.account.profile.phone')--}}
        {{--            </x-shop::form.control-group.label>--}}

        {{--            <x-shop::form.control-group.control--}}
        {{--                type="text"--}}
        {{--                name="phone"--}}
        {{--                :value="old('phone') ?? $customer->phone"--}}
        {{--                rules="required|phone"--}}
        {{--                :label="trans('shop::app.customers.account.profile.phone')"--}}
        {{--                :placeholder="trans('shop::app.customers.account.profile.phone')"--}}
        {{--            >--}}
        {{--            </x-shop::form.control-group.control>--}}

        {{--            <x-shop::form.control-group.error--}}
        {{--                control-name="phone"--}}
        {{--            >--}}
        {{--            </x-shop::form.control-group.error>--}}
        {{--        </x-shop::form.control-group>--}}

        {{--        {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.phone.after') !!}--}}

        {{--        <x-shop::form.control-group class="mb-4">--}}
        {{--            <x-shop::form.control-group.label class="required">--}}
        {{--                @lang('shop::app.customers.account.profile.gender')--}}
        {{--            </x-shop::form.control-group.label>--}}

        {{--            <x-shop::form.control-group.control--}}
        {{--                type="select"--}}
        {{--                name="gender"--}}
        {{--                :value="old('gender') ?? $customer->gender"--}}
        {{--                class="mb-3"--}}
        {{--                rules="required"--}}
        {{--                aria-label="Select Gender"--}}
        {{--                :label="trans('shop::app.customers.account.profile.gender')"--}}
        {{--            >--}}
        {{--                <option value="Other">@lang('shop::app.customers.account.profile.other')</option>--}}
        {{--                <option value="Male">@lang('shop::app.customers.account.profile.male')</option>--}}
        {{--                <option value="Female">@lang('shop::app.customers.account.profile.female')</option>--}}
        {{--            </x-shop::form.control-group.control>--}}

        {{--            <x-shop::form.control-group.error--}}
        {{--                control-name="gender"--}}
        {{--            >--}}
        {{--            </x-shop::form.control-group.error>--}}
        {{--        </x-shop::form.control-group>--}}

        {{--        {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.gender.after') !!}--}}

        {{--        <x-shop::form.control-group class="mb-4">--}}
        {{--            <x-shop::form.control-group.label>--}}
        {{--                @lang('shop::app.customers.account.profile.dob')--}}
        {{--            </x-shop::form.control-group.label>--}}

        {{--            <x-shop::form.control-group.control--}}
        {{--                type="date"--}}
        {{--                name="date_of_birth"--}}
        {{--                :value="old('date_of_birth') ?? $customer->date_of_birth"--}}
        {{--                :label="trans('shop::app.customers.account.profile.dob')"--}}
        {{--                :placeholder="trans('shop::app.customers.account.profile.dob')"--}}
        {{--            >--}}
        {{--            </x-shop::form.control-group.control>--}}

        {{--            <x-shop::form.control-group.error--}}
        {{--                control-name="date_of_birth"--}}
        {{--            >--}}
        {{--            </x-shop::form.control-group.error>--}}
        {{--        </x-shop::form.control-group>--}}

        {{--        {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.date_of_birth.after') !!}--}}

        {{--        <x-shop::form.control-group class="mb-4">--}}
        {{--            <x-shop::form.control-group.label>--}}
        {{--                @lang('shop::app.customers.account.profile.current-password')--}}
        {{--            </x-shop::form.control-group.label>--}}

        {{--            <x-shop::form.control-group.control--}}
        {{--                type="password"--}}
        {{--                name="current_password"--}}
        {{--                value=""--}}
        {{--                :label="trans('shop::app.customers.account.profile.current-password')"--}}
        {{--                :placeholder="trans('shop::app.customers.account.profile.current-password')"--}}
        {{--            >--}}
        {{--            </x-shop::form.control-group.control>--}}

        {{--            <x-shop::form.control-group.error--}}
        {{--                control-name="current_password"--}}
        {{--            >--}}
        {{--            </x-shop::form.control-group.error>--}}
        {{--        </x-shop::form.control-group>--}}

        {{--        {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.old_password.after') !!}--}}

        {{--        <x-shop::form.control-group class="mb-4">--}}
        {{--            <x-shop::form.control-group.label>--}}
        {{--                @lang('shop::app.customers.account.profile.new-password')--}}
        {{--            </x-shop::form.control-group.label>--}}

        {{--            <x-shop::form.control-group.control--}}
        {{--                type="password"--}}
        {{--                name="new_password"--}}
        {{--                value=""--}}
        {{--                :label="trans('shop::app.customers.account.profile.new-password')"--}}
        {{--                :placeholder="trans('shop::app.customers.account.profile.new-password')"--}}
        {{--            >--}}
        {{--            </x-shop::form.control-group.control>--}}

        {{--            <x-shop::form.control-group.error--}}
        {{--                control-name="new_password"--}}
        {{--            >--}}
        {{--            </x-shop::form.control-group.error>--}}
        {{--        </x-shop::form.control-group>--}}

        {{--        {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.new_password.after') !!}--}}

        {{--        <x-shop::form.control-group class="mb-4">--}}
        {{--            <x-shop::form.control-group.label>--}}
        {{--                @lang('shop::app.customers.account.profile.confirm-password')--}}
        {{--            </x-shop::form.control-group.label>--}}

        {{--            <x-shop::form.control-group.control--}}
        {{--                type="password"--}}
        {{--                name="new_password_confirmation"--}}
        {{--                value=""--}}
        {{--                rules="confirmed:@new_password"--}}
        {{--                :label="trans('shop::app.customers.account.profile.confirm-password')"--}}
        {{--                :placeholder="trans('shop::app.customers.account.profile.confirm-password')"--}}
        {{--            >--}}
        {{--            </x-shop::form.control-group.control>--}}

        {{--            <x-shop::form.control-group.error--}}
        {{--                control-name="new_password_confirmation"--}}
        {{--            >--}}
        {{--            </x-shop::form.control-group.error>--}}
        {{--        </x-shop::form.control-group>--}}

        {{--        {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.new_password_confirmation.after') !!}--}}

        {{--        <div class="select-none items-center flex gap-[6px] mb-4">--}}
        {{--            <input--}}
        {{--                type="checkbox"--}}
        {{--                name="subscribed_to_news_letter"--}}
        {{--                id="is-subscribed"--}}
        {{--                class="hidden peer"--}}
        {{--            />--}}

        {{--            <label--}}
        {{--                class="icon-uncheck text-[24px] text-navyBlue peer-checked:icon-check-box peer-checked:text-navyBlue cursor-pointer"--}}
        {{--                for="is-subscribed"--}}
        {{--            ></label>--}}

        {{--            <label--}}
        {{--                class="text-[16] text-[#6E6E6E] max-sm:text-[12px] pl-0 select-none cursor-pointer"--}}
        {{--                for="is-subscribed"--}}
        {{--            >--}}
        {{--                @lang('shop::app.customers.account.profile.subscribe-to-newsletter')--}}
        {{--            </label>--}}
        {{--        </div>--}}

        {{--        <button--}}
        {{--            type="submit"--}}
        {{--            class="primary-button block m-0 w-max py-[11px] px-[43px] rounded-[18px] text-base text-center"--}}
        {{--        >--}}
        {{--            @lang('shop::app.customers.account.profile.save')--}}
        {{--        </button>--}}

        {{--        {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.after', ['customer' => $customer]) !!}--}}

    </x-shop::form>


</x-shop::layouts.account>

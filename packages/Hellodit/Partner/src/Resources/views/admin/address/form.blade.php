@php
    $title = "Create Partner Address";
        $route = route('admin.partner_address.store');
        if (!empty($address)){
                $title = "Update Partner Address";

            $route = route('admin.partner_address.update',['partner' => $address->id]);
        }

@endphp

<x-admin::layouts>
    <x-slot:title>
        {{$title}}
    </x-slot:title>

    <x-admin::form action="{{ $route }}" enctype="multipart/form-data">

        @if($address)
            @method('PUT')
        @endif

        {!! view_render_event('admin.settings.channels.create.create_form_controls.before') !!}

        <div class="flex justify-between items-center">
            <p class="text-[20px] text-gray-800 dark:text-white font-bold">
                {{$title}}
            </p>

            <div class="flex gap-x-[10px] items-center">
                {{-- Cancel Button --}}
                <a
                    href="{{ route('admin.partner.index') }}"
                    class="transparent-button hover:bg-gray-200 dark:hover:bg-gray-800 dark:text-white"
                >
                    @lang('partner::app.admin.cancel')
                </a>

                {{-- Save Button --}}
                <button
                    type="submit"
                    class="primary-button"
                >
                    {{$title}}
                </button>
            </div>
        </div>

        {{-- body content --}}
        <div class="flex gap-[10px] mt-[14px] max-xl:flex-wrap">
            {{-- Left sub-component --}}
            <div class="flex flex-col gap-[8px] flex-1 max-xl:flex-auto">
                {{-- General Information --}}
                <div class="p-[16px] bg-white dark:bg-gray-900 rounded-[4px] box-shadow">
                    <p class="text-[16px] text-gray-800 dark:text-white font-semibold mb-[16px]">
                        @lang('admin::app.settings.channels.create.general')
                    </p>
                    <div class="mb-[10px]">


                        <div class="mb-10">
                            <label for="partner_id" class="block text-sm font-medium text-gray-700 required">
                                Partner
                            </label>

                            <select
                                name="partner_id"
                                id="partner_id"
                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md bg-white text-sm"
                                required
                            >
                                <option value="" disabled selected>
                                    Select a partner
                                </option>

                                @foreach(\Hellodit\Partner\Models\Partner::all() as $partner)
                                    <option
                                        value="{{ $partner->id }}" {{ $partner->id == $address?->partner_id ? 'selected' : '' }}>{{ $partner->title }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="grid grid-cols-2 gap-4 mt-[14px] max-xl:flex-wrap">

                            <div class="flex flex-col gap-[8px] flex-1 max-xl:flex-auto">
                                <p class="text-[16px] text-gray-800 dark:text-white font-semibold mb-[16px]">
                                    Compnay Detail </p>


                                <div class="mb-10">
                                    <label for="location_id" class="block text-sm font-medium text-gray-700 required">
                                        Location
                                    </label>

                                    <select
                                        name="location_id"
                                        id="location_id"
                                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md bg-white text-sm"
                                        required
                                    >
                                        <option value="" disabled selected>
                                            Select a Locations
                                        </option>

                                        @foreach(\Hellodit\Location\Models\Location::all() as $location)
                                            <option
                                                value="{{ $location->id }}" {{ $address?->location_id == $location->id ? 'selected' : '' }}>{{ $location->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <x-admin::form.control-group class="mb-[10px]">
                                    <x-admin::form.control-group.label class="required">
                                        Branches
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="company"
                                        :value="$address->company ?? old('company')"
                                        id="company"
                                        rules="required"
                                        :label="trans('partner::app.admin.create.company')"
                                        :placeholder="trans('partner::app.admin.create.company')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="company"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>
                                <x-admin::form.control-group class="mb-[10px]">
                                    <x-admin::form.control-group.label class="required">
                                        PIC
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="company_id"
                                        :value="$address->company_id ?? old('company_id')"
                                        id="company_id"
                                        rules="required"
                                        :label="trans('partner::app.admin.create.company_id')"
                                        :placeholder="trans('partner::app.admin.create.company_id')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="company_id"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>



                                <x-admin::form.control-group class="mb-[10px]">
                                    <x-admin::form.control-group.label class="required">
                                        Telephone
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="telephone"
                                        :value="$address->telephone ?? old('telephone')"
                                        id="telephone"
                                        rules="required"
                                        :label="trans('partner::app.admin.create.telephone')"
                                        :placeholder="trans('partner::app.admin.create.telephone')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="telephone"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>


                                <x-admin::form.control-group class="mb-[10px]">
                                    <x-admin::form.control-group.label class="required">
                                        Mobile
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="mobile"
                                        :value="$address->mobile ?? old('mobile')"
                                        id="mobile"
                                        rules="required"
                                        :label="trans('partner::app.admin.create.mobile')"
                                        :placeholder="trans('partner::app.admin.create.mobile')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="mobile"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>


                                <x-admin::form.control-group class="mb-[10px]">
                                    <x-admin::form.control-group.label class="required">
                                        Email
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="email"
                                        :value="$address->email ?? old('email')"
                                        id="email"
                                        rules="required"
                                        :label="trans('partner::app.admin.create.email')"
                                        :placeholder="trans('partner::app.admin.create.email')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="email"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>

                            </div>

                            <div class="flex flex-col gap-[8px] flex-1 max-xl:flex-auto">
                                <p class="text-[16px] text-gray-800 dark:text-white font-semibold mb-[16px]">
                                    Address </p>

                                <x-admin::form.control-group class="mb-[10px]">
                                    <x-admin::form.control-group.label class="required">
                                        Street
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="street"
                                        :value="$address->street ?? old('street')"
                                        id="street"
                                        rules="required"
                                        :label="trans('partner::app.admin.create.street')"
                                        :placeholder="trans('partner::app.admin.create.street')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="street"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>
                                <x-admin::form.control-group class="mb-[10px]">
                                    <x-admin::form.control-group.label class="required">

                                        Zip Code
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="zip_code"
                                        :value="$address->zip_code ?? old('zip_code')"
                                        id="zip_code"
                                        rules="required"
                                        :label="trans('partner::app.admin.create.zip_code')"
                                        :placeholder="trans('partner::app.admin.create.zip_code')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="zip_code"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>
                                <x-admin::form.control-group class="mb-[10px]">
                                    <x-admin::form.control-group.label class="required">
                                        City
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="city"
                                        :value="$address->city ?? old('city')"
                                        id="city"
                                        rules="required"
                                        :label="trans('partner::app.admin.create.city')"
                                        :placeholder="trans('partner::app.admin.create.city')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="city"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>

                                <x-admin::form.control-group class="mb-[10px]">
                                    <x-admin::form.control-group.label class="required">
                                        Province
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="state"
                                        :value="$address->state ?? old('state')"
                                        id="state"
                                        rules="required"
                                        :label="trans('partner::app.admin.create.state')"
                                        :placeholder="trans('partner::app.admin.create.state')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="state"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>


                                <x-admin::form.control-group class="mb-[10px]">
                                    <x-admin::form.control-group.label class="required">
                                        Country
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="country"
                                        :value="$address->country ?? old('country')"
                                        id="country"
                                        rules="required"
                                        :label="trans('partner::app.admin.create.country')"
                                        :placeholder="trans('partner::app.admin.create.country')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="country"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>

                            </div>
                        </div>


                    </div>
                </div>

            </div>

        </div>


    </x-admin::form>


</x-admin::layouts>

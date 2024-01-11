<x-admin::layouts>
    <x-slot:title>
        @lang('partner::app.admin.page-title')
    </x-slot:title>

    <x-admin::form action="{{ route('admin.partner.store') }}" enctype="multipart/form-data">

        {!! view_render_event('admin.settings.channels.create.create_form_controls.before') !!}

        <div class="flex justify-between items-center">
            <p class="text-[20px] text-gray-800 dark:text-white font-bold">
                @lang('partner::app.admin.create-title')
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
                    @lang('partner::app.admin.create-title')
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

                        <div class="mb-[10px]">
                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label>
                                    Logo Partner
                                </x-admin::form.control-group.label>

                                <x-admin::media.images
                                    name="image"
                                    width="500px"
                                >
                                </x-admin::media.images>
                            </x-admin::form.control-group>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mt-[14px] max-xl:flex-wrap">
                            <div class="flex flex-col gap-[8px] flex-1 max-xl:flex-auto">
                                <p class="text-[16px] text-gray-800 dark:text-white font-semibold mb-[16px]">
                                    Personal Data </p>

                                <x-admin::form.control-group class="mb-[10px]">
                                    <x-admin::form.control-group.label class="required">
                                        Language
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="language"
                                        :value="old('language')"
                                        id="language"
                                        rules="required"
                                        :label="trans('partner::app.admin.create.language')"
                                        :placeholder="trans('partner::app.admin.create.language')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="language"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>
                                <x-admin::form.control-group class="mb-[10px]">
                                    <x-admin::form.control-group.label class="required">
                                        Solution
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="solution"
                                        :value="old('solution')"
                                        id="solution"
                                        rules="required"
                                        :label="trans('partner::app.admin.create.solution')"
                                        :placeholder="trans('partner::app.admin.create.solution')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="solution"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>
                                <x-admin::form.control-group class="mb-[10px]">
                                    <x-admin::form.control-group.label class="required">
                                        Title
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="title"
                                        :value="old('title')"
                                        id="title"
                                        rules="required"
                                        :label="trans('partner::app.admin.create.title')"
                                        :placeholder="trans('partner::app.admin.create.title')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="title"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>
                                <x-admin::form.control-group class="mb-[10px]">
                                    <x-admin::form.control-group.label class="required">
                                        Last name
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="last_name"
                                        :value="old('last_name')"
                                        id="last_name"
                                        rules="required"
                                        :label="trans('partner::app.admin.create.last_name')"
                                        :placeholder="trans('partner::app.admin.create.last_name')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="last_name"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>
                                <x-admin::form.control-group class="mb-[10px]">
                                    <x-admin::form.control-group.label class="required">
                                        First Name
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="first_name"
                                        :value="old('first_name')"
                                        id="first_name"
                                        rules="required"
                                        :label="trans('partner::app.admin.create.first_name')"
                                        :placeholder="trans('partner::app.admin.create.first_name')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="first_name"
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
                                        :value="old('street')"
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
                                        :value="old('zip_code')"
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
                                        :value="old('city')"
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
                                        Country
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="country"
                                        :value="old('country')"
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
                                <x-admin::form.control-group class="mb-[10px]">
                                    <x-admin::form.control-group.label class="required">
                                        State
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="state"
                                        :value="old('state')"
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
                            </div>
                        </div>


                        <div class="grid grid-cols-2 gap-4 mt-[14px] max-xl:flex-wrap">

                            <div class="flex flex-col gap-[8px] flex-1 max-xl:flex-auto">
                                <p class="text-[16px] text-gray-800 dark:text-white font-semibold mb-[16px]">
                                    Compnay Detail </p>
                                <x-admin::form.control-group class="mb-[10px]">
                                    <x-admin::form.control-group.label class="required">
                                        Company
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="company"
                                        :value="old('company')"
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
                                        Company ID
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="company_id"
                                        :value="old('company_id')"
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
                                        Description
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="textarea"
                                        name="description"
                                        :value="old('description')"
                                        id="description"
                                        rules="required"
                                        :label="trans('partner::app.admin.create.description')"
                                        :placeholder="trans('partner::app.admin.create.description')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="description"
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

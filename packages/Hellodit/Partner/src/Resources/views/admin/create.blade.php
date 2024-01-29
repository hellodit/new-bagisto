<x-admin::layouts>
    <x-slot:title>
        @lang('partner::app.admin.page-title')
    </x-slot:title>

    <x-admin::form
        action="{{ $partner ? route('admin.partner.update',['partner' => $partner->id]) : route('admin.partner.store') }}"
        enctype="multipart/form-data">

        @if( $partner)
            @method('PUT')
        @endif
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
                    {{ $partner ? "Update Partner" : "Create Partner" }}
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
                                        Title
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="title"
                                        :value="$partner->title ?? old('title')"
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
                                        Solution
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="solution"
                                        :value="$partner->solution ?? old('solution')"
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
                                        Language
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="language"
                                        :value="$partner->language ?? old('language')"
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
                                        Last name
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="last_name"
                                        :value="$partner->last_name ?? old('last_name')"
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
                                        :value="$partner->first_name ?? old('first_name')"
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
                                    Communication </p>
                                <x-admin::form.control-group class="mb-[10px]">
                                    <x-admin::form.control-group.label class="required">
                                        Telephone
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="telephone"
                                        :value="$partner->telephone ?? old('telephone')"
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
                                        :value="$partner->mobile ?? old('mobile')"
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
                                        Fax
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="famille"
                                        :value=" $partner->famille ?? old('famille')"
                                        id="famille"
                                        rules="required"
                                        :label="trans('partner::app.admin.create.famille')"
                                        :placeholder="trans('partner::app.admin.create.famille')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="famille"
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
                                        :value=" $partner->email ?? old('email')"
                                        id="email"
                                        rules="required"
                                        :label="trans('partner::app.admin.create.email')"
                                        :placeholder="trans('partner::app.admin.create.email')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="code"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>
                                <x-admin::form.control-group class="mb-[10px]">
                                    <x-admin::form.control-group.label class="required">
                                        Website
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="website"
                                        :value="$partner->website ?? old('website')"
                                        id="website"
                                        rules="required"
                                        :label="trans('partner::app.admin.create.website')"
                                        :placeholder="trans('partner::app.admin.create.website')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="website"
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
                                        :value="$partner->description ?? old('description')"
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

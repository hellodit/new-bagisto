<x-admin::layouts>
    <x-slot:title>
        @lang('location::app.admin.page-title')
    </x-slot:title>

    <x-admin::form action="{{ route('admin.location.update',['location' => $location->id]) }}"
                   method="post"
                   enctype="multipart/form-data">

        @method('PUT')
        {!! view_render_event('admin.settings.channels.create.create_form_controls.before') !!}

        <div class="flex justify-between items-center">
            <p class="text-[20px] text-gray-800 dark:text-white font-bold">
                @lang('location::app.admin.create-title')
            </p>

            <div class="flex gap-x-[10px] items-center">
                {{-- Cancel Button --}}
                <a
                    href="{{ route('admin.location.index') }}"
                    class="transparent-button hover:bg-gray-200 dark:hover:bg-gray-800 dark:text-white"
                >
                    @lang('location::app.admin.cancel')
                </a>

                {{-- Save Button --}}
                <button
                    type="submit"
                    class="primary-button"
                >
                    @lang('location::app.admin.update-title')
                </button>
            </div>
        </div>

        {{-- body content --}}
        <div class="flex gap-[10px] mt-[14px] max-xl:flex-wrap">
            {{-- Left sub-component --}}
            <div class="flex flex-col gap-[8px] flex-1 max-xl:flex-auto">
                {{-- General Information --}}
                <div class="p-[16px] bg-white dark:bg-gray-900 rounded-[4px] box-shadow">

                    <div class="mb-[10px]">
                        <div class="mb-[10px]">
                            <div class="mb-4">
                                <label for="image" class="block text-gray-600 font-medium">Choose Image:</label>
                                <input type="file" name="image" id="image" class="mt-2 p-2 border border-gray-300 w-full" accept="image/*">
                            </div>

                            <div class="mb-4" id="imagePreviewContainer">
                                <label class="block text-gray-600 font-medium">Image Preview:</label>
                                <img src="{{$location->imageAssets()}}" class="mt-2 w-[200px] max-w-xs max-h-48 rounded shadow-md"   alt="">
                            </div>

                        </div>

                        <x-admin::form.control-group class="mb-[10px]">
                            <x-admin::form.control-group.label class="required">
                                Name
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="name"
                                :value="old('name') ?: $location->name"
                                id="company"
                                rules="required"
                                :label="trans('location::app.admin.create.name')"
                                :placeholder="trans('location::app.admin.create.name')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="name"
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
                                :value="old('description') ?: $location->description"
                                id="description"
                                rules="required"
                                :label="trans('location::app.admin.create.description')"
                                :placeholder="trans('location::app.admin.create.description')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="description"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>


                        <x-admin::form.control-group class="mb-[10px]">
                            <x-admin::form.control-group.label class="required">
                                Status
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="select"
                                name="status"
                                :value="old('status') ?: $location->status"
                                id="status"
                                aria-label="Select Status"
                                rules="required"
                            >
                                <option value="draft">Draft</option>
                                <option value="publish">Publish</option>
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


    </x-admin::form>
</x-admin::layouts>

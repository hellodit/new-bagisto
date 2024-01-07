

<x-admin::layouts>
    <x-slot:title>
        @lang('location::app.admin.page-title')
    </x-slot:title>

    <div class="flex gap-[16px] justify-between items-center mt-3 max-sm:flex-wrap">
        <p class="text-[20px] text-gray-800 dark:text-white font-bold">
            @lang('location::app.admin.page-title')
        </p>

        <div class="flex gap-x-[10px] items-center">
            <a
                href="{{ route('admin.location.create') }}"
                class="primary-button"
            >
                @lang('location::app.admin.create-btn')
            </a>
        </div>
    </div>

    <x-admin::datagrid src="{{ route('admin.location.index') }}"></x-admin::datagrid>

</x-admin::layouts>

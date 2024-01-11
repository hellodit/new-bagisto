

<x-admin::layouts>
    <x-slot:title>
        Partner Address
    </x-slot:title>

    <div class="flex gap-[16px] justify-between items-center mt-3 max-sm:flex-wrap">
        <p class="text-[20px] text-gray-800 dark:text-white font-bold">
            Partner Address
        </p>

        <div class="flex gap-x-[10px] items-center">
            <a
                href="{{ route('admin.partner_address.create') }}"
                class="primary-button"
            >
                Create Partner Address
            </a>
        </div>
    </div>

    <x-admin::datagrid src="{{ route('admin.partner_address.index') }}"></x-admin::datagrid>

</x-admin::layouts>

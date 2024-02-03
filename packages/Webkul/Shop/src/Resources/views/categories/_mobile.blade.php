<!-- Mobile Filters Naviation -->
<div
    class="grid grid-cols-[1fr_auto_1fr] justify-items-center items-center w-full max-w-full fixed bottom-0 left-0 px-[20px] bg-white border-t-[1px] border-[#E9E9E9] z-50"
    v-if="isMobile"
>
    <!-- Filter Drawer -->
    <x-shop::drawer
        position="left"
        width="100%"
        ::is-active="isDrawerActive.filter"
    >
        <!-- Drawer Toggler -->
        <x-slot:toggle>
            <div
                class="flex items-center gap-x-[10px] px-[10px] py-[14px] text-[16px] font-medium uppercase cursor-pointer"
                @click="isDrawerActive.filter = true"
            >
                <span class="icon-filter-1 text-[24px]"></span>

                @lang('shop::app.categories.filters.filter')
            </div>
        </x-slot:toggle>

        <!-- Drawer Header -->
        <x-slot:header>
            <div class="flex justify-between items-center pb-[20px] border-b-[1px] border-[#E9E9E9]">
                <p class="text-[18px] font-semibold">
                    @lang('shop::app.categories.filters.filters')
                </p>

                <p
                    class="mr-[50px] text-[12px] font-medium cursor-pointer"
                    @click="clearFilters('filter', '')"
                >
                    @lang('shop::app.categories.filters.clear-all')
                </p>
            </div>
        </x-slot:header>

        <!-- Drawer Content -->
        <x-slot:content>
            <!-- Filters Vue Compoment -->
            <v-filters
                @filter-applied="setFilters('filter', $event)"
                @filter-clear="clearFilters('filter', $event)"
            >
                {{-- Category Filter Shimmer Effect --}}
                <x-shop::shimmer.categories.filters/>
            </v-filters>
            <v-additional-filter
                @filter-applied='setFilters("filter", $event)'
            ></v-additional-filter>
        </x-slot:content>
    </x-shop::drawer>

    <!-- Seperator -->
    <span class="h-[20px] w-[2px] bg-[#E9E9E9]"></span>

    <!-- Sort Drawer -->
    <x-shop::drawer
        position="bottom"
        width="100%"
        ::is-active="isDrawerActive.toolbar"
    >
        <!-- Drawer Toggler -->
        <x-slot:toggle>
            <div
                class="flex items-center gap-x-[10px] px-[10px] py-[14px] text-[16px] font-medium uppercase cursor-pointer"
                @click="isDrawerActive.toolbar = true"
            >
                <span class="icon-sort-1 text-[24px]"></span>

                @lang('shop::app.categories.filters.sort')
            </div>
        </x-slot:toggle>

        <!-- Drawer Header -->
        <x-slot:header>
            <div class="flex justify-between items-center pb-[20px] border-b-[1px] border-[#E9E9E9]">
                <p class="text-[18px] font-semibold">
                    @lang('shop::app.categories.filters.sort')
                </p>
            </div>
        </x-slot:header>

        <!-- Drawer Content -->
        <x-slot:content>
            @include('shop::categories.toolbar')
        </x-slot:content>
    </x-shop::drawer>


</div>

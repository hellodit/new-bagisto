@switch($attribute->type)
    @case('select')
        <select class="custom-select block w-full py-2 px-3 shadow bg-white border border-[#E9E9E9] rounded-lg text-[16px] transition-all " name="{{$attribute->code}}" id="{{$attribute->code}}" >
            @php
                $selectedOption = old($attribute->code) ?: $product[$attribute->code];

                if ($attribute->code != 'tax_category_id') {
                    $options = $attribute->options()->orderBy('sort_order')->get();
                } else {
                    $options = app('Webkul\Tax\Repositories\TaxCategoryRepository')->all();
                }
            @endphp

            @foreach ($options as $option)
                <option
                    value="{{ $option->id }}"
                    {{ $selectedOption == $option->id ? 'selected' : '' }}
                >
                    {{ $option->admin_name ?? $option->name }}
                </option>
            @endforeach

            <option value=""></option>
        </select>


        @break

    @case('multiselect')
        <x-admin::form.control-group.control
            type="multiselect"
            :name="$attribute->code . '[]'"
            :id="$attribute->code . '[]'"
            ::rules="{{ $attribute->validations }}"
            :label="$attribute->admin_name"
        >
            @php
                $selectedOption = old($attribute->code) ?: explode(',', $product[$attribute->code]);
            @endphp

            @foreach ($attribute->options()->orderBy('sort_order')->get() as $option)
                <option
                    value="{{ $option->id }}"
                    {{ in_array($option->id, $selectedOption) ? 'selected' : ''}}
                >
                    {{ $option->admin_name }}
                </option>
            @endforeach
        </x-admin::form.control-group.control>

        @break





@endswitch

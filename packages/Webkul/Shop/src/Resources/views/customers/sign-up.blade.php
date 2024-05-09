{{-- SEO Meta Content --}}
@push('meta')
    <meta name="description" content="@lang('shop::app.customers.signup-form.page-title')"/>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css"
          integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
    <meta name="keywords" content="@lang('shop::app.customers.signup-form.page-title')"/>
@endPush

<x-shop::layouts
    :has-header="false"
    :has-feature="false"
    :has-footer="false"
>
    {{-- Page Title --}}
    <x-slot:title>
        @lang('shop::app.customers.signup-form.page-title')
        </x-slot>

        <div class="container mt-20 max-1180:px-[20px]">
            {{-- Company Logo --}}
            <div class="flex gap-x-[54px] items-center max-[1180px]:gap-x-[35px]">
                <a
                    href="{{ route('shop.home.index') }}"
                    class="m-[0_auto_20px_auto]"
                    aria-label="Bagisto "
                >
                    <img
                        src="{{ bagisto_asset('images/logo.svg') }}"
                        alt="Bagisto "
                        width="131"
                        height="29"
                    >
                </a>
            </div>

            {{-- Form Container --}}
            <div
                class="w-full max-w-[870px] m-auto px-[90px] py-[60px] border border-[#E9E9E9] rounded-[12px] max-md:px-[30px] max-md:py-[30px]"
            >
                <h1 class="text-[40px] font-dmserif max-sm:text-[25px]">
                    @lang('shop::app.customers.signup-form.page-title')
                </h1>

                <p class="mt-[15px] text-[#6E6E6E] text-[20px] max-sm:text-[16px]">
                    @lang('shop::app.customers.signup-form.form-signup-text')
                </p>

                <div class="mt-[60px] rounded max-sm:mt-[30px]">
                    <x-shop::form :action="route('shop.customers.register.store')">
                        {!! view_render_event('bagisto.shop.customers.signup_form_controls.before') !!}

                        <x-shop::form.control-group class="mb-4">
                            <x-shop::form.control-group.label class="required">
                                Nama Lengkap
                            </x-shop::form.control-group.label>

                            <x-shop::form.control-group.control
                                type="text"
                                name="first_name"
                                class="!p-[20px_25px] rounded-lg"
                                :value="old('last_name')"
                                rules="required"
                                :label="trans('shop::app.customers.signup-form.first-name')"
                                placeholder="Nama lengkap"
                            >
                            </x-shop::form.control-group.control>

                            <x-shop::form.control-group.error
                                control-name="first_name"
                            >
                            </x-shop::form.control-group.error>
                        </x-shop::form.control-group>

                        {!! view_render_event('bagisto.shop.customers.signup_form_controls.first_name.after') !!}

                        <x-shop::form.control-group class="mb-4">
                            <x-shop::form.control-group.label class="required">
                                Nama Profil
                            </x-shop::form.control-group.label>

                            <x-shop::form.control-group.control
                                type="text"
                                name="last_name"
                                class="!p-[20px_25px] rounded-lg"
                                :value="old('last_name')"
                                rules="required|oneWord"
                                :label="trans('shop::app.customers.signup-form.last-name')"
                                placeholder="Nama Profil"
                            >
                            </x-shop::form.control-group.control>

                            <x-shop::form.control-group.error
                                control-name="last_name"
                            >
                            </x-shop::form.control-group.error>
                        </x-shop::form.control-group>

                        {!! view_render_event('bagisto.shop.customers.signup_form_controls.last_name.after') !!}

                        <x-shop::form.control-group class="mb-4">
                            <x-shop::form.control-group.label class="required">
                                @lang('shop::app.customers.signup-form.email')
                            </x-shop::form.control-group.label>

                            <x-shop::form.control-group.control
                                type="email"
                                name="email"
                                class="!p-[20px_25px] rounded-lg"
                                :value="old('email')"
                                rules="required|email"
                                :label="trans('shop::app.customers.signup-form.email')"
                                placeholder="email@example.com"
                            >
                            </x-shop::form.control-group.control>

                            <x-shop::form.control-group.error
                                control-name="email"
                            >
                            </x-shop::form.control-group.error>
                        </x-shop::form.control-group>

                        {!! view_render_event('bagisto.shop.customers.signup_form_controls.email.after') !!}

                        <div class="mb-6 relative">
                            <label class="required">
                                Password
                            </label>

                            <input
                                type="password"
                                name="password"
                                id="password"
                                class="border hover:border-red-500 w-full mb-3 py-2 px-3 shadow border rounded text-[14px] text-gray-600 transition-all hover:border-gray-400 focus:border-gray-400 !p-[20px_25px] rounded-lg"
                                value=""
                                required
                                minlength="8"
                                placeholder="Password"
                            >

{{--                            <i class="fa fa-eye password-toggle"--}}
{{--                               style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>--}}

                            <div class="error" id="password_error">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label>
                                Confirm Password
                            </label>

                            <input
                                type="password"
                                name="password_confirmation"
                                class="border hover:border-red-500 w-full mb-3 py-2 px-3 shadow border rounded text-[14px] text-gray-600 transition-all hover:border-gray-400 focus:border-gray-400 !p-[20px_25px] rounded-lg"
                                value=""
                                required
                                placeholder="Confirm Password"
                            >

                            <div class="error" id="password_confirmation_error">
                            </div>
                        </div>

                        @if (core()->getConfigData('customer.captcha.credentials.status'))
                            <div class="flex mb-[20px]">
                                {!! Captcha::render() !!}
                            </div>
                        @endif

                        @if (core()->getConfigData('customer.settings.newsletter.subscription'))
                            <div class="flex gap-[6px] items-center select-none">
                                <input
                                    type="checkbox"
                                    name="is_subscribed"
                                    id="is-subscribed"
                                    class="hidden peer"
                                    onchange="switchVisibility()"
                                />

                                <label
                                    class="icon-uncheck text-[24px] text-navyBlue peer-checked:icon-check-box peer-checked:text-navyBlue cursor-pointer"
                                    for="is-subscribed"
                                ></label>

                                <label
                                    class="pl-0 text-[16] text-[#6E6E6E] max-sm:text-[12px] select-none cursor-pointer"
                                    for="is-subscribed"
                                >
                                    @lang('shop::app.customers.signup-form.subscribe-to-newsletter')
                                </label>
                            </div>
                        @endif

                        {!! view_render_event('bagisto.shop.customers.signup_form_controls.after') !!}

                        <div class="flex gap-[36px] flex-wrap items-center mt-[30px]">
                            <button
                                class="primary-button block w-full max-w-[374px] py-[16px] px-[43px] mx-auto m-0 ml-[0px] rounded-[18px] text-[16px] text-center"
                                type="submit"
                            >
                                @lang('shop::app.customers.signup-form.button-title')
                            </button>

                            <div class="flex gap-[15px] flex-wrap">
                                {!! view_render_event('bagisto.shop.customers.login_form_controls.before') !!}
                            </div>
                        </div>

                        {!! view_render_event('bagisto.shop.customers.signup_form_controls.after') !!}

                    </x-shop::form>
                </div>

                <p class="mt-[20px] text-[#6E6E6E] font-medium">
                    @lang('shop::app.customers.signup-form.account-exists')

                    <a class="text-navyBlue"
                       href="{{ route('shop.customer.session.index') }}"
                    >
                        @lang('shop::app.customers.signup-form.sign-in-button')
                    </a>
                </p>
            </div>

            <p class="mt-[30px] mb-[15px] text-center text-[#6E6E6E] text-xs">
                @lang('shop::app.customers.signup-form.footer', ['current_year'=> date('Y') ])
            </p>
        </div>

</x-shop::layouts>

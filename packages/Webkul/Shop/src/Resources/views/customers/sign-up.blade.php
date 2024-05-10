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
        Daftar Akun Pengguna Baru
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
                    Daftar Akun Pengguna Baru
                </h1>

                <p class="mt-[15px] text-[#6E6E6E] text-[20px] max-sm:text-[16px]">
                    Sebuah Langkah Awal Untuk Anda Buat Iklan Gratis Barang Gadaian Anda
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

                        <x-shop::form.control-group class="mb-4">
                            <x-shop::form.control-group.label class="required">
                                @lang('shop::app.customers.login-form.password')
                            </x-shop::form.control-group.label>

                            <x-shop::form.control-group.control
                                type="password"
                                id="password"
                                name="password"
                                class="!p-[20px_25px] rounded-lg"
                                :value="old('password')"
                                rules="required|min:8|strongPassword"
                                :label="trans('shop::app.customers.login-form.password')"
                                :placeholder="trans('shop::app.customers.login-form.password')"
                            >
                            </x-shop::form.control-group.control>

                            <x-shop::form.control-group.error
                                control-name="password"
                            >
                            </x-shop::form.control-group.error>
                        </x-shop::form.control-group>


                        <x-shop::form.control-group class="mb-4">
                            <x-shop::form.control-group.label class="required">
                                Tulis ulang @lang('shop::app.customers.login-form.password')
                            </x-shop::form.control-group.label>

                            <x-shop::form.control-group.control
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                class="!p-[20px_25px] rounded-lg"
                                :value="old('password_confirmation')"
                                rules="required"
                                :label="trans('shop::app.customers.signup-form.email')"
                                placeholder="Tulis ulang kata sandi"
                            >
                            </x-shop::form.control-group.control>

                            <x-shop::form.control-group.error
                                control-name="password_confirmation"
                            >
                            </x-shop::form.control-group.error>
                        </x-shop::form.control-group>




                        <div class="flex justify-between">
                            <div class="select-none items-center flex gap-[6px]">
                                <input
                                    type="checkbox"
                                    id="show-password"
                                    class="hidden peer"
                                    onchange="switchVisibility()"
                                />

                                <label
                                    class="icon-uncheck text-[24px] text-navyBlue peer-checked:icon-check-box peer-checked:text-navyBlue cursor-pointer"
                                    for="show-password"
                                ></label>

                                <label
                                    class="text-[16] text-[#6E6E6E] max-sm:text-[12px] pl-0 select-none cursor-pointer"
                                    for="show-password"
                                >
                                    @lang('shop::app.customers.login-form.show-password')
                                </label>
                            </div>

                            <div class="block">
                                <a
                                    href="{{ route('shop.customers.forgot_password.create') }}"
                                    class="text-[16px] cursor-pointer text-black max-sm:text-[12px]"
                                >
                                <span>
                                    @lang('shop::app.customers.login-form.forgot-pass')
                                </span>
                                </a>
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

        @push('scripts')

            <script>
                function switchVisibility() {
                    let passwordField = document.getElementById("password");
                    let passwordConfirmation = document.getElementById("password_confirmation");

                    passwordField.type = passwordField.type === "password"
                        ? "text"
                        : "password";

                    passwordConfirmation.type = passwordConfirmation.type === "password"
                        ? "text"
                        : "password";
                }
            </script>
    @endpush
</x-shop::layouts>

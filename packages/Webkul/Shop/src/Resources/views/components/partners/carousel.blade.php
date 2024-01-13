<v-partners-carousel
    src="{{ $src }}"
    title="{{ $title }}"
    navigation-link="{{ $navigationLink ?? '' }}"
>
    <x-shop::shimmer.partners.carousel
        :count="8"
        :navigation-link="$navigationLink ?? false"
    ></x-shop::shimmer.partners.carousel>

</v-partners-carousel>

@pushOnce('scripts')
    <script type="text/x-template" id="v-partners-carousel-template">
        <div class="container mt-[60px] max-lg:px-[30px] max-sm:mt-[20px]" v-if="! isLoading && partners?.length">
            <div class="relative">
                <div
                    ref="swiperContainer"
                    class="flex gap-10 overflow-auto scroll-smooth scrollbar-hide max-sm:gap-4"
                >
                    <div
                        class="grid grid-cols-1 gap-[15px] justify-items-center min-w-[120px] max-w-[120px] font-medium"
                        v-for="partner in partners"
                    >
                        <a
                            :href="partner.link"
                            class="w-[110px] h-[110px] bg-[#F5F5F5] rounded-full"
                            :aria-label="partner.title"
                        >
                            <template v-if="partner.image">
                                <x-shop::media.images.lazy
                                    ::src="partner.image"
                                    width="110"
                                    height="110"
                                    class="w-[110px] h-[110px] rounded-full"
                                    ::alt="partner.title"
                                ></x-shop::media.images.lazy>
                            </template>
                        </a>

                        <a
                            :href="partner.link"
                            class=""
                        >
                            <p
                                class="text-center text-black text-[18px] max-sm:font-normal"
                                v-text="partner.title"
                            >
                            </p>
                        </a>
                    </div>
                </div>

                <span
                    class="flex items-center justify-center absolute top-[37px] -left-[41px] w-[50px] h-[50px] bg-white border border-black rounded-full transition icon-arrow-left-stylish text-[25px] hover:bg-black hover:text-white max-lg:-left-[29px] cursor-pointer"
                    @click="swipeLeft"
                >
                </span>

                <span
                    class="flex items-center justify-center absolute top-[37px] -right-[22px] w-[50px] h-[50px] bg-white border border-black rounded-full transition icon-arrow-right-stylish text-[25px] hover:bg-black hover:text-white max-lg:-right-[29px] cursor-pointer"
                    @click="swipeRight"
                >
                </span>
            </div>
        </div>

        <!-- partner Carousel Shimmer -->
        <template v-if="isLoading">
            <x-shop::shimmer.partners.carousel
                :count="8"
                :navigation-link="$navigationLink ?? false"
            >
            </x-shop::shimmer.partners.carousel>
        </template>
    </script>

    <script type="module">
        app.component('v-partners-carousel', {
            template: '#v-partners-carousel-template',

            props: [
                'src',
                'title',
                'navigationLink',
            ],

            data() {
                return {
                    isLoading: true,

                    partners: [],

                    offset: 323,
                };
            },

            mounted() {
                this.getpartners();
            },

            methods: {
                getpartners() {
                    this.$axios.get(this.src)
                        .then(response => {
                            this.isLoading = false;

                            this.partners = response.data.data;
                        }).catch(error => {
                        console.log(error);
                    });
                },

                swipeLeft() {
                    const container = this.$refs.swiperContainer;

                    container.scrollLeft -= this.offset;
                },

                swipeRight() {
                    const container = this.$refs.swiperContainer;

                    container.scrollLeft += this.offset;
                },
            },
        });
    </script>
@endPushOnce

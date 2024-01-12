<v-locations-carousel
    src="{{ $src }}"
    title="{{ $title }}"
    navigation-link="{{ $navigationLink ?? '' }}"
>
    <x-shop::shimmer.partners.carousel
        :count="8"
        :navigation-link="$navigationLink ?? false"
    ></x-shop::shimmer.partners.carousel>

</v-locations-carousel>

@pushOnce('scripts')
    <script type="text/x-template" id="v-locations-carousel-template">
        <div class="container mt-[60px] max-lg:px-[30px] max-sm:mt-[20px]" v-if="! isLoading && locations?.length">
            <div class="relative">
                <div
                    ref="swiperContainer"
                    class="flex gap-10 overflow-auto scroll-smooth scrollbar-hide max-sm:gap-4"
                >
                    <div
                        class="grid grid-cols-1 gap-[15px] justify-items-center min-w-[120px] max-w-[120px] font-medium"
                        v-for="location in locations"
                    >
                        <a
                            :href="location.link"
                            class="w-[110px] h-[110px] bg-[#F5F5F5] rounded-full"
                            :aria-label="location.name"
                        >
                            <template v-if="location.image">
                                <x-shop::media.images.lazy
                                    ::src="location.image"
                                    width="110"
                                    height="110"
                                    class="w-[110px] h-[110px] rounded-full"
                                    ::alt="location.name"
                                ></x-shop::media.images.lazy>
                            </template>
                        </a>

                        <a
                            :href="location.link"
                            class=""
                        >
                            <p
                                class="text-center text-black text-[18px] max-sm:font-normal"
                                v-text="location.name"
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
        app.component('v-locations-carousel', {
            template: '#v-locations-carousel-template',

            props: [
                'src',
                'title',
                'navigationLink',
            ],

            data() {
                return {
                    isLoading: true,

                    locations: [],

                    offset: 323,
                };
            },

            mounted() {
                this.getLocations();
            },

            methods: {
                getLocations() {
                    this.$axios.get(this.src)
                        .then(response => {
                            this.isLoading = false;
                            this.locations = response.data.data;
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

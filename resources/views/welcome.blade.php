<x-app-layout>

    <div class="">
        <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                @foreach ($covers as $cover)
                    <div class="swiper-slide">
                        <img src="{{ Storage::url($cover->image_path) }}"
                            class="w-full object-cover object-center" alt="">
                    </div>
                @endforeach
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
        </div>
    </div>

    <div class="container py-8">



        {{-- <div class="one-time">
            <div><img src="{{ asset('img/publi1.jpg') }}" class="w-full" alt=""></div>
            <div><img src="{{ asset('img/publi2.jpg') }}" class="w-full" alt=""></div>
        </div> --}}

        @foreach ($categories as $category)
            <section class="mb-6">
                <div class="flex items-center mb-2">
                    <h1 class="text-lg uppercase font-semibold text-zinc">
                        {{ $category->name }}
                    </h1>

                    <a href="{{ route('categories.show', $category) }}"
                        class="text-rojo-600 hover:text-rojo-400 hover:underline ml-2 font-semibold">Ver más</a>
                </div>


                @livewire('category-products', ['category' => $category])
            </section>
        @endforeach
    </div>

    @push('script')
        <script>
            Livewire.on('glider', function(id) {

                new Glider(document.querySelector('.glider-' + id), {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    draggable: true, //con esto se puede deslizar con la manito del mouse
                    dots: '.glider-' + id + '~ .dots',
                    arrows: {
                        prev: '.glider-' + id + '~ .glider-prev',
                        next: '.glider-' + id + '~ .glider-next'
                    },
                    responsive: [{
                            breakpoint: 640,
                            settings: {
                                slidesToShow: 2.5,
                                slidesToScroll: 2,
                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 3.5,
                                slidesToScroll: 3,
                            }
                        },
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 4.5,
                                slidesToScroll: 4,
                            }
                        },
                        {
                            breakpoint: 1280,
                            settings: {
                                slidesToShow: 5.5,
                                slidesToScroll: 5,
                            }
                        }
                    ]
                });

            });


            const swiper = new Swiper('.swiper', {


                // Optional parameters
                loop: true,

                autoplay: {
                    delay: 5000, // Cambia este valor según lo que desees para el intervalo entre diapositivas en milisegundos
                    disableOnInteraction: false, // Esto permite que el autoplay no se detenga cuando el usuario interactúa con el swiper
                },

                // If we need pagination
                pagination: {
                    el: '.swiper-pagination',
                },

                // Navigation arrows
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },

                // And if we need scrollbar
                scrollbar: {
                    el: '.swiper-scrollbar',
                },
            });


            // $('.one-time').slick({
            //     dots: true,
            //     infinite: true,
            //     speed: 300,
            //     autoplay: true,
            //     slidesToShow: 1,
            //     adaptiveHeight: true
            // });
        </script>
    @endpush

</x-app-layout>

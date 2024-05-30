<x-app-layout>

    <div class="">
        <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->

                @if ($covers->isNotEmpty())
                    @foreach ($covers as $cover)
                        @if (!empty($cover->image_path))
                            <div class="swiper-slide">
                                <img src="{{ Storage::url($cover->image_path) }}"
                                    class="w-full object-cover object-center" alt="">
                            </div>
                        @endif
                    @endforeach
                @else
                    <div class="swiper-slide">
                        <img class=" object-cover" src="{{ asset('img/slide-default-1.png') }}" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img class=" object-cover" src="{{ asset('img/slide-default-2.png') }}" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img class=" object-cover" src="{{ asset('img/slide-default-3.png') }}" alt="">
                    </div>
                @endif
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



        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-4">
            @foreach ($categories as $category)
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="{{ Storage::url($category->image_banner) }}"
                        alt="">
                </div>
            @endforeach
        </div>


        <div class="text-lg uppercase font-semibold text-zinc mb-4">Busca por marcas!</div>

        <div class="container mx-auto p-4">
            <div class="glider-contain">
                <div class="glider">
                    <div class="px-4">
                        <a href="https://store.digitalwd.com.co/categories/celulares-y-tablets?marca=SAMSUNG">
                            <img class="rounded-lg" src="{{ asset('img/samsung.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="px-4">
                        <a href="https://store.digitalwd.com.co/categories/celulares-y-tablets?marca=XIAOMI">
                            <img class="rounded-lg" src="{{ asset('img/xiaomi.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="px-4">
                        <a href="https://store.digitalwd.com.co/categories/celulares-y-tablets?marca=APPLE">
                            <img class="rounded-lg" src="{{ asset('img/apple.png') }}" alt="">
                        </a>
                    </div>
                    <div class="px-4">
                        <a href="https://store.digitalwd.com.co/categories/consolas-y-videojuegos?marca=SONY">
                            <img class="rounded-lg" src="{{ asset('img/play.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="px-4">
                        <a href="https://store.digitalwd.com.co/categories/consolas-y-videojuegos?subcategoria=xbox">
                            <img class="rounded-lg" src="{{ asset('img/xbox.png') }}" alt="">
                        </a>
                    </div>
                    <div class="px-4">
                        <a href="https://store.digitalwd.com.co/categories/computacion?marca=LENOVO">
                            <img class="rounded-lg" src="{{ asset('img/lenovo.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="px-4">
                        <a href="https://store.digitalwd.com.co/categories/computacion?marca=HP">
                            <img class="rounded-lg" src="{{ asset('img/hp.png') }}" alt="">
                        </a>
                    </div>
                </div>

            </div>

            <button aria-label="Previous" class="glider-prev">«</button>
            <button aria-label="Next" class="glider-next">»</button>
            <div role="tablist" class="dots"></div>
        </div>

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


        <style>
            .float {
                position: fixed;
                width: 60px;
                height: 60px;
                bottom: 40px;
                right: 40px;
                background-color: #37d45e;
                color: #FFF;
                border-radius: 50px;
                text-align: center;
                font-size: 30px;
                box-shadow: 2px 2px 3px #999;
                z-index: 100;
            }

            .float:hover {
                text-decoration: none;
                color: #FFF;
                background-color: #2a8a52;

                animation: shake 1s;


                animation-iteration-count: infinite;
            }

            .my-float {
                margin-top: 16px;
            }

            .pulse {
                animation: pulse-animation 2s infinite;
            }


            @keyframes pulse-animation {
                0% {
                    box-shadow: 0 0 0 0px #25d36657 rgba(0, 0, 0, 0.2);
                }

                100% {
                    box-shadow: 0 0 0 20px rgba(0, 0, 0, 0);
                }
            }
        </style>

        {{-- Boton de whatsapp --}}
        <div style="position: fixed; bottom: 20px; right: 20px;">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
            <a href="https://api.whatsapp.com/send?phone=3174160446&text=HOLA,%20QUISIERA%20CONSULTAR%20SOBRE%20TUS%20PRODUCTOS"
                class="float pulse" target="_blank">
                <i class="fa fa-whatsapp my-float "></i>
            </a>
        </div>

        {{-- Mensaje "Contáctanos" --}}
        <div
            style="position: fixed; bottom: 90px; right: 20px; background-color: black; color: white; padding: 10px; border-radius: 5px; margin-bottom: 20px; z-index: 999;">
            Contáctanos!
        </div>
    </div>

    @push('script')
        <script>
            new Glider(document.querySelector('.glider'), {
                slidesToShow: 5,
                slidesToScroll: 5,
                draggable: true,
                dots: '.dots',
                arrows: {
                    prev: '.glider-prev',
                    next: '.glider-next'
                }
            });

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
        </script>
    @endpush

</x-app-layout>

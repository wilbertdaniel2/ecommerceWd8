<x-app-layout>

    <div class="one-time">
        <div><img src="{{ asset('img/img1.png') }}" class="w-full" alt=""></div>
        <div><img src="{{ asset('img/img2.jpg') }}" class="w-full" alt=""></div>
        <div><img src="{{ asset('img/img3.png') }}" class="w-full" alt=""></div>
    </div>

    <div class="container py-8">




        {{-- <div class="mb-6">
            <div class="glider-contain">
                <div class="glider2">
                  <div><img src="{{asset('img/img1.png')}}" class="w-full" alt=""></div>
                  <div><img src="{{asset('img/img1.png')}}" class="w-full" alt=""></div>
                  <div><img src="{{asset('img/img1.png')}}" class="w-full" alt=""></div>
                  <div><img src="{{asset('img/img1.png')}}" class="w-full" alt=""></div>
                </div>
              
                <button aria-label="Previous" class="glider-prev">«</button>
                <button aria-label="Next" class="glider-next">»</button>
                <div role="tablist" class="dots"></div>
              </div>
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

            // new Glider(document.querySelector('.glider2'), {
            //     slidesToShow: 1,
            //     dots: '#dots',
            //     draggable: true,
            //     autoplay: true,
            //     autoplay: 5000,
            //     arrows: {
            //         prev: '.glider-prev',
            //         next: '.glider-next'
            //     }
            // });

            $('.one-time').slick({
                dots: true,
                infinite: true,
                speed: 300,
                autoplay: true,
                slidesToShow: 1,
                adaptiveHeight: true
            });
        </script>
    @endpush

</x-app-layout>

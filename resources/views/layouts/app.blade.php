<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('img/logo.ico') }}" />

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-6QV80N56HQ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-6QV80N56HQ');
    </script>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <meta name="google-site-verification" content="tFzSynmzKvNuE7DNv6zQTP_hWvfJ4MQBMpCgvP7uD1E" />

    {{-- swipe --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- FontAwesome --}}
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

    {{-- Glider --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">

    {{-- FlexSlider --}}
    <link rel="stylesheet" href="{{ asset('vendor/FlexSlider/flexslider.css') }}">

    @livewireStyles

    {{-- Slick --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('vendor/slick/slick/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/slick/slick/slick-theme.css') }}" /> --}}

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    {{-- Glider --}}
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    {{-- FlexSlider --}}

    <script src="{{ asset('vendor/FlexSlider/jquery.flexslider-min.js') }}"></script>

    {{-- Swipe --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    {{-- SlickJs --}}
    {{-- <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script> --}}
    {{-- <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('vendor/slick/slick/slick.min.js') }}"></script> --}}

</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation')



        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts

    <script>
        function dropdown() {
            return {
                open: false,
                show() {
                    if (this.open) {
                        //se cierra el menu
                        this.open = false;
                        document.getElementsByTagName('html')[0].style.overflow = 'auto'
                    } else {
                        //se abre el menu
                        this.open = true;
                        document.getElementsByTagName('html')[0].style.overflow = 'hidden'
                    }
                }
            }
        }
    </script>

    @stack('script')

    <footer class="bg-neutral-800 text-center text-neutral-100 dark:bg-neutral-600 dark:text-neutral-200 lg:text-left">
        <div
            class="flex items-center justify-center border-b-2 border-neutral-200 p-6 dark:border-neutral-500 lg:justify-between">
            <div class="mr-12 hidden lg:block">
                <span>Conéctate con nosotros en las redes sociales: </span>
            </div>
            <div class="flex justify-center">
                <a href="https://www.facebook.com/profile.php?id=100076258636002" target="_blank"
                    class="mr-6 text-neutral-500 hover:text-neutral-300 dark:text-neutral-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                    </svg>
                </a>
                {{-- <a href="#!" class="mr-6 text-neutral-500 hover:text-neutral-300 dark:text-neutral-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                    </svg>
                </a> --}}
                <a href="mailto:digitalbaq@gmail.com" target="_blank"
                    class="mr-6 text-neutral-500 hover:text-neutral-300 dark:text-neutral-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M7 11v2.4h3.97c-.16 1.029-1.2 3.02-3.97 3.02-2.39 0-4.34-1.979-4.34-4.42 0-2.44 1.95-4.42 4.34-4.42 1.36 0 2.27.58 2.79 1.08l1.9-1.83c-1.22-1.14-2.8-1.83-4.69-1.83-3.87 0-7 3.13-7 7s3.13 7 7 7c4.04 0 6.721-2.84 6.721-6.84 0-.46-.051-.81-.111-1.16h-6.61zm0 0 17 2h-3v3h-2v-3h-3v-2h3v-3h2v3h3v2z"
                            fill-rule="evenodd" clip-rule="evenodd" />
                    </svg>
                </a>
                <a href="https://www.instagram.com/digitalwdhome/" target="_blank"
                    class="mr-6 text-neutral-500 hover:text-neutral-300 dark:text-neutral-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                    </svg>
                </a>
                {{-- <a href="#!" class="mr-6 text-neutral-500 hover:text-neutral-300 dark:text-neutral-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z" />
                    </svg>
                </a> --}}
            </div>
        </div>
        <div class="mx-6 py-10 text-center md:text-left border-b-2 border-neutral-200 p-6">
            <div class="grid-1 grid gap-8 md:grid-cols-2 lg:grid-cols-4">
                <div class="">
                    <h6 class="mb-4 flex items-center justify-center font-semibold uppercase md:justify-start">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="mr-3 h-4 w-4">
                            <path
                                d="M12.378 1.602a.75.75 0 00-.756 0L3 6.632l9 5.25 9-5.25-8.622-5.03zM21.75 7.93l-9 5.25v9l8.628-5.032a.75.75 0 00.372-.648V7.93zM11.25 22.18v-9l-9-5.25v8.57a.75.75 0 00.372.648l8.628 5.033z" />
                        </svg>
                        Digital Wd
                    </h6>
                    <p>
                        Somos distribuidores de tecnología en equipos de cómputo, telefonía celular accesorios monitores
                        e impresoras, comercializamos soluciones tecnológicas de las marcas más prestigiosas.
                    </p>
                </div>
                <div class="">
                    <h6 class="mb-4 flex justify-center font-semibold uppercase md:justify-start">
                        Acerca de DigitalWDStore
                    </h6>
                    <p class="mb-4">
                        <a href="#!" class="text-neutral-400 hover:text-neutral-200 dark:text-neutral-200">¿Quienes
                            somos?</a>
                    </p>
                    <p class="mb-4">
                        <a href="#!"
                            class="text-neutral-400 hover:text-neutral-200 dark:text-neutral-200">Responsabilidad
                            social</a>
                    </p>
                    <p class="mb-4">
                        <a href="#!"
                            class="text-neutral-400 hover:text-neutral-200 dark:text-neutral-200">Protección de
                            propiedad intelectual</a>
                    </p>
                    <p>
                        <a href="{{ route('login') }}"
                            class="text-neutral-400 hover:text-neutral-200 dark:text-neutral-200">Iniciar sesión</a>
                    </p>
                </div>
                <div class="">
                    <h6 class="mb-4 flex justify-center font-semibold uppercase md:justify-start">
                        Servicio al cliente
                    </h6>
                    <p class="mb-4">
                        <a href="#!"
                            class="text-neutral-400 hover:text-neutral-200 dark:text-neutral-200">Preguntas
                            frecuentes</a>
                    </p>
                    <p class="mb-4">
                        <a href="#!"
                            class="text-neutral-400 hover:text-neutral-200 dark:text-neutral-200">Tratamiento de datos
                            personales</a>
                    </p>
                    <p class="mb-4">
                        <a href="#!" class="text-neutral-400 hover:text-neutral-200 dark:text-neutral-200">Terminos
                            y condiciones</a>
                    </p>
                    <p>
                        <a href="#!"
                            class="text-neutral-400 hover:text-neutral-200 dark:text-neutral-200">Peticiones, quejas y
                            reclamos</a>
                    </p>
                </div>
                <div>
                    <h6 class="mb-4 flex justify-center font-semibold uppercase md:justify-start">
                        Contactanos
                    </h6>
                    <p class="mb-4 flex items-center justify-center md:justify-start">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="mr-3 h-5 w-5">
                            <path
                                d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                            <path
                                d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                        </svg>
                        Barranquilla, Calle 72 Cra #48-60, CO
                    </p>
                    <p class="mb-4 flex items-center justify-center md:justify-start">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="mr-3 h-5 w-5">
                            <path
                                d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z" />
                            <path
                                d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z" />
                        </svg>
                        digitalbaq@gmail.com
                    </p>
                    <p class="mb-4 flex items-center justify-center md:justify-start">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="mr-3 h-5 w-5">
                            <path fill-rule="evenodd"
                                d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z"
                                clip-rule="evenodd" />
                        </svg>
                        + 57 317 4160446
                    </p>
                </div>
            </div>
        </div>
        <div class="bg-neutral-900 p-6 text-center dark:bg-neutral-700">
            <span>© 2023 Copyright:</span>
            <a class="font-semibold text-neutral-200 dark:text-neutral-400 hover:text-rojo-600"
                href="https://diswelldone.com/">Welldone</a>
        </div>
    </footer>
</body>

</html>

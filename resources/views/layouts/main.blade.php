<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Movie Master - @yield('meta-title')</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @livewireStyles
</head>

<body>
    <div class="bg-slate-900 w-full overflow-hidden py-4 px-4 ">
        <nav class="container mx-auto px-2 lg:flex justify-center">
            <div
                class="font-extrabold text-pink-500 text-2xl container mx-auto flex flex-col lg:flex-row items-center lg:justify-start justify-center">
                <div>
                    <a href="{{route('movie.index')}}" class="outline-none">
                        <i class="fa-solid fa-clapperboard"></i>

                        <span class="lg:border-r border-slate-600 lg:pr-4">Movie Master</span>
                    </a>

                </div>
                <div>
                    <div class="text-white font-bold text-base flex space-x-6 lg:pl-4">
                        <div class="font-semibold text-sm">The world of cinema in your hands.</div>
                    </div>
                </div>
            </div>
            @livewire('search-dropdown')
        </nav>
    </div>

    <div class="px-4">
        @yield('content')
    </div>

    <footer class=" bg-slate-900 text-white mt-6 w-full">
        <div class="px-4 pt-4 w-full">
            <div class="flex justify-center mb-4">
                <div class="font-extrabold  text-2xl ">
                    <a href="{{route('movie.index')}}" class="outline-none text-pink-500">
                        <i class="fa-solid fa-clapperboard"></i>
                        <span>Movie Master</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.2);">
            2022 James Davis
        </div>
    </footer>

    <script src="{{ mix('js/app.js') }}" defer></script>
    @livewireScripts
</body>

</html>
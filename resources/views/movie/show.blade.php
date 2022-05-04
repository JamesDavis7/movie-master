@extends('layouts.main')

@section('meta-title', 'Movie')

@section('content')

<div class="flex lg:space-x-6 py-12 container mx-auto flex-col lg:flex-row">

    @if($movie['poster_path'])
    <img src="https://image.tmdb.org/t/p/w500/{{$movie['poster_path']}}" alt="searchImage"
        class="rounded-lg shadow-xl w-full md:w-54 lg:w-80">
    @else
    <img src="https://via.placeholder.com/200x300" alt="alternateImage" class="w-full rounded-lg shadow-xl">
    @endif
    <div class="mt-6 xl:mt-0">
        <div class="text-4xl font-bold">{{$movie['original_title']}}
            <span class="font-light">({{\Carbon\Carbon::parse($movie['release_date'])->format('Y')}})</span>
        </div>
        <div class="flex flex-col md:flex-row text-sm font-light mt-2 space-y-1 md:space-x-4 md:space-y-0">
            <div>
                {{\Carbon\Carbon::parse($movie['release_date'])->format('M
                d, Y')}}</div>
            <div><i class="fas fa-star text-yellow-400 pr-1"></i>{{$movie['vote_average'] *
                10}}%
            </div>
            <div>
                @foreach($movie['genres'] as $genre)
                {{$genre['name']}}@if (!$loop->last), @endif
                @endforeach
            </div>

        </div>
        <div class="mt-8">
            <h2 class="text-2xl font-bold">Overview</h2>
            <div class="mt-2">{{$movie['overview']}}</div>
        </div>

        <div class="mt-8">
            <h2 class="text-2xl font-bold">Featured Crew</h2>
            <div class="lg:flex lg:space-x-3">
                @foreach($movie['credits']['crew'] as $crew)
                @if($loop->index < 4) <div class="mt-3 pr-4 border p-2 shadow-sm rounded">
                    <div class="font-semibold">{{$crew['name']}}</div>
                    <div class="font-light">{{$crew['job']}}</div>
            </div>
            @endif
            @endforeach
        </div>

        <div class="mt-8 flex lg:flex-row flex-col lg:space-x-3">
            <a href="{{route('movie.index')}}"
                class="bg-slate-900 py-3 px-4 rounded shadow-sm hover:bg-slate-700 transition ease-in-out duration-150">
                <button class="font-bold text-left text-white">
                    <p><i class="fa-solid fa-arrow-left pr-2"></i>Go Back</p>
                </button>
            </a>
            <div x-data="{ isOpen: false }">
                @if (count($movie['videos']['results']) > 0)
                <button @click="isOpen = true"
                    class="bg-gradient-to-br bg-pink-500 py-3 px-4 rounded shadow-sm mt-3 lg:mt-0 text-white font-bold hover:opacity-80 transition ease-in-out duration-150 w-full text-left">
                    <span><i class="fa-solid fa-circle-play pr-2"></i>Play Trailer</span>
                </button>

                <template x-if="isOpen">
                    <div style="background-color: rgba(0, 0, 0, .5);"
                        class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto">
                        <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                            <div class="bg-slate-900 rounded-lg">
                                <div class="flex justify-end pr-4 pt-2">
                                    <button @click="isOpen = false" @keydown.escape.window="isOpen = false"
                                        class="text-4xl leading-none text-white">&times;
                                    </button>
                                </div>
                                <div class="modal-body px-8 py-8">
                                    <div class="responsive-container overflow-hidden relative"
                                        style="padding-top: 56.25%">
                                        <iframe class="responsive-iframe absolute top-0 left-0 w-full h-full"
                                            src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}"
                                            style="border:0;" allow="autoplay; encrypted-media"
                                            allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
                @endif
            </div>
        </div>
    </div>
</div>
</div>

<div class="border border-gray-100 w-full"></div>

<div class="px-2 sm:px-0 container mx-auto w-full pt-6">
    <h1 class="font-bold text-4xl pb-6">Featured Cast</h1>
    <div class="grid grid-cols-2 lg:grid-cols-6 w-full">
        @foreach($movie['credits']['cast'] as $cast)
        <div class="flex flex-col px-2">
            @if($loop->index < 6) <img src="https://image.tmdb.org/t/p/w500/{{$cast['profile_path']}}" alt="castImage"
                class="rounded shadow-xl">
                <div class="mt-2 mb-4">
                    <div class="font-semibold text-lg">{{$cast['character']}}</div>
                    <div class="font-light">{{$cast['name']}}</div>
                </div>
                @endif
        </div>
        @endforeach
    </div>
</div>


<div class="border border-gray-100 w-full"></div>

<div class="px-4 sm:px-0 container mx-auto w-full pt-6" x-data="{isOpen: false, image: ''}">
    <h1 class="font-bold text-4xl pb-6">Gallery</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 w-full">
        @foreach($movie['images']['backdrops'] as $image)
        <div class="flex flex-col px-2">
            @if($loop->index < 15) <a href="#" @click.prevent="isOpen = true
                            image='https://image.tmdb.org/t/p/original/{{$image['file_path']}}'">
                <img src="https://image.tmdb.org/t/p/w500/{{$image['file_path']}}" alt="galleryImage"
                    class="rounded shadow-xl hover:opacity-75 transition-opacity ease-in-out duration-150">
                </a>
                <div class="mt-2 mb-4"></div>
                @endif
        </div>
        @endforeach
    </div>



    <div style="background-color: rgba(0, 0, 0, .5);"
        class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto" x-show="isOpen">
        <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
            <div class="bg-slate-900 rounded-lg">
                <div class="flex justify-end pr-4 pt-2">
                    <button @click="isOpen = false" @keydown.escape.window="isOpen = false"
                        class="text-4xl leading-none text-white">&times;
                    </button>
                </div>
                <div class="modal-body px-8 py-8">
                    <img :src="image" alt="poster">
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
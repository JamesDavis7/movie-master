@extends('layouts.main')

@section('meta-title', 'Home')

@section('content')

<div class="h-96 bg-slate-900 flex items-center justify-start p-10 shadow-xl container mx-auto">
    <div class="flex flex-col">
        <h1 class="font-bold text-3xl lg:text-5xl text-white">Welcome to <span class="text-pink-500">Movie
                Master</span>.</h1>
        <p class="text-2xl lg:text-4xl font-normal text-white">Millions of movies and people to discover.
            Explore now.
        </p>
    </div>
</div>

<div class="container mx-auto">
    <h1 class="font-semibold text-2xl py-6">What's Popular</h1>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-10 gap-x-3 gap-y-6">
        @foreach($popularMovies as $movie)
        <x-movie-card :movie="$movie" :genres="$genres" />
        @endforeach
    </div>
</div>

<div class="py-6">
    <div class="border border-gray-100 w-full"></div>
</div>


<div class="container mx-auto">
    <h1 class="font-semibold text-2xl pb-6">Now Playing</h1>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-10 gap-x-3 gap-y-6 pb-6">
        @foreach($nowPlayingMovies as $movie)
        <x-movie-card :movie="$movie" :genres="$genres" />
        @endforeach
    </div>
</div>






@endsection
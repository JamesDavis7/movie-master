<div>
    <a href="{{route('movie.show', $movie['id'])}}">
        @if($movie['poster_path'])
        <img src="https://image.tmdb.org/t/p/w500/{{$movie['poster_path']}}" alt="searchImage"
            class="rounded-lg shadow-xl hover:opacity-75 transition-opacity ease-in-out duration-150">
        @else
        <img src="https://via.placeholder.com/200x300" alt="alternateImage"
            class="w-full rounded-lg shadow-xl hover:opacity-75 transition-opacity ease-in-out duration-150">
        @endif
    </a>
    <div class="mt-2">
        <a href="{{route('movie.show', $movie['id'])}}">
            <div class="text-sm font-bold hover:text-pink-500">{{$movie['original_title']}}</div>
        </a>

        <div class="flex text-xs font-light mt-1">
            <div class="pr-2 border-r border-gray-300">
                {{\Carbon\Carbon::parse($movie['release_date'])->format('M
                d, Y')}}</div>
            <div class="pl-2"><i class="fas fa-star text-yellow-400 pr-1"></i>{{$movie['vote_average'] * 10}}%
            </div>
        </div>
    </div>
</div>
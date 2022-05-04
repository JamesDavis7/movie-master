<div x-data="{isOpen: true}" @click.away="isOpen = false">
    <div class="mt-4 lg:mt-0 relative">
        <div class="bg-slate-800 rounded-xl w-full lg:w-72 pl-4 flex items-center relative">
            <div>
                <i class="fa-solid fa-magnifying-glass text-pink-500"></i>
            </div>

            <input wire:model.debounce.250ms="search" type="text" placeholder="Search"
                class="rounded-r-xl w-full px-2 bg-slate-800 py-1 outline-none text-white flex items-center"
                @focus="isOpen = true" @keydown.escape.window="isOpen = false">
        </div>
    </div>
    <div>
        @if(strlen($search) >= 2)
        <div class="lg:absolute bg-slate-800 rounded text-white mt-2 w-full lg:w-72" x-show="isOpen">
            <ul class="text-sm">
                @forelse($searchResults as $result)
                <li class="border-b border-slate-600 font-bold">
                    <a href="{{route('movie.show', $result['id'])}}"
                        class="hover:bg-gray-700 p-3 flex items-center space-x-3">
                        @if($result['poster_path'])
                        <img src="https://image.tmdb.org/t/p/w92/{{$result['poster_path']}}" alt="searchImage"
                            class="w-10">
                        @else
                        <img src="https://via.placeholder.com/50x75" alt="alternateImage" class="w-10">
                        @endif
                        <span>{{$result['title']}}</span>

                    </a>
                </li>
                @empty
                <div class="p-3 font-bold">No Results for "{{$search}}"</div>
                @endforelse
            </ul>
        </div>
        @endif
    </div>
</div>
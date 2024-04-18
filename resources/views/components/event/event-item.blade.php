@props(['event'])

<div class="max-w-sm bg-white px-6 pt-6 pb-2 rounded-xl shadow-lg transform hover:scale-105 transition duration-500 py-10">
    <div class="relative">
        <img class="w-full rounded-xl shadow-lg" src="{{$event->getThumbnailUrl()}}" alt="Colors" />
        <div class="absolute top-0 bg-yellow-300 text-gray-800 py-1 px-3 rounded-br-lg rounded-tl-lg">
            @foreach ($event->tags as $tag)
            <p class="font-semibold">{{$tag->name}}</p>
            @endforeach
        </div>
    </div>
    <div class="col-span-8 mt-2 pb-16">
        <div class="article-meta flex py-1 text-sm items-center">
            <img class="w-7 h-7 rounded-full mr-3" src="{{$event->author->profile_photo_url}}"
                alt="{{$event->author->name}}">
            <span class="mr-1 text-xs ">{{$event->author->name}}</span>
            <span class="text-gray-500 text-xs">. {{$event->created_at->diffForHumans()}}</span>
        </div>
        <h1 class="mt-1 text-gray-800 text-2xl font-bold cursor-pointer">{{$event->title}}</h1>
        <p class=" mt-2 text-base text-gray-700 font-light">
            {{$event->getExcerpt()}}
        </p>
        <div class="mt-4">
            <livewire:like-button-event :key="'like-' . $event->id" :$event />
        </div>

        <hr class="mt-4">
        <div class="my-4">
            <div class="flex space-x-2 items-center">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600 mb-1.5" fill="red"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M19,4H17V3a1,1,0,0,0-2,0V4H9V3A1,1,0,0,0,7,3V4H5A3,3,0,0,0,2,7V19a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V7A3,3,0,0,0,19,4Zm1,15a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V12H20Zm0-9H4V7A1,1,0,0,1,5,6H7V7A1,1,0,0,0,9,7V6h6V7a1,1,0,0,0,2,0V6h2a1,1,0,0,1,1,1Z" />
                    </svg>
                </span>
                <p class="gap-2">{{$event->toArray()['start_date']}} <strong class="font-bold text-red-500"> - </strong> {{$event->toArray()['end_date']}}</p>
            </div>
            <div class="flex space-x-2 items-center">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600 mb-1.5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>
                <p>{{$event->start_time}} WIB</p>
            </div>
            <div class="flex space-x-2">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-red-600 mb-1.5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 21C15.5 17.4 19 14.1764 19 10.2C19 6.22355 15.866 3 12 3C8.13401 3 5 6.22355 5 10.2C5 14.1764 8.5 17.4 12 21Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z" />
                    </svg>
                </span>
                <p>{{$event->country->name}} / {{$event->city->name}} / {{$event->address}}</p>
            </div>
        </div>
        {{-- <livewire:attendings-button :event="$event"/> --}}
    </div>

</div>

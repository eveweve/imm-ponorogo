{{-- <div id="event" class=" px-2 lg:px-2 py-6">
    <div class="flex justify-between items-center border-b border-gray-100">
        <div id="filter-selector" class="flex items-center space-x-4 font-light ">
            <button class="{{ $sort === 'desc' ? 'text-red-500 border-b border-red-900' : 'text-gray-500' }} py-4"
wire:click="setSort('desc')">Latest</button>
<button class="{{ $sort === 'asc' ? 'text-red-500 border-b border-red-900' : 'text-gray-500' }} py-4 "
    wire:click="setSort('asc')">Oldest</button>
</div>
</div>
</div>
<div class="my-3">
    {{$this->events->onEachSide(1)->links()}}
</div> --}}
<div>
    <div class="flex justify-between items-center border-b border-gray-100 py-4 px-4 ml-3">
        <div id="filter-selector" class="flex items-center space-x-4 font-light ">
            <button class="{{ $sort === 'desc' ? 'text-red-500 border-b border-red-900' : 'text-gray-500' }} py-4"
                wire:click="setSort('desc')">Latest</button>
            <button class="{{ $sort === 'asc' ? 'text-red-500 border-b border-red-900' : 'text-gray-500' }} py-4 "
                wire:click="setSort('asc')">Oldest</button>
        </div>
    </div>
    <div class="min-h-screen flex justify-center items-center my-6">
        <div class="md:px-4 md:grid md:grid-cols-2 xl:grid-cols-4 gap-5 space-y-10 md:space-y-2">
            @foreach ($this->events as $event )
            <x-event.event-item :event="$event" />
            @endforeach
        </div>
        <div class="my-3">
            {{$this->events->onEachSide(1)->links()}}
        </div>
    </div>
</div>

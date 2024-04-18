<?php

namespace App\Livewire;

use App\Models\Tag;
use App\Models\Event;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class EventList extends Component
{
    use withPagination;

    #[Url()]
    public $sort = 'desc';

    #[Url()]
    public $tag = '';

    public function setSort($sort){
        $this->sort = ($sort == 'desc') ? 'desc' : 'asc';
    }

    #[computed()]
    public function events(){
        return Event::published()
        ->with('author','tags')
        ->orderBy('created_at', $this->sort)
        ->paginate(5);
    }
    public function render()
    {
        return view('livewire.event-list');
    }
}

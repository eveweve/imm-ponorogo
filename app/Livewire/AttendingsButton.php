<?php

namespace App\Livewire;

use App\Models\Event;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class AttendingsButton extends Component
{
    public function ButtonAttendings(Request $request, $id){
        $event = Event::findOrFail($id);
        $attending = $event->attendings()->where('user_id', auth()->id())->first();
        if (!is_null($attending)) {
            $attending->delete();
            return null;
        } else {
            $attending = $event->attendings()->create([
                'user_id' => auth()->id(),
                'num_tickets' => 1
            ]);
            return $attending;
        }
    }

    public function render()
    {
        return view('livewire.attendings-button');
    }
}

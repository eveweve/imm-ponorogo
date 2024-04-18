<?php

namespace App\Livewire;

use App\Models\Event;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class LikeButtonEvent extends Component
{
    public Event $event;

    public function toggleLike()
    {
        if (auth()->guest()) {
            return $this->redirect(route('login'), true);
        }

        $user = auth()->user();

        if ($user->hasLikedEvent($this->event)) {
            $user->likes_events()->detach($this->event);
            return;
        }

        $user->likes_events()->attach($this->event);
    }

    public function render()
    {
        return view('livewire.like-button-event');
    }
}

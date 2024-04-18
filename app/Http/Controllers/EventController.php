<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        return view(
            'events.index',
            [
                'events' => Event::take(5)->get(),
            ]
        );
    }

    public function show(Event $event){
        return view(
            'event.show',[
                'event' => $event
            ]
        );
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendingEventController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $events = Event::with('attendings')->whereHas('attendings', function ($q) {
            $q->where('user_id', auth()->id());
        })->get();

        return view('events.index', compact('events'));
    }
}

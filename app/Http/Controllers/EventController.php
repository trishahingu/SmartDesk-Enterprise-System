<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->get();

        return view(
            'events.index',
            compact('events')
        );
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        Event::create([

            'title' => $request->title,

            'event_date' => $request->event_date,

            'description' => $request->description

        ]);

        return redirect('/events')
            ->with('success', 'Event Added');
    }
}
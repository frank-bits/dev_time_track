<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Event;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Event\CreateEventRequest;
use App\Models\Rate;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user = User::find($user->id);
        $user->with('events', 'rates', 'projects')->get();


        return Inertia::render('Event/EventList', [

            'user' => $user,
            'activities' => Activity::all()->map->only('id', 'name'),
        ]);
    }

    public function store(CreateEventRequest $request)
    {
        $request->validated();

        $user = Auth::user();

        $rate = Rate::where('activity_id', $request->activity_id)
            ->where('user_id', $user->id)
            ->where('project_id', $request->project_id)
            ->first();
        $request->merge(['rate_id' => $rate->id]);

        $event = Event::create(
            [
                'start_time' => Carbon::parse($request->start_time)->format('Y-m-d H:i:s'),
                'end_time'  => Carbon::parse($request->end_time)->format('Y-m-d H:i:s') ?? null,
                'user_id' =>  $user->id,
                'project_id' => $request->project_id,
                'rate_id' => $request->rate_id,
                'task_id'  => $request->task_id,
                'notes' => $request->notes

            ]
        );

        return inertia('Dashboard', [
            'event' => $event
        ]);
    }
}

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
        $user->with('events','rates','projects')->get();

    
        return Inertia::render('Event/EventList', [
      
            'user' => $user,
            'activities' => Activity::all()->map->only('id', 'name'),
        ]);

    }

    public function store(CreateEventRequest $request)
    {
        $request->validated();
      $request->start_time = Carbon::parse($request->start_time)->format('Y-m-d H:i:s');
     
        $request->merge(['user_id' => Auth::id()]);
        $rate = Rate::where('activity_id', $request->activity_id)
        ->where('user_id', Auth::id())
        ->where('project_id', $request->project_id)
        ->first();
        $request->merge(['rate_id' => $rate->id]);
        $event = Event::create($request->all());
        dd($event);

     //   Auth::user()->events()->create($request->all());

     return to_route('edit.show', $event->id);

    }
}
